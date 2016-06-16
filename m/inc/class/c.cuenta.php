<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
/**
 * Modelo para el control y edición de la cuenta de usuario
 *
 * @name    c.cuenta.php
 * @author  PHPost Team
 */
class tsCuenta {

	// INSTANCIA DE LA CLASE
	public static function &getInstance(){
		static $instance;
		
		if( is_null($instance) ){
			$instance = new tsCuenta();
    	}
		return $instance;
	}
    /**
     * @name loadPerfil()
     * @access public
     * @uses Cargamos el perfil de un usuario
     * @param int
     * @return array
     */
	public function loadPerfil($user_id = 0){
		global$tsUser;
		//
		if(empty($user_id)) $user_id = $tsUser->uid;
		//
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT p.*, u.user_registro, u.user_lastactive FROM u_perfil AS p LEFT JOIN u_miembros AS u ON p.user_id = u.user_id WHERE p.user_id = \''.(int)$user_id.'\' LIMIT 1');
		$perfilInfo = db_exec('fetch_assoc', $query);
        
		// CAMBIOS
        $perfilInfo = $this->unData($perfilInfo);
		// PORCENTAJE
        $total = unserialize($perfilInfo['p_total']);
		$perfilInfo['porcentaje'] = $this->getPorcentVal($total);
		//
		return $perfilInfo;
	}
    /*
        loadExtras()
    */
    private function unData($data){
        //
		$data['p_gustos'] = unserialize($data['p_gustos']);
		$data['p_tengo'] = unserialize($data['p_tengo']);
		$data['p_idiomas'] = unserialize($data['p_idiomas']);
        //
		$data['p_socials'] = unserialize($data['p_socials']);
		$data['p_socials']['f'] = $data['p_socials'][0];
		$data['p_socials']['t'] = $data['p_socials'][1];
        //
        $data['p_configs'] = unserialize($data['p_configs']);
        //
        return $data;
    }
	/*
		loadHeadInfo($user_id)
	*/
	function loadHeadInfo($user_id){
		global $tsUser, $tsCore;
		// INFORMACION GENERAL
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT u.user_id, u.user_name, u.user_registro, u.user_lastactive, u.user_activo, u.user_baneado, p.user_sexo, p.user_pais, p.p_nombre, p.p_avatar, p.p_mensaje, p.p_socials, p.p_empresa, p.p_configs FROM u_miembros AS u, u_perfil AS p WHERE u.user_id = \''.(int)$user_id.'\' AND p.user_id = \''.(int)$user_id.'\'');
		$data = db_exec('fetch_assoc', $query);
        
        //
        $data['p_nombre'] = $tsCore->setSecure($tsCore->parseBadWords($data['p_nombre']), true);
        $data['p_mensaje'] = $tsCore->setSecure($tsCore->parseBadWords($data['p_mensaje']), true);
		$data['p_socials'] = unserialize($data['p_socials']);
		$data['p_socials']['f'] = $data['p_socials'][0];
		$data['p_socials']['t'] = $data['p_socials'][1];
		$data['p_configs'] = unserialize($data['p_configs']);

		
		if(empty($data['p_configs']['hits'])){
		$data['can_hits'] = false;
		}elseif($data['p_configs']['hits'] == 3 && ($this->iFollow($user_id) || $tsUser->is_admod)){
		$data['can_hits'] = true;
		}elseif($data['p_configs']['hits'] == 4 && ($this->yFollow($user_id) || $tsUser->is_admod)){
		$data['can_hits'] = true;
		}elseif($data['p_configs']['hits'] == 5 && $tsUser->is_member){
		$data['can_hits'] = true;
		}elseif($data['p_configs']['hits'] == 6){
		$data['can_hits'] = true;
		}
		
		if($data['can_hits']){
		$data['visitas'] = result_array(db_exec(array(__FILE__, __LINE__), 'query', 'SELECT v.*, u.user_id, u.user_name FROM w_visitas AS v LEFT JOIN u_miembros AS u ON v.user = u.user_id WHERE v.for = \''.(int)$user_id.'\' && v.type = \'1\' && user > 0 ORDER BY v.date DESC LIMIT 7'));
		$q1 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(u.user_id) AS a FROM w_visitas AS v LEFT JOIN u_miembros AS u ON v.user = u.user_id WHERE v.for = \''.(int)$user_id.'\' && v.type = \'1\''));
		$data['visitas_total'] = $q1[0];
        }
		

		$visitado = db_exec('num_rows', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT id FROM `w_visitas` WHERE `for` = \''.(int)$user_id.'\' && `type` = \'1\' && '.($tsUser->is_member ? '(`user` = \''.$tsUser->uid.'\' OR `ip` LIKE \''.$_SERVER['REMOTE_ADDR'].'\')' : '`ip` LIKE \''.$_SERVER['REMOTE_ADDR'].'\'').' LIMIT 1'));
		if(($tsUser->is_member && $visitado == 0 && $tsUser->uid != $user_id) || ($tsCore->settings['c_hits_guest'] == 1 && !$tsUser->is_member && !$visitado)) {
			db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO w_visitas (`user`, `for`, `type`, `date`, `ip`) VALUES (\''.$tsUser->uid.'\', \''.(int)$user_id.'\', \'1\', \''.time().'\', \''.$_SERVER['REMOTE_ADDR'].'\')');
		}else{
			db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE `w_visitas` SET `date` = \''.time().'\', ip = \''.$_SERVER['REMOTE_ADDR'].'\' WHERE `for` = \''.(int)$user_id.'\' && `type` = \'1\'');
		}
		
		// REAL STATS
		$data['stats'] = db_exec('fetch_assoc', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT u.user_id, u.user_rango, u.user_puntos, u.user_posts, u.user_comentarios, u.user_seguidores, u.user_cache, r.r_name, r.r_color FROM u_miembros AS u LEFT JOIN u_rangos AS r ON  u.user_rango = r.rango_id WHERE u.user_id = \''.(int)$user_id.'\''));
		
        if($data['stats']['user_cache'] < time()-($tsCore->settings['c_stats_cache']*60)){
        $q1 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(post_id) AS p FROM p_posts WHERE post_user = \''.(int)$user_id.'\' && post_status = \'0\''));
        $q2 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(follow_id) AS s FROM u_follows WHERE f_id =\''.(int)$user_id.'\' && f_type = \'1\''));
        $q3 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(cid) AS c FROM p_comentarios WHERE c_user = \''.(int)$user_id.'\' && c_status = \'0\''));
        
        $data['stats']['user_posts'] = $q1[0];
		$data['stats']['user_seguidores'] = $q2[0];
		$data['stats']['user_comentarios'] = $q3[0];
        db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE u_miembros SET user_posts = \''.$q1[0].'\', user_comentarios = \''.$q3[0].'\', user_seguidores = \''.$q2[0].'\', user_cache = \''.time().'\' WHERE  user_id = \''.(int)$user_id.'\'');
        }
        $q4 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(foto_id) AS f FROM f_fotos WHERE f_user = \''.(int)$user_id.'\' && f_status = \'0\''));
        $data['stats']['user_fotos'] = $q4[0];
		
		// BLOQUEADO
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT * FROM `u_bloqueos` WHERE b_user = \''.$tsUser->uid.'\' AND b_auser = \''.(int)$user_id.'\' LIMIT 1');
        $data['block'] = db_exec('fetch_assoc', $query);
        
        //
		return $data;
	}
    /*
        iFollow()
    */
    function iFollow($user_id){
        global $tsUser;
        // SEGUIR
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT follow_id FROM u_follows WHERE f_id = \''.(int)$user_id.'\' AND f_user = \''.(int)$tsUser->uid.'\' AND f_type = \'1\' LIMIT 1');
		$data = db_exec('num_rows', $query);
		
        //
        return ($data > 0) ? true : false;
    }
	
	/*
       yFollow()
    */
    function yFollow($user_id){
        global $tsUser;
        // YO LE SIGO?
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT follow_id FROM u_follows WHERE f_id = \''.(int)$tsUser->uid.'\' AND f_user = \''.(int)$user_id.'\' AND f_type = \'1\' LIMIT 1');
		$data = db_exec('num_rows', $query);
		
        //
        return ($data > 0) ? true : false;
    }
	/*
		getPostUser()
	*/
	function getPostUser($user_id, $start = 0, $limit = 25) {
      global $tsCore, $tsUser;
      $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT p.post_id, p.post_portada AS post_cover, p.post_body, p.post_user, p.post_category, p.post_title, p.post_date, p.post_comments, p.post_puntos, p.post_private, p.post_sponsored, p.post_status, p.post_sticky, u.user_id, u.user_name, u.user_activo, u.user_baneado, c.c_nombre, c.c_seo, c.c_img FROM p_posts AS p LEFT JOIN u_miembros AS u ON p.post_user = u.user_id  '.($tsUser->is_admod && $tsCore->settings['c_see_mod'] == 1 ? '' : ' && u.user_activo = \'1\' && u.user_baneado = \'0\'').' LEFT JOIN p_categorias AS c ON c.cid = p.post_category WHERE '.($tsUser->is_admod && $tsCore->settings['c_see_mod'] == 1 ? 'p.post_id > 0' : 'p.post_status = \'0\' && u.user_activo = \'1\' && u.user_baneado = \'0\'').' AND p.post_user = \''.(int)$user_id.'\' GROUP BY p.post_id ORDER BY p.post_id DESC LIMIT '.$start.','.$limit);
      $data['data'] = result_array($query);
	  $data['total'] = count($data['data']);
	  // COVER

      //
      return $data;
    }
}