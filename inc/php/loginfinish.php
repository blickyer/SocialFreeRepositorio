<?php
/**
* @file loginfinish.php
* @author MagicInventor
* @date 2016
*
*/

$tsPage = 'loginfinish';
$tsLevel = 1;
$tsAjax = empty($_GET['ajax']) ? 0 : 1;
$tsContinue = true;

require '../../header.php'; 

$tsTitle = 'Finalizar registro - '.$tsCore->settings['titulo'];

$tsLevelMsg = $tsCore->setLevel($tsLevel, true);
if ($tsLevelMsg != 1) {
  $tsPage = 'aviso';
  $tsAjax = 0;
  $smarty->assign('tsAviso', $tsLevelMsg);
  $tsContinue = false;
}
$action = $tsCore->setSecure($_GET['action']);

// convertimos un objeto a array
$byte = str_replace('O:19:"Hybrid_User_Profile":', 'a:', $_SESSION['for_register']);
$user_info = unserialize($byte);

if($_POST) {

		if(empty($_POST['password']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error = 'Faltan datos.';

		if(db_exec(array(__FILE__, __LINE__), 'num_rows', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT user_id FROM u_miembros WHERE user_name = \''.$tsCore->setSecure($user_info['displayName']).'\' || user_email = \''.$tsCore->setSecure($_POST['email']).'\' || user_social_'.$action.' = \''.$user_info['identifier'].'\''))) $error = 'Ya existe un usuario.';

		if(!checkdate($_POST['month'], $_POST['day'], $_POST['year'])) $error = 'La fecha no es válida.';


		$gender = (empty($_POST['gender']) || $_POST['gender'] === 'male' ? 0 : 1);

	    if(isset($error)) {
			$tsPage = 'aviso';
			$smarty->assign('tsAviso', array('titulo' => 'Oops!', 'mensaje' => $error, 'but' => 'Volver', 'link' => $tsCore->settings['url'].'/login/'.$action.'/finish'));
		} else {

			db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO u_miembros (user_name, user_password, user_email, user_rango, user_registro, user_social_'.$action.') VALUES (\''.$tsCore->setSecure($user_info['displayName']).'\', \''.md5(md5($_POST['password']).strtolower($user_info['displayName'])).'\', \''.$tsCore->setSecure($_POST['email']).'\', '.(empty($tsCore->settings['c_reg_rango']) ? 3 : $tsCore->settings['c_reg_rango']).', \''.time().'\', \''.$user_info['identifier'].'\')');

			$id = db_exec(array(__FILE__, __LINE__), 'insert_id');
			
			// Avatar lince, en la prox version agrego el crop 
			$avatar = file_get_contents($user_info['photoURL']); 
			file_put_contents(TS_ROOT.'/files/avatar/'.$id.'_120.jpg', $avatar);
			file_put_contents(TS_ROOT.'/files/avatar/'.$id.'_50.jpg', $avatar);

			db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO u_perfil (user_id, user_dia, user_mes, user_ano, user_sexo, p_nombre, p_avatar, p_mensaje) VALUES (\''.$id .'\', \''.$_POST['day'].'\', \''.$_POST['year'].'\', \''.$_POST['year'].'\', \'0\', \''.$tsCore->setSecure($_POST['name']).'\',  \'1\',  \''.$tsCore->setSecure($user_info['description']).'\')');

			$tsUser->userActivate($id, md5(time()));
		    $tsUser->loginUser($tsCore->setSecure($user_info['displayName']), $_POST['password'], true, $tsCore->settings['url'].'/cuenta/');
		    $tsContinue = false;
		    unset($_SESSION['for_register']);
		    unset($_SESSION['for_register_social']);
		}

} elseif ($tsUser->is_member) {
	$tsPage = 'aviso';
	$smarty->assign('tsAviso', array('titulo' => 'Oops!', 'mensaje' => 'Lince, ya estas registrado.', 'but' => 'Volver', 'link' => $tsCore->settings['url'].'/cuenta/'));
} elseif (!isset($_SESSION['for_register'])) {
	$tsPage = 'aviso';
	$smarty->assign('tsAviso', array('titulo' => 'Oops!', 'mensaje' => 'Lince, no te has logueado.', 'but' => 'Loguearme', 'link' => $tsCore->settings['url'].'/login/'.$action));
} elseif ($_SESSION['for_register_social'] != $action) {
	$tsPage = 'aviso';
	$smarty->assign('tsAviso', array('titulo' => 'Oops!', 'mensaje' => '¿kakaer?, los logins no son correctos.', 'but' => 'Volver', 'link' => $tsCore->settings['url']));
} else {

	// les fechas lince!
	include("../ext/datos.php");
	$now_year = date("Y",time());
			
	$max_year = 100 - $tsCore->settings['c_allow_edad'];
			
	$end_year = $now_year - $tsCore->settings['c_allow_edad'];
			
	$smarty->assign("tsMax",$max_year);
			
	$smarty->assign("tsEndY",$end_year);
			
	$smarty->assign("tsPaises",$tsPaises);
			
	$smarty->assign("tsMeces",$tsMeces);		
}

$smarty->assign('tsTitle', $tsTitle);

require '../../footer.php';
