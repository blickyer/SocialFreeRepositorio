<?php /* Smarty version 2.6.28, created on 2016-06-16 12:37:37
         compiled from modules/m.cuenta_nick.tpl */ ?>
							<div class="content-tabs cambiar-nick" style="display:none">
                            	<fieldset>
                                    <div class="alert-cuenta cuenta-8">
									</div>
									<?php if ($this->_tpl_vars['tsUser']->info['user_name_changes'] > 0): ?>
									<p>Hola <?php echo $this->_tpl_vars['tsUser']->nick; ?>
, le recordamos que dispone de <?php echo $this->_tpl_vars['tsUser']->info['user_name_changes']; ?>
 cambios este a&ntilde;o.
									Recuerde que si su cambio no es aprobado, no se le devolver&aacute; la disponibilidad de otro cambio.</p>
                                    <div class="field">
                                        <label for="new_nick">Nombre de usuario</label>
                                        <input type="text" value="<?php echo $this->_tpl_vars['tsUser']->nick; ?>
" maxlength="15" name="new_nick" id="new_nick" class="text cuenta-save-8"/>
                                    </div>
									<div class="field">
                                        <label for="password">Contrase&ntilde;a actual:</label>
                                        <input type="password" maxlength="32" name="password" id="password" class="text cuenta-save-8"/>
                                    </div>
									<div class="field">
                                        <label for="pemail">Recibir respuesta en</label>
                                        <div class="input-fake input-hide-pemail">
                                            <?php echo $this->_tpl_vars['tsUser']->info['user_email']; ?>
 (<a onclick="input_fake('pemail')">Cambiar</a>)
                                    </div>
                                        <input type="text" style="display: none" value="<?php echo $this->_tpl_vars['tsUser']->info['user_email']; ?>
" maxlength="35" name="pemail" id="pemail" class="text cuenta-save-8 input-hidden-pemail">
                                    </div>
                                </fieldset>
                                <div class="buttons">
                                    <input type="button" value="Guardar" onclick="cuenta.save(8)" class="mBtn btnOk"/>
                                </div>
								<?php else: ?>
								<p>Hola <?php echo $this->_tpl_vars['tsUser']->nick; ?>
, lamentamos informarle de su nula disponibilidad de cambios, contacte con la administraci&oacute;n o espere un a&ntilde;o.
								<?php endif; ?>
                                <div class="clearfix"></div>
                            </div>