<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
/**
 * Controlador AJAX
 *
 * @name    ajax.comentario.php
 * @author  PHPost Team
*/
/**********************************\

*	(VARIABLES POR DEFAULT)		*

\*********************************/

	// NIVELES DE ACCESO Y PLANTILLAS DE CADA ACCIÓN
	$files = array(
		'comentario-preview' => array('n' => 2, 'p' => 'preview'),
		'comentario-agregar' => array('n' => 2, 'p' => 'preview'),
		'comentario-ocultar' => array('n' => 2, 'p' => ''),
		'comentario-ajax' => array('n' => 0, 'p' => 'ajax'),
		'comentario-votar' => array('n' => 2, 'p' => ''),
	);

/**********************************\

* (VARIABLES LOCALES ESTE ARCHIVO)	*

\*********************************/

	// REDEFINIR VARIABLES
	$tsPage = 'php_files/p.comentario.'.$files[$action]['p'];
	$tsLevel = $files[$action]['n'];
	$tsAjax = empty($files[$action]['p']) ? 1 : 0;

/**********************************\

*	(INSTRUCCIONES DE CODIGO)		*

\*********************************/
	
	// DEPENDE EL NIVEL
	$tsLevelMsg = $tsCore->setLevel($tsLevel, true);
	if($tsLevelMsg != 1) { echo '0: '.$tsLevelMsg['mensaje']; die();}
    //
    $do = $_GET['do'];
	// CLASE
	require('../class/c.posts.php');
	$tsPosts =& tsPosts::getInstance();
    if($do == 'fotos'){
        require('../class/c.fotos.php');
        $tsFotos =& tsFotos::getInstance();
    }
	// CODIGO
	switch($action){
		case 'comentario-preview':
            $comentario = $tsCore->setSecure($_POST['comentario']);
			$comentario = substr($comentario,0,1500);
            // COMENTARIO VACIO?
            $tsText = preg_replace('# +#',"",$comentario);
            if(empty($tsText)) die('0: El campo <b>Comentario</b> es requerido para esta operaci&oacute;n');
            //
			$auser = $_POST['auser'];
			$preview = array(0,$tsCore->parseBBCode($comentario),'',time(),$auser, $comentario, $_SERVER['REMOTE_ADDR']);
			$smarty->assign("tsComment",$preview);
            $smarty->assign("tsType",$_GET['type']);
		break;
		case 'comentario-agregar':
            if(empty($do)){
    			$tsComment = $tsPosts->newComentario();
            } elseif($do == 'fotos'){
               $tsComment = $tsFotos->newComentario();
            }
			if(is_array($tsComment)) $smarty->assign("tsComment",$tsComment);
			else echo $tsComment;
			//-->
		break;
		case 'comentario-votar':
			//<--
			if($do == 'fotos'){
                echo $tsFotos->votarFoto();
            } elseif($do == 'posts') {
				echo $tsPosts->votarComentario();
			}
			//-->
		break;
		case 'comentario-ajax':
			//<--
			// COMENTARIOS
			$tsPost = $tsCore->setSecure($_POST['postid']);
			$tsAutor = $tsCore->setSecure($_POST['autor']);
			$tsComments = $tsPosts->getComentarios($tsPost);
			$tsComments = array('num' => $tsComments['num'], 'data' => $tsComments['data'], 'block' => $tsComments['block'], 'autor' => $tsAutor);
			$smarty->assign("tsComments",$tsComments);	
            $smarty->assign("tsPost",array('postid' => $tsPost, 'autor' => $tsAutor));
			//-->
		break;
	}