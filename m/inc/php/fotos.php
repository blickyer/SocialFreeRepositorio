<?php 
/**
 * Controlador
 *
 * @name    fotos.php
 * @author  PHPost Team
*/
/**********************************\

*	(VARIABLES POR DEFAULT)		*

\*********************************/

	$tsPage = "fotos";	// tsPage.tpl -> PLANTILLA PARA MOSTRAR CON ESTE ARCHIVO.

	$tsLevel = 2;		// NIVEL DE ACCESO A ESTA PAGINA. => VER FAQs

	$tsAjax = empty($_GET['ajax']) ? 0 : 1; // LA RESPUESTA SERA AJAX?
	
	$tsContinue = true;	// CONTINUAR EL SCRIPT
	
/*++++++++ = ++++++++*/

	include "../../header.php"; // INCLUIR EL HEADER

	$tsTitle = $tsCore->settings['titulo'].' - '.$tsCore->settings['slogan']; 	// TITULO DE LA PAGINA ACTUAL

/*++++++++ = ++++++++*/
	// PARA LAS FOTOS...
    $action = isset($_GET['action']) ? htmlspecialchars($_GET['action']) : '';
	if($tsCore->settings['c_fotos_private'] == '0') {	
    if($action == '' || $action == 'ver') $tsLevel = 0;		
	}else{		
	$tsLevel = 2;		
	}
	// VERIFICAMOS EL NIVEL DE ACCSESO ANTES CONFIGURADO
	$tsLevelMsg = $tsCore->setLevel($tsLevel, true);
	if($tsLevelMsg != 1){	
		$tsPage = 'aviso';
		$tsAjax = 0;
		$smarty->assign("tsAviso",$tsLevelMsg);
		//
		$tsContinue = false;
	}
	//
	if($tsContinue){
/**********************************\

* (VARIABLES LOCALES ESTE ARCHIVO)	*

\*********************************/
	//
	include("../class/c.fotos.php");
	$tsFotos =& tsFotos::getInstance();

/**********************************\

*	(INSTRUCCIONES DE CODIGO)		*

\*********************************/

    switch($action){
        case '':
            $smarty->assign("tsLastFotos", $tsFotos->getLastFotos());            
        break;
        case 'ver':
            $tsFoto = $tsFotos->getFoto();
            // TITULO
            $tsTitle = $tsFoto['foto']['f_title'].' - '.$tsCore->settings['titulo'];
			
			if($tsFoto['foto']['f_status'] == 1 && (!$tsUser->is_admod && $tsUser->permisos['moacp'] == false)) {
			$tsPage = 'aviso';
            $smarty->assign("tsAviso",array('titulo' => 'Opps...', 'mensaje' => 'Esta foto se encuentra en revisi&oacute;n por acumulaci&oacute;n de denuncias', 'but' => 'Ir a Fotos', 'link' => "{$tsCore->settings['url']}/fotos/"));
			}elseif($tsFoto['foto']['exist'] == 0){
            $tsPage = 'aviso';
			$smarty->assign("tsAviso",array('titulo' => 'Opps...', 'mensaje' => 'Esta foto no existe', 'but' => 'Ir a Fotos', 'link' => "{$tsCore->settings['url']}/fotos/"));
			}else{
			$smarty->assign("tsFoto", $tsFoto['foto']);
            $smarty->assign("tsFComments", $tsFoto['comments']);
			}
		break;
    }

/**********************************\

* (AGREGAR DATOS GENERADOS | SMARTY) *

\*********************************/
    $smarty->assign("tsAction",$action);
    
}

if(empty($tsAjax)) {	// SI LA PETICION SE HIZO POR AJAX DETENER EL SCRIPT Y NO MOSTRAR PLANTILLA, SI NO ENTONCES MOSTRARLA.

	$smarty->assign("tsTitle",$tsTitle);	// AGREGAR EL TITULO DE LA PAGINA ACTUAL

	/*++++++++ = ++++++++*/
	include("../../footer.php");
	/*++++++++ = ++++++++*/
}