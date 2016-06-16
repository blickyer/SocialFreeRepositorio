<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
/**
 * Modelo para el control del muro
 *
 * @name    c.muro.php
 * @author  PHPost Team
 */
class tsMuro {
	// INSTANCIA DE LA CLASE
	public static function &getInstance(){
		static $instance;
		
		if( is_null($instance) ){
			$instance = new tsMuro();
    	}
		return $instance;
	}
	/*
        getPrivacity()
    */
    public function getPrivacity($user_id, $username, $follow = null, $yfollow = null){
        global $tsUser;
        $priv['m']['v'] = true;
        $priv['mf']['v'] = true;
		$priv['rmp']['v'] = true;
        $is_me = ($tsUser->uid == $user_id) ? true : false;
		if($follow == 0 && $yfollow == 0) $lesigoomesigue = false; else $lesigoomesigue = true;
		if($follow == 1 && $yfollow == 1) $lesigoymesigue = true; else $lesigoymesigue = false;
        //
		$query= db_exec(array(__FILE__, __LINE__), 'query', 'SELECT p_configs FROM u_perfil WHERE user_id = \''.(int)$user_id.'\' LIMIT 1');
        $data = db_exec('fetch_assoc', $query);
        
        $data['p_configs'] = unserialize($data['p_configs']);
        // VER MURO
        switch($data['p_configs']['m']){
            case 0:
                if(!$is_me && !$tsUser->is_admod) $priv['m']['v'] = false;
                $priv['m']['m'] = 'Lo sentimos pero '.$username.' no permite ver su muro a nadie.';
            break;
			case 1:
                if(!$lesigoymesigue && !$is_me && !$tsUser->is_admod) $priv['m']['v'] = false;
                $priv['m']['m'] = 'Debes seguir a '.$username.' y &eacute;ste debe seguirte para poder ver su muro.';
            break;
			case 2:
                if(!$lesigoomesigue && !$is_me && !$tsUser->is_admod) $priv['m']['v'] = false;
                $priv['m']['m'] = 'Debes seguir a '.$username.' o &eacute;ste debe seguirte para poder ver su muro.';
            break;
            case 3:
                if($follow == 0 && !$is_me && !$tsUser->is_admod) $priv['m']['v'] = false;
                $priv['m']['m'] = 'Debes seguir a '.$username.' para poder ver su muro.';
            break;
			case 4:
                if($yfollow == 0 && !$is_me && !$tsUser->is_admod) $priv['m']['v'] = false;
                $priv['m']['m'] = $username.' debe seguirte para que puedas ver su muro';
            break;
            case 5:
                if(!$tsUser->is_member) $priv['m']['v'] = false;
                $priv['m']['m'] = 'Solo usuarios <a onclick="registro_load_form();">registrados</a> pueden ver el muro de '.$username;
            break;
        }
        // FIRMAR MURO
        switch($data['p_configs']['mf']){
            case 0:
                if(!$is_me && !$tsUser->is_admod) $priv['mf']['v'] = false;
                $priv['mf']['m'] = 'Lo sentimos pero '.$username.' no permite firmar su muro a nadie.';
            break;
			case 1:
                if(!$lesigoymesigue && !$is_me && !$tsUser->is_admod) $priv['mf']['v'] = false;
                $priv['mf']['m'] = 'Debes seguir a '.$username.' y &eacute;ste debe seguirte para poder firmar y comentar su muro.';
            break;
			case 2:
                if(!$lesigoomesigue && !$is_me && !$tsUser->is_admod) $priv['mf']['v'] = false;
                $priv['mf']['m'] = 'Debes seguir a '.$username.' o &eacute;ste debe seguirte para poder firmar y comentar su muro.';
            break;
            case 3:
                if($follow == 0 && !$is_me && !$tsUser->is_admod) $priv['mf']['v'] = false;
                $priv['mf']['m'] = 'Debes seguir a '.$username.' para poder firmar y comentar su muro.';
            break;
			case 4:
                if($yfollow == 0 && !$is_me && !$tsUser->is_admod) $priv['mf']['v'] = false;
                $priv['mf']['m'] = $username.' debe seguirte para que puedas firmar y comentar su muro';
            break;
            case 5:
                if(!$tsUser->is_member) $priv['mf']['v'] = false;
                $priv['mf']['m'] = 'Solo usuarios <a onclick="registro_load_form();">registrados</a> pueden firmar el muro de '.$username;
            break;
        }
        //
        return $priv;
    }
	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    
    /* 
        streamPost()
    */
    public function streamPost(){
        global $tsCore, $tsUser, $tsMonitor, $tsActividad;
        //
        $pid = intval($_POST['pid']);
        $data = $tsCore->setSecure($_POST['data'], true);
        // VALIDAMOS SI EXISTE EL PERFIL/USUARIO
        $exists = $tsUser->getUserName($pid);
        if(empty($exists)) return '0: El usuario al que intentas comentar no existe.';
        // VERIFICAR QUE PERMITA COMPARTIR EN SU MURO
		include 'c.cuenta.php';
		$tsCuenta =& tsCuenta::getInstance();
		$priv = $this->getPrivacity($pid, $exists, $tsCuenta->iFollow($pid), $tsCuenta->yFollow($pid));
		// SE PERMITE FIRMAR EL MURO?
		if($priv['mf']['v'] == false) return '0: '.$priv['mf']['m'];
        // VARIABLES COMUNES
        $date = time(); 
		$_SERVER['REMOTE_ADDR'] = $_SERVER['X_FORWARDED_FOR'] ? $_SERVER['X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
        // TIPO DE PUBLICACION
		$text = str_replace(array("\n","\t",' '),"",$data);
		// VACIO?
		if(strlen($text) <= 0) return '0: Tu publicaci&oacute;n debe tener al menos una letra.';
		// ANTI FLOOD
		$tsCore->antiFlood();
		//				//
		if(db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO u_muro (p_user, p_user_pub, p_body, p_date, p_type, p_ip) VALUES (\''.(int)$pid.'\', \''.$tsUser->uid.'\', \''.$data.'\', \''.$date.'\', \'1\', \''.$_SERVER['REMOTE_ADDR'].'\') ')){
			$pub_id = db_exec('insert_id');
			//
			$type = ($pid == $tsUser->uid) ? 'status' : 'mpub';
			// RETORNAMOS DATOS PARA EL TEMPLATE
			$return = array('pub_id' => $pub_id, 'p_user' => $pid, 'p_user_pub' => $tsUser->uid, 'p_body' => $tsCore->parseBadWords($tsCore->setMenciones($data), true), 'p_date' => $date, 'p_likes' => 0, 'p_type' => 1, 'likes' => array('link' => 'Me gusta'));
		}
        //
        $return['user_name'] = $tsUser->nick;
        // MONITOR
        $tsMonitor->setNotificacion(12, $pid, $tsUser->uid, $pub_id);
        // ACTIVIDAD
        $is_my = ($pid == $tsUser->uid) ? 0 : 2;
        $tsActividad->setActividad(10, $pub_id, $is_my);
        // RETORNAR VALOR
        return $return;        
    }
    /*
        streamRepost()
    */
    function streamRepost(){
        global $tsCore, $tsUser, $tsMonitor, $tsActividad;
        //
        $data = $tsCore->setSecure($tsCore->parseBadWords($_POST['data']));
        $pid = intval($_POST['pid']);
        //
       $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT `p_user`, `p_user_pub` FROM `u_muro` WHERE `pub_id` = \''.(int)$pid.'\' LIMIT 1');
       $pub = db_exec('fetch_assoc', $query);
        
        //
        if($pub['p_user'] > 0){
            // VACIO?
            $text = str_replace(array("\n","\t",' '),"",$data);
            if(strlen($text) <= 0) return '0: Tu comentario debe tener al menos una letra.';
            // ANTI FLOOD
            $tsCore->antiFlood();
            // CONTINUAMOS
            $date = time();
			$_SERVER['REMOTE_ADDR'] = $tsCore->getIP();
            if(db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO `u_muro_comentarios` (`pub_id`, `c_user`, `c_date`, `c_body`, `c_ip`) VALUES (\''.(int)$pid.'\', \''.$tsUser->uid.'\', \''.$date.'\', \''.$tsCore->setSecure($data, true).'\', \''.$_SERVER['REMOTE_ADDR'].'\')')){
                $cid = db_exec('insert_id');
                // MONITOR
                $tsMonitor->setMuroRepost($pid, $pub['p_user'], $pub['p_user_pub']);
                // ACTIVIDAD
                $is_my = ($pub['p_user'] == $tsUser->uid) ? 1 : 3;
                $tsActividad->setActividad(10, $cid, $is_my);
                // UPDATES
                db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE `u_muro` SET `p_comments` = p_comments + 1 WHERE `pub_id` = \''.(int)$pid.'\'');
                // PARA LA PANTILLA
                return array($cid, $tsCore->parseBadWords($data, true), $tsUser->uid, $date);
            } else return '0: '.show_error('Error al ejecutar la consulta de la l&iacute;nea '.__LINE__.' de '.__FILE__.'.', 'db');
        } else return '0: La publicaci&oacute;n no existe.';
    }
	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /*
        getNews()
    */
    function getNews($start = 0, $limit = 10){
        global $tsUser, $tsCore;
        // SOLO MOSTRAREMOS LAS ULTIMAS 100 PUBLICACIONES
        if($start > 90) return array('total' => '-1');
        // SEGUIDORES
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT f_id FROM u_follows WHERE f_user = \''.$tsUser->uid.'\' AND f_type = \'1\'');
        $follows = result_array($query);
        
        // ORDENAMOS 
        foreach($follows as $key => $val){
            // PERMISO PARA VER SUS PUBLICACIONES??
            $priv = $this->getPrivacity($val['f_id'], null, true);
            if($priv['m']['v'] == true)
                $amigos[] = "'".$val['f_id']."'";
        }
        $amigos[] = "'$tsUser->uid'";
        $amigos = implode(', ',$amigos);
        // OBTENEMOS LAS ULTIMAS PUBLICACIONES
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT p.*, u.user_name FROM u_muro AS p LEFT JOIN u_miembros AS u ON p.p_user_pub = u.user_id WHERE p.p_user IN('.$amigos.') AND p.p_user = p.p_user_pub ORDER BY p.p_date DESC LIMIT '.$start.','.$limit);
        while($row = db_exec('fetch_array', $query)){
            // CARGAR LIKES
            if($row['p_likes'] > 0){
                // LE DI LIKE?
				$queryDos = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT like_id FROM u_muro_likes WHERE obj_id = \''.$row['pub_id'].'\' AND obj_type = \'1\' AND user_id = \''.$tsUser->uid.'\'');
				$tlikes = db_exec('fetch_assoc', $queryDos);
				if($tlikes['like_id'] > 0) $row['mylike'] = true;
				else $row['mylike'] = false;
            }		
            // MENCIONES
            $row['p_body'] = $tsCore->parseBadWords($tsCore->setMenciones($row['p_body']), true);
            // CARGAR ADJUNTOS
            if($row['p_type'] != 1){
                $queryDos = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT * FROM u_muro_adjuntos WHERE pub_id = \''.$row['pub_id'].'\' LIMIT 1');
                $adj = db_exec('fetch_assoc', $queryDos);
                
                //
                $data[] = array_merge($row,$adj); 
            } else $data[] = $row;
            //
        }
        
        //die(count($data));
        // RETORNAMOS
        return array('total' => count($data), 'data' => $data);
    }
    /*
        getWall($count)
    */
    function getWall($user_id, $start = 0){
        global $tsCore, $tsUser;
        // PUBLICACION
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT p.*, u.user_name FROM u_muro AS p LEFT JOIN u_miembros AS u ON p.p_user_pub = u.user_id WHERE p.p_user = \''.(int)$user_id.'\' ORDER BY p.pub_id DESC LIMIT '.$start.',10');
        while($row = db_exec('fetch_array', $query)){
            // CARGAR LIKES
            if($row['p_likes'] > 0){
                // LE DI LIKE?
				$queryDos = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT like_id FROM u_muro_likes WHERE obj_id = \''.$row['pub_id'].'\' AND obj_type = \'1\' AND user_id = \''.$tsUser->uid.'\'');
				$tlikes = db_exec('fetch_assoc', $queryDos);
				if($tlikes['like_id'] > 0) $row['mylike'] = true;
				else $row['mylike'] = false;
            }
			
            // MENCIONES
            $row['p_body'] = $tsCore->parseBadWords($tsCore->parseSmiles($tsCore->setMenciones($row['p_body'])), true);
            // CARGAR ADJUNTOS
            if($row['p_type'] != 1){
                $queryDos = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT * FROM u_muro_adjuntos WHERE pub_id = \''.$row['pub_id'].'\' LIMIT 1');
                $adj = db_exec('fetch_assoc', $queryDos);
                
                //
                $data[] = array_merge($row,$adj); 
            } else $data[] = $row;
        }
        
        //
        return array('total' => count($data), 'data' => $data);
    }
    /*
        getPubExtras($pud_id, $type)
    */
    function getPubExtras($pub_id, $type = 'likes', $likes = 0){
        global $tsUser, $tsCore;
        //
        switch($type){
            case 'comments':
                $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT c.*, u.user_name FROM u_muro_comentarios AS c LEFT JOIN u_miembros AS u ON c.c_user = u.user_id WHERE c.pub_id = \''.(int)$pub_id.'\' ORDER BY c.c_date DESC');
                while($row = db_exec('fetch_array', $query)){
                    $row['c_body'] = $tsCore->parseBadWords($tsCore->parseSmiles($tsCore->setMenciones($row['c_body'])), true);
                    //                    
                    $data[] = $row;
                }
                
                // ORDENAMOS
                ksort($data);
                //
            break;
        }
        //
        return $data;
    }
    /*
        getStory()
    */
    function getStory($pub_id, $user_id){
        global $tsUser;
        // ELEGIMOS
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT p.*, u.user_name FROM u_muro AS p LEFT JOIN u_miembros AS u ON p.p_user_pub = u.user_id WHERE p.pub_id = \''.(int)$pub_id.'\' LIMIT 1');
        $pub = db_exec('fetch_assoc', $query);
        
        // COMPROBAMOS
        if(empty($pub['pub_id'])) return 'La publicaci&oacute;n que has solicitado no existe.';
        elseif($user_id != $pub['p_user']) return 'La publicaci&oacute;n que has solicitado no pertenece al perfil de <b>'.$tsUser->getUserName($user_id).'</b>.';
        // CARGAR LIKES
        if($pub['p_likes'] > 0){
            // LE DI LIKE?
			$queryDos = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT like_id FROM u_muro_likes WHERE obj_id = \''.$pub['pub_id'].'\' AND obj_type = \'1\' AND user_id = \''.$tsUser->uid.'\'');
			$tlikes = db_exec('fetch_assoc', $queryDos);
			if($tlikes['like_id'] > 0) $pub['mylike'] = true;
			else $pub['mylike'] = false;
        }
        // CARGAR COMENTARIOS
        if($pub['p_comments'] > 0){
            $pub['comments']['data'] = $this->getPubExtras($pub['pub_id'], 'comments');
			$pub['comments']['total'] = count($pub['comments']['data']);
        } else $pub['comments']['total'] = 0;	
        // EXTRA
        $pub['hide_more_cm'] = true;
        // ADJUNTOS
        if($pub['p_type'] != 1){
            $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT * FROM u_muro_adjuntos WHERE pub_id = \''.(int)$pub_id.'\' LIMIT 1');
            $adj = db_exec('fetch_assoc', $query);
            
            $data = array_merge($pub,$adj);
        } else $data = $pub;
        // RETORNAMOS
        return $data;
    }
    /*
        getComments()
    */
    function getComments(){
        global $tsCore;
        //
        $pid = (int) $_POST['pid'];
        // EXISTE?
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT `p_user`, `p_comments` FROM `u_muro` WHERE `pub_id` = \''.$pid.'\' LIMIT 1');
        $cmts = db_exec('fetch_assoc', $query);
        
        //
        if(!empty($cmts)){
            $data['data'] = $this->getPubExtras($pid, 'comments');
            // TOTAL / USER DUEÑO DE LA APLICACION
            $data['total'] = $cmts['p_comments'];
            $data['user'] = $cmts['p_user'];
            //
            return $data;
        } else return '0: La publicaci&oacute;n no existe.';
    }   
    /*
        likePost()
    */
   function likePost(){
        global $tsUser, $tsCore, $tsMonitor, $tsActividad;
        // ANTI FLOOD
        $text = $tsCore->antiFlood(false, 'like', 'No te pueden gustar tantas cosas en tan poco tiempo.');
        if($text != 1) return array('status' => 'error', 'text' => $text);
        //
        $id = (int)$_POST['id'];
        $status = 'ok';
        // EXISTE O NO
        $query = db_exec(array(__FILE__, __LINE__), 'query', "SELECT p_user AS uid FROM u_muro WHERE pub_id = {$id}");
        $exists = db_exec('fetch_assoc', $query);
        
        
        if(empty($exists['uid'])) return '0: La publicaci&oacute;n ya no existe.';
        // CHECAMOS SI YA LE GUSTA ESTO
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT like_id, user_id FROM u_muro_likes WHERE obj_id = \''.(int)$id.'\' AND obj_type = \'1\'');
        $likes = result_array($query);
        
        $total = count($likes);
        // CHECAMOS
        $i_like = 0;
        foreach($likes as $key => $val){
            if($val['user_id'] == $tsUser->uid) $i_like = $val['like_id'];
        }
        // SI AUN NO ME GUSTA
        if(empty($i_like)){
			if(db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO u_muro_likes (user_id, obj_id, obj_type) VALUES (\''.$tsUser->uid.'\', \''.(int)$id.'\', \'1\')')){
                // SUMAR LIKE
				db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE u_muro SET p_likes = p_likes + 1 WHERE pub_id = \''.(int)$id.'\'');
				$ac_type = ($exists['uid'] == $tsUser->uid) ? 0 : 2;
                // MONITOR
                $tsMonitor->setNotificacion(14, $exists['uid'], $tsUser->uid, $id, 1);
                // ACTIVIDAD
                $tsActividad->setActividad(11, $id, $ac_type);
                //
            } else $status = 'error';
        } else {
			if(db_exec(array(__FILE__, __LINE__), 'query', 'DELETE FROM u_muro_likes WHERE like_id = \''.(int)$i_like.'\'')){
                // RESTAR LIKE
				db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE u_muro SET p_likes = p_likes - 1 WHERE pub_id = \''.(int)$id.'\'');
				db_exec(array(__FILE__, __LINE__), 'query', 'DELETE FROM `u_actividad` WHERE obj_uno = \''.(int)$id.'\' AND user_id = \''.$tsUser->uid.'\' AND ac_type = \'11\' LIMIT 1');
            }
            else $status = 'error';
        }
        // RESPUESTA
		$t_likes = empty($i_like) ? ($total+1) : ($total-1);
		//
		$data = $this->getPubExtras($id, 'likes', $t_likes);
		$link = $data['link'];
		$text = $data['text'];
        //
        return array('status' => $status, 'link' => $link, 'text' => $text);
    }
}