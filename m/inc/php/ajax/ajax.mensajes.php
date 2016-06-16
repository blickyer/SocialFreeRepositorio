<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
/**
 * Controlador AJAX
 *
 * @name    ajax.mensajes.php
 * @author  PHPost Team
*/
/**********************************\

*	(VARIABLES POR DEFAULT)		*

\*********************************/

	// NIVELES DE ACCESO Y PLANTILLAS DE CADA ACCIÓN
	$files = array(
		'mensajes-nuevo' => array('n' => 2, 'p' => ''),
        'mensajes-respuesta' => array('n' => 2, 'p' => 'resp'),
	);

/**********************************\

* (VARIABLES LOCALES ESTE ARCHIVO)	*

\*********************************/

	// REDEFINIR VARIABLES
	$tsPage = 'php_files/p.mensajes.'.$files[$action]['p'];
	$tsLevel = $files[$action]['n'];
	$tsAjax = empty($files[$action]['p']) ? 1 : 0;

/**********************************\

*	(INSTRUCCIONES DE CODIGO)		*

\*********************************/
	
	// DEPENDE EL NIVEL
	$tsLevelMsg = $tsCore->setLevel($tsLevel, true);
	if($tsLevelMsg != 1) { echo '0: '.$tsLevelMsg['mensaje']; die();}
	// CODIGO
	switch($action){
        case 'mensajes-nuevo':
			// <!--
            echo $tsMP->newMensaje();
            // -->
		break;
		case 'mensajes-respuesta':
			// <!--
            $smarty->assign("mp",$tsMP->newRespuesta());
            // -->
		break;
	}
    
    /*
        HACK
    */
    $_GET['ts'] = true;
?>