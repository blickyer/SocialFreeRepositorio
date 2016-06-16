<?php /* Smarty version 2.6.28, created on 2016-06-16 12:37:36
         compiled from modules/m.cuenta_perfil_fisico.tpl */ ?>
	                            <h3 onclick="cuenta.chgsec(this)">2. Como soy</h3>
                                <fieldset style="display: none">
                                    <div class="alert-cuenta cuenta-3">
                                    </div>
                                    <div class="field">
                                        <label for="altura">Mi altura</label>
                                        <div class="input-fake">
                                            <input type="text" value="<?php if ($this->_tpl_vars['tsPerfil']['p_altura']): ?><?php echo $this->_tpl_vars['tsPerfil']['p_altura']; ?>
<?php endif; ?>" maxlength="3" name="altura" id="altura" class="text cuenta-save-3">&nbsp;cent&iacute;metros					</div>
                                    </div>
                                    <div class="field">
                                        <label for="peso">Mi peso</label>
                                        <div class="input-fake">
                                            <input type="text" value="<?php if ($this->_tpl_vars['tsPerfil']['p_peso'] > 0): ?><?php echo $this->_tpl_vars['tsPerfil']['p_peso']; ?>
<?php endif; ?>" maxlength="3" name="peso" id="peso" class="text cuenta-save-3">&nbsp;kilogramos					</div>
                                    </div>
                                    <div class="field">
                                        <label for="pelo_color">Color de pelo</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-3" name="pelo_color" id="pelo_color">
                                            	<?php $_from = $this->_tpl_vars['tsPData']['pelo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
                                                <option value="<?php echo $this->_tpl_vars['val']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['p_pelo'] == $this->_tpl_vars['val']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['text']; ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="ojos_color">Color de ojos</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-3" name="ojos_color" id="ojos_color">
                                            	<?php $_from = $this->_tpl_vars['tsPData']['ojos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
                                                <option value="<?php echo $this->_tpl_vars['val']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['p_ojos'] == $this->_tpl_vars['val']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['text']; ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="fisico">Complexi&oacute;n</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-3" name="fisico" id="fisico">
                                            	<?php $_from = $this->_tpl_vars['tsPData']['fisico']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
                                                <option value="<?php echo $this->_tpl_vars['val']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['p_fisico'] == $this->_tpl_vars['val']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['text']; ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="dieta">Mi dieta es</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-3" name="dieta" id="dieta">
                                            	<?php $_from = $this->_tpl_vars['tsPData']['dieta']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
                                                <option value="<?php echo $this->_tpl_vars['val']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['p_dieta'] == $this->_tpl_vars['val']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['text']; ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Tengo</label>
                                        <div class="input-fake">
                                            <ul>
	                                            <?php $_from = $this->_tpl_vars['tsPData']['tengo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
                                                <li><input type="checkbox" name="t_<?php echo $this->_tpl_vars['val']; ?>
" class="cuenta-save-3" value="1" <?php if ($this->_tpl_vars['tsPerfil']['p_tengo'][$this->_tpl_vars['val']] == 1): ?>checked="checked"<?php endif; ?>><?php echo $this->_tpl_vars['text']; ?>
</li>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="fumo">Fumo</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-3" name="fumo" id="fumo">
                                            	<?php $_from = $this->_tpl_vars['tsPData']['fumo_tomo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
                                                <option value="<?php echo $this->_tpl_vars['val']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['p_fumo'] == $this->_tpl_vars['val']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['text']; ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="tomo_alcohol">Tomo alcohol</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-3" name="tomo_alcohol" id="tomo_alcohol">
                                            	<?php $_from = $this->_tpl_vars['tsPData']['fumo_tomo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
                                                <option value="<?php echo $this->_tpl_vars['val']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['p_tomo'] == $this->_tpl_vars['val']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['text']; ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <input type="button" value="Guardar y seguir" onclick="cuenta.save(3, true)" class="mBtn btnOk">
                                    </div>
                                </fieldset>