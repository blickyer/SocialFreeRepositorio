<?php 
/**
 * Controlador
 *
 * @name    portal.php
 * @author  PHPost Team
*/
/**********************************\

*	(VARIABLES POR DEFAULT)		*

\*********************************/

	$tsPage = "portal";	// tsPage.tpl -> PLANTILLA PARA MOSTRAR CON ESTE ARCHIVO.

	$tsLevel = 0;		// NIVEL DE ACCESO A ESTA PAGINA. => VER FAQs

	$tsAjax = empty($_GET['ajax']) ? 0 : 1; // LA RESPUESTA SERA AJAX?
	
	$tsContinue = true;	// CONTINUAR EL SCRIPT
	
/*++++++++ = ++++++++*/
	include "../../header.php"; // INCLUIR EL HEADER
	$tsTitle = $tsCore->settings['titulo']; 	// TITULO DE LA PAGINA ACTUAL

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
    // PORTAL
    include("../class/c.portal.php");
    $tsPortal =& tsPortal::getInstance();

/**********************************\

*	(INSTRUCCIONES DE CODIGO)		*

\*********************************/
	$q1 = db_exec('fetch_row', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(user_id) AS u FROM u_miembros WHERE user_activo = \'1\' && user_baneado = \'0\''));
	$tsMuro = $tsPortal->getNews();
	$tsMuro['stats_miembros'] = $q1[0];
    $smarty->assign("tsMuro",$tsMuro);
    $smarty->assign("tsInfo",array('uid' => $tsUser->uid));
    $smarty->assign("tsType", "news");

/**********************************\

* (AGREGAR DATOS GENERADOS | SMARTY) *

\*********************************/
	}

if(empty($tsAjax)) {	// SI LA PETICION SE HIZO POR AJAX DETENER EL SCRIPT Y NO MOSTRAR PLANTILLA, SI NO ENTONCES MOSTRARLA.

	$smarty->assign("tsTitle",$tsTitle);	// AGREGAR EL TITULO DE LA PAGINA ACTUAL

	/*++++++++ = ++++++++*/
	include(TS_ROOT."/footer.php");
	/*++++++++ = ++++++++*/
}