<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
/**
 * Controlador AJAX
 *
 * @name    ajax.posts.php
 * @author  PHPost Team
*/
/**********************************\

*	(VARIABLES POR DEFAULT)		*

\*********************************/

	// NIVELES DE ACCESO Y PLANTILLAS DE CADA ACCIÓN
	$files = array(
		'posts-votar' =>  array('n' => 2, 'p' => ''),
		'posts-share' => array('n' => 2, 'p' => ''),
		'posts-fav' => array('n' => 2, 'p' => ''),
		'posts-related' => array('n' => 0, 'p' => 'related'),
		'posts-comments' => array('n' => 0, 'p' => 'comments'),
		'posts-load_more' =>  array('n' => 0, 'p' => 'load_more'),
		'posts-more_fotos' =>  array('n' => 0, 'p' => 'more_fotos'),
	);

/**********************************\

* (VARIABLES LOCALES ESTE ARCHIVO)	*

\*********************************/

	// REDEFINIR VARIABLES
	$tsPage = 'php_files/p.posts.'.$files[$action]['p'];
	$tsLevel = $files[$action]['n'];
	$tsAjax = empty($files[$action]['p']) ? 1 : 0;

/**********************************\

*	(INSTRUCCIONES DE CODIGO)		*

\*********************************/
	
	// DEPENDE EL NIVEL
	$tsLevelMsg = $tsCore->setLevel($tsLevel, true);
	if($tsLevelMsg != 1) { echo '0: '.$tsLevelMsg['mensaje']; die();}
	// CLASE
	require('../class/c.posts.php');
	$tsPosts =& tsPosts::getInstance();
	// CODIGO
	switch($action){
		case 'posts-votar':
			//<--
				echo $tsPosts->votarPost();
			//-->
		break;
		case 'posts-share':
			// <--
				echo $tsMonitor->setSpam();
			// -->
		break;
		case 'posts-fav':
			// <--
				echo $tsPosts->saveFavorito();
			// -->
		break;
		case 'posts-related':
			// <--
				$tags = (!empty($_POST['tags'])) ? $_POST['tags'] : false;
				$start = (!empty($_POST['start'])) ? intval($_POST['start']) : 0;
				$smarty->assign("tsRelated",$tsPosts->getRelated($tags, $start));
			// -->
		break;
		case 'posts-comments':
			// <--
				$start = (!empty($_POST['start'])) ? intval($_POST['start']) : 0;
				$smarty->assign("tsComments",$tsPosts->getComentarios($_POST['postid'], $start));
			// -->
		break;
		case 'posts-load_more':
			// <--
				$start = $tsCore->setSecure($_POST['start']);
				$type = $tsCore->setSecure($_POST['type']);
				if($type == 'perfil') {
					include("../class/c.cuenta.php");
					$tsCuenta =& tsCuenta::getInstance();
					$smarty->assign("tsPosts",$tsCuenta->getPostUser($_POST['user'], $start));
				} elseif($type == 'tops') {
					$smarty->assign("tsPosts",$tsPosts->getLastPosts($_GET['cat'], 1296000, $start));
				} elseif($type == 'posts') {
					$smarty->assign("tsPosts",$tsPosts->getLastPosts($_GET['cat'], false, $start));
				} elseif($type == 'favs') {
					$smarty->assign("tsPosts",$tsPosts->getFavoritos($start));
				}
			// -->
		break;
		case 'posts-more_fotos':
			// <--
				require('../class/c.fotos.php');
				$tsFotos =& tsFotos::getInstance();
				$start = $tsCore->setSecure($_POST['start']);
				$smarty->assign("tsLastFotos",$tsFotos->getLastFotos($start));
			// -->
		break;
	}