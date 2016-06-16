<?php /* Smarty version 2.6.28, created on 2016-06-16 12:37:36
         compiled from modules/m.cuenta_perfil_me.tpl */ ?>
	                            <h3 class="active" onclick="cuenta.chgsec(this)">1. M&aacute;s sobre mi</h3>
								<fieldset>
                                    <div class="alert-cuenta cuenta-2">
                                    </div>
                                    <div class="field">
                                        <label for="nombrez">Nombre completo</label>
                                        <input type="text" value="<?php echo $this->_tpl_vars['tsPerfil']['p_nombre']; ?>
" maxlength="60" name="nombrez" id="nombrez" class="text cuenta-save-2" style="width:230px">
                                    </div>
                                    <div class="field">
                                        <label for="sitio">Mensaje Personal</label>
                                        <textarea value="" maxlength="60" name="mensaje" id="mensaje" class="cuenta-save-2"><?php echo $this->_tpl_vars['tsPerfil']['p_mensaje']; ?>
</textarea>
                                    </div>
                                    <div class="field">
                                        <label for="sitio">Sitio Web</label>
                                        <input type="text" value="<?php echo $this->_tpl_vars['tsPerfil']['p_sitio']; ?>
" maxlength="60" name="sitio" id="sitio" class="text cuenta-save-2" style="width:230px">
                                    </div>
<div class="field">

<label for="sitio">Cabecera de Perfil:<br /><font color="red"><span>url de una imagen mayor a 1000 x 230</span></font></label><br />

<input type="text" value="<?php echo $this->_tpl_vars['tsPerfil']['p_fondoper']; ?>
" maxlength="120" name="fondoper" id="sitio" class="text cuenta-save-2" style="width:230px">

</div>
                                    <div class="field">
                                        <label for="ft">Redes sociales</label>
                                        <img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/facebook.png" width="16" height="16" style="margin:5px; float:left" />
                                        <strong>facebook.com/</strong><input type="text" value="<?php echo $this->_tpl_vars['tsPerfil']['p_socials']['f']; ?>
" maxlength="64" name="facebook" id="ft" class="text cuenta-save-2" style="width:204px"><br />
                                        <img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/twitter.png" width="16" height="16" style="margin:8px 5px 5px 160px; float:left" />
                                        <strong>twitter.com/</strong><input type="text" value="<?php echo $this->_tpl_vars['tsPerfil']['p_socials']['t']; ?>
" maxlength="64" name="twitter" id="ft2" class="text cuenta-save-2" style="margin-top:3px; width:204px"><br />
                                         <img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/ico_youtube.png" width="16" height="16" style="margin:8px 5px 5px 160px; float:left" />
                                         <strong>youtube.com/channel/</strong><input type="text" value="<?php echo $this->_tpl_vars['tsPerfil']['p_socials']['yt']; ?>
" maxlength="64" name="youtuber" id="ft2" class="text cuenta-save-2" style="margin-top:3px; width:204px"><br />
                                        <img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/steam.png" width="16" height="16" style="margin:8px 5px 5px 160px; float:left" />
                                        <strong>steamcommunity.com/id/</strong><input type="text" value="<?php echo $this->_tpl_vars['tsPerfil']['p_steam']; ?>
" maxlength="64" name="steam" id="ft2" class="text cuenta-save-2"  style="margin-top:3px; width:204px"><br />
                                        <img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/skype.gif" width="16" height="16" style="margin:8px 5px 5px 160px; float:left" />
                                        <strong>skype.com/</strong><input type="text" value="<?php echo $this->_tpl_vars['tsPerfil']['p_skype']; ?>
" maxlength="64" name="skype" id="ft2" class="text cuenta-save-2" style="margin-top:3px; width:204px"><br />
                                    </div>
                                    <div class="field">
                                        <label>Me gustar&iacute;a</label>
                                        <div class="input-fake">
                                            <ul>
                                            	<?php $_from = $this->_tpl_vars['tsPData']['gustos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
                                                <li><input type="checkbox" name="g_<?php echo $this->_tpl_vars['val']; ?>
" class="cuenta-save-2" value="1" <?php if ($this->_tpl_vars['tsPerfil']['p_gustos'][$this->_tpl_vars['val']] == 1): ?>checked="checked"<?php endif; ?>><?php echo $this->_tpl_vars['text']; ?>
</li>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="estado">Estado Civil</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-2" name="estado" id="estado">
                                            	<?php $_from = $this->_tpl_vars['tsPData']['estado']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
                                                <option value="<?php echo $this->_tpl_vars['val']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['p_estado'] == $this->_tpl_vars['val']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['text']; ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="hijos">Hijos</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-2" name="hijos" id="hijos">
                                            	<?php $_from = $this->_tpl_vars['tsPData']['hijos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
                                                <option value="<?php echo $this->_tpl_vars['val']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['p_hijos'] == $this->_tpl_vars['val']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['text']; ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="vivo">Vivo con</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-2" name="vivo" id="vivo">
                                            	<?php $_from = $this->_tpl_vars['tsPData']['vivo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
                                                <option value="<?php echo $this->_tpl_vars['val']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['p_vivo'] == $this->_tpl_vars['val']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['text']; ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <input type="button" value="Guardar y seguir" onclick="cuenta.save(2, true)" class="mBtn btnOk">
                                    </div>
                                </fieldset>