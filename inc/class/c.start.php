<?php
/********************************************************************************
* c.registro.php                                                                *
*********************************************************************************
* TScript: Desarrollado por CubeBox ®											*
* ==============================================================================*
* Software Version:           TS 1.0 BETA          								*
* Software by:                JNeutron			     							*
* Copyright 2010:     		  CubeBox ®											*
*********************************************************************************/

/*

	CLASE CON LOS ATRIBUTOS Y METODOS PARA MANEJAR EL REGISTRO
	
*/
class tsRegistro extends tsDatabase{

	// INSTANCIA DE LA CLASE
	function &getInstance(){
		static $instance;
		
		if( is_null($instance) ){
			$instance = new tsRegistro();
    	}
		return $instance;
	}
    /**
     * @name checkUserEmail($pid)
     * @access public
     * @param
     * @return string
     */
	public function checkUserEmail(){
		// Variables
		$username = strtolower($_POST['nick']);
		$email = strtolower($_POST['email']);
        $which = empty($username) ? 'email' : 'nick'; 
        // MENSAJE
		$valid = '1: El '.$which.' est&aacute; disponible.';	// DEFAULT
		//
		if(!empty($username) || !empty($email)){
			$query = $this->query("SELECT user_name, user_email FROM u_miembros WHERE LOWER(user_name) = '$username' OR LOWER(user_email) = '$email' LIMIT 1");
			if($this->num_rows($query) > 0) $valid = '0: El '.$which.' ya se encuentra registrado.';	// EXISTE
		} else $valid = '0: Faltan datos y no se puede procesar tu solicitud.';
		// retornar valor
		return $valid;
	}
    /**
     * @name registerUser()
     * @access public
     * @param
     * @return string
     */
	function registerUser(){
		global $tsCore, $tsUser;
		// DATOS NECESARIOS
		$tsData = array(
			'user_nick' => $_POST['nick'],
			'user_password' => $_POST['password'],
			'user_email' => $_POST['email'],
			'user_dia' => $_POST['dia'],
			'user_mes' => $_POST['mes'],
			'user_anio' => $_POST['anio'],
			'user_sexo' => empty($_POST['sexo']) ? 0 : 1,
			'user_pais' => $_POST['pais'],
			'user_estado' => $_POST['estado'],
			'user_terminos' => $_POST['terminos'],
			'user_captacha_challenge' => $_POST['recaptcha_challenge_field'],
			'user_captacha_response' => $_POST['recaptcha_response_field'],
			'user_registro' => time(),
		);
		// ERRORS
		$errors = array(
			'default' => 'El campo es requerido',
			'nick' =>'El nombre de usuario ya se encuentra registrado.',
			'password' => 'La contrase&ntilde;a tiene que ser distinta que el nick',
			'email' => 'El formato es incorrecto',
			'email_2' => 'El email ya est&aacute; en uso',
			'captacha' => 'El c&oacute;digo es incorrecto'
		);
		// COMPROBAR VACIOS
		foreach($tsData as $key => $val){
			if($val == '') {
				$key_error = str_replace('user_','',$key);
				return $key_error.': '.$errors['default'];
			}
		}
		// CAPTACHA
		require(TS_EXTRA . 'recaptchalib.php');
		$robot = recaptcha_check_answer(RC_PIK,$_SERVER["REMOTE_ADDR"],$tsData['user_captacha_challenge'],$tsData['user_captacha_response']);
		if(!$robot->is_valid) return 'recaptcha: El c&oacute;digo es incorrecto.';
		// PASAMOS BIEN... AHORA INSERTAR DATOS
		$key = md5(md5($tsData['user_password']).strtolower($tsData['user_nick']));
		//
		if($this->insert('u_miembros', 'user_name, user_password, user_email, user_registro', "'{$tsData['user_nick']}', '$key', '{$tsData['user_email']}', {$tsData['user_registro']}")) {
            $tsData['user_id'] = $this->insert_id();
            // INSERTAMOS EL PERFIL
            $this->insert('u_perfil', 'user_id, user_dia, user_mes, user_ano, user_pais, user_estado, user_sexo',"{$tsData['user_id']}, {$tsData['user_dia']}, {$tsData['user_mes']}, {$tsData['user_anio']}, '{$tsData['user_pais']}', {$tsData['user_estado']}, {$tsData['user_sexo']}");
            $this->insert("u_portal","user_id", "{$tsData['user_id']}");
			// ENVIAMOS EL EMAIL
			if(empty($tsCore->settings['c_reg_activate'])){
				include('c.emails.php');
				$tsEmail = new tsEmail($tsData, 'signup');
				$tsEmail->setEmail();
				//$tsEmail->sendEmail();
				return '1: <div class="box_cuerpo" style="padding: 12px 20px; border-top:1px solid #CCC">Te hemos enviado un correo a <b>'.$tsData['user_email'].'</b> con los &uacute;ltimos pasos para finalizar con el registro.<br><br>Si en los pr&oacute;ximos minutos no lo encuentras en tu bandeja de entrada, por favor, revisa tu carpeta de correo no deseado, es posible que se haya filtrado.<br><br>&iexcl;Muchas gracias!</div>';
			} else {
				$tsUser->userActivate($tsData['user_id'],md5($tsData['user_registro']));
				$tsUser->loginUser($tsData['user_nick'], $key, true);
				return '2: <div class="box_cuerpo" style="padding: 12px 20px; border-top:1px solid #CCC">Bienvenido a <b>'.$tsCore->settings['titulo'].'</b>, Ahora estas registrado y tu cuenta ha sido activada, podr&aacute;s disfrutar de esta comunidad inmediatamente.<br><br>&iexcl;Muchas gracias! :)</div>';
			}
		} else return '0: Ocurrio un error, intentalo ma&aacute;s tarde.';
	}
	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
}
?>