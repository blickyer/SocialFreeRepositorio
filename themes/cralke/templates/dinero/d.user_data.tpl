

   <div class="prindu">
     <a href="/perfil/{$tsDiner.dinero.user_name}"><img src="/files/avatar/{$tsDiner.dinero.user_id}_120.jpg"></a>
	 <span><p><b>Bienvenido</b> {$tsDiner.dinero.user_name} , desde aqu&iacute; podras controlar tus ingresos generados con tus</p>
     <p>posts. Si tienes dudas hacerca del funcionamiento del sistema, como solicitar un <b>pago</b>,</p>
	 <p>podes acceder al reglamento vigente desde el siguiente acceso: <a onclick="$('#vellenger').slideToggle(); return false"><u><i>Protocolo de Pagos</i></u></a></p>
	 </span>
   </div>
   <div style="display:none;" id="vellenger" class="regd">
      <div class="box_title">
        <div class="box_txt bases_y_condiciones">Dinero por posts de {$tsConfig.titulo}</div>
    </div>
	<span>
		<p>En forma previa a la utilizaci&oacute;n de cualquier servicio o contenido ofrecido en {$tsConfig.titulo}, debe leerse completa y atentamente este documento.</p>
	    <p><b>1. Dinero segun tu Rango:</b> segun sea el rango en la web se proporciona diferentes cantidades en el dinero que se
		obtiene por crear posts, mientras aumentes tu grado de rango en la web, generaras mas ingresos.</p>
		<p><b>2. Posts V&aacute;lidos:</b> los posts nuevos deber&aacute;n cumplir los mismos requisitos segun el protocolo de la web, el cual lo puedes mirar aqui: <a href="/pages/terminos-y-condiciones/"><i>Protocolo</i></a></p>
	    <p><b>3. Revisi&oacute;n de Posts:</b> tus posts creados en su transcurso normal ser&aacute;n controlados por un <b>Moderador</b> quienes determinaran si tu posts creado cumple con las condiciones para acreditar el pago.
		Los posts se veran normalmente en la web, lo que se rechaza es el dinero generado, no el posts.</p>
		<p><b>4. Posts Rechazados:</b> los posts rechazados por no cumplir con los requisitos para acreditarse el pago seran rechazados, pero no as&iacute; eliminados.</p>
	    <p><b>5. Solicitar un Pago:</b> cuando alcances la cantidad m&iacute;nima del dinero establecido podras solicitar el pago de tu dinero generado por tus posts.</p>
		<p><b>6. M&eacute;todo de Pago:</b> para establecer el pago deber&aacute;s proporcionar un email valido para la comunicaci&oacute;n de la forma de pago.
		El pago se realizar&aacute; segun el sistema de pagos que establece {$tsConfig.titulo} o un acuerdo de las partes.</p>
		<p><b>7. Notificac&iacute;on de Pago:</b> al momento de solicitar el pago, y es aprobado por un Administrador recibiras una notificaco&oacute;n con el importe que se h&aacute;
		descontado de tu dinero, el cual deb&eacute;ras guardar el c&oacute;digo de la operaci&oacute;n realizada como comprobante de tu notificaci&oacute;n de pago haceptado.</p>
	    <p><b>8. Informaci&oacute;n de Pago recibido:</b> al momento de establecerse el pago deber&aacute;s confirmar la recepci&oacute;n en un periodo de 5 d&iacute;s apartir del la fecha
		del dinero enviado, pasando estos d&iacute;as, y si no confirmaste el pago recibido tus posts no generaran ingresos hasta que lo confirmes, y si dejas pasar hasta 1 semana mas y no hay respuesta
		de tu parte, t&uacute; cuenta sera suspendida permanentemente.</p>
		<p><b>Preguntas frecuentes:</b></p>
		<p>&raquo; &iquest;Puedo acumular el dinero y cobrar en cualquier momento? , una ves que alcanzaste el dinero m&iacute;nimo establecido ya puedes optar por solicitar el pago
		o dejar acumulando el dinero hasta que consideres oportuno el cobro, el dinero ya acumulado seguira sin alterarse, mas para incrementase si creas mas posts v&aacute;lidos.</p>
		<p>&raquo; &iquest;Cuantos posts puedo crear por d&iacute;a? , los posts v&aacute;lidos en si no seran rechazados, pero pueden estar en revisi&oacute;n a la espera de ser aprobados, segun sea el l&iacute;mite
		de posts por d&iacute;as, por rango seran aprobados en su momento segun el periodo establecido.</p>
		<p>&raquo; &iquest;Cuales son las formas de pagos? , la forma de pago ser&aacute; establecida mediante PayPal o un acuerdo entre las partes.</p>
		<p>&raquo; &iquest;Mis posts anteriores cuentan? , los posts anteriores antes de usar este sistema de pagos no seran contados, pero te favorecen que te pueden sumar puntos
		para subir tu rango en la web y as&iacute; obtener mayor ingreso por los nuevos posts.</p>
	    <center><p>Sistema Creado por&nbsp; &reg; <a style="text-decoration:none;" href="http://www.phpost.net/user/1972-vellenger/">Vellenger</a></p></center>
	</span>
   </div>
  <div class="list-du">
<table cellpadding="0" cellspacing="0" border="0" class="din_table" width="100%" align="center">
									<thead>
										<th>Dinero<br/>por posts</th>
										<th>Dinero<br/>Acumulado</th>
										<th>Posts<br/>Aprobados</th>
										<th>Posts<br/>en Esperas</th>
										<th>Posts<br/>Rechazados</th>
										<th>Solicitud<br/>de Pago</th>

									</thead>
									<tbody>
										<tr>
											<td>$ {$tsUser->permisos.gopxd}</td>
											<td>$ {if $tsDiner.dinero.x_dinero==''}0{else}{$tsDiner.dinero.x_dinero}{/if}</td>
											<td>{$tsDiner.dinero.post_id}</td>
											<td>{$tsDiner.dinero.post_status}</td>
											<td>{$tsDiner.dinero.p_validate}</td>
   										    <td>{if ($tsDiner.dinero.x_dinero >= $tsConfig.dinerp) && $tsDiner.dinero.uid_act==0}Disponible{else}No Disponible{/if}</td>
										</tr>
									</tbody>
								</table>
								
								
								
  </div>