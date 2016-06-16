                               
							   {if $tsAct == 'save'}<div class="dinerok"></div>{/if}
								{if $tsError}{$tsError}{/if}
								<div class="solicitud-pago">
								{if $tsUser->info.uid_act==1}
								 <li class="emptyData"><img alt="No no no" src="http://i.imgur.com/doCpk.gif"> Ya enviaste la solicitud. </li>
								{else}
								{if $tsDiner.dinero.x_dinero >= $tsConfig.dinerp}
								<ul>
								<form action="" method="post">	
								 
								 <li>PayPal: <b class=qtip style="cursor:pointer;" title="Indique un email valido para la el envio de su pago" >&curren;</b><input type="text" class="input-opc" name="emaild" value=""/></li>
								 
								 <li>Pais: <b class=qtip style="cursor:pointer;" title="Indique Su Pa&iacute;s" >&curren;</b> <input type="text" class="input-opc" name="pais" value=""/></li>
								 
								 <li style="padding-top:20px;padding-bottom:50px;">Notas: <b class=qtip style="cursor:pointer;" title="Envie algun comentario, sugerencia o reclamo, esto le sera recibido en forma discreta." >&curren;</b><textarea class="input-opc" name="notad" /></textarea></li>	
								<p>Su saldo es: <b>$ {if $tsDiner.dinero.x_dinero==''}0{else}{$tsDiner.dinero.x_dinero}{/if}</b>, al enviar esta solicitud confirma la cantidad indicada.</p>
								<p><input type="submit" name="save" value="Enviar Solicitud" class="btn_g"/></p>
                                								
								</form>	
								
								</ul>
								{else}
								 <li class="emptyData"><img alt="No no no" src="http://i.minus.com/iLftvL9mLN27t.gif"> No dispones de dinero suficiente para el cobro. </li>
								{/if}{/if}
								</div>
								