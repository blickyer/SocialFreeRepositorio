<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
class tsDinero {
	function &getInstance(){
		static $instance;		
		if( is_null($instance) ){
			$instance = new tsDinero();
    	}
		return $instance;
	}

/* getDinero*/

	
	function getDinero()
    {
       global $tsCore, $tsUser;
	   $user_id = $tsUser->uid;
		
		$data['dinero'] = db_exec('fetch_assoc', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT u.user_id, u.user_name, u.user_posts, u.user_baneado, u.uid_act, v.post_user, v.x_dinero, v.post_status, v.p_validate FROM u_miembros AS u LEFT JOIN p_posts AS v ON v.post_user = u.user_id  WHERE u.user_id = \''.$user_id.'\' && u.user_baneado = 0 GROUP BY user_id'));

		$q1 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT CAST(SUM(x_dinero) as DECIMAL(5,2)) FROM p_posts WHERE post_user = \''.$user_id.'\' && post_status = \'0\' && p_validate = \'1\''));
		$q2 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT CAST(SUM(p_dinero) as DECIMAL(5,2)) FROM u_pagos WHERE p_user_id = \''.$user_id.'\' && p_type = \'0\' '));
		$q3 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(post_id) FROM p_posts WHERE post_user = \''.$user_id.'\' && post_status = \'0\' && x_dinero > \'0\' && p_validate = \'1\''));
		$q4 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(p_validate) FROM p_posts WHERE post_user = \''.$user_id.'\' && post_status = \'0\' && x_dinero = \'0\' && p_validate = \'2\''));
		$q5 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(post_status) FROM p_posts WHERE post_user = \''.$user_id.'\' && post_status = \'0\' && x_dinero > \'0\' && p_validate = \'0\''));
		
		
		$data['dinero']['x_dinero'] = $q1[0];
		$data['dinero']['p_dinero'] = $q2[0];
		$data['dinero']['post_id'] = $q3[0];
		$data['dinero']['p_validate'] = $q4[0];
		$data['dinero']['post_status'] = $q5[0];
	
        
		return $data;
    }
	
	/* Posts en Revision*/
    function getDineroR()
     {
      global $tsCore, $tsUser;
      //
      $max = 10; // MAXIMO A MOSTRAR
      $limit = $tsCore->setPageLimit($max, true);

      $retorno['data']=result_array(db_exec(array(__FILE__, __LINE__), 'query', 'SELECT p.post_id, p.post_user, p.post_date, p.x_dinero, p.post_category, p.post_title, p.post_status, p.p_validate, c.cid, c.c_seo FROM p_posts AS p LEFT JOIN p_categorias AS c ON c.cid = p.post_category   WHERE post_user = \''.$tsUser->uid.'\' && post_status = \'0\' && x_dinero > \'0\' && p_validate = \'0\'  ORDER BY p.post_id DESC LIMIT '.$limit));

      // PAGINAS
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(post_id) FROM p_posts WHERE post_user = \''.$tsUser->uid.'\' && post_status = \'0\' && x_dinero > \'0\' && p_validate = \'0\'');
        list($total) = db_exec('fetch_row', $query);

      $retorno['rev'] = $tsCore->pageIndex($tsCore->settings['url'] .
            '/dinero/rev?', $_GET['s'], $total, $max);

      return $retorno;
     }

/* Posts rechazados*/
    function getDineroX()
     {
      global $tsCore, $tsUser;
      //
      $max = 10; // MAXIMO A MOSTRAR
      $limit = $tsCore->setPageLimit($max, true);

      $retorno['data']=result_array(db_exec(array(__FILE__, __LINE__), 'query', 'SELECT p.post_id, p.post_user, p.post_date, p.x_dinero, p.post_category, p.post_title, p.post_status, p.p_validate, c.cid, c.c_seo FROM p_posts AS p LEFT JOIN p_categorias AS c ON c.cid = p.post_category   WHERE post_user = \''.$tsUser->uid.'\' && post_status = \'0\' && x_dinero = \'0\' && p_validate = \'2\'  ORDER BY p.post_id DESC LIMIT '.$limit));

      // PAGINAS
        $query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(post_id) FROM p_posts WHERE post_user = \''.$tsUser->uid.'\' && post_status = \'0\' && x_dinero = \'0\' && p_validate = \'2\'');
        list($total) = db_exec('fetch_row', $query);

      $retorno['rec'] = $tsCore->pageIndex($tsCore->settings['url'] .
            '/dinero/rec?', $_GET['s'], $total, $max);

      return $retorno;
     }
	 
    // DATOS PARA LA SOLICITUD DEL PAGO
	
    function setUserData($user_id)
    {
    global $tsUser, $tsCore;

	$email = $tsCore->setSecure($_POST['emaild']);
    $pais = $tsCore->setSecure($_POST['pais']);
    $nota = $tsCore->setSecure($_POST['notad']);
    $time = time();
    $ipuser = $_SERVER['REMOTE_ADDR'];
	$sec = rand(0,1000000).time();
	

	
	$data['dinok'] = db_exec('fetch_assoc', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT x_dinero, post_status , p_validate FROM p_posts WHERE post_user = \''.(int)$tsUser->uid.'\''));
	$q1 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT CAST(SUM(x_dinero) as DECIMAL(5,2)) FROM p_posts WHERE post_user = \''.(int)$tsUser->uid.'\' && post_status = \'0\' && p_validate = \'1\''));
	$data['dinok']['x_dinero'] = $q1[0];
	
	$usersol = '<b> <a href="/perfil/'.$tsUser->nick.'" class="hovercard" uid="'.(int)$tsUser->uid.'">'.$tsUser->nick.'</a></b> h&aacute; solicitado el pago de su dinero.<br/>Por un monto de: <b>$ '.(float)$q1[0].'</b> Para mas Detalles <b><a href="/admin/users?act=show&uid='.$tsUser->uid.'&t=9">Aqui</a></b>';
	
    if(db_exec('num_rows', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT `cid` FROM  u_cobros WHERE c_user_id = \''.$tsUser->uid.'\' AND c_type = \'0\' LIMIT 1'))){

	  return '<div class="errorsol">Ya has enviado la solicitud</div>';
	
	}elseif(db_exec('num_rows', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT `user_id` FROM  u_miembros WHERE user_id = \''.$tsUser->uid.'\' && uid_act = \'1\' LIMIT 1'))){
	
	  return '<div class="errorsol">Ya has enviado la solicitud ¬¬</div>';
	
	}elseif($q1[0] < $tsCore->settings['dinerp']){
	
	  return '<div class="errorsol">No dispones de Dinero Suficiente</div>';
	
	}elseif($email==''|| $pais==''|| $nota=='' ){
	
	  return '<div class="errorlog">Debes de completar todos los Campos.</div>';
	
	}else{
		if (db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO `u_cobros` (`c_user_id`,`c_email` ,`c_pais`, `c_dinero`, `c_secret`, `c_coment`, `c_date`, `c_autor_ip`, `c_type`) VALUES (\'' .(int)$tsUser->uid. '\', \'' . $email .'\', \'' . $pais .'\',  \'' . (float)$q1[0]. '\', \'' . $sec .'\', \'' . $nota .'\', \'' . $time .'\', \'' . $ipuser .'\', \'0\')'))
		db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE u_miembros SET uid_act = \'1\' WHERE user_id = \''.$tsUser->uid.'\' LIMIT 1');
        db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO `u_avisos` (`user_id`, `av_subject`, `av_body`, `av_date`, `av_type`) VALUES (\'1\', \'Solicitud de P&aacute;gos \', \'' . $usersol . '\', \'' . $time .'\', \'0\')'); 
		 
		  return '<div class="dinerok">Solicitud enviada</div>';
		
		}
	}
	
	// CONFIRMACION DE PAGO
	
    function setConfirData($user_id)
    {
     global $tsUser, $tsCore;
																																										
	$dineror = $tsCore->setSecure($_POST['dinerorecibido']);
	$codigor = $tsCore->setSecure($_POST['confirmaciondepago']);
    $comenr = $tsCore->setSecure($_POST['notaconfirma']);
    $ipuser = $_SERVER['REMOTE_ADDR'];
	$time = time();
	$usernam = '<b> <a href="/perfil/'.$tsUser->nick.'" class="hovercard" uid="'.(int)$tsUser->uid.'">'.$tsUser->nick.'</a></b> h&aacute; confirmaco recepci&oacute;n del pago .<br/>Por un monto de: <b>$ '.$dineror.'</b><br/>Codigo de la opreaci&oacute;n : '.$codigor.' ';
	
	$data['confirmadinero'] = db_exec('fetch_assoc', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT pid, p_user_id, p_dinero, p_secret, p_date, p_type  FROM u_pagos WHERE p_user_id = \''.(int)$tsUser->uid.'\' && p_type = \'0\''));
	$q1 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT p_dinero as pago FROM u_pagos WHERE p_user_id = \''.(int)$tsUser->uid.'\' && p_type = \'0\''));
	$q2 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT p_secret as codigo FROM u_pagos WHERE p_user_id = \''.(int)$tsUser->uid.'\' && p_type = \'0\''));
	$data['confirmadinero']['pago'] = $q1[0];
	$data['confirmadinero']['codigo'] = $q2[0];
	
    if(db_exec('num_rows', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT `rid` FROM  u_registros WHERE r_user_id = \''.$tsUser->uid.'\' && r_codigo = '.$q2[0].' && r_type = \'1\' LIMIT 1'))){

	  return '<div class="errorsol">Ya  enviaste la confirmaci&oacute;n</div>';
	
	}elseif($dineror==''|| $codigor==''|| $comenr=='' ){
	
	  return '<div class="errorlog">Debes de completar todos los Campos.</div>';
	
	}elseif($codigor != $q2[0]){
	
	  return '<div class="errorsol">El c&oacute;digo no coincide</div>';
	
	}else{
		if (db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO `u_registros` (`r_user_id`, `r_dinero`, `r_codigo`, `r_comentario`, `r_autor_ip`, `r_date`, `r_type`) VALUES (\'' .(int)$tsUser->uid . '\', \'' . (float)$dineror .'\', \'' . $codigor .'\', \'' . $comenr . '\', \'' . $ipuser .'\', \'' . $time .'\', \'1\')'))
        db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO `u_avisos` (`user_id`, `av_subject`, `av_body`, `av_date`, `av_type`) VALUES (\'1\', \'Pago Recibido \', \'' . $usernam . '\', \'' . $time .'\', \'0\')'); 
		db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE u_miembros SET uid_act = \'0\'  WHERE user_id = \''.$tsUser->uid.'\' LIMIT 1');
		db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE u_miembros SET dinok = dinok + \''.(float)$dineror.'\'  WHERE user_id = \''.$tsUser->uid.'\' LIMIT 1');
		db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE u_pagos SET p_type =  \'1\'  WHERE p_user_id  = \''.$tsUser->uid.'\' && p_secret = \''.$codigor.'\' LIMIT 1');
		db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE p_posts SET p_validate = \'3\'  WHERE post_user = \''.$tsUser->uid.'\' && p_validate = \'1\'');
		
		return '<div class="dinerok">Gracias por t&uacute; confirmaci&oacute;n</div>';
		
		}
	}
	
	function getConfirmacion()
    {
       global $tsCore, $tsUser;
	   $user_id = $tsUser->uid;
		
		$data['confirmacion'] = db_exec('fetch_assoc', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT u.user_id, u.user_name,  u.user_baneado, p.p_user_id, p.p_up, p.p_dinero,  p.p_secret, p.p_date, p.p_type, c.c_secret FROM u_miembros AS u LEFT JOIN u_pagos AS p ON p.p_user_id = u.user_id LEFT JOIN u_cobros AS c ON c.c_secret = p.p_secret WHERE p.p_user_id = \''.$user_id.'\' && u.user_baneado = 0 && p.p_type = \'0\' LIMIT 1')); 
		return $data;
    }
	function getConfir()
    {
       global $tsCore, $tsUser;
		$data['confirmapago'] = db_exec('fetch_assoc', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT u.user_id, u.uid_act, p.p_user_id , p.p_type  FROM u_miembros AS u LEFT JOIN u_pagos AS p ON p.p_user_id = u.user_id WHERE u.user_id = '.$tsUser->uid.' && p.p_type = \'0\' LIMIT 1'));
		return $data;
    }
	
	
}

