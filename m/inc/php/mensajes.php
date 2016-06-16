<?php 
/**
 * Controlador
 *
 * @name    mensajes.php
 * @author  PHPost Team
*/

/**********************************\

*	(VARIABLES POR DEFAULT)		*

\*********************************/

	$tsPage = "mensajes";	// tsPage.tpl -> PLANTILLA PARA MOSTRAR CON ESTE ARCHIVO.

	$tsLevel = 2;		// NIVEL DE ACCESO A ESTA PAGINA. => VER FAQs

	$tsAjax = empty($_GET['ajax']) ? 0 : 1; // LA RESPUESTA SERA AJAX?
	
	$tsContinue = true;	// CONTINUAR EL SCRIPT
	
/*++++++++ = ++++++++*/

	include "../../header.php"; // INCLUIR EL HEADER

	$tsTitle = $tsCore->settings['titulo'].' - '.$tsCore->settings['slogan']; 	// TITULO DE LA PAGINA ACTUAL

/*++++++++ = ++++++++*/

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

	$action = htmlspecialchars($_GET['action']);
	$unread = empty($_GET['qt']) ? false : true;

/**********************************\

*	(INSTRUCCIONES DE CODIGO)		*

\*********************************/

    switch($action){
        case '':
            $smarty->assign("tsMensajes",$tsMP->getMensajes(2, $unread));
        break;
        case 'enviados':
            $smarty->assign("tsMensajes",$tsMP->getMensajes(3));
        break;
        case 'respondidos':
            $smarty->assign("tsMensajes",$tsMP->getMensajes(4));
        break;
		case 'search':
            $smarty->assign("tsMensajes",$tsMP->getMensajes(5));
        break;
        case 'leer':
            $smarty->assign("tsMensajes",$tsMP->readMensaje());
        break;
    }
    # VARIABLE
    $smarty->assign("tsQT", $_GET['qt']);
    

/**********************************\

* (AGREGAR DATOS GENERADOS | SMARTY) *

\*********************************/
	//
	$smarty->assign("tsAction",$action);
	
	}

if(empty($tsAjax)) {	// SI LA PETICION SE HIZO POR AJAX DETENER EL SCRIPT Y NO MOSTRAR PLANTILLA, SI NO ENTONCES MOSTRARLA.

	$smarty->assign("tsTitle",$tsTitle);	// AGREGAR EL TITULO DE LA PAGINA ACTUAL

	/*++++++++ = ++++++++*/
	include("../../footer.php");
	/*++++++++ = ++++++++*/
}