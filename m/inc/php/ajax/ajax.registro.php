<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
/**
 * Controlador AJAX
 *
 * @name    ajax.registro.php
 * @author  PHPost Team
*/
/**********************************\

*	(VARIABLES POR DEFAULT)		*

\*********************************/

	// NIVELES DE ACCESO Y PLANTILLAS DE CADA ACCIÓN
	
	$files = array(		
		'registro-geo' => array('n' => 0, 'p' => ''),		
		'registro-nuevo' => array('n' => 1, 'p' => ''),		
	);

/**********************************\

* (VARIABLES LOCALES ESTE ARCHIVO)	*

\*********************************/

	// REDEFINIR VARIABLES	
	$tsPage = 'php_files/p.registro.'.$files[$action]['p'];	
	$tsLevel = $files[$action]['n'];	
	$tsAjax = empty($files[$action]['p']) ? 1 : 0;

/**********************************\

*	(INSTRUCCIONES DE CODIGO)		*

\*********************************/
	
	// DEPENDE EL NIVEL	
	$tsLevelMsg = $tsCore->setLevel($tsLevel, true);	
	if($tsLevelMsg != 1) { echo '0: '.$tsLevelMsg; die();}	
	// CLASE	
	require('../class/c.registro.php');	
	$tsReg =& tsRegistro::getInstance();	
	// CODIGO	
	switch($action){
		case 'registro-geo':
			include("../ext/geodata.php");
			$pais = htmlspecialchars($_GET['pais_code']);
			if($pais) $html = '1: ';
			else $html = '0: El campo <b>pais_code</b> es requerido para esta operacion';
			foreach($estados[$pais] as $key => $estado){
				$html .= '<option value="'.($key+1).'">'.$estado.'</option>'."\n";
			}
			if(strlen($html) > 3) echo $html;
			else echo '0: C&oacute;digo de pais incorrecto.';
		break;		
		case 'registro-nuevo':
			echo $tsReg->registerUser();
		break;
		
	}