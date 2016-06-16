<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
/**
 * Modelo para el control de los juegos
 *
 * @name    c.juegos.php
 * @author  PHPost Team
 * By Kmario19
 */
class tsJuegos {

	// INSTANCIA DE LA CLASE
	function &getInstance(){
		static $instance;
		
		if( is_null($instance) ){
			$instance = new tsJuegos();
    	}
		return $instance;
	}
	
	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*\
								PUBLICAR JUEGOS
	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
	/*
		newjuego()
	*/
	function newJuego(){
		global $tsCore, $tsUser, $tsMonitor, $tsActividad;
		//
		$jData = array(
			'titulo' => $tsCore->setSecure($tsCore->parseBadWords($_POST['titulo']), true),
			'url' => $tsCore->setSecure($_POST['url']),
			'img' => $tsCore->setSecure($_POST['img']),
			'desc' => $tsCore->setSecure($tsCore->parseBadWords($_POST['desc']), true),
			'cat' => $tsCore->setSecure($_POST['cat']),
			'closed' => empty($_POST['closed']) ? 0 : 1,
			'visitas' => empty($_POST['visitas']) ? 0 : 1,
		);
		// COMPROBAR CAMPOS
		if(!empty($jData['titulo']) && !empty($jData['url']) && !empty($jData['img']) && !empty($jData['cat'])) {
			// ANTI FLOOD original (?)
			$tsCore->antiFlood(true, 'juego', 'Para el carro, chacho...');
			// INSERTAMOS
			$_SERVER['REMOTE_ADDR'] = $_SERVER['X_FORWARDED_FOR'] ? $_SERVER['X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
			if(!filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP)) { die('0: Su ip no se pudo validar.'); }
			if(db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO `j_juegos` (j_title, j_date, j_description, j_imagen, j_url, j_cat, j_user, j_closed, j_visitas, j_ip) VALUES (\''.$jData['titulo'].'\', \''.time().'\', \''.$jData['desc'].'\', \''.$jData['img'].'\',  \''.$jData['url'].'\',  \''.$jData['cat'].'\', \''.$tsUser->uid.'\', \''.$jData['closed'].'\', \''.$jData['visitas'].'\', \''.$_SERVER['REMOTE_ADDR'].'\')')) {
				$jid = db_exec('insert_id');
				// AGREGAR AL MONITOR DE LOS USUARIOS QUE ME SIGUEN
				$tsMonitor->setFollowNotificacion(25, 1, $tsUser->uid, $jid);
				// ACTIVIDAD
				$tsActividad->setActividad(25, $jid);
				//
				return $jid;
			} else exit( show_error('Error al ejecutar la consulta de la l&iacute;nea '.__LINE__.' de '.__FILE__.'.', 'db') );			
		} else return '0: Completa los datos.';
	}
 

 /*
        getJuegoEdit()
    */
    function getJuegoEdit() {
        global $tsCore, $tsUser;
        //
        $jid = $tsCore->setSecure($_GET['id']);
        // DATOS
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT * FROM `j_juegos` WHERE juego_id = \''.(int)$jid.'\'');
        $data = db_exec('fetch_assoc', $query);
        
        //
        if(!empty($data['j_user'])){
            // ES EL DUEÑO DEL JUEGO?
            if($data['j_user'] == $tsUser->uid || $tsUser->is_admod){
                return $data;
            } else return 'El juego que intentas editar no es tuyo.';
        } else return 'El juego que intentas editar no existe.';
    }
    /*
        editJuego()
    */
    function editJuego(){
        global $tsCore, $tsUser, $tsMonitor, $tsActividad;
        //
        $jid = $tsCore->setSecure($_GET['id']);
        // DATOS
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT j.juego_id, j.j_title, j.j_user, u.user_name FROM j_juegos AS j LEFT JOIN u_miembros AS u ON j.j_user = u.user_id WHERE j.juego_id = \''.(int)$jid.'\'');
        $data = db_exec('fetch_assoc', $query);
        
        //
        if(!empty($data['j_user'])){
            // ES EL DUEÑO DEL JUEGO?
            if($data['j_user'] == $tsUser->uid || $tsUser->is_admod){
        		$jData = array(
                    'titulo' => $tsCore->parseBadWords($tsCore->setSecure($_POST['titulo'], true)),
                    'desc' => $tsCore->parseBadWords($tsCore->setSecure($_POST['desc'], true)),
                    'img' => $tsCore->setSecure($_POST['img'], true),
					'cat' => $tsCore->setSecure($_POST['cat']),
                    'privada' => empty($_POST['privada']) ? 0 : 1,
                    'closed' => empty($_POST['closed']) ? 0 : 1,
					'visitas' => empty($_POST['visitas']) ? 0 : 1,
					'razon' => empty($_POST['razon']) ? 'undefined' : $tsCore->setSecure($_POST['razon'], true),
                );
                // UPDATES
				db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE `j_juegos` SET j_title = \''.$jData['titulo'].'\', j_description = \''.$jData['desc'].'\', j_imagen = \''.$jData['img'].'\', j_cat = \''.$jData['cat'].'\',  j_closed = \''.$jData['closed'].'\', j_visitas = \''.$jData['visitas'].'\' WHERE juego_id = \''.(int)$jid.'\'');
				
				if($data['j_user'] != $tsUser->uid){
				$aviso = 'Hola <b>'.$tsUser->getUserName($data['j_user'])."</b>\n\n Te informo que tu juego <a href=".$tsCore->settings['url'].'/juegos/'.$data['user_name'].'/'.$data['juego_id'].'/'.$tsCore->setSEO($data['j_title']).'.html'."><b>".$data['j_title']."</b></a> ha sido editado por <a href=\"#\" class=\"hovercard\" uid=\"".$tsUser->uid."\">".$tsUser->nick."</a>\n\n Causa: <b>".$jData['razon']."</b>.\n\n Muchas gracias por entender!";
                $tsMonitor->setAviso($data['j_user'], 'Juego editado', $aviso, 2);				
				}
				// REDIRIGIMOS
                $url = $tsCore->settings['url'].'/juegos/'.$jid.'/'.$tsCore->setSEO($jData['titulo']).'.html';
                //
                $tsCore->redirectTo($url);
            } else return 'El juego que intentas editar no es tuyo.';
        } else return 'El juego que intentas editar no existe.';
    }
/*
        delJuego()
    */
    function delJuego(){
        global $tsCore, $tsUser;
        //
        $jid = $tsCore->setSecure($_POST['jid']);
        // DATOS
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT `j_user` FROM `j_juegos` WHERE juego_id = \''.(int)$jid.'\'');
        $data = db_exec('fetch_assoc', $query);
        
        //
        if(!empty($data['j_user'])){
            // ES EL DUEÑO DEL JUEGO?
            if($data['j_user'] == $tsUser->uid || $tsUser->is_admod){
			    if(db_exec(array(__FILE__, __LINE__), 'query', 'DELETE FROM j_juegos WHERE juego_id = \''.(int)$jid.'\'')){
                    // BORRAMOS LOS COMENTARIOS
					db_exec(array(__FILE__, __LINE__), 'query', 'DELETE FROM `j_comentarios` WHERE c_juego_id = \''.(int)$jid.'\'');
					// BORRAMOS LOS FAVORITOS
					db_exec(array(__FILE__, __LINE__), 'query', 'DELETE FROM `j_favoritos` WHERE fav_juego = \''.(int)$jid.'\'');
					// BORRAMOS LOS VOTOS
					db_exec(array(__FILE__, __LINE__), 'query', 'DELETE FROM `j_votos` WHERE v_juego_id = \''.(int)$jid.'\'');
                    return '1: OK';
                } else return '0: Ocurri&oacute; un error al intentar borrar';
            } else return '0: Este no es tu juego.';
        } else return '0: El juego no existe.';
    }

    /*
        getHomeJuegos()
    */
 function getHomeJuegos(){
        global $tsCore, $tsUser;
        //	
	$query = 'SELECT j.juego_id, j.j_title, j.j_imagen, j.j_status, u.user_name, u.user_activo, u.user_baneado, u.user_id FROM j_juegos AS j LEFT JOIN u_miembros AS u ON u.user_id = j.j_user '.($tsUser->is_admod && $tsCore->settings['c_see_mod'] == 1 ? '' : 'WHERE j.j_status = \'0\' AND u.user_activo = \'1\' && u.user_baneado = \'0\'').' ORDER BY RAND() ASC LIMIT 5';
        $data['data'] = result_array(db_exec(array(__FILE__, __LINE__), 'query', $query));
        
	$q1 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(u.user_name) AS c FROM u_miembros AS u LEFT JOIN j_comentarios AS c ON u.user_id = c.c_user WHERE c.c_juego_id = \''.(int)$juego_id.'\' && c.c_status = \'0\' && u.user_activo = \'1\' && u.user_baneado = \'0\''));
	$data['juego_comments'] = $q1[0];
        //
        return $data;
    }

    /*
        getLastJuegos()
    */
    function getLastJuegos(){
        global $tsCore, $tsUser;
        //
		$cat = $tsCore->setSecure($_GET['cat']);
		if(!empty($cat)) {
			$cat = db_exec('fetch_assoc', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT cat_id, cat_title FROM j_categorias WHERE LOWER(cat_img) = \''.$cat.'\' LIMIT 1'));			
			$data['cat'] = $cat['cat_title'];
			$cat = ' AND j_cat = \''.$cat['cat_id'].'\' ';
		} else $cat = '';
		//
	$max = 15; // MAXIMO A MOSTRAR
	$limit = $tsCore->setPageLimit($max, true);	
	// PAGINAS
	$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(j.juego_id) FROM j_juegos AS j LEFT JOIN u_miembros AS u ON u.user_id = j.j_user WHERE juego_id > \'0\' '.($tsUser->is_admod && $tsCore->settings['c_see_mod'] == 1 ? '' : 'AND j.j_status = \'0\' AND u.user_activo = \'1\' && u.user_baneado = \'0\'').$cat);
	list ($total) = db_exec('fetch_row', $query);
	$data['total'] = $total;
    $page = $tsCore->setSecure($_GET['s']);
	$data['pages'] = $tsCore->pageIndex($tsCore->settings['url']."/juegos/?",$page,$total, $max);
        //
        
	$query = 'SELECT j.juego_id, j.j_title, j.j_date, j.j_description, j.j_imagen, j.j_hits, j.j_votos_pos, j.j_url, j.j_status, u.user_name, u.user_id, u.user_activo, u.user_baneado FROM j_juegos AS j LEFT JOIN u_miembros AS u ON u.user_id = j.j_user WHERE juego_id > \'0\' '.($tsUser->is_admod && $tsCore->settings['c_see_mod'] == 1 ? '' : 'AND j.j_status = \'0\' AND u.user_activo = \'1\' && u.user_baneado = \'0\'').$cat.' ORDER BY j.juego_id DESC LIMIT '.$limit;
        $data['data'] = result_array(db_exec(array(__FILE__, __LINE__), 'query', $query)); 
        return $data;
    }

	/*
		getMostJuegos()
    */
	function getMostJuegos(){
		global $tsCore, $tsUser;
		//
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT j.juego_id, j.j_user, j.j_hits, j.j_title, j.j_imagen, j.j_date, j.j_url, u.user_name FROM j_juegos AS j LEFT JOIN u_miembros AS u ON u.user_id = j.j_user '.($tsUser->is_admod && $tsCore->settings['c_see_mod'] == 1 ? '' : 'WHERE j.j_status = \'0\' && u.user_activo = \'1\' && u.user_baneado = \'0\'').' ORDER BY j.j_hits DESC LIMIT 6');    
		//
		$data = result_array($query);
		//
		return $data;
   }
	 /*
        getLastComments()
    */
    function getLastComments(){
        global $tsUser, $tsCore;
        //
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT c.cid, c.c_date, c.c_user, j.juego_id, j.j_title, u.user_name FROM j_comentarios AS c LEFT JOIN j_juegos AS j ON c.c_juego_id = j.juego_id LEFT JOIN u_miembros AS u ON c.c_user = u.user_id '.($tsUser->is_admod && $tsCore->settings['c_see_mod'] == 1 ? '' : 'WHERE j.j_status = \'0\' && u.user_activo = \'1\' && u.user_baneado = \'0\'').' ORDER BY c.c_date DESC LIMIT 10');
        $data = result_array($query);
        
        //
        return $data;
    }
      /*
        getJuegos($user_id)
    */
    function getJuegos($user_id){
        global $tsCore, $tsUser;
        //
        $query = 'SELECT j.juego_id, j.j_title, j.j_hits, j.j_votos_pos, j.j_date, j.j_description, j.j_imagen, j.j_url, j.j_status, u.user_name, u.user_id, u.user_activo FROM j_juegos AS j LEFT JOIN u_miembros AS u ON u.user_id = j.j_user WHERE j.j_user = \''.(int)$user_id.'\' '.($tsUser->is_admod && $tsCore->settings['c_see_mod'] == 1 ? '' : ' && j.j_status = \'0\' && u.user_activo = \'1\' && u.user_baneado = \'0\'').' ORDER BY j.juego_id DESC';
        // PAGINAR
        $total = db_exec('num_rows', db_exec(array(__FILE__, __LINE__), 'query', $query));
        $pages = $tsCore->getPagination($total, 12);
        $data['pages'] = $pages;
        $data['total'] = $total;
        //
        $data['data'] = result_array(db_exec(array(__FILE__, __LINE__), 'query', $query.' LIMIT '.$pages['limit']));        
        //
        return $data;
    }
	/*
        getJuego()
    */
    function getJuego(){
        global $tsCore, $tsUser;
        //
        $jid = $tsCore->setSecure($_GET['jid']);
        // MORE JUEGO
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT j.*, c.cat_title, c.cat_img, u.user_name, u.user_activo, p.user_pais, p.user_sexo, u.user_seguidores, u.user_rango, u.user_puntos, r.r_name, r.r_color, r.r_image FROM j_juegos AS j LEFT JOIN u_miembros AS u ON u.user_id = j.j_user LEFT JOIN u_perfil AS p ON p.user_id = u.user_id LEFT JOIN u_rangos AS r ON u.user_rango = r.rango_id LEFT JOIN j_categorias AS c ON j.j_cat = c.cat_id WHERE j.juego_id = \''.(int)$jid.'\' '.($tsUser->is_admod ? '' : 'AND j.j_status = \'0\' AND u.user_activo = \'1\'').' LIMIT 1');
        $data['juego'] = db_exec('fetch_assoc', $query);
        
        $q1 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(cid) AS cj FROM j_comentarios WHERE c_user = \''.$data['juego']['j_user'].'\''));
		$q2 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(juego_id) AS j FROM j_juegos WHERE j_user = \''.$data['juego']['j_user'].'\' && j_status = \'0\''));
		$q3 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(fav_id) AS j FROM j_favoritos WHERE fav_juego = \''.(int)$jid.'\''));
        $data['juego']['user_juego_comments'] = $q1[0];
        $data['juego']['user_juegos'] = $q2[0];
		$data['juego']['favoritos'] = $q3[0];
		$data['juego']['exist'] = db_exec('num_rows', $query);
        $data['juego']['j_description'] = $tsCore->parseBBcode($data['juego']['j_description']);
		$data['juego']['v_total'] = $data['juego']['j_votos_pos']+$data['juego']['j_votos_neg'];
		$data['juego']['v_pos'] = number_format(($data['juego']['j_votos_pos']/$data['juego']['v_total'])*100, 0);
		$data['juego']['v_neg'] = number_format(($data['juego']['j_votos_neg']/$data['juego']['v_total'])*100, 0);
        
        include('../ext/datos.php');
        $pais = $data['juego']['user_pais'];
        $data['juego']['user_pais'] = array($pais, $tsPaises[$pais]);
        // FOLLOW
		$data['juego']['follow'] = db_exec('num_rows', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT `follow_id` FROM `u_follows` WHERE f_user = \''.$tsUser->uid.'\' AND f_id = \''.(int)$data['juego']['j_user'].'\' AND f_type = \'1\' LIMIT 1'));
        
		// FAVORITOS
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT j.fav_fecha, u.user_id, u.user_name FROM u_miembros AS u LEFT JOIN j_favoritos AS j ON j.fav_user = u.user_id WHERE fav_juego = \''.(int)$jid.'\' LIMIT 15');
        $data['favoritos'] = result_array($query);
        
        // ULTIMOS JUEGOS
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT j.juego_id, j.j_title, j.j_imagen, j.j_date, j.j_status, j.j_url, u.user_name, u.user_activo FROM j_juegos AS j LEFT JOIN u_miembros AS u ON u.user_id = j.j_user WHERE j.j_user = \''.$data['juego']['j_user'].'\' '.($tsUser->is_admod && $tsCore->settings['c_see_mod'] == 1 ? '' : 'AND j.j_status = \'0\' AND u.user_activo = \'1\' && u.user_baneado = \'0\'').' ORDER BY j.juego_id DESC LIMIT 6');
        $data['last'] = result_array($query);
        
        // COMENTARIOS
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT c.*, u.user_name, u.user_activo FROM j_comentarios AS c LEFT JOIN u_miembros AS u ON c.c_user = u.user_id WHERE c.c_juego_id = \''.(int)$jid.'\' '.($tsUser->is_admod && $tsCore->settings['c_see_mod'] == 1 ? '' : 'AND u.user_activo = \'1\' && u.user_baneado = \'0\'').' ORDER BY c.c_date ASC');
        $comments = result_array($query);
        foreach($comments as $key => $val){
        $val['c_body'] = $tsCore->parseBadWords($tsCore->parseBBcode($val['c_body']), true);
        $data['comments'][] = $val;
        }
        $data['juego']['j_comments'] = count($comments);
        
		//VISITANTES RECIENTES
		if($data['juego']['j_visitas']){
		$data['visitas'] = result_array(db_exec(array(__FILE__, __LINE__), 'query', 'SELECT j.*, u.user_id, u.user_name FROM w_visitas AS j LEFT JOIN u_miembros AS u ON j.user = u.user_id WHERE j.for = \''.(int)$jid.'\' && j.type = \'4\' && j.user > 0 ORDER BY j.date DESC LIMIT 15'));
		}
		// FAVORITOS
		$fav = db_exec('fetch_assoc', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT fav_id FROM j_favoritos WHERE fav_juego = \''.(int)$jid.'\' AND fav_user = \''.$tsUser->uid.'\' LIMIT 1'));
		if($fav['fav_id']) {
			$data['juego']['myfav'] = 1;
		} else {
			$data['juego']['myfav'] = 0;
		}
        // UPDATES
		$visitado = db_exec('num_rows', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT id FROM `w_visitas` WHERE `for` = \''.(int)$jid.'\' && `type` = \'4\' && '.($tsUser->is_member ? '(`user` = \''.$tsUser->uid.'\' OR `ip` LIKE \''.$_SERVER['REMOTE_ADDR'].'\')' : '`ip` LIKE \''.$_SERVER['REMOTE_ADDR'].'\'').' LIMIT 1'));
		if($tsUser->is_member && $visitado == 0) {
			db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO w_visitas (`user`, `for`, `type`, `date`, `ip`) VALUES (\''.$tsUser->uid.'\', \''.(int)$jid.'\', \'4\', \''.time().'\', \''.$_SERVER['REMOTE_ADDR'].'\')');
			db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE j_juegos SET j_hits = j_hits + 1 WHERE juego_id = \''.(int)$jid.'\' AND j_user != \''.$tsUser->uid.'\'');		
		}else{
		db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE `w_visitas` SET `date` = \''.time().'\', ip = \''.$_SERVER['REMOTE_ADDR'].'\' WHERE `for` = \''.(int)$jid.'\' && `type` = \'4\'');
		}
		if($tsCore->settings['c_hits_guest'] == 1 && !$tsUser->is_member && !$visitado) {
			db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO w_visitas (`user`, `for`, `type`, `date`, `ip`) VALUES (\'0\', \''.(int)$jid.'\', \'4\', \''.time().'\', \''.$_SERVER['REMOTE_ADDR'].'\')');
			db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE j_juegos SET j_hits = j_hits + 1 WHERE juego_id = \''.(int)$jid.'\'');
		}
		//
        return $data;
    }
	
	/*
		getCategorias
	*/
	function getCategorias() {
		global $tsCore;
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT * FROM j_categorias ORDER BY cat_title');
		$data = result_array($query);
		return $data;
	}
	
	/*
		Total juegos de la categoria
	*/
	function cat_total($cid) {
		$cid = intval($cid);
		$total = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(juego_id) FROM j_juegos WHERE j_status = 0 AND j_cat = '.(int)$cid));
		return $total[0];
	}
	 
	/*
        votarJuego()
    */
    function votarJuego(){
        global $tsCore, $tsUser, $tsMonitor, $tsActividad;
        // SOLO MIEMBROS
		if($tsUser->is_member){
			// VOTAR
			$jid = $tsCore->setSecure($_POST['juegoid']);
			$voto = $tsCore->setSecure($_POST['voto']);
			
			if($voto == 'pos'){
			 $voto = 'j_votos_pos = j_votos_pos + 1';
             $type = 1;
			}else{
			 $voto = 'j_votos_neg = j_votos_neg + 1';
             $type = 0;
			}
            //
			$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT j_user FROM j_juegos WHERE juego_id = \''.(int)$jid.'\' LIMIT 1');
			$data = db_exec('fetch_assoc', $query);
			
			// ES MI JUEGO?
			$is_mypost = ($data['j_user'] == $tsUser->uid) ? true : false;
			// NO ES MI JUEGO, PUEDO VOTAR
			if(!$is_mypost){
				// YA LO VOTE?
				$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT vid FROM j_votos WHERE v_juego_id = \''.(int)$jid.'\'  AND v_user = \''.$tsUser->uid.'\' LIMIT 1');
				$votado = db_exec('num_rows', $query);
				
				if(empty($votado)){
					// SUMAR VOTO
					db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE j_juegos SET '.$voto.' WHERE juego_id = \''.(int)$jid.'\'');
					// INSERTAR EN TABLA
					if(db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO `j_votos` (`v_juego_id`, `v_user`, `v_type`, `v_date`) VALUES (\''.(int)$jid.'\', \''.$tsUser->uid.'\', \''.$type.'\', \''.time().'\')')) {
						// NOTIFICAR AL USUARIO
						$tsMonitor->setNotificacion(27, $data['j_user'], $tsUser->uid, $jid, $type);
						$tsActividad->setActividad(27, $jid, $type);
						return '1: Votado';
					} else return '0: ocurrio un error, intentalo m&aacute;s tarde.';
					//
				} return '0: Ya has votado este juego.';
			} else return '0: No puedes votar tu propio juego.';
		} else return '0: Lo sentimos, para poder votar debes estar registrado.';
    }
	
	/************ COMENTARIOS *******************/
	
    /*
        newComentario()
    */
    function newComentario(){
        global $tsCore, $tsUser, $tsMonitor, $tsActividad;
		$comentario = substr($tsCore->setSecure($_POST['comentario']),0,1500);
		$jid = $tsCore->setSecure($_POST['juegoid']);
        /* COMPROVACIONES */
        $tsText = preg_replace('# +#',"",$comentario);
        $tsText = str_replace(array("\n","\t"),"",$tsText);
        if($tsText == '') return '0: El campo <b>Mensaje</b> es requerido para esta operaci&oacute;n';
        /* DE QUIEN ES EL JUEGO */
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT j_user, j_closed FROM j_juegos WHERE juego_id = \''.(int)$jid.'\' LIMIT 1');
		$data = db_exec('fetch_assoc', $query);		
        //
        $fecha = time();

        if($data['j_user']){
            if($data['j_closed'] != 1 || $data['j_user'] == $tsUser->uid){
                // ANTI FLOOD
                $tsCore->antiFlood();
                //
				$_SERVER['REMOTE_ADDR'] = $_SERVER['X_FORWARDED_FOR'] ? $_SERVER['X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
                if(!filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP)) { die('0: Su ip no se pudo validar.'); }
				if(db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO j_comentarios (c_juego_id, c_user, c_date, c_body, c_ip) VALUES (\''.(int)$jid.'\', \''.$tsUser->uid.'\', \''.$fecha.'\', \''.$comentario.'\', \''.$_SERVER['REMOTE_ADDR'].'\')')) {
        		  	$cid = db_exec('insert_id');
                    // NOTIFICAR AL USUARIO
                    $tsMonitor->setNotificacion(26, $data['j_user'], $tsUser->uid, $jid);					
					// ACTIVIDAD
					$tsActividad->setActividad(26, $jid);
        		  	//
        			return array($cid,$tsCore->parseBadWords($tsCore->parseBBcode($comentario), true), $fecha, $tsCore->setSecure($_POST['auser']));
        		} else return '0: Ocurri&oacute; un error int&eacute;ntalo m&aacute;s tarde.';
            } else return '0: El juego se encuentra cerrado y no se permiten comentarios.';
        } else return '0: El juego no existe.';
   }
    /*
        delComentario()
    */
    function delComentario(){
        global $tsCore, $tsUser;
        //
        $cid = $tsCore->setSecure($_POST['cid']);
        // DATOS
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT c.cid, c.c_user, j.juego_id, j.j_user FROM j_comentarios AS c LEFT JOIN j_juegos AS j ON c.c_juego_id = j.juego_id WHERE c.cid = \''.(int)$cid.'\' LIMIT 1');
        $data = db_exec('fetch_assoc', $query);
        
        //
        if(!empty($data['cid'])){
            // ES EL DUEÑO DEL COMENTARIO O TIENE PERMISOS?
            if($data['j_user'] == $tsUser->uid || $tsUser->is_admod || $data['c_user'] == $tsUser->uid){
				if(db_exec(array(__FILE__, __LINE__), 'query', 'DELETE FROM j_comentarios WHERE cid = \''.(int)$cid.'\'')){
					 return '1: Borrado';
				} else return '0: Ocurri&oacute; un error, intentalo m&aacute;s tarde.';
            } else return '0: Hmmm... &iquest;Haciendo pruebas?';
        } else return '0: El comentario no existe.';
	}
	
	/************ FAVORITOS *******************/
	
	/*
		AGREGAR A FAVORITOS
	*/
	function add_fav() {
		global $tsCore, $tsUser, $tsMonitor, $tsActividad;
		$juegoid = $tsCore->setSecure($_POST['juegoid']);
		//
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT juego_id, j_user, j_title FROM j_juegos WHERE juego_id = \''.(int)$juegoid.'\'');		
		$data = db_exec('fetch_assoc', $query);
		//
		if(!empty($data['juego_id'])) {
			if($data['j_user'] != $tsUser->uid) {
				$q = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(fav_id) FROM j_favoritos WHERE fav_juego = \''.(int)$juegoid.'\' AND fav_user ='.$tsUser->uid));
				if($q[0] == 0) {
					if(db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO `j_favoritos` (fav_juego, fav_user, fav_fecha) VALUES (\''.(int)$juegoid.'\', \''.$tsUser->uid.'\', \''.time().'\')')) {
						$tsMonitor->setNotificacion(28, $data['j_user'], $tsUser->uid, $juegoid);
						$tsActividad->setActividad(28, $juegoid);
						return '1: <b>'.$data['j_title'].'</b> a&ntilde;adido a tus favoritos.';				
					} else return '0: Ocurri&oacute; un error al intentar procesar lo solicitado.';
				} else return '0: Ya has agregado este archivo a favoritos.';
			} else return '0: No puedes agregar tus juegos a favoritos.';
		} else return '0: El juego no existe.';
	}
	
	/* 
		BORRAR FAVORITOS [SOLO EL AUTOR]
	*/
	function del_fav(){
		global $tsCore, $tsUser;
		//
		$favid = $tsCore->setSecure($_POST['favid']);
		// CONSULTAR
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT fav_id, fav_user FROM j_favoritos WHERE fav_juego = \''.(int)$favid.'\' AND fav_user = \''.$tsUser->uid.'\'');
		$data = db_exec('fetch_assoc', $query);
		// ES MIO O TIENE PERMISOS
		if(!empty($data['fav_id'])){
			if($data['fav_user'] == $tsUser->uid) {
				if(db_exec(array(__FILE__, __LINE__), 'query', 'DELETE FROM j_favoritos WHERE fav_juego = \''.(int)$favid.'\'')) {
					return '1: Favorito removido con exito.';
				} else return '0: Ocurri&oacute; un error al intentar procesar lo solicitado.';
			} else return '0: Lo que intentas hacer no est&aacute; permitido.';
		} else return '0: El favorito no existe o ya lo eliminaste.';
	}
	
	/*
		FAVORITOS DEL AUTOR
	*/
	function getFavs() {
		global $tsCore, $tsUser;
		//
		$query = 'SELECT j.juego_id, j.j_title, j.j_hits, j.j_votos_pos, j.j_date, j.j_imagen, j.j_url, u.user_name, u.user_id FROM j_juegos AS j LEFT JOIN j_favoritos AS f ON f.fav_juego = j.juego_id LEFT JOIN u_miembros AS u ON u.user_id = j.j_user WHERE f.fav_user = \''.$tsUser->uid.'\' AND j.j_status = \'0\' && u.user_activo = \'1\' && u.user_baneado = \'0\' ORDER BY j.juego_id DESC';
        // PAGINAR
        $total = db_exec('num_rows', db_exec(array(__FILE__, __LINE__), 'query', $query));
        $pages = $tsCore->getPagination($total, 12);
        $data['pages'] = $pages;
        $data['total'] = $total;
        //
        $data['data'] = result_array(db_exec(array(__FILE__, __LINE__), 'query', $query.' LIMIT '.$pages['limit']));        
        //
        return $data;
	}
	
	/************ TOPS *******************/
	
	function getTopJuegos(){
		// VISITAS
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT juego_id, j_title, j_visitas, cat_title, cat_img FROM j_juegos LEFT JOIN j_categorias ON cat_id = j_cat WHERE j_visitas > 0 ORDER BY j_visitas DESC LIMIT 10');
        $array['visitas'] = result_array($query);
        
        // VOTOS POSITIVOS
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT juego_id, j_title, j_votos_pos, cat_title, cat_img FROM j_juegos LEFT JOIN j_categorias ON cat_id = j_cat WHERE j_votos_pos > 0 ORDER BY j_votos_pos DESC LIMIT 10');
        $array['votos'] = result_array($query);
        
		// COMENTARIOS
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(c.c_juego_id) AS total, j.juego_id, j.j_title, j.j_visitas, i.cat_title, i.cat_img  FROM j_juegos AS j LEFT JOIN j_comentarios AS c ON c.c_juego_id = j.juego_id LEFT JOIN j_categorias AS i ON i.cat_id = j.j_cat GROUP BY c.c_juego_id ORDER BY total DESC LIMIT 10');
		$array['comentarios'] = result_array($query);
		
		// FAVORITOS
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(f.fav_juego) AS total, j.juego_id, j.j_title, j.j_visitas, i.cat_title, i.cat_img FROM j_juegos AS j LEFT JOIN j_favoritos AS f ON f.fav_juego = j.juego_id LEFT JOIN j_categorias AS i ON i.cat_id = j.j_cat GROUP BY f.fav_juego ORDER BY total DESC LIMIT 10');
		$array['favoritos'] = result_array($query);        
        //
        return $array;
    }


}