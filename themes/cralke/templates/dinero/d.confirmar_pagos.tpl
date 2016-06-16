                               
							   {if $tsAct == 'save'}<div class="dinerok"></div>{/if}
							  
								{if $tsError}{$tsError}{/if}
								<div class="solicitud-pago">
								{if $tsConfirmar.confirmapago.p_type==0 && $tsConfirmar.confirmapago.p_type!=''}
								<ul>
								<form action="" method="post">
	                               <li><h3>Confirmacion</h3><br/>
								   <p>Estimado/a <b>{$tsConfirm.confirmacion.user_name}</b> , este llamado es para pedirle que confirme la recepci&oacute;n del pago recibido: <b>$ {$tsConfirm.confirmacion.p_dinero}</b></p>
								   <p>Apartir del anuncio que le fue enviado {$tsConfirm.confirmacion.p_date|hace} con el codigo : <b style="color:red;">{$tsConfirm.confirmacion.p_secret}</b></p>
								   <p>Al enviar el codigo de la Operaci&oacute;n confirma que la recepci&oacute;n fue correcta, el tiempo de espera es de 5 d&iacute;as apartir del envio del dinero.</p>
								   <p>Posteriormente si no se confirma su cuenta no generara ingresos cuando cree posts y al pasar una semana su cuenta sera suspendida.</p>
								   <p>Si el p&aacute;go no se efectua en los primeros d&iacute;as, contacte al <b style="color:red;">Administrador</b></p>
								   <br/>
								   <p>Introduzca el c&oacute;digo de la operaci&oacute;</p>
								   <p><input type="text" name="confirmaciondepago"/></p>
								   <p>Dejanos un peque&ntilde;o comentario acerca del trato recibido.</p>
								   <p><textarea class="recitext" name="notaconfirma" /></textarea></p>
								   </li>
								<input type="hidden" name="dinerorecibido" value="{$tsConfirm.confirmacion.p_dinero}"/>
								<p><input type="submit" name="save" value="Confirmar Pago" class="btn_g"/></p>
                                								
								</form>	
								
								</ul>
								{else}
								<li class="emptyData"><img alt="Gracias :B" src="http://i.imgur.com/doCpk.gif"></li>
								{/if}
								</div>