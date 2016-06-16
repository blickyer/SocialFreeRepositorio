<?php /* Smarty version 2.6.28, created on 2016-06-16 12:43:56
         compiled from admin_mods/m.admin_temas.tpl */ ?>
                                <div class="boxy-title">
                                    <h3>Administrar Temas</h3>
                                </div>
                                <div id="res" class="boxy-content">
                                <?php if ($this->_tpl_vars['tsSave']): ?><div style="display: block;" class="mensajes ok">Tus cambios han sido guardados.</div><?php endif; ?>
                                    <?php if ($this->_tpl_vars['tsAct'] == ''): ?>
                                	<table cellpadding="0" cellspacing="0" border="0" width="500" align="center" class="admin_table">
                                    	<thead>
                                        	<th>Vista previa</th>
                                            <th>Nombre</th>
                                            <th>Opciones</th>
                                        </thead>
                                        <tbody><?php $_from = $this->_tpl_vars['tsTemas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tema']):
?>
                                        	<tr>
                                        		<td width="150"><img src="<?php echo $this->_tpl_vars['tema']['t_url']; ?>
/screenshot.png" width="150" height="100" /></td>
                                                <td><b><u><?php echo $this->_tpl_vars['tema']['t_name']; ?>
</u></b></td>
                                                <td class="admin_actions">
                                                	<a href="?act=editar&tid=<?php echo $this->_tpl_vars['tema']['tid']; ?>
"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/themes/default/images/icons/editar.png" title="Editar este tema"/></a>
                                                <?php if ($this->_tpl_vars['tsConfig']['tema_id'] == $this->_tpl_vars['tema']['tid']): ?>
                                                	<a onclick="return false;"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/themes/default/images/icons/yes.png" title="Este tema est&aacute; en uso" /></a>
                                                <?php else: ?>
                                                	<a href="?act=usar&tid=<?php echo $this->_tpl_vars['tema']['tid']; ?>
&tt=<?php echo $this->_tpl_vars['tema']['t_name']; ?>
"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/themes/default/images/icons/theme.png" title="Usar este tema" /></a>
                                                    <?php if ($this->_tpl_vars['tema']['tid'] != 1): ?><a href="?act=borrar&tid=<?php echo $this->_tpl_vars['tema']['tid']; ?>
&tt=<?php echo $this->_tpl_vars['tema']['t_name']; ?>
"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/themes/default/images/icons/close.png" title="Borrar este tema" /></a><?php endif; ?>
                                                <?php endif; ?>
                                                </td>
                                            </tr><?php endforeach; endif; unset($_from); ?>
                                        </tbody>
                                    </table>
                                    <hr />
                                    <input type="button"  onclick="location.href = '<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/temas?act=nuevo'"value="Instalar nuevo tema" class="mBtn btnOk" style="margin-left:280px;">
                                    <?php elseif ($this->_tpl_vars['tsAct'] == 'editar'): ?>
                                    <form action="" method="post" id="admin_form" autocomplete="off">
                                    	<label for="ai_name">Nombre del tema:</label> <input type="text" id="ai_name" name="name" value="<?php echo $this->_tpl_vars['tsTema']['t_name']; ?>
" size="30" disabled="disabled"/> Por copyright no se pude modificar.<br class="spacer" />
                                        <label for="ai_url">Url completa del tema:</i></label> <input type="text" id="ai_url" name="url" value="<?php echo $this->_tpl_vars['tsTema']['t_url']; ?>
" size="30" /><br class="spacer" />
                                    	<label for="ai_path">Nombre de la carpeta donde esta el tema:<br /><i><?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/themes/</i></label> <input type="text" id="ai_path" name="path" value="<?php echo $this->_tpl_vars['tsTema']['t_path']; ?>
" size="30" />
                                        <hr />
                                        <label>&nbsp;</label> <input type="submit" value="Guardar tema" name="save" class="mBtn btnOk">
                                    </form>
                                    <?php elseif ($this->_tpl_vars['tsAct'] == 'usar' || $this->_tpl_vars['tsAct'] == 'borrar'): ?>
                                    <form action="" method="post" id="admin_form" autocomplete="off">
                                    	<h3 align="center"><?php echo $this->_tpl_vars['tt']; ?>
</h3>
                                    	<label>&nbsp;</label> <input type="submit" name="confirm" value="<?php if ($this->_tpl_vars['tsAct'] == 'usar'): ?>Confirmar el cambio de<?php else: ?>Continuar borrando este<?php endif; ?> tema &raquo;" class="mBtn btnOk">
                                        <?php if ($this->_tpl_vars['tsAct'] == 'borrar'): ?><p align="center">Te recordamos que debes borrar la carpeta del Tema manualmente en el servidor.</p><?php endif; ?>
                                    </form>
                                    <?php elseif ($this->_tpl_vars['tsAct'] == 'nuevo'): ?>
                                    <?php if ($this->_tpl_vars['tsError']): ?><div style="display: block;" class="mensajes error"><?php echo $this->_tpl_vars['tsError']; ?>
</div><?php endif; ?>
                                    <form action="" method="post" id="admin_form" autocomplete="off">
                                    	<label for="ai_path">Nombre de la carpeta donde esta el tema a instalar:<br /><i><?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/themes/</i></label> <input type="text" id="ai_path" name="path" size="30" />
                                        <hr />
                                        <label>&nbsp;</label> <input type="submit" value="Instalar tema" class="mBtn btnOk">
                                    </form>
                                    <?php endif; ?>
                                </div>