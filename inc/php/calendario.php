<?php 
/**
 * Controlador
 *
 * @name    pages.php
 * @author  PHPost Team
*/
/**********************************\

*	(VARIABLES POR DEFAULT)		*

\*********************************/

	$tsPage = "calendario";	// tsPage.tpl -> PLANTILLA PARA MOSTRAR CON ESTE ARCHIVO.

	$tsLevel = 0;		// NIVEL DE ACCESO A ESTA PAGINA. => VER FAQs

	$tsAjax = empty($_GET['ajax']) ? 0 : 1; // LA RESPUESTA SERA AJAX?
	
	$tsContinue = true;	// CONTINUAR EL SCRIPT
	
/*++++++++ = ++++++++*/

	include "../../header.php"; // INCLUIR EL HEADER

	$tsTitle = 'Calendario de '.$tsCore->settings['titulo']; 	// TITULO DE LA PAGINA ACTUAL

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

*	(INSTRUCCIONES DE CODIGO)		*

\*********************************/
#Se define zona horaria
date_default_timezone_set("America/Argentina/Buenos_Aires");
# definimos los valores iniciales para nuestro calendario
$month = (empty($_GET['mes'])) ? date("n") : $tsCore->setSecure($_GET['mes']);
$year = (empty($_GET['year'])) ? date("Y") : $tsCore->setSecure($_GET['year']);
$dia = (empty($_GET['dia'])) ? 0 : $tsCore->setSecure($_GET['dia']);
$diaActual = date("j");
$act = $tsCore->setSecure($_GET['act']);
# Meses
$meses = array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
# Dia en especifico
if($dia > 0) {
	// CUMPLEANOS
	$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT u.user_id, u.user_name, '.$year.'-p.user_ano AS user_ano FROM u_miembros AS u, u_perfil AS p WHERE u.user_id = p.user_id AND u.user_baneado = 0 AND p.user_mes = \''.$month.'\' AND p.user_dia = \''.$dia.'\'');
	$data = result_array($query);
	$smarty->assign("tsCumple",$data);
	// EVENTOS
	$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT *, user_name FROM e_eventos LEFT JOIN u_miembros ON user_id = e_user WHERE e_dia = '.$dia.' AND e_mes = '.$month.' AND e_year = '.$year.' ORDER BY e_fecha DESC');
	$data['data'] = result_array($query);
	$i = 0;
	foreach($data['data'] as $val) {
		$data['data'][$i]['e_cuerpo'] = $tsCore->parseBadWords($tsCore->parseBBCode($val['e_cuerpo']));
		$i++;
	}
	$data['total'] = count($data['data']);
	$smarty->assign("tsEventos",$data);
	if($act == 'nuevo') {
		$tsLevelMsg = $tsCore->setLevel(2, true);
		if($tsLevelMsg != 1){	
			$tsPage = 'aviso';
			$tsAjax = 0;
			$smarty->assign("tsAviso",$tsLevelMsg);
			//
			$tsContinue = false;
		}
		if($month > 12 || $month < 1 || $dia < 1 || $dia > 31) {
			$tsPage = 'aviso';
			$tsAjax = 0;
			$smarty->assign("tsAviso",array('titulo' => 'Oops! Ocurri&oacute; un error', 'mensaje' => 'Coloca una fecha v&aacute;lida', 'return' => 1));
		} else {
			if(isset($_POST['titulo'])) {
				$dato = array(
					'titulo' => $tsCore->setSecure($_POST['titulo']),
					'cuerpo' => $tsCore->setSecure($_POST['cuerpo']),
					'privado' => ($_POST['privado'] == 1) ? 1 : 2,
					'dia' => $dia,
					'mes' => $month,
					'year' => $year,
					'fecha' => time(),
				);
				foreach($dato as $key => $val){
					$val = trim(preg_replace('/[^ A-Za-z0-9]/', '', $val));
					$val = str_replace(' ', '', $val);
					if(empty($val)) $error = 'Completa los datos';
				}
				if($dato['mes'] > 12 || $dato['mes'] < 1 || $dato['dia'] < 1 || $dato['dia'] > 31) $error = 'Coloca una fecha v&aacute;lida';
				//
				if(!empty($error)) {
					$tsPage = 'aviso';
					$tsAjax = 0;
					$smarty->assign("tsAviso",array('titulo' => 'Oops! Ocurri&oacute; un error', 'mensaje' => $error, 'return' => 1));
				} else {
					if(db_exec(array(__FILE__, __LINE__), 'query', 'INSERT INTO e_eventos (e_user, e_titulo, e_cuerpo, e_dia, e_mes, e_year, e_fecha, e_privado) VALUES (\''.$tsUser->uid.'\', \''.$dato['titulo'].'\', \''.$dato['cuerpo'].'\', \''.$dato['dia'].'\', \''.$dato['mes'].'\', \''.$dato['year'].'\', \''.$dato['fecha'].'\', \''.$dato['privado'].'\')')) {
						$tsCore->redirectTo($tsCore->settings['url'].'/calendario/?dia='.$dia.'&mes='.$month.'&year='.$year);
					} else die('Ocurri&oacute; un error intenta de nuevo.');
				}
			}
		}
	} elseif($act == 'editar') {
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT * FROM e_eventos WHERE eid = \''.$tsCore->setSecure($_GET['eid']).'\'');
		$dato = db_exec('fetch_assoc', $query);
		if(!empty($dato['e_user'])) {
			if($dato['e_user'] != $tsUser->uid && !$tsUser->is_admod) $error = 'Intentas algo no permitido.';
		} else $error = 'El evento no existe.';
		if(!empty($error)) {
			$tsPage = 'aviso';
			$tsAjax = 0;
			$smarty->assign("tsAviso",array('titulo' => 'Oops!', 'mensaje' => $error, 'return' => 1));
		} else {
			if(!empty($_POST['titulo'])) {
				$dato = array(
					'titulo' => $tsCore->setSecure($_POST['titulo']),
					'cuerpo' => $tsCore->setSecure($_POST['cuerpo']),
					'privado' => ($_POST['privado'] == 1) ? 1 : 2,
					'dia' => intval($_POST['dia']),
					'mes' => intval($_POST['mes']),
					'year' => intval($_POST['year']),
				);
				foreach($dato as $key => $val){
					$val = trim(preg_replace('/[^ A-Za-z0-9]/', '', $val));
					$val = str_replace(' ', '', $val);
					if(empty($val)) $error = 'Completa los datos';
				}
				if($dato['mes'] > 12 || $dato['mes'] < 1 || $dato['dia'] < 1 || $dato['dia'] > 31) $error = 'Coloca una fecha v&aacute;lida';
				//
				if(!empty($error)) {
					$tsPage = 'aviso';
					$tsAjax = 0;
					$smarty->assign("tsAviso",array('titulo' => 'Oops! Ocurri&oacute; un error', 'mensaje' => $error, 'return' => 1));
				} else {
					$values = $tsCore->getIUP($dato, 'e_');
					if(db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE e_eventos SET '.$values.' WHERE eid = \''.$tsCore->setSecure($_GET['eid']).'\'')) {
						$tsCore->redirectTo($tsCore->settings['url'].'/calendario/?dia='.$dato['dia'].'&mes='.$dato['mes'].'&year='.$dato['year']);	
					} else die('Ocurri&oacute; un error intenta de nuevo.');
				}
			} else {
				$smarty->assign("tsDato",$dato);
			}
		}
	} elseif($act == 'borrar') {
		$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT * FROM e_eventos WHERE eid = \''.$tsCore->setSecure($_GET['eid']).'\'');
		$dato = db_exec('fetch_assoc', $query);
		if(!empty($dato['e_user'])) {
			if($dato['e_user'] != $tsUser->uid && !$tsUser->is_admod) $error = 'Intentas algo no permitido.';
		} else $error = 'El evento no existe.';
		if(!empty($error)) {
			$tsPage = 'aviso';
			$tsAjax = 0;
			$smarty->assign("tsAviso",array('titulo' => 'Oops!', 'mensaje' => $error, 'return' => 1));
		} else {
			if(db_exec(array(__FILE__, __LINE__), 'query', 'DELETE FROM e_eventos WHERE eid = \''.$tsCore->setSecure($_GET['eid']).'\'')) {
				$tsCore->redirectTo($tsCore->settings['url'].'/calendario/?dia='.$dato['e_dia'].'&mes='.$dato['e_mes'].'&year='.$dato['e_year']);
			} else die('Ocurri&oacute; un error intenta de nuevo.');
		}
	}
	$smarty->assign("tsAct",$act);
} else {
	# Obtenemos el dia de la semana del primer dia
	# Devuelve 0 para domingo, 6 para sabado
	$diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7; 
	# Obtenemos el ultimo dia del mes
	$ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
	# En que semana empieza
	$inicio = ($diaSemana >= 8) ? 8 : 1;
	# Indice de ultima celda a usar en la tabla
	$last_cell=$diaSemana+$ultimoDiaMes;
	// hacemos un bucle hasta 42, que es el máximo de valores que puede haber... 6 columnas de 7 dias
	$html = '<tr>';
	for($i=$inicio;$i<=42;$i++) {
		if($i==$diaSemana) {
			// determinamos en que dia empieza
			$day=1;
		}
		if($i<$diaSemana || $i>=$last_cell) {
			$html .= '<td class="vacio"></td>';
		} else {
			$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT u.user_id, u.user_name, '.$year.'-p.user_ano AS user_ano FROM u_miembros AS u, u_perfil AS p WHERE u.user_id = p.user_id AND u.user_baneado = 0 AND p.user_mes = \''.$month.'\' AND p.user_dia = \''.$day.'\'');
			$cumpleanos = result_array($query);
			$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT e_titulo, e_privado, e_user FROM e_eventos WHERE e_mes = \''.$month.'\' AND e_dia = \''.$day.'\' AND e_year = \''.$year.'\'');
			$eventos = result_array($query);
			# Es hoy?
			$html .='<td'.(($day==$diaActual && date("n") == $month && date("Y") == $year) ? ' class="hoy"' : '').'>';
			# Dia
			$html .= '<a class="c_day" href="'.$tsCore->settings['url'].'/calendario/?dia='.$day.'&mes='.$month.'&year='.$year.'">'.$day.'</a>';
			# Eventos
			if(count($eventos) >= 4) {
				$html .= '<div><a href="'.$tsCore->settings['url'].'/calendario/?dia='.$day.'&mes='.$month.'&year='.$year.'">('.count($eventos).') Eventos</a></div>';
			} else {
				foreach($eventos as $key => $val){
					if($val['e_privado'] == 1 || $val['e_user'] == $tsUser->uid) {
						$titulo = strlen($val['e_titulo']) > 25 ? substr($val['e_titulo'], 0, 20).'...' : $val['e_titulo'];
						$html .= '<div><a class="qtip" href="'.$tsCore->settings['url'].'/calendario/?dia='.$day.'&mes='.$month.'&year='.$year.'" title="'.$val['e_titulo'].'">'.$titulo.'</a></div>';
					}
				}
			}
			# Cumpleanos
			if(count($cumpleanos) >= 4) {
				$html .= '<div><a href="'.$tsCore->settings['url'].'/calendario/?dia='.$day.'&mes='.$month.'&year='.$year.'">('.count($cumpleanos).') Cumplea&ntilde;os</a></div>';
			} else {
				foreach($cumpleanos as $key => $val){
					$html .= '<div><a class="qtip" href="'.$tsCore->settings['url'].'/perfil/'.$val['user_name'].'" title="'.$val['user_ano'].' a&ntilde;os">'.$val['user_name'].'</a></div>';
				}
			}
			$html .= '</td>';
			$day++;
		}
		// cuando llega al final de la semana, iniciamos una columna nueva
		if($i%7==0) {
			$html .= '</tr><tr>';
		}
	}
	$html .= '</tr>';	
	# proximos eventos
	$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT *, user_name FROM e_eventos LEFT JOIN u_miembros ON user_id = e_user WHERE e_mes > '.date("n").' AND e_year >= '.date("Y").' AND e_user != \''.$tsUser->uid.'\' AND e_privado = \'1\' ORDER BY e_year, e_mes, e_dia LIMIT 20');
	$data['todos'] = result_array($query);
	$query = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT *, user_name FROM e_eventos LEFT JOIN u_miembros ON user_id = e_user WHERE e_mes > '.date("n").' AND e_year >= '.date("Y").' AND e_user = \''.$tsUser->uid.'\' ORDER BY e_year, e_mes, e_dia LIMIT 20');
	$data['mios'] = result_array($query);
	
	# Para la plantilla
	$smarty->assign("html",$html);
	$smarty->assign("tsProximos",$data);
}

/**********************************\

* (AGREGAR DATOS GENERADOS | SMARTY) *

\*********************************/
$smarty->assign("Dia",$dia);
$smarty->assign("Month",$month);
$smarty->assign("Mes",$meses[$month]);
$smarty->assign("Meses",$meses);
$smarty->assign("Year",$year);
$smarty->assign("Year_a",date("Y"));
	}

if(empty($tsAjax)) {	// SI LA PETICION SE HIZO POR AJAX DETENER EL SCRIPT Y NO MOSTRAR PLANTILLA, SI NO ENTONCES MOSTRARLA.

	$smarty->assign("tsTitle",$tsTitle);	// AGREGAR EL TITULO DE LA PAGINA ACTUAL

	/*++++++++ = ++++++++*/
	include("../../footer.php");
	/*++++++++ = ++++++++*/
}