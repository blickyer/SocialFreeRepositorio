<?php 
	$tsPage = "dinero";	// tsPage.tpl -> PLANTILLA PARA MOSTRAR CON ESTE ARCHIVO.
	$tsLevel = 2;		// NIVEL DE ACCESO A ESTA PAGINA. => VER FAQs
	$tsAjax = empty($_GET['ajax']) ? 0 : 1; // LA RESPUESTA SERA AJAX?	
	$tsContinue = true;	// CONTINUAR EL SCRIPT
	
	include "../../header.php"; // INCLUIR EL HEADER
	$tsTitle = $tsCore->settings['titulo'].' - '.$tsCore->settings['slogan']; 	// TITULO DE LA PAGINA ACTUAL

	// VERIFICAMOS EL NIVEL DE ACCSESO ANTES CONFIGURADO
	$tsLevelMsg = $tsCore->setLevel($tsLevel, true);
	if($tsLevelMsg != 1){	
		$tsPage = 'aviso';
		$tsAjax = 0;
		$smarty->assign("tsAviso",$tsLevelMsg);
		$tsContinue = false;
	}

	if($tsContinue){
	include("../class/c.dinero.php");
	$tsDinero = new tsDinero();

	
	$action = empty($_GET['action']) ? 'dinero' : (string)$_GET['action'];
	$smarty->assign("tsAction",$action);
	
	
	switch($action){
			case 'dinero':
				$smarty->assign("tsDiner",$tsDinero->getDinero());
			break;
			case 'rev':
				$smarty->assign("tsDinerR",$tsDinero->getDineroR());
				$smarty->assign("tsDiner",$tsDinero->getDinero());
			break;
			case 'rec':
				$smarty->assign("tsDinerX",$tsDinero->getDineroX());
				$smarty->assign("tsDiner",$tsDinero->getDinero());
			break;
			case 'pagos':
					 if(!empty($_POST['save'])){
					 
					 $update = $tsDinero->setUserData($user_id);
					 if($update == 'OK') $tsCore->redirectTo($tsCore->settings['url'].'/dinero/pagos?save=true');
					 else $smarty->assign("tsError",$update);
					 }
					 $smarty->assign("tsDiner",$tsDinero->getDinero());
            break;
			case 'confirma':
					 if(!empty($_POST['save'])){
					 
					 $update = $tsDinero->setConfirData($user_id);
					 if($update == 'OK') $tsCore->redirectTo($tsCore->settings['url'].'/dinero/confirma?save=true');
					 else $smarty->assign("tsError",$update);
					 }
					 $smarty->assign("tsConfirm",$tsDinero->getConfirmacion());
					 $smarty->assign("tsConfirmar",$tsDinero->getConfir());
            break;


		}
		
		

    $smarty->assign("tsAction",$action);	
}

if(empty($tsAjax)) {	// SI LA PETICION SE HIZO POR AJAX DETENER EL SCRIPT Y NO MOSTRAR PLANTILLA, SI NO ENTONCES MOSTRARLA.
	$smarty->assign("tsTitle",$tsTitle);	// AGREGAR EL TITULO DE LA PAGINA ACTUAL
	/*++++++++ = ++++++++*/
	include("../../footer.php");
	/*++++++++ = ++++++++*/
}