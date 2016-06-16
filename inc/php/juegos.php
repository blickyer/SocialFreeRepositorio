<?php 
/**
 * Controlador
 *
 * @name    juegos.php
 * @author  PHPost Team
 * By Kmario19
*/
/**********************************\

*	(VARIABLES POR DEFAULT)		*

\*********************************/

	$tsPage = "juegos";	// tsPage.tpl -> PLANTILLA PARA MOSTRAR CON ESTE ARCHIVO.

	$tsLevel = 2;		// NIVEL DE ACCESO A ESTA PAGINA. => VER FAQs

	$tsAjax = empty($_GET['ajax']) ? 0 : 1; // LA RESPUESTA SERA AJAX?
	
	$tsContinue = true;	// CONTINUAR EL SCRIPT
	
/*++++++++ = ++++++++*/

	include "../../header.php"; // INCLUIR EL HEADER

	$tsTitle = $tsCore->settings['titulo'].' - '.$tsCore->settings['slogan']; 	// TITULO DE LA PAGINA ACTUAL

/*++++++++ = ++++++++*/
	// PARA LOS JUEGOS...
    $action = htmlspecialchars($_GET['action']);		
	$tsCore->settings['c_juegos_private'] = 0;		
	if($tsCore->settings['c_juegos_private'] == '0') {
    if($action == '' || $action == 'ver') $tsLevel = 0;		
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
	include("../class/c.juegos.php");
	$tsJuegos = new tsJuegos();
	$smarty->assign('tsJuegos',$tsJuegos);

/**********************************\

*	(INSTRUCCIONES DE CODIGO)		*

\*********************************/

    switch($action){
        case '':
			$smarty->assign("tsCategorias", $tsJuegos->getCategorias());
            $smarty->assign("tsMostJuegos",$tsJuegos->getMostJuegos());
            $smarty->assign("tsLastJuegos", $tsJuegos->getLastJuegos());
            $smarty->assign("tsLastComments", $tsJuegos->getLastComments());
            $smarty->assign("tsJComments", $tsJuego['comments']);
			// ESTADISTICAS
			$q = db_exec('fetch_assoc', db_exec(array(__FILE__, __LINE__), 'query', 'SELECT COUNT(DISTINCT u.user_id) AS stats_miembros, COUNT(DISTINCT j.juego_id) AS stats_juegos, COUNT(DISTINCT jc.cid) AS stats_juego_comments FROM u_miembros AS u LEFT JOIN j_juegos AS j ON u.user_id = j.j_user && j.j_status = \'0\' LEFT JOIN j_comentarios AS jc ON u.user_id = jc.c_user WHERE u.user_activo = \'1\' && u.user_baneado = \'0\''));
            $smarty->assign("tsStats", $q);
            
        break;
        case 'agregar':
			$smarty->assign("tsCategoria", $tsJuegos->getCategorias());
            if(!empty($_POST['titulo'])){
                $result = $tsJuegos->newJuego();
                $tsPage = 'aviso';
                if(!is_array($result) && $result > 0){
                    $titulo = $tsCore->setSecure($_POST['titulo']);
                    $smarty->assign("tsAviso",array('titulo' => 'Juego Agregado', 'mensaje' => "El juego <b>".$titulo."</b> fue agregado exitosamente", 'but' => 'Ver juego', 'link' => "{$tsCore->settings['url']}/juegos/{$result}/".$tsCore->setSEO($titulo).".html"));
                }  
            }            
        break;
        case 'editar':			
            if(empty($_POST['titulo'])){
                $tsJuego = $tsJuegos->getJuegoEdit();
                if(!is_array($tsJuego)){
                    $tsPage = 'aviso';
                    $smarty->assign("tsAviso",array('titulo' => 'Opps...', 'mensaje' => $tsJuego, 'but' => 'Ir a Juegos', 'link' => "{$tsCore->settings['url']}/juegos/"));
                } else {
					$smarty->assign("tsCategoria", $tsJuegos->getCategorias());
					$smarty->assign("tsJuego", $tsJuego);
				}
            } else {
                $tsPage = 'aviso';
                $tsJuego = $tsJuegos->editJuego();
                $smarty->assign("tsAviso",array('titulo' => 'Opps...', 'mensaje' => $tsJuego, 'but' => 'Ir a Juegos', 'link' => "{$tsCore->settings['url']}/juegos/"));
            }
        break;
        case 'ver':
            $tsJuego = $tsJuegos->getJuego();
            $tsTitle = 'Jugar '.$tsJuego['juego']['j_title'].' en '.$tsCore->settings['titulo'];	
			if($tsJuego['juego']['j_status'] == 1 && (!$tsUser->is_admod && $tsUser->permisos['moacp'] == false)) {
			$tsPage = 'aviso';
            $smarty->assign("tsAviso",array('titulo' => 'Opps...', 'mensaje' => 'Este juego se encuentra en revisi&oacute;n por acumulaci&oacute;n de denuncias', 'but' => 'Ir a Juegos', 'link' => "{$tsCore->settings['url']}/juegos/"));
			}elseif($tsJuego['juego']['exist'] == 0){
            $tsPage = 'aviso';
			$smarty->assign("tsAviso",array('titulo' => 'Opps...', 'mensaje' => 'Este juego no existe', 'but' => 'Ir a Juegos', 'link' => "{$tsCore->settings['url']}/juegos/"));
			}else{
			$smarty->assign("tsJuego", $tsJuego['juego']);
			$smarty->assign("tsUJuego", $tsJuego['last']);
			$smarty->assign("tsJFavoritos", $tsJuego['favoritos']);
			$smarty->assign("tsJComments", $tsJuego['comments']);
			$smarty->assign("tsJVisitas", $tsJuego['visitas']);
			$smarty->assign("tsJMedallas", $tsJuego['medallas']);
			$smarty->assign("tsTMedallas", $tsJuego['m_total']);
			}
		break;
		case 'album':
            $username = $tsCore->setSecure($_GET['user']);
            $user_id = $tsUser->getUserID($username);
            if(empty($user_id)){
                $tsPage = 'aviso';
                $smarty->assign("tsAviso",array('titulo' => 'Opps...', 'mensaje' => 'Este usuario no existe.', 'but' => 'Ir a Juegos', 'link' => "{$tsCore->settings['url']}/juegos/"));
            } else {
                $tsJuegox = $tsJuegos->getJuegos($user_id);
                $smarty->assign("tsJuegos", $tsJuegox);
                $smarty->assign("tsJUser", array($user_id, $username));
            }

        break;
		case 'favoritos':
                $smarty->assign("tsFavs", $tsJuegos->getFavs());
		break;
		case 'tops':
                $smarty->assign("tsTopJuegos", $tsJuegos->getTopJuegos());
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