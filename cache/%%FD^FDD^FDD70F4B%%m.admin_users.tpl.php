<?php /* Smarty version 2.6.28, created on 2016-06-16 12:39:54
         compiled from admin_mods/m.admin_users.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'hace', 'admin_mods/m.admin_users.tpl', 26, false),array('modifier', 'date_format', 'admin_mods/m.admin_users.tpl', 27, false),)), $this); ?>
                                <div class="boxy-title">
									<h3>Administrar Usuarios</h3>
								</div>
								<div id="res" class="boxy-content" style="position:relative">
								<?php if (! $this->_tpl_vars['tsAct']): ?>
								<?php if (! $this->_tpl_vars['tsMembers']['data']): ?>
								<div class="phpostAlfa">No hay usuarios registrados.</div>
								<?php else: ?>
								<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
									<thead>
										<th>Rango</th>
										<th>Usuario</th>
										<th><a class="qtip" title="Ordenar por email ascendente" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/users?o=c&m=a"><</a> Email <a class="qtip" title="Ordenar por email descendente" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/users?o=c&m=d">></a></th>
										<th><a class="qtip" title="Ordenar por &uacute;ltima vez activo ascendente" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/users?o=u&m=a"><</a> &Uacute;ltima actividad <a class="qtip" title="Ordenar por &uacute;ltima vez activo desccendente" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/users?o=u&m=d">></a></th>
										<th>Registro</th>
										<th><a class="qtip" title="Ordenar por IP ascendente" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/users?o=i&m=a"><</a> IP <a class="qtip" title="Ordenar por IP descendente" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/users?o=i&m=d">></a> </th>
										<th><a class="qtip" title="Ordenar por estado ascendente" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/users?o=e&m=a"><</a> Estado <a class="qtip" title="Ordenar por estado descendente" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/users?o=e&m=d">></a></th>
										<th>Acciones</th>
									</thead>
									<tbody>
										<?php $_from = $this->_tpl_vars['tsMembers']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
										<tr>
											<td><img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/ran/<?php echo $this->_tpl_vars['m']['r_image']; ?>
" /></td>
											<td align="left"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['m']['user_name']; ?>
" class="hovercard" uid="<?php echo $this->_tpl_vars['m']['user_id']; ?>
" style="color:#<?php echo $this->_tpl_vars['m']['r_color']; ?>
;"><?php echo $this->_tpl_vars['m']['user_name']; ?>
</a></td>
											<td><?php echo $this->_tpl_vars['m']['user_email']; ?>
</td>
											<td><?php if ($this->_tpl_vars['m']['user_lastactive'] == 0): ?> Nunca<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['m']['user_lastactive'])) ? $this->_run_mod_handler('hace', true, $_tmp, true) : smarty_modifier_hace($_tmp, true)); ?>
<?php endif; ?></td>
											<td><?php echo ((is_array($_tmp=$this->_tpl_vars['m']['user_registro'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
											<td><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/moderacion/buscador/1/1/<?php echo $this->_tpl_vars['m']['user_last_ip']; ?>
" class="geoip" target="_blank"><?php echo $this->_tpl_vars['m']['user_last_ip']; ?>
</a></td>
											<td id="status_user_<?php echo $this->_tpl_vars['m']['user_id']; ?>
"><?php if ($this->_tpl_vars['m']['user_baneado'] == 1): ?><font color="red">Suspendido</font><?php elseif ($this->_tpl_vars['m']['user_activo'] == 0): ?><font color="purple">Inactivo</font><?php else: ?><font color="green">Activo</font><?php endif; ?></td>
											<td class="admin_actions">
												<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/users?act=show&uid=<?php echo $this->_tpl_vars['m']['user_id']; ?>
"><img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/editar.png" title="Editar Usuario" /></a>												
												<a onclick="admin.users.setInActive(<?php echo $this->_tpl_vars['m']['user_id']; ?>
); return false;"><img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/reactivar.png" title="Activar/Desactivar Usuario" /></a>
                                                <a href="#" onclick="mod.users.action(<?php echo $this->_tpl_vars['m']['user_id']; ?>
, 'aviso', false); return false;"><img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/warning.png" title="Enviar Alerta" /></a>
												<a href="#" onclick="mod.<?php if ($this->_tpl_vars['m']['user_baneado'] == 1): ?>reboot(<?php echo $this->_tpl_vars['m']['user_id']; ?>
, 'users', 'unban', false)<?php else: ?>users.action(<?php echo $this->_tpl_vars['m']['user_id']; ?>
, 'ban', false)<?php endif; ?>; return false;"><img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/power_<?php if ($this->_tpl_vars['m']['user_baneado'] == 1): ?>on<?php else: ?>off<?php endif; ?>.png" title="<?php if ($this->_tpl_vars['m']['user_baneado'] == 1): ?>Reactivar<?php else: ?>Suspender<?php endif; ?> Usuario" /></a>
											</td>
										</tr>
										<?php endforeach; endif; unset($_from); ?>
									</tbody>
									<tfoot>
										<td colspan="8">P&aacute;ginas: <?php echo $this->_tpl_vars['tsMembers']['pages']; ?>
</td>
									</tfoot>
								</table>
								<?php endif; ?>
								<?php elseif ($this->_tpl_vars['tsAct'] == 'show'): ?>
								<div class="admin_header">
								<h1>Administrar: <strong><?php echo $this->_tpl_vars['tsUsername']; ?>
</strong></h1>
								<div class="floatR"><strong>Seleccionar:</strong> 
									<select onchange="location.href='<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/users?act=show&uid=<?php echo $this->_tpl_vars['tsUserID']; ?>
&t=' + this.value;">
										<option value="1"<?php if ($this->_tpl_vars['tsType'] == 1): ?> selected="true"<?php endif; ?>>Vista general</option>
										<option value="5"<?php if ($this->_tpl_vars['tsType'] == 5): ?> selected="true"<?php endif; ?>>Preferencias</option>
                                        <option value="6"<?php if ($this->_tpl_vars['tsType'] == 6): ?> selected="true"<?php endif; ?>>Borrar Contenido</option>
										<option value="7"<?php if ($this->_tpl_vars['tsType'] == 7): ?> selected="true"<?php endif; ?>>Rango</option>
										<option value="8"<?php if ($this->_tpl_vars['tsType'] == 8): ?> selected="true"<?php endif; ?>>Firma</option>
										<option value="9"<?php if ($this->_tpl_vars['tsType'] == 9): ?> selected="true"<?php endif; ?>>Puntos TC</option>
									</select>
								</div>
								<div class="clearBoth"></div>
								</div>
								<?php if ($this->_tpl_vars['tsSave']): ?><div class="mensajes ok">Tus cambios han sido guardados.</div><?php endif; ?>
								<?php if ($this->_tpl_vars['tsError']): ?><div class="mensajes error"><?php echo $this->_tpl_vars['tsError']; ?>
</div><?php endif; ?>
								<form action="" method="post">
									<fieldset>
									<?php if (! $this->_tpl_vars['tsType'] || $this->_tpl_vars['tsType'] == 1): ?>
										<legend>Vista general</legend>
										<dl>
											<dt><label for="user">Nombre de Usuario:</label></dt>
											<dd><input type="text" name="nick" id="user" value="<?php echo $this->_tpl_vars['tsUserD']['user_name']; ?>
" class="qtip" title="El nick s&oacute;lo se cambiar&aacute; si escribe una nueva contrase&ntilde;a" /></dd>
										</dl>
										<dl>
											<dt><label for="user">Rango:</label></dt>
											<dd><strong style="color:#<?php echo $this->_tpl_vars['tsUserD']['r_color']; ?>
"><?php echo $this->_tpl_vars['tsUserD']['r_name']; ?>
</strong></dd>
										</dl>
										<dl>
											<dt><label for="registro">Registrado:</label></dt>
											<dd><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['tsUserD']['user_registro'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y a las %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y a las %H:%M")); ?>
</strong></dd>
										</dl>
										<dl>
											<dt><label>&Uacute;ltima vez activo:</label></dt>
											<dd><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['tsUserD']['user_lastactive'])) ? $this->_run_mod_handler('hace', true, $_tmp) : smarty_modifier_hace($_tmp)); ?>
</strong></dd>
										</dl>
										<dl>
											<dt><label>Puntos:</label></dt>
											<dd><input type="text" name="points" id="points" value="<?php echo $this->_tpl_vars['tsUserD']['user_puntos']; ?>
" style="width:10%" /></dd>
										</dl>
										<dl>
											<dt><label>Puntos para dar:</label></dt>
											<dd><input type="text" name="pointsxdar" id="pointsxdar" value="<?php echo $this->_tpl_vars['tsUserD']['user_puntosxdar']; ?>
" style="width:10%" /></dd>
										</dl>
										<dl>
											<dt><label>Cambios de nick disponibles:</label></dt>
											<dd><input type="text" name="changenicks" id="changenicks" value="<?php echo $this->_tpl_vars['tsUserD']['user_name_changes']; ?>
" style="width:10%" /></dd>
										</dl>
										<hr />
										<dl>
											<dt><label for="email">E-mail:</label></dt>
											<dd><input type="text" name="email" id="email" value="<?php echo $this->_tpl_vars['tsUserD']['user_email']; ?>
" /></dd>
										</dl>
										<dl>
											<dt><label for="pwd">Nueva contrase&ntilde;a:</label><br /><span>Debe tener entre 5 y 35 caracteres.</span></dt>
											<dd><input type="password" name="pwd" id="pwd" onkeypress="if($('#cpwd').val() != '') $('#sendata').fadeIn();"/></dd>
										</dl>
										<dl>
											<dt><label for="cpwd">Confirmar contrase&ntilde;a:</label><br /><span>Necesita confirmar su contrase&ntilde;a s&oacute;lo si la ha cambiado arriba.</span></dt>
											<dd><input type="password" name="cpwd" id="cpwd" onkeypress="if($('#pwd').val() != '') $('#sendata').fadeIn();"/></dd>
										</dl>
										 <dl id="sendata" style="display:none;">
											<dt><label for="sendata">Informar al usuario</label><br /><span>Marque esta casilla si quiere enviar un e-mail al usuario con los nuevos datos</span></dt>
											<dd><input type="checkbox" name="sendata"/></dd>
										</dl>
									<?php elseif ($this->_tpl_vars['tsType'] == 5): ?>
									<legend>Modificar privacidad del usuario</legend>
										<h2 class="active">&iquest;Qui&eacute;n puede...</h2>
									<div class="field">
										<dl>
											<dt><label>ver su muro?</label></dt>
											<dd>
												<select name="muro" style="width:270px;">
												<?php $_from = $this->_tpl_vars['tsPrivacidad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['p']):
?>
												<option value="<?php echo $this->_tpl_vars['i']; ?>
"<?php if ($this->_tpl_vars['tsPerfil']['p_configs']['m'] == $this->_tpl_vars['i']): ?> selected="true"<?php endif; ?>><?php echo $this->_tpl_vars['p']; ?>
</option>
												<?php endforeach; endif; unset($_from); ?>
												</select>
											</dd>
										</dl>                    				
									</div>
									<?php echo $this->_tpl_vars['tsPerfil']['p_configs']['muro']; ?>

									<div class="field">
										<dl>
										<dt><label>firmar su muro?</label></dt>
											<dd>
												<select name="muro_firm" style="width:270px;">
												<?php $_from = $this->_tpl_vars['tsPrivacidad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['p']):
?>
												<?php if ($this->_tpl_vars['i'] != 6): ?><option value="<?php echo $this->_tpl_vars['i']; ?>
"<?php if ($this->_tpl_vars['tsPerfil']['p_configs']['mf'] == $this->_tpl_vars['i']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['p']; ?>
</option><?php endif; ?>
												<?php endforeach; endif; unset($_from); ?>
												</select>
											</dd>
										</dl>
									</div>
									<div class="field">
										<dl>
										<dt><label>ver visitantes recientes?</label></dt>
											<dd>
												<select name="last_hits" style="width:270px;">
												<?php $_from = $this->_tpl_vars['tsPrivacidad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['p']):
?>
												<?php if ($this->_tpl_vars['i'] != 1 && $this->_tpl_vars['i'] != 2): ?><option value="<?php echo $this->_tpl_vars['i']; ?>
"<?php if ($this->_tpl_vars['tsPerfil']['p_configs']['hits'] == $this->_tpl_vars['i']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['p']; ?>
</option><?php endif; ?>
												<?php endforeach; endif; unset($_from); ?>
												</select>
											</dd>
										</dl>
									</div>
									<div class="field">
											<dl>
												<dt><label>enviarles mensajes privados?</label><br /><span>Esta opci&oacute;n no se aplica a moderadores y administradores.</span></dt>
												<dd>
													<select name="rec_mps" style="width:270px;">
														<?php $_from = $this->_tpl_vars['tsPrivacidad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['p']):
?>
														<?php if ($this->_tpl_vars['i'] != 6): ?><option value="<?php echo $this->_tpl_vars['i']; ?>
"<?php if ($this->_tpl_vars['tsPerfil']['p_configs']['rmp'] == $this->_tpl_vars['i']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['p']; ?>
</option><?php endif; ?>
														<?php endforeach; endif; unset($_from); ?>
														<option value="8"<?php if ($this->_tpl_vars['tsPerfil']['p_configs']['rmp'] == 8): ?>selected<?php endif; ?>>Deshabilitar mensajer&iacute;a (opci&oacute;n administrativa)</option>
													</select>
												</dd>
											</dl>
									</div>
                                    <?php elseif ($this->_tpl_vars['tsType'] == 6): ?>
									<legend>Eliminaci&oacute;n de contenidos</legend>
										<input type="checkbox" id="bocuenta" name="bocuenta" onclick="$('#ext').slideToggle();"/><label style="font-weight:bold;" for="bocuenta">Cuenta Completa</label><label for="bocuenta"> &nbsp; Se eliminar&aacute; la cuenta y todo el contenido relacionado a <?php echo $this->_tpl_vars['tsUsername']; ?>
.</label>
										<div id="ext">
                                        <br /><hr/>
                                        <input type="checkbox" id="boposts" name="boposts"/><label style="font-weight:bold;" for="boposts">Posts</label><label for="boposts"> &nbsp; Se eliminar&aacute;n todos sus posts y sus comentarios.</label>
										<br /><hr/>
                                        <input type="checkbox" id="bofotos" name="bofotos"/><label style="font-weight:bold;" for="bofotos">Fotos</label><label for="bofotos"> &nbsp; Se eliminar&aacute;n todas sus fotos publicadas y sus comentarios.</label>
										<br /><hr/>
                                        <input type="checkbox" id="boestados" name="boestados"/><label style="font-weight:bold;" for="boestados">Estados</label><label for="boestados"> &nbsp; Se eliminar&aacute;n todas sus publicaciones de muros</label>
										<br /><hr/>
                                        <input type="checkbox" id="bocomposts" name="bocomposts"/><label style="font-weight:bold;" for="bocomposts">Comentarios de Posts</label><label for="bocomposts"> &nbsp; Se eliminar&aacute;n todos sus comentarios en posts.</label>
										<br /><hr/>
                                        <input type="checkbox" id="bocomfotos" name="bocomfotos"/><label style="font-weight:bold;" for="bocomfotos">Comentarios de Fotos</label><label for="bocomfotos"> &nbsp; Se eliminar&aacute;n todos sus comentarios en fotos.</label>
										<br /><hr/>
                                        <input type="checkbox" id="bocomestados" name="bocomestados"/><label style="font-weight:bold;" for="bocomestados">Comentarios en Estados</label><label for="bocomestados"> &nbsp; Se eliminar&aacute;n todos sus comentarios en estados</label>
										<br /><hr/>
                                        <input type="checkbox" id="bolike" name="bolike"/><label style="font-weight:bold;" for="bolike">Like</label><label for="bolike"> &nbsp; Se eliminar&aacute;n sus likes en estados y comentarios en estados</label>
										<br /><hr/>
                                        <input type="checkbox" id="boseguidores" name="boseguidores"/><label style="font-weight:bold;" for="boseguidores">Seguidores</label><label for="boseguidores"> &nbsp; Se eliminar&aacute; la lista de todos sus seguidores.</label>
										<br /><hr/>
                                        <input type="checkbox" id="bosiguiendo" name="bosiguiendo"/><label style="font-weight:bold;" for="bosiguiendo">Siguiendo</label><label for="bosiguiendo"> &nbsp; Se eliminar&aacute; la lista de todos a los que sigue.</label>
										<br /><hr/>
                                        <input type="checkbox" id="bofavoritos" name="bofavoritos"/><label style="font-weight:bold;" for="bofavoritos">Favoritos</label><label for="bofavoritos"> &nbsp; Se eliminar&aacute; la lista de favoritos que haya agregado.</label>
										<br /><hr/>
                                        <input type="checkbox" id="bovotosposts" name="bovotosposts"/><label style="font-weight:bold;" for="bovotosposts">Votos en Posts</label><label for="bovotosposts"> &nbsp; Se eliminar&aacute;n los votos de puntos que haya dejado en posts.</label>
										<br /><hr/>
                                        <input type="checkbox" id="bovotosfotos" name="bovotosfotos"/><label style="font-weight:bold;" for="bovotosfotos">Votos en Fotos</label><label for="bovotosfotos"> &nbsp; Se eliminar&aacute;n los votos positivos y negativos que haya dejado en fotos.</label>
										<br /><hr/>
                                        <input type="checkbox" id="boactividad" name="boactividad"/><label style="font-weight:bold;" for="boactividad">Actividad</label><label for="boactividad"> &nbsp; Se eliminar&aacute; toda su actividad.</label>
										<br /><hr/>
                                        <input type="checkbox" id="boavisos" name="boavisos"/><label style="font-weight:bold;" for="boavisos">Avisos</label><label for="boavisos"> &nbsp; Se eliminar&aacute;n todos los avisos que ha recibido.</label>
										<br /><hr/>
                                        <input type="checkbox" id="bobloqueos" name="bobloqueos"/><label style="font-weight:bold;" for="bobloqueos">Bloqueos</label><label for="bobloqueos"> &nbsp; Se eliminar&aacute;n todos los bloqueos que ha recibido.</label>
										<br /><hr/>
                                        <input type="checkbox" id="bomensajes" name="bomensajes"/><label style="font-weight:bold;" for="bomensajes">Mensajes Privados</label><label for="bomensajes"> &nbsp; Se eliminar&aacute;n todos los mensajes que ha enviado y recibido.</label>
										<br /><hr/>
                                        <input type="checkbox" id="bosesiones" name="bosesiones"/><label style="font-weight:bold;" for="bosesiones">Sesiones</label><label for="bosesiones"> &nbsp; Se eliminar&aacute;n todas las sesiones.</label>
										<br /><hr/>
                                        <input type="checkbox" id="bovisitas" name="bovisitas"/><label style="font-weight:bold;" for="boavisos">Visitas</label><label for="bovisitas"> &nbsp; Se eliminar&aacute;n todo rastro de visitas de este usuario en perfiles, posts y fotos.</label>
										</div>
                                        <br /><hr/>
                                        Introduzca su contrase&ntilde;a para continuar: <input type="password" name="password"/>
                                        
									<?php elseif ($this->_tpl_vars['tsType'] == 7): ?>
									<legend>Modificar rango de usuario</legend>
										<dl>
											<dt><label>Rango actual:</label></dt>
											<dd><strong style="color:#<?php echo $this->_tpl_vars['tsUserR']['user']['r_color']; ?>
"><?php echo $this->_tpl_vars['tsUserR']['user']['r_name']; ?>
</strong></dd>
										</dl>
										<dl>
											<dt><label for="user">Nuevo rango:</label></dt>
											<dd><select name="new_rango">
											<?php $_from = $this->_tpl_vars['tsUserR']['rangos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['r']):
?>
											<option value="<?php echo $this->_tpl_vars['r']['rango_id']; ?>
" style="color:#<?php echo $this->_tpl_vars['r']['r_color']; ?>
" <?php if ($this->_tpl_vars['r']['rango_id'] == $this->_tpl_vars['tsUserR']['user']['rango_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['r']['r_name']; ?>
</option>
											<?php endforeach; endif; unset($_from); ?>
											</select></dd>
										</dl>
<?php elseif ($this->_tpl_vars['tsType'] == 8): ?>
<div style="overflow: hidden;clear: both;margin-bottom: 20px;">
<textarea class="searchBar autogrow markItUpEditor" name="firma" rows="3" cols="50" style="font-size: 14px;width: 570px;margin: 0;"><?php echo $this->_tpl_vars['tsUserF']['user_firma']; ?>
</textarea>
</div>
<?php elseif ($this->_tpl_vars['tsType'] == 9): ?>
<legend>Dinero Disponible</legend>
<a href="/perfil/<?php echo $this->_tpl_vars['tsSolprim']['datainfo']['user_name']; ?>
"><?php echo $this->_tpl_vars['tsSolprim']['datainfo']['user_name']; ?>
</a> acumula de saldo<b>&nbsp;$<?php if ($this->_tpl_vars['tsSolprim']['datainfo']['x_dinero'] != ''): ?><?php echo $this->_tpl_vars['tsSolprim']['datainfo']['x_dinero']; ?>
<?php else: ?>0.00<?php endif; ?></b><br/><br/>
<br/><?php if ($this->_tpl_vars['tsSave']): ?>Cuando confirme su Dinero recibido le sera descontado el Importe.<?php endif; ?>
<?php if ($this->_tpl_vars['tsSolprim']['datainfo']['uid_act'] == 0): ?>
No h&aacute; solicitado su pago.
<?php endif; ?>
<?php if ($this->_tpl_vars['tsPostU']['dinero']['uid_act'] == 1): ?>
<div class="solicitud-user">
<h3>Informacion:</h3>
<ul>
<li>Usuario: <b> <?php echo $this->_tpl_vars['tsPostU']['dinero']['user_name']; ?>
</b></li>
<li>Rango: <b style="color:#<?php echo $this->_tpl_vars['tsPostU']['dinero']['r_color']; ?>
;"> <?php echo $this->_tpl_vars['tsPostU']['dinero']['r_name']; ?>
</b></li>
<li>H&aacute; solicitado: <b>$ <?php echo $this->_tpl_vars['tsPostU']['dinero']['c_dinero']; ?>
</b></li>
<li>Posts Aprobados: <b><?php echo $this->_tpl_vars['tsPostU']['dinero']['post_id']; ?>
</b></li>
<li>Posts Rechazados: <b><?php echo $this->_tpl_vars['tsPostU']['dinero']['p_validate']; ?>
</b></li>
<li>Puntos Recibidos: <b><?php echo $this->_tpl_vars['tsPostU']['dinero']['post_puntos']; ?>
</b></li>
</ul>
<h3>Datos Ofrecidos:</h3>
<ul>
<li>Enviado: <?php echo ((is_array($_tmp=$this->_tpl_vars['tsPostU']['dinero']['c_date'])) ? $this->_run_mod_handler('hace', true, $_tmp) : smarty_modifier_hace($_tmp)); ?>
</li>
<li>Paypal: <?php echo $this->_tpl_vars['tsPostU']['dinero']['c_email']; ?>
</li>
<li>Pa&iacute;s: <?php echo $this->_tpl_vars['tsPostU']['dinero']['c_pais']; ?>
</li>
<li>C&oacute;digo: <?php echo $this->_tpl_vars['tsPostU']['dinero']['c_secret']; ?>
</li>
<li>Comentario: <?php echo $this->_tpl_vars['tsPostU']['dinero']['c_coment']; ?>
</li>
<li>Ip: <a href="/moderacion/buscador/1/1/<?php echo $this->_tpl_vars['tsPostU']['dinero']['c_autor_ip']; ?>
" target="_blank"><?php echo $this->_tpl_vars['tsPostU']['dinero']['c_autor_ip']; ?>
</a></li>
</ul>
<br/>
<input type="hidden" name="csecret" value="<?php echo $this->_tpl_vars['tsPostU']['dinero']['c_secret']; ?>
"/>
<select id="dinero" name="dinero" style="width: 120px;">
<option value="0" <?php if ($this->_tpl_vars['tsPostU']['dinero']['x_dinero'] > 0): ?>selected<?php endif; ?> >Seleccionar dinero</option>
<option value="<?php echo $this->_tpl_vars['tsPostU']['dinero']['x_dinero']; ?>
" >Disponible $ <?php echo $this->_tpl_vars['tsPostU']['dinero']['x_dinero']; ?>
</option>
</select>
<br/><br/><h4>El dinero Disponible le sera Descontado de su Saldo.<br/>Al enviar los cambios el usuario queda a disposici&oacute;n para la recepcion del dinero.</h4>
</div>
<?php endif; ?>
<?php else: ?>
<div class="phpostAlfa">Pendiente</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['tsType'] == 9 && ( ( $this->_tpl_vars['tsPostU']['dinero']['x_dinero'] >= $this->_tpl_vars['tsConfig']['dinerp'] ) && $this->_tpl_vars['tsPostU']['dinero']['uid_act'] == 1 )): ?>
<p><input type="submit" name="save" value="Enviar Cambios" class="btn_g"/></p>
<?php else: ?>
<?php if ($this->_tpl_vars['tsType'] == 9 && $this->_tpl_vars['tsPostU']['dinero']['c_type'] == 0): ?>
<?php else: ?>
<p><input type="submit" name="save" value="Enviar Cambios" class="btn_g"/></p>
<?php endif; ?><?php endif; ?>
</fieldset>
								</form>
								<?php endif; ?>
								</div>