<?php /* Smarty version 2.6.28, created on 2016-06-16 12:43:51
         compiled from admin_mods/m.admin_noticias.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'hace', 'admin_mods/m.admin_noticias.tpl', 25, false),)), $this); ?>
								<div class="boxy-title">
									<h3>Noticias</h3>
								</div>
								<div id="res" class="boxy-content">
								<?php if ($this->_tpl_vars['tsSave']): ?><div style="display: block;" class="mensajes ok">Tus cambios han sido guardados.</div><?php endif; ?>																<?php if ($this->_tpl_vars['tsDelete'] == 'true'): ?><div style="display: block;" class="mensajes ok">Noticia eliminada.</div><?php endif; ?>
									<?php if ($this->_tpl_vars['tsAct'] == ''): ?>
									Si necesitas hacer un comunicado a todos los usuarios en general, desde aqu&iacute; podr&aacute;s administrar tus anuncios y los usuarios sin importar donde se encuentren navegando podr&aacute;n visualizarlos.
									<hr class="separator" />
									<b>Lista de noticias</b>
									<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
										<thead>
											<th>ID</th>
											<th>Noticia</th>
											<th>Autor</th>
											<th>Fecha</th>
											<th>Estado</th>
											<th>Acciones</th>
										</thead>
										<tbody>
											<?php $_from = $this->_tpl_vars['tsNews']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n']):
?>
											<tr>
												<td><?php echo $this->_tpl_vars['n']['not_id']; ?>
</td>
												<td><?php echo $this->_tpl_vars['n']['not_body']; ?>
</td>
												<td><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['n']['user_name']; ?>
" class="hovercard" uid="<?php echo $this->_tpl_vars['n']['user_id']; ?>
"><?php echo $this->_tpl_vars['n']['user_name']; ?>
</a></td>
												<td><?php echo ((is_array($_tmp=$this->_tpl_vars['n']['not_date'])) ? $this->_run_mod_handler('hace', true, $_tmp, true) : smarty_modifier_hace($_tmp, true)); ?>
</td>
												<td id="status_noticia_<?php echo $this->_tpl_vars['n']['not_id']; ?>
"><?php if ($this->_tpl_vars['n']['not_active'] == 0): ?><font color="purple">Inactiva</font><?php else: ?><font color="green">Activa</font><?php endif; ?></td>
												<td class="admin_actions">
													<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/news/editar/<?php echo $this->_tpl_vars['n']['not_id']; ?>
"><img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/editar.png" title="Editar" /></a>
													<a onclick="admin.news.accion(<?php echo $this->_tpl_vars['n']['not_id']; ?>
); return false"><img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/reactivar.png" title="Activar/Desactivar Noticia" /></a>
													<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/news?act=borrar&nid=<?php echo $this->_tpl_vars['n']['not_id']; ?>
"><img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/close.png" title="Borrar" /></a>
												</td>
											</tr>
											<?php endforeach; endif; unset($_from); ?>
										</tbody>
										<tfoot>
											<th colspan="6" style="text-align:right;"><input type="button" onclick="location.href = '<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/news/nueva'" class="mBtn btnOk" value="Nueva noticia"/></th>
										</tfoot>
									</table>
									<?php elseif ($this->_tpl_vars['tsAct'] == 'nuevo' || $this->_tpl_vars['tsAct'] == 'editar'): ?>
									<form action="" method="post" autocomplete="off">
									<fieldset>
										<legend><?php if ($this->_tpl_vars['tsAct'] == 'nuevo'): ?>Agregar nueva<?php else: ?>Editar<?php endif; ?> noticia</legend>
										<dl>
											<dt><label for="ai_new">Noticia:</label><br /><span>Puedes utilizar los siguentes BBCodes [url], [i] [b] y [u]. El m&aacute;ximo de caracteres permitidos es de <b>190</b>.</span></dt>
											<dd><textarea name="not_body" id="ai_new" rows="3" cols="50"><?php echo $this->_tpl_vars['tsNew']['not_body']; ?>
</textarea></dd>
										</dl>
										<dl>
											<dt><label for="ai_not_active">Activar noticia:</label><br /><span>Activar inmediatamente esta noticia en <?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
.</span></dt>
											<dd>
												<label><input name="not_active" type="radio" id="ai_not_active" value="1" <?php if ($this->_tpl_vars['tsNew']['not_active'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>S&iacute;</label>
												<label><input name="not_active" type="radio" id="ai_not_active" value="0" <?php if ($this->_tpl_vars['tsNew']['not_active'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>No</label>
											</dd>
										</dl>
										<p><input type="submit" name="save" value="<?php if ($this->_tpl_vars['tsAct'] == 'new'): ?>Agregar noticia<?php else: ?>Guardar Cambios<?php endif; ?>" class="btn_g"/></p>
									</fieldset>
									</form>
									<?php elseif ($this->_tpl_vars['tsAct'] == 'borrar'): ?>                                   
									<form action="" method="post" id="admin_form" autocomplete="off">									                                    
									<center><font color="red">Noticia eliminada</font>																		
									<hr />									                                    
									<input type="button" name="confirm" style="cursor:pointer;" onclick="location.href = '/admin/news?borrar=true'" value="Volver &#187;" class="btn_g">									
									<?php endif; ?>									
								</div>