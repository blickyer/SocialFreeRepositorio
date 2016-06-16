<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
/**
 * Clase para el manejo de los posts
 *
 * @name    c.posts.php
 * @author  PHPost Team
 */

class tsPosts {

	// INSTANCIA DE LA CLASE
	public static function &getInstance(){
		static $instance;
		
		if( is_null($instance) ){
			$instance = new tsPosts();
    	}
		return $instance;
	}
	
	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*\
								PUBLICAR POSTS
	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    	
    /*
        getCatData()
        :: OBTENER DATOS DE UNA CATEGORIA
    */
    function getCatData(){
        global $tsCore;
        //
        $cat = intval($_GET['cat']);
        //
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT c_nombre, c_seo FROM p_categorias WHERE c_seo = \''.$tsCore->setSecure($_GET['cat']).'\' LIMIT 1');
        $data = db_exec('fetch_assoc', $query);
        
        //
        return $data;
    }
	/*
		getLastPosts($category, $sticky)
	*/
    function getLastPosts($category = NULL, $time = 0, $start = 0, $limit = 25) {
      global $tsCore, $tsUser;
      	// TIPO DE POSTS A MOSTRAR
		if(!empty($category)){
			// EXISTE LA CATEGORIA?
			$cat = db_exec('fetch_assoc', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT cid FROM p_categorias WHERE c_seo = \''.$tsCore->setSecure($category).'\' LIMIT 1'));
			if($cat['cid'] > 0) $c_where = 'AND p.post_category = \''.(int)$cat['cid'].'\'';
		} else $c_where = '';
		// TOP DE LA SEMANA
		if(!empty($time)) {
			$time = time() - $time;
			$time = 'AND p.post_date > \''.$time.'\'';
			$order = 'p.post_puntos';
		} else {
			$time = '';
			$order = 'p.post_id';
		}
      $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT p.post_id, p.post_portada AS post_cover, p.post_body, p.post_user, p.post_category, p.post_title, p.post_date, p.post_comments, p.post_puntos, p.post_private, p.post_sponsored, p.post_status, p.post_sticky, u.user_id, u.user_name, u.user_activo, u.user_baneado, c.c_nombre, c.c_seo, c.c_img FROM p_posts AS p LEFT JOIN u_miembros AS u ON p.post_user = u.user_id  '.($tsUser->is_admod && $tsCore->settings['c_see_mod'] == 1 ? '' : ' && u.user_activo = \'1\' && u.user_baneado = \'0\'').' LEFT JOIN p_categorias AS c ON c.cid = p.post_category WHERE '.($tsUser->is_admod && $tsCore->settings['c_see_mod'] == 1 ? 'p.post_id > 0' : 'p.post_status = \'0\' && u.user_activo = \'1\' && u.user_baneado = \'0\'').' '.$c_where.' AND p.post_sticky = \'0\' '.$time.' GROUP BY p.post_id ORDER BY '.$order.' DESC LIMIT '.$start.','.$limit);
      $lastPosts['data'] = result_array($query);
	  $lastPosts['total'] = count($lastPosts['data']);
	  // COVER

	  $q2 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(post_id) AS p FROM p_posts WHERE post_status = \'0\''));
	  $lastPosts['stats_posts'] = $q2[0];  
      //
      return $lastPosts;
    }	
	/*
		getPost()
	*/
	function getPost(){
		global $tsCore, $tsUser;
		//
		$post_id = intval($_GET['post_id']);
		if(empty($post_id)) return array('deleted','Oops! Este post no existe o fue eliminado.');
		// DAR MEDALLA
		$this->DarMedalla($post_id);
		// DATOS DEL POST
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT c.* ,m.*, u.user_id FROM `p_posts` AS c LEFT JOIN `u_miembros` AS u ON c.post_user = u.user_id LEFT JOIN `u_perfil` AS m ON c.post_user = m.user_id  WHERE `post_id` = \''.(int)$post_id.'\' '.($tsUser->is_admod && $tsCore->settings['c_see_mod'] == 1 ? '' : 'AND u.user_activo = \'1\' && u.user_baneado = \'0\'').' LIMIT 1');
		//		
		$postData = db_exec('fetch_assoc', $query);
		
		//
		if(empty($postData['post_id'])) {
			$tsDraft = db_exec('fetch_assoc', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT b_title FROM p_borradores WHERE b_post_id = \''.(int)$post_id.'\' LIMIT 1'));
			if(!empty($tsDraft['b_title'])) return array('deleted','Oops! Este post no existe o fue eliminado.');
			else return array('deleted','Oops! El post fue eliminado!');
		}
		elseif($postData['post_status'] == 1 && (!$tsUser->is_admod && $tsUser->permisos['moacp'] == false)) return array('denunciado','Oops! El Post se encuentra en revisi&oacute;n por acumulaci&oacute;n de denuncias.');
        elseif($postData['post_status'] == 2 && (!$tsUser->is_admod && $tsUser->permisos['morp'] == false)) return array('deleted','Oops! El post fue eliminado!');
		elseif($postData['post_status'] == 3 && (!$tsUser->is_admod && $tsUser->permisos['mocp'] == false)) return array('denunciado','Oops! El Post se encuentra en revisi&oacute;n, a la espera de su publicaci&oacute;n.');
		elseif(!empty($postData['post_private']) && empty($tsUser->is_member)) return array('privado', $postData['post_title']);
  
        //ESTADÍSTICAS
        if($postData['post_cache'] < time()-($tsCore->settings['c_stats_cache']*60)){        
		$q1 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(u.user_name) AS c FROM u_miembros AS u LEFT JOIN p_comentarios AS c ON u.user_id = c.c_user WHERE c.c_post_id = \''.(int)$post_id.'\' && c.c_status = \'0\' && u.user_activo = \'1\' && u.user_baneado = \'0\''));
		$q2 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(u.user_name) AS s FROM u_miembros AS u LEFT JOIN u_follows AS f ON u.user_id = f.f_user WHERE f.f_type = \'2\' && f.f_id = \''.(int)$post_id.'\' && u.user_activo = \'1\' && u.user_baneado = \'0\''));
		$q3 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(follow_id) AS m FROM u_follows WHERE f_type = \'3\' && f_id = \''.(int)$post_id.'\''));
		$q4 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(fav_id) AS f FROM p_favoritos WHERE fav_post_id = \''.(int)$post_id.'\''));
        
        // NÚMERO DE COMENTARIOS
		$postData['post_comments'] = $q1[0];
		// NÚMERO DE SEGUIDORES
		$postData['post_seguidores'] = $q2[0];
		// NÚMERO DE SEGUIDORES
		$postData['post_shared'] = $q3[0];
		// NÚMERO DE FAVORITOS
		$postData['post_favoritos'] = $q4[0];
        
        //ACTUALIZAMOS LAS ESTADÍSTICAS
        db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE p_posts SET post_comments = \''.$q1[0].'\', post_seguidores = \''.$q2[0].'\', post_shared = \''.$q3[0].'\', post_favoritos = \''.$q4[0].'\', post_cache = \''.time().'\' WHERE post_id = \''.(int)$post_id.'\'');
        }       
        // CATEGORIAS
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT c.c_nombre, c.c_seo FROM p_categorias AS c  WHERE c.cid = \''.$postData['post_category'].'\'');
		$postData['categoria'] = db_exec('fetch_assoc', $query);
		$postData['max'] = (strlen($postData['post_body']) > 3000) ? true : false;
		// BBCode		
		$postData['post_body'] = $tsCore->parseBadWords($postData['post_smileys'] == 0  ? $tsCore->parseBBCode($postData['post_body']) : $tsCore->parseBBCode($postData['post_body'], 'firma'), true);
		        
		// NUEVA VISITA : FUNCION SIMPLE
		$visitado = db_exec('num_rows', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT id FROM `w_visitas` WHERE `for` = \''.(int)$post_id.'\' && `type` = \'2\' && '.($tsUser->is_member ? '(`user` = \''.$tsUser->uid.'\' OR `ip` LIKE \''.$_SERVER['REMOTE_ADDR'].'\')' : '`ip` LIKE \''.$_SERVER['REMOTE_ADDR'].'\'').' LIMIT 1'));
		if($tsUser->is_member && $visitado == 0) {
			db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO w_visitas (`user`, `for`, `type`, `date`, `ip`) VALUES (\''.$tsUser->uid.'\', \''.(int)$post_id.'\', \'2\', \''.time().'\', \''.$_SERVER['REMOTE_ADDR'].'\')');
			db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE p_posts SET post_hits = post_hits + 1 WHERE post_id = \''.(int)$post_id.'\' AND post_user != \''.$tsUser->uid.'\'');
		}else{
		db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE `w_visitas` SET `date` = \''.time().'\', ip = \''.$tsCore->getIP().'\' WHERE `for` = \''.(int)$post_id.'\' && `type` = \'2\' && `user` = \''.$tsUser->uid.'\' LIMIT 1');
		}
		if($tsCore->settings['c_hits_guest'] == 1 && !$tsUser->is_member && !$visitado) {
			db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO w_visitas (`user`, `for`, `type`, `date`, `ip`) VALUES (\''.$tsUser->uid.'\', \''.(int)$post_id.'\', \'2\', \''.time().'\', \''.$_SERVER['REMOTE_ADDR'].'\')');
			db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE p_posts SET post_hits = post_hits + 1 WHERE post_id = \''.(int)$post_id.'\'');
		}
        // AGREGAMOS A VISITADOS... PORTAL
        if($tsCore->settings['c_allow_portal']){
		    $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT last_posts_visited FROM u_portal WHERE user_id = \''.$tsUser->uid.'\' LIMIT 1');
            $data = db_exec('fetch_assoc', $query);
            
            $visited = unserialize($data['last_posts_visited']);
            if(!is_array($visited)) $visited = array();
            $total = count($visited);
            if($total > 10){
                array_splice($visited, 0, 1); // HACK
            }
            //
            if(!in_array($postData['post_id'],$visited))
                array_push($visited,$postData['post_id']);
            //
            $visited = serialize($visited);
			db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE u_portal SET last_posts_visited = \''.$visited.'\' WHERE user_id = \''.$tsUser->uid.'\'');
        }
		//
		return $postData;
	}
	/*
		getSideData($array)
	*/
	function getAutor($user_id){
	   global $tsUser, $tsCore;
        // DATOS DEL AUTOR
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT u.user_id, u.user_name, u.user_rango, u.user_puntos, u.user_lastactive, u.user_last_ip, u.user_activo, u.user_baneado, p.user_pais, p.user_sexo, p.user_firma FROM u_miembros AS u LEFT JOIN u_perfil AS p ON u.user_id = p.user_id WHERE u.user_id = \''.(int)$user_id.'\' LIMIT 1');
        $data = db_exec('fetch_assoc', $query);
		// RETURN
		return $data;
	}
	
	/*
		lalala
	*/
	function getPunteador(){
	   global $tsUser, $tsCore;
	   
		if($tsCore->settings['c_allow_points'] > 0) {
		$data['rango'] = $tsCore->settings['c_allow_points'];
		}elseif($tsCore->settings['c_allow_points'] == '-1') {
		$data['rango'] = $tsUser->info['user_puntosxdar']; 
		}else{
		$data['rango'] = $tsUser->permisos['gopfp'];
        }
		return $data;
	}
	/*
		getRelated()
	*/
	function getRelated($tags, $start = 0){
		global $tsCore, $tsUser;
		// ES UN ARRAT AHORA A UNA CADENA
		if(is_array($tags)) $tags = implode(", ",$tags);
		else str_replace('-',', ',$tags);
		//
		$query = db_exec(array(__FILE__, __LINE__), 'query', "SELECT DISTINCT p.post_id, p.post_title, p.post_body, c.c_seo FROM p_posts AS p LEFT JOIN p_categorias AS c ON c.cid = p.post_category WHERE MATCH (post_tags) AGAINST ('$tags' IN BOOLEAN MODE) AND p.post_status = 0 AND post_sticky = 0 ORDER BY p.post_id LIMIT ".$start.",10");
		//
		$data['data'] = result_array($query);
		$data['total'] = count($data['data']);

		//
		return $data;
	}
	
	/*
		getComentarios()
	*/
	function getComentarios($post_id, $start = 0){
		global $tsCore, $tsUser;
		// $tsCore->settings['c_max_com']*0+
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT u.user_name, u.user_activo, u.user_baneado, c.* FROM u_miembros AS u LEFT JOIN p_comentarios AS c ON u.user_id = c.c_user WHERE c.c_post_id = \''.(int)$post_id.'\' '.($tsUser->is_admod ? '' : 'AND c.c_status = \'0\' AND u.user_activo = \'1\' && u.user_baneado = \'0\'').' ORDER BY c.c_date DESC LIMIT '.$start.',10');		
		//
		$comments = result_array($query);
		// COMENTARIOS TOTALES
		$return['total'] = count($comments);
					
		// PARSEAR EL BBCODE
		$i = 0;
		foreach($comments as $comment){
		    //
			if($comment['c_votos'] != 0){
			    $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT voto_id FROM p_votos WHERE tid = \''.(int)$comment['cid'].'\' AND tuser = \''.$tsUser->uid.'\' AND type = \'2\' LIMIT 1');
				$votado = db_exec('num_rows', $query);				
			} else $votado = 0;
			$return['data'][$i] = $comment;
			$return['data'][$i]['votado'] = $votado;
			$return['data'][$i]['c_html'] = $tsCore->parseBadWords($tsCore->parseBBCode($return['data'][$i]['c_body']), true);
			$i++;
		}
		//
		return $return;
	}
	/*
		newComentario()
	*/
	function newComentario(){
		global $tsCore, $tsUser, $tsActividad;
		
		// NO MAS DE 1500 CARACTERES PUES NADIE COMENTA TANTO xD
		$comentario = $tsCore->setSecure(substr($_POST['comentario'],0,1500));
		$post_id = $tsCore->setSecure($_POST['postid']);
		/* DE QUIEN ES EL POST */
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT post_user, post_block_comments FROM p_posts WHERE post_id = \''.(int)$post_id.'\' LIMIT 1');
		$data = db_exec('fetch_assoc', $query);
		
        /* COMPROBACIONES */
        $tsText = preg_replace('# +#',"",$comentario);
        $tsText = str_replace("\n","",$tsText);
        if($tsText == '') return '0: El campo <b>Comentario</b> es requerido para esta operaci&oacute;n';
		/*        ------       */
		$fecha = time();
		//
        if($data['post_user']){
            if($data['post_block_comments'] != 1 || $data['post_user'] == $tsUser->uid || $tsUser->is_admod || $tsUser->permisos['mocepc']){
                if(empty($tsUser->is_admod) && $tsUser->permisos['gopcp'] == false) return '0: No deber&iacute;as hacer estas pruebas.';
				// ANTI FLOOD
                $tsCore->antiFlood();
				$_SERVER['REMOTE_ADDR'] = $_SERVER['X_FORWARDED_FOR'] ? $_SERVER['X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
                if(!filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP)) { die('0: Su ip no se pudo validar.'); }
				if(db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO `p_comentarios` (`c_post_id`, `c_user`, `c_date`, `c_body`, `c_ip`) VALUES (\''.(int)$post_id.'\', \''.$tsUser->uid.'\', \''.$fecha.'\', \''.$comentario.'\', \''.$_SERVER['REMOTE_ADDR'].'\')')) {
        		  	$cid = db_exec('insert_id');
                    //SUMAMOS A LAS ESTADÍSTICAS
                    db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE w_stats SET stats_comments = stats_comments + 1 WHERE stats_no = \'1\'');
                    db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE p_posts SET post_comments = post_comments +  1 WHERE post_id = \''.(int)$post_id.'\'');
                    db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE u_miembros SET user_comentarios = user_comentarios + 1 WHERE user_id = \''.$tsUser->uid.'\'');
                    // NOTIFICAR SI FUE CITADO Y A LOS QUE SIGUEN ESTE POST, DUEÑO
                    $this->quoteNoti($post_id, $data['post_user'], $cid, $comentario);
                    // ACTIVIDAD
                    $tsActividad->setActividad(5, $post_id);
        		  	// array(comid, comhtml, combbc, fecha, autor_del_post)
        			return array($cid, $tsCore->parseBadWords($tsCore->parseBBCode($comentario), true),$comentario, $fecha, $tsCore->setSecure($_POST['auser']), '', $_SERVER['REMOTE_ADDR']);
        		} else return '0: Ocurri&oacute; un error int&eacute;ntalo m&aacute;s tarde.';
            } else return '0: El post se encuentra cerrado y no se permiten comentarios.';
        } else return '0: El post no existe.';
	}
    /*
        quoteNoti()
        :: Avisa cuando citan los comentarios.
    */
    function quoteNoti($post_id, $post_user, $cid, $comentario){
        global $tsCore, $tsUser, $tsMonitor;
        $ids = array();
        $total = 0;
        //
        preg_match_all("/\[quote=(.*?)\]/is",$comentario,$users);
        //
        if(!empty($users[1])) {
            foreach($users[1] as $user){
                # DATOS
                $udata = explode('|',$user);
                if(!is_array($udata)) {
                    $user = $user;   
                    $lcid = $cid;
                }
                else {
                    $user = $udata[0];
                    $lcid = (int) $udata[1];
                }
                # COMPROBAR
                if($user != $tsUser->nick){
                    $uid = $tsUser->getUserID($tsCore->setSecure($user));
                    if(!empty($uid) && $uid != $tsUser->uid && !in_array($uid, $ids)){
                        $ids[] = $uid;
                        $tsMonitor->setNotificacion(9, $uid, $tsUser->uid, $post_id, $lcid);
                    }
                    ++$total;
                }
            }
        }
	  	// AGREGAR AL MONITOR DEL DUEÑO DEL POST SI NO FUE CITADO
        if(!in_array($post_user, $ids)){
	  	    $tsMonitor->setNotificacion(2, $post_user, $tsUser->uid, $post_id);
        }
        // ENVIAR NOTIFICAIONES A LOS Q SIGUEN EL POST :D
        // PERO NO A LOS QUE CITARON :)
        $tsMonitor->setFollowNotificacion(7, 2, $tsUser->uid, $post_id, 0, $ids);
        // 
        return true;
    }    
	function votarComentario(){
		global $tsCore, $tsUser, $tsMonitor, $tsActividad;
        
		// VOTAR
		$cid = $tsCore->setSecure($_POST['cid']);
		$post_id = $tsCore->setSecure($_POST['postid']);
		$votoVal = ($_POST['voto'] == 'pos') ? 1 : 0;
		$voto = ($votoVal == 1) ? "+ 1" : "- 1";
        //COMPROBAMOS PERMISOS
        if(($votoVal == 1 && ($tsUser->is_admod || $tsUser->permisos['govpp'])) || ($votoVal == 0 && ($tsUser->is_admod || $tsUser->permisos['govpn'])) ){
		//
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT c_user FROM p_comentarios WHERE cid = \''.(int)$cid.'\' LIMIT 1');
		$data = db_exec('fetch_assoc', $query);
		
		// ES MI COMENTARIO?
		$is_mypost = ($data['c_user'] == $tsUser->uid) ? true : false;
		// NO ES MI COMENTARIO, PUEDO VOTAR
		if(!$is_mypost){
			// YA LO VOTE?
			$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT tid FROM p_votos WHERE tid = \''.(int)$cid.'\' AND tuser = \''.$tsUser->uid.'\' AND type = \'2\' LIMIT 1');
			$votado = db_exec('num_rows', $query);
			
			if(empty($votado)){
				// SUMAR VOTO
				db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE p_comentarios SET c_votos = c_votos '.$voto.' WHERE cid = \''.(int)$cid.'\'');
				// INSERTAR EN TABLA
				if(db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO p_votos (tid, tuser, type) VALUES (\''.(int)$cid.'\', \''.$tsUser->uid.'\', \'2\' ) ')){
					// SUMAR PUNTOS??
					if($votoVal == 1 && $tsCore->settings['c_allow_sump'] == 1) {
					    db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE u_miembros SET user_puntos = user_puntos +1 WHERE user_id = \''.$data['c_user'].'\'');
                        $this->subirRango($data['c_user']);
					}
					// AGREGAR AL MONITOR
					$tsMonitor->setNotificacion(8, $data['c_user'], $tsUser->uid, $post_id, $cid, $votoVal);
                    // ACTIVIDAD
                    $tsActividad->setActividad(6, $post_id, $votoVal);
				}
				//
				return '1: Gracias por tu voto';
			} return 'Ya has votado este comentario';
		} else return 'No puedes votar tu propio comentario';
      } else return 'No tienes permiso para hacer eso.';
	}
	/*
		votarPost()
	*/
	function votarPost(){
		global $tsCore, $tsUser, $tsMonitor, $tsActividad;
		#GLOBALES
		
		if($tsUser->is_admod || $tsUser->permisos['godp']){
		
        // Comprobamos que sean números válidos.
        if(!ctype_digit($_POST['puntos'])) { return '0: S&oacute;lo puedes votar con n&uacute;meros.'; }
		//Comprobamos si otro usuario ha votado un post con esta ip
		$_SERVER['REMOTE_ADDR'] = $_SERVER['X_FORWARDED_FOR'] ? $_SERVER['X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
        if(!filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP)) { return '0: Su ip no se pudo validar.'; }
		if($tsUser->is_admod != 1){
		if(db_exec('num_rows', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT user_id FROM u_miembros WHERE user_last_ip =  \''.$_SERVER['REMOTE_ADDR'].'\' AND user_id != \''.$tsUser->uid.'\'')) || db_exec('num_rows', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT session_id FROM u_sessions WHERE session_ip =  \''.$tsCore->setSecure($_SERVER['REMOTE_ADDR']).'\' AND session_user_id != \''.$tsUser->uid.'\''))) return '0: Has usado otra cuenta anteriormente, deber&aacute;s contactar con la administraci&oacute;n.';
		}
		$post_id = intval($_POST['postid']);
		$puntos = intval($_POST['puntos']);
        $puntos = abs($puntos); // Numérico negativo se convierte a numérico positivo		
		// SUMAR PUNTOS
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT post_user FROM p_posts WHERE post_id = \''.(int)$post_id.'\' LIMIT 1');
		$data = db_exec('fetch_assoc', $query);
		
		// ES MI POST?
		$is_mypost = ($data['post_user'] == $tsUser->uid) ? true : false;
		// NO ES MI POST, PUEDO VOTAR
		if(!$is_mypost){
			// YA LO VOTE?
			$votado = db_exec('num_rows', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT tid FROM p_votos WHERE tid = \''.(int)$post_id.'\' AND tuser = \''.$tsUser->uid.'\' AND type = \'1\' LIMIT 1'));
			if(empty($votado)){
			
				// COMPROBAMOS LOS PUNTOS QUE PODEMOS DAR
        if($tsCore->settings['c_allow_points'] > 0) {
        $max_points = $tsCore->settings['c_allow_points'];
		}elseif($tsCore->settings['c_allow_points'] == '-1') { //TRUCO, podrás dar todos los puntos que tengas disponibles
		$max_points = $tsUser->info['user_puntosxdar']; 
		}elseif($tsCore->settings['c_allow_points'] == '-2') { //TRUCO, podrás dar todos los puntos que quieras (sin abusar ¬¬), se restarán igual, si tienes puesto mantener puntos, estarás debiendo puntos durante una temporada.
		$max_points = 999999999;
        }else{
		$max_points = $tsUser->permisos['gopfp'];
		}
		        // TENGO SUFICIENTES PUNTOS
				if($tsUser->info['user_puntosxdar'] >= $puntos){
                if($puntos > 0) { // Votar sin dar puntos? No, gracias.				
				if($puntos <= $max_points) { // seroo churra XD ._. No alteraciones de javascript para sumar más de lo que se permite (? LOL ¬¬
					// SUMAR PUNTOS AL POST
					db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE p_posts SET post_puntos = post_puntos + '.(int)$puntos.' WHERE post_id = \''.(int)$post_id.'\'');
					// SUMAR PUNTOS AL DUEÑO DEL POST
					db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE u_miembros SET user_puntos = user_puntos + \''.(int)$puntos.'\' WHERE user_id = \''.(int)$data['post_user'].'\'');
					// RESTAR PUNTOS AL VOTANTE
					db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE u_miembros SET user_puntosxdar = user_puntosxdar - \''.(int)$puntos.'\' WHERE user_id = \''.$tsUser->uid.'\'');
					// INSERTAR EN TABLA
					db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO p_votos (tid, tuser, cant, type, date) VALUES (\''.(int)$post_id.'\', \''.$tsUser->uid.'\', \''.(int)$puntos.'\', \'1\', \''.time().'\')');
					// AGREGAR AL MONITOR
					$tsMonitor->setNotificacion(3, $data['post_user'], $tsUser->uid, $post_id, $puntos);
                    // ACTIVIDAD
                    $tsActividad->setActividad(3, $post_id, $puntos);
					// SUBIR DE RANGO
					$this->subirRango($data['post_user'], $post_id);
					//
					return '1: Puntos agregados!';					                  
				}else return '0: Voto no v&aacute;lido. No puedes dar '.$puntos.' puntos, s&oacute;lo se permiten '.$max_points .' <img src="http://i.imgur.com/doCpk.gif">';													
			   } else return '0: Voto no v&aacute;lido. No puedes no dar puntos.';
			  } else return '0: Voto no v&aacute;lido. No puedes dar '.$puntos.' puntos, s&oacute;lo te quedan '.$tsUser->info['user_puntosxdar'].'.';
			} return '0: No es posible votar a un mismo post m&aacute;s de una vez.';
		  } else return '0: No puedes votar tu propio post.';			
		} else return '0: No tienes permiso para hacer esto.';			
		
	}	
	/*
		saveFavorito()
	*/
	function saveFavorito(){
		global $tsCore, $tsUser, $tsMonitor, $tsActividad;
        # ANTIFLOOD
		//
		$post_id = $tsCore->setSecure($_POST['postid']);
		$fecha = (int) empty($_POST['reactivar']) ? time() : $tsCore->setSecure($_POST['reactivar']);
		/* DE QUIEN ES EL POST */
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT post_user FROM p_posts WHERE post_id = \''.(int)$post_id.'\' LIMIT 1');
		$data = db_exec('fetch_assoc', $query);
		
		/*        ------       */
		if($data['post_user'] != $tsUser->uid){
			// YA LO TENGO?
			$my_favorito = db_exec('num_rows', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT fav_id FROM p_favoritos WHERE fav_post_id = \''.(int)$post_id.'\' AND fav_user = \''.$tsUser->uid.'\' LIMIT 1'));
			if(empty($my_favorito)){
			    if(db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO p_favoritos (fav_user, fav_post_id, fav_date) VALUES (\''.$tsUser->uid.'\', \''.(int)$post_id.'\', \''.$fecha.'\')')) {
					// AGREGAR AL MONITOR
					$tsMonitor->setNotificacion(1, $data['post_user'], $tsUser->uid, $post_id);
                    // ACTIVIDAD 
                    $tsActividad->setActividad(2, $post_id);
                    //
					return '1: Bien! Este post fue agregado a tus favoritos.';
				}
				else return '0: '.show_error('Error al ejecutar la consulta de la l&iacute;nea '.__LINE__.' de '.__FILE__.'.', 'db');
			} else return '0: Este post ya lo tienes en tus favoritos.';
		} else return '0: No puedes agregar tus propios post a favoritos.';
	}
	/*
		subirRango()
	*/
	function subirRango($user_id, $post_id = false){
		global $tsCore, $tsUser;
		// CONSULTA
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT u.user_puntos, u.user_rango, r.r_type FROM u_miembros AS u LEFT JOIN u_rangos AS r ON u.user_rango = r.rango_id WHERE u.user_id = \''.$user_id.'\' LIMIT 1');
		$data = db_exec('fetch_assoc', $query);
		
		// SI TIEN RANGO ESPECIAL NO ACTUALIZAMOS....
        if(empty($data['r_type']) && $data['user_rango'] != 3) return true;
        // SI SOLO SE PUEDE SUBIR POR UN POST
        if(!empty($post_id) && $tsCore->settings['c_newr_type'] == 0) {
		    $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT post_puntos FROM p_posts WHERE post_id = \''.(int)$post_id.'\' LIMIT 1');
            $puntos = db_exec('fetch_assoc', $query);
            
            // MODIFICAMOS
            $data['user_puntos'] = $puntos['post_puntos'];
        }
        //
		$puntos_actual = $data['user_puntos'];
        $posts = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(post_id) AS p FROM p_posts WHERE post_user = \''.(int)$user_id.'\' && post_status = \'0\''));
		$fotos = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(foto_id) AS f FROM f_fotos WHERE f_user = \''.(int)$user_id.'\' && f_status = \'0\''));
        $comentarios = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(cid) AS c FROM p_comentarios WHERE c_user = \''.(int)$user_id.'\' && c_status = \'0\''));
        
		// RANGOS
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT rango_id, r_cant, r_type FROM u_rangos WHERE r_type > \'0\' ORDER BY r_cant');
		
		//
		while($rango = db_exec('fetch_assoc', $query)) 
        {
			// SUBIR USUARIO
			if(!empty($rango['r_cant']) && $rango['r_type'] == 1 && $rango['r_cant'] <= $puntos_actual){
				$newRango = $rango['rango_id'];
			}elseif(!empty($rango['r_cant']) && $rango['r_type'] == 2 && $rango['r_cant'] <= $posts[0]){
				$newRango = $rango['rango_id'];
			}elseif(!empty($rango['r_cant']) && $rango['r_type'] == 3 && $rango['r_cant'] <= $fotos[0]){
				$newRango = $rango['rango_id'];
			}elseif(!empty($rango['r_cant']) && $rango['r_type'] == 4 && $rango['r_cant'] <= $comentarios[0]){
				$newRango = $rango['rango_id'];
			}
		}
		//HAY NUEVO RANGO?
		if(!empty($newRango) && $newRango != $data['user_rango']){
			//
			if(db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE u_miembros SET user_rango = \''.$newRango.'\' WHERE user_id = \''.$user_id.'\' LIMIT 1')) return true;
		}
	}
	
	/*
		DarMedalla()
	*/
	function DarMedalla($post_id){
		//
		$data = db_exec('fetch_assoc', $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT post_id, post_user, post_puntos, post_hits FROM p_posts WHERE post_id = \''.(int)$post_id.'\' LIMIT 1'));
        
		#···#
        $q1 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(follow_id) AS se FROM u_follows WHERE f_id = \''.(int)$post_id.'\' && f_type = \'2\''));
        $q2 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(cid) AS c FROM p_comentarios WHERE c_post_id = \''.(int)$post_id.'\' && c_status = \'0\''));
        $q3 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(fav_id) AS f FROM p_favoritos WHERE fav_post_id = \''.(int)$post_id.'\''));
        $q4 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(did) AS d FROM w_denuncias WHERE obj_id = \''.(int)$post_id.'\' && d_type = \'1\''));
        $q5 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(wm.medal_id) AS m FROM w_medallas AS wm LEFT JOIN w_medallas_assign AS wma ON wm.medal_id = wma.medal_id WHERE wm.m_type = \'2\' AND wma.medal_for = \''.(int)$post_id.'\''));
        $q6 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(follow_id) AS sh FROM u_follows WHERE f_id = \''.(int)$post_id.'\' && f_type = \'3\''));
		// MEDALLAS
		$datamedal = result_array($query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT medal_id, m_cant, m_cond_post FROM w_medallas WHERE m_type = \'2\' ORDER BY m_cant DESC'));
		
		//		
		foreach($datamedal as $medalla){
			// DarMedalla
			if($medalla['m_cond_post'] == 1 && !empty($data['post_puntos']) && $medalla['m_cant'] > 0 && $medalla['m_cant'] <= $data['post_puntos']){
				$newmedalla = $medalla['medal_id'];
			}elseif($medalla['m_cond_post'] == 2 && !empty($q1[0]) && $medalla['m_cant'] > 0 && $medalla['m_cant'] <= $q1[0]){
				$newmedalla = $medalla['medal_id'];
			}elseif($medalla['m_cond_post'] == 3 && !empty($q2[0]) && $medalla['m_cant'] > 0 && $medalla['m_cant'] <= $q2[0]){
				$newmedalla = $medalla['medal_id'];
			}elseif($medalla['m_cond_post'] == 4 && !empty($q3[0]) && $medalla['m_cant'] > 0 && $medalla['m_cant'] <= $q3[0]){
				$newmedalla = $medalla['medal_id'];
			}elseif($medalla['m_cond_post'] == 5 && !empty($q4[0]) && $medalla['m_cant'] > 0 && $medalla['m_cant'] <= $q4[0]){
				$newmedalla = $medalla['medal_id'];
			}elseif($medalla['m_cond_post'] == 6 && !empty($data['post_hits']) && $medalla['m_cant'] > 0 && $medalla['m_cant'] <= $data['post_hits']){
				$newmedalla = $medalla['medal_id'];
			}elseif($medalla['m_cond_post'] == 7 && !empty($q5[0]) && $medalla['m_cant'] > 0 && $medalla['m_cant'] <= $q5[0]){
				$newmedalla = $medalla['medal_id'];
			}elseif($medalla['m_cond_post'] == 8 && !empty($q6[0]) && $medalla['m_cant'] > 0 && $medalla['m_cant'] <= $q6[0]){
				$newmedalla = $medalla['medal_id'];
			}
		//SI HAY NUEVA MEDALLA, HACEMOS LAS CONSULTAS
		if(!empty($newmedalla)){
		if(!db_exec('num_rows', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT id FROM w_medallas_assign WHERE medal_id = \''.(int)$newmedalla.'\' AND medal_for = \''.(int)$post_id.'\''))){
		db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO `w_medallas_assign` (`medal_id`, `medal_for`, `medal_date`, `medal_ip`) VALUES (\''.(int)$newmedalla.'\', \''.(int)$post_id.'\', \''.time().'\', \''.$_SERVER['REMOTE_ADDR'].'\')');
		db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO u_monitor (user_id, obj_uno, obj_dos, not_type, not_date) VALUES (\''.(int)$data['post_user'].'\', \''.(int)$newmedalla.'\', \''.(int)$post_id.'\', \'16\', \''.time().'\')'); 
		db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE w_medallas SET m_total = m_total + 1 WHERE medal_id = \''.(int)$newmedalla.'\'');}
		}
	  }	
	}
	
	/*
		getFavoritos()
	*/
	function getFavoritos($start = 0, $limit = 25){
		global $tsCore, $tsUser;
		//
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT p.post_id, p.post_portada AS post_cover, p.post_body, p.post_title, p.post_puntos, p.post_comments, c.c_seo, c.c_img FROM p_favoritos AS f LEFT JOIN p_posts AS p ON p.post_id = f.fav_post_id LEFT JOIN p_categorias AS c ON c.cid = p.post_category WHERE f.fav_user = \''.$tsUser->uid.'\' AND p.post_status = \'0\' ORDER BY f.fav_date DESC LIMIT '.$start.','.$limit);
		$data['data'] = result_array($query);
		//
		$data['total'] = count($data['data']);		
		// COVER

		//
		return $data;
	}
}