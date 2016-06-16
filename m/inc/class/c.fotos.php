<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
/**
 * Modelo para el control de las fotos
 *
 * @name    c.fotos.php
 * @author  PHPost Team
 */
class tsFotos {

	// INSTANCIA DE LA CLASE
	public static function &getInstance(){
		static $instance;
		
		if( is_null($instance) ){
			$instance = new tsFotos();
    	}
		return $instance;
	}
	
	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*\
								PUBLICAR FOTOS
	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
	
    /*
        getLastFotos()
    */
    function getLastFotos($start = 0){
		// PAGINAS
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(f.foto_id) FROM f_fotos AS f LEFT JOIN u_miembros AS u ON u.user_id = f.f_user WHERE f.f_status = \'0\' AND u.user_activo = \'1\' && u.user_baneado = \'0\'');
		list ($total) = db_exec('fetch_row', $query);
		$data['all'] = $total;
        //
		$query = 'SELECT f.foto_id, f.f_title, f.f_date, f.f_description, f.f_url, f.f_status, u.user_name, u.user_activo, u.user_baneado FROM f_fotos AS f LEFT JOIN u_miembros AS u ON u.user_id = f.f_user WHERE f.f_status = \'0\' AND u.user_activo = \'1\' && u.user_baneado = \'0\' ORDER BY f.foto_id DESC LIMIT '.$start.', 10';
        $data['data'] = result_array(db_exec(array(__FILE__, __LINE__), 'query', $query));
		$data['total'] = count($data['data']);
        //
        return $data;
    }
    /*
        getFoto()
    */
    function getFoto(){
        global $tsCore, $tsUser;
        //
        $fid = intval($_GET['fid']);
        // MORE FOTOS
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT f.*, u.user_name, u.user_activo, p.user_pais, p.user_sexo, u.user_rango, r.r_name, r.r_color, r.r_image FROM f_fotos AS f LEFT JOIN u_miembros AS u ON u.user_id = f.f_user LEFT JOIN u_perfil AS p ON p.user_id = u.user_id LEFT JOIN u_rangos AS r ON u.user_rango = r.rango_id WHERE f.foto_id = \''.(int)$fid.'\' '.($tsUser->is_admod || $tsUser->permisos['moacp'] ? '' : 'AND f.f_status = \'0\' AND u.user_activo = \'1\'').' LIMIT 1');
        $data['foto'] = db_exec('fetch_assoc', $query);
        
        $q1 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(cid) AS cf FROM f_comentarios WHERE c_user = \''.$data['foto']['f_user'].'\''));
		$q2 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(foto_id) AS f FROM f_fotos WHERE f_user = \''.$data['foto']['f_user'].'\' && f_status = \'0\''));
        $data['foto']['user_foto_comments'] = $q1[0];
        $data['foto']['user_fotos'] = $q2[0];
		$data['foto']['exist'] = db_exec('num_rows', $query);
        $data['foto']['f_description'] = $tsCore->parseSmiles($data['foto']['f_description']);
        
        include('../ext/datos.php');
        $pais = $data['foto']['user_pais'];
        $data['foto']['user_pais'] = array($pais, $tsPaises[$pais]);
        // FOLLOW
		$data['foto']['follow'] = db_exec('num_rows', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT `follow_id` FROM `u_follows` WHERE f_user = \''.$tsUser->uid.'\' AND f_id = \''.(int)$data['foto']['f_user'].'\' AND f_type = \'1\' LIMIT 1'));
        
        // COMENTARIOS
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT c.*, u.user_name, u.user_activo FROM f_comentarios AS c LEFT JOIN u_miembros AS u ON c.c_user = u.user_id WHERE c.c_foto_id = \''.(int)$fid.'\' '.($tsUser->is_admod && $tsCore->settings['c_see_mod'] == 1 ? '' : 'AND u.user_activo = \'1\' && u.user_baneado = \'0\' ORDER BY c.c_date DESC'));
        $comments = result_array($query);
        $data['comments'] = array();
        foreach($comments as $key => $val){
            $val['c_body'] = $tsCore->parseBadWords($tsCore->parseSmiles($val['c_body']), true);
            $data['comments'][] = $val;
        }
        $data['foto']['f_comments'] = count($comments);
        
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT vid, v_type FROM f_votos WHERE v_foto_id = \''.(int)$fid.'\' AND v_user = \''.$tsUser->uid.'\' LIMIT 1');
		$votado = db_exec('fetch_assoc', $query);				
		if(!empty($votado['vid'])) {
			$data['foto']['vote'] = $votado['v_type']+1;
		} else $data['foto']['vote'] = false;
		//
		$this->DarMedalla($fid);
		//
        return $data;
    }	
	/*
		DarMedalla()
	*/
	function DarMedalla($fid){
		//
		$data = db_exec('fetch_assoc', $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT foto_id, f_user, f_votos_pos, f_votos_neg, f_hits FROM f_fotos WHERE foto_id = \''.(int)$fid.'\' LIMIT 1'));
		//
        $q1 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(cid) AS a FROM f_comentarios WHERE c_foto_id = \''.(int)$fid.'\''));
        $q2 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(wm.medal_id) AS m FROM w_medallas AS wm LEFT JOIN w_medallas_assign AS wma ON wm.medal_id = wma.medal_id WHERE wm.m_type = \'3\' AND wma.medal_for = \''.(int)$fid.'\''));
		// MEDALLAS
		$datamedal = result_array($query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT * FROM w_medallas WHERE m_type = \'3\' ORDER BY m_cant DESC'));
		
		//		
		foreach($datamedal as $medalla){
			// DarMedalla
			if($medalla['m_cond_foto'] == 1 && !empty($data['f_votos_pos']) && $medalla['m_cant'] > 0 && $medalla['m_cant'] <= $data['f_votos_pos']){
				$newmedalla = $medalla['medal_id'];
			}elseif($medalla['m_cond_foto'] == 2 && !empty($data['f_votos_neg']) && $medalla['m_cant'] > 0 && $medalla['m_cant'] <= $data['f_votos_neg']){
				$newmedalla = $medalla['medal_id'];
			}elseif($medalla['m_cond_foto'] == 3 && !empty($q1[0]) && $medalla['m_cant'] > 0 && $medalla['m_cant'] <= $q1[0]){
				$newmedalla = $medalla['medal_id'];
			}elseif($medalla['m_cond_foto'] == 4 && !empty($data['f_hits']) && $medalla['m_cant'] > 0 && $medalla['m_cant'] <= $data['f_hits']){
				$newmedalla = $medalla['medal_id'];
			}elseif($medalla['m_cond_foto'] == 5 && !empty($q2[0]) && $medalla['m_cant'] > 0 && $medalla['m_cant'] <= $q2[0]){
				$newmedalla = $medalla['medal_id'];
			}
		//SI HAY NUEVA MEDALLA, HACEMOS LAS CONSULTAS
		if(!empty($newmedalla)){
		  $q3 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(id) AS w FROM w_medallas_assign WHERE medal_id = \''.(int)$newmedalla.'\' AND medal_for = \''.(int)$fid.'\''));
		if(!$q3[0]){
		db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO `w_medallas_assign` (`medal_id`, `medal_for`, `medal_date`, `medal_ip`) VALUES (\''.(int)$newmedalla.'\', \''.(int)$fid.'\', \''.time().'\', \''.$_SERVER['REMOTE_ADDR'].'\')');
		db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO u_monitor (user_id, obj_uno, obj_dos, not_type, not_date) VALUES (\''.(int)$data['f_user'].'\', \''.(int)$newmedalla.'\', \''.(int)$fid.'\', \'17\', \''.time().'\')');
		db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE w_medallas SET m_total = m_total + 1 WHERE medal_id = \''.(int)$newmedalla.'\'');}
		}
	  }	
	}
    /*
        votarFoto()
    */
    function votarFoto(){
        global $tsCore, $tsUser;
        // SOLO MIEMBROS
		if($tsUser->is_member){
			// VOTAR
			$fid = $tsCore->setSecure($_POST['fotoid']);
			$voto = $tsCore->setSecure($_POST['voto']);
			
			if($voto == 'pos'){
			 $voto = 'f_votos_pos = f_votos_pos + 1';
             $type = 0;
			}else{
			 $voto = 'f_votos_neg = f_votos_neg + 1';
             $type = 1;
			}
            //
			$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT f_user FROM f_fotos WHERE foto_id = \''.(int)$fid.'\' LIMIT 1');
			$data = db_exec('fetch_assoc', $query);
			
			// ES MI COMENTARIO?
			$is_mypost = ($data['f_user'] == $tsUser->uid) ? true : false;
			// NO ES MI COMENTARIO, PUEDO VOTAR
			if(!$is_mypost){
				// YA LO VOTE?
				$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT vid FROM f_votos WHERE v_foto_id = \''.(int)$fid.'\'  AND v_user = \''.$tsUser->uid.'\' LIMIT 1');
				$votado = db_exec('num_rows', $query);
				
				if(empty($votado)){
					// SUMAR VOTO
					db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE f_fotos SET '.$voto.' WHERE foto_id = \''.(int)$fid.'\'');
					// INSERTAR EN TABLA
					if(db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO `f_votos` (`v_foto_id`, `v_user`, `v_type`, `v_date`) VALUES (\''.(int)$fid.'\', \''.$tsUser->uid.'\', \''.$type.'\', \''.time().'\')')) return '1: Votado';
					//
				} return '0: Ya has votado esta foto.';
			} else return '0: No puedes votar tu propia foto.';
		} else return '0: Lo sentimos, para poder votar debes estar registrado.';
    }
    /************ COMENTARIOS *******************/
    /*
        newComentario()
    */
    function newComentario(){
        global $tsCore, $tsUser, $tsMonitor;
	
		if($tsUser->is_member && $tsUser->info['user_baneado'] == 0 && $tsUser->info['user_activo'] == 1 && ($tsUser->is_admod || $tsUser->permisos['gopcf'])) {

		// NO MAS DE 1500 CARACTERES PUES NADIE COMENTA TANTO xD
		$comentario = $tsCore->setSecure(substr($_POST['comentario'],0,1500), true);
		$fid = intval($_POST['fotoid']);
        /* COMPROVACIONES */
        $tsText = preg_replace('# +#',"",$comentario);
        $tsText = str_replace(array("\n","\t"),"",$tsText);
        if($tsText == '') return '0: El campo <b>Mensaje</b> es requerido para esta operaci&oacute;n';
        /* DE QUIEN ES LA FOTO */
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT f_user, f_closed FROM f_fotos WHERE foto_id = \''.(int)$fid.'\' LIMIT 1');
		$data = db_exec('fetch_assoc', $query);		
        //
        $fecha = time();
        // VAMOS...
        if($data['f_user']){
            if($data['f_closed'] != 1 || $data['f_user'] == $tsUser->uid){
                // ANTI FLOOD
                $tsCore->antiFlood();
                //
				$_SERVER['REMOTE_ADDR'] = $_SERVER['X_FORWARDED_FOR'] ? $_SERVER['X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
                if(!filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP)) { die('0: Su ip no se pudo validar.'); }
				if(db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO f_comentarios (c_foto_id, c_user, c_date, c_body, c_ip) VALUES (\''.(int)$fid.'\', \''.$tsUser->uid.'\', \''.$fecha.'\', \''.$comentario.'\', \''.$_SERVER['REMOTE_ADDR'].'\')')) {
        		  	$cid = db_exec('insert_id');
                    // ESTADÍSTICAS
                    db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE `w_stats` SET `stats_foto_comments` = stats_foto_comments + \'1\' WHERE `stats_no` = \'1\'');
                    // NOTIFICAR AL USUARIO
                    $tsMonitor->setNotificacion(11, $data['f_user'], $tsUser->uid, $fid);
        		  	// array(comid, com, fecha, autor_del_post)
        			return array($cid,$tsCore->parseBadWords($tsCore->parseSmiles($comentario), true),  $tsCore->setSecure($_POST['auser']), $fecha);
        		} else return '0: Ocurri&oacute; un error int&eacute;ntalo m&aacute;s tarde.';
            } else return '0: La foto se encuentra cerrada y no se permiten comentarios.';
        } else return '0: La foto no existe.';
	 } else return '0: Necesitas permisos para continuar.';
   }
}