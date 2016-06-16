<?php /* Smarty version 2.6.28, created on 2016-06-16 12:37:36
         compiled from modules/m.cuenta_perfil_job.tpl */ ?>
	                            <h3 onclick="cuenta.chgsec(this)">3. Formaci&oacute;n y trabajo</h3>
                                <fieldset style="display: none">
                                    <div class="alert-cuenta cuenta-4">
                                    </div>
                                    <div class="field">
                                        <label for="estudios">Estudios</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-4" name="estudios" id="estudios">
                                            	<?php $_from = $this->_tpl_vars['tsPData']['estudios']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
                                                <option value="<?php echo $this->_tpl_vars['val']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['p_estudios'] == $this->_tpl_vars['val']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['text']; ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Idiomas</label>
                                        <div class="input-fake">
                                            <ul>
                                            	<?php $_from = $this->_tpl_vars['tsPData']['idiomas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iid'] => $this->_tpl_vars['idioma']):
?>
                                                <li>
                                                    <span class="label-id"><?php echo $this->_tpl_vars['idioma']; ?>
</span>
                                                    <select class="cuenta-save-4" name="idioma_<?php echo $this->_tpl_vars['iid']; ?>
">
                                                        <?php $_from = $this->_tpl_vars['tsPData']['inivel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
                                                        <option value="<?php echo $this->_tpl_vars['val']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['p_idiomas'][$this->_tpl_vars['iid']] == $this->_tpl_vars['val']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['text']; ?>
</option>
                                                        <?php endforeach; endif; unset($_from); ?>
                                                    </select>
                                                </li>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </ul>
                                        </div>
                                    </div> 
                                    <div class="field">
                                        <label for="profesion">Profesi&oacute;n</label>
                                        <input class="text cuenta-save-4" maxlength="32" name="profesion" id="profesion" value="<?php echo $this->_tpl_vars['tsPerfil']['p_profesion']; ?>
"/>
                                    </div>
                                    <div class="field">
                                        <label for="empresa">Empresa</label>
                                        <input class="text cuenta-save-4" maxlength="32" name="empresa" id="empresa" value="<?php echo $this->_tpl_vars['tsPerfil']['p_empresa']; ?>
"/>
                                    </div>
                                    <div class="field">
                                        <label for="sector">Sector</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-4" name="sector" id="sector">
                                                <?php $_from = $this->_tpl_vars['tsPData']['sector']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
                                                <option value="<?php echo $this->_tpl_vars['val']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['p_sector'] == $this->_tpl_vars['val']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['text']; ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="ingresos">Nivel de ingresos</label>
                                        <div class="input-fake">
                                            <select class="cuenta-save-4" name="ingresos" id="ingresos">
                                                <?php $_from = $this->_tpl_vars['tsPData']['ingresos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
                                                <option value="<?php echo $this->_tpl_vars['val']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['p_ingresos'] == $this->_tpl_vars['val']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['text']; ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="intereses_profesionales">Intereses Profesionales</label>
                                        <div class="input-fake">
                                            <textarea class="cuenta-save-4" name="intereses_profesionales" id="intereses_profesionales"><?php echo $this->_tpl_vars['tsPerfil']['p_int_prof']; ?>
</textarea>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="habilidades_profesionales">Habilidades Profesionales</label>
                                        <div class="input-fake">
                                            <textarea class="cuenta-save-4" name="habilidades_profesionales" id="habilidades_profesionales"><?php echo $this->_tpl_vars['tsPerfil']['p_hab_prof']; ?>
</textarea>
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <input type="button" value="Guardar y seguir" onclick="cuenta.save(4, true)" class="mBtn btnOk">
                                    </div>
                                </fieldset>