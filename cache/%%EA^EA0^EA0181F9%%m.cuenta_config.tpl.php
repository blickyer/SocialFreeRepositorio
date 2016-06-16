<?php /* Smarty version 2.6.28, created on 2016-06-16 12:37:37
         compiled from modules/m.cuenta_config.tpl */ ?>
							<div class="content-tabs privacidad" style="display:none">
                                
								<fieldset>
                                    
									<div class="alert-cuenta cuenta-7"></div>
                                    
									<h2 class="active">&iquest;Qui&eacute;n puede...</h2>
                                    
									<div class="field">
                    					
										<label>ver tu muro?</label>
                    					
										<div class="input-fake">
                    						
											<select name="muro" class="cuenta-save-7">
                                                
												<?php $_from = $this->_tpl_vars['tsPrivacidad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['p']):
?>
                                                
												<option value="<?php echo $this->_tpl_vars['i']; ?>
"<?php if ($this->_tpl_vars['tsPerfil']['p_configs']['m'] == $this->_tpl_vars['i']): ?> selected="true"<?php endif; ?>><?php echo $this->_tpl_vars['p']; ?>
</option>
                                                
												<?php endforeach; endif; unset($_from); ?>
                    						
											</select>
                    					
										</div>
                    				
									</div>
                                    
									<?php echo $this->_tpl_vars['tsPerfil']['p_configs']['muro']; ?>

                                    
									<div class="field">
                    					
										<label>firmar tu muro?</label>
                    					
										<div class="input-fake">
                    						
											<select name="muro_firm" class="cuenta-save-7">
                                                
												<?php $_from = $this->_tpl_vars['tsPrivacidad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['p']):
?>
                                                
												<?php if ($this->_tpl_vars['i'] != 6): ?><option value="<?php echo $this->_tpl_vars['i']; ?>
"<?php if ($this->_tpl_vars['tsPerfil']['p_configs']['mf'] == $this->_tpl_vars['i']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['p']; ?>
</option><?php endif; ?>
                                                
												<?php endforeach; endif; unset($_from); ?>
                    						
											</select>
                    					
										</div>
                    				
									</div>
									                                    
									<div class="field">
                    					
										<label>ver &uacute;ltimas visitas?</label>
                    					
										<div class="input-fake">
                    						
											<select name="last_hits" class="cuenta-save-7">
                                                
												<?php $_from = $this->_tpl_vars['tsPrivacidad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['p']):
?>
                                                
												<?php if ($this->_tpl_vars['i'] != 1 && $this->_tpl_vars['i'] != 2): ?><option value="<?php echo $this->_tpl_vars['i']; ?>
"<?php if ($this->_tpl_vars['tsPerfil']['p_configs']['hits'] == $this->_tpl_vars['i']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['p']; ?>
</option><?php endif; ?>
                                                
												<?php endforeach; endif; unset($_from); ?>
                    						
											</select>
                    					
										</div>
                    				
									</div>
									
									<?php if (! $this->_tpl_vars['tsUser']->is_admod): ?>
									
									<?php if ($this->_tpl_vars['tsPerfil']['p_configs']['rmp'] != 8): ?>
									
									<div class="field">
                    					
										<label>enviarte MPs?</label>
                    					
										<div class="input-fake">
                    						
											<select name="rec_mps" class="cuenta-save-7">
                                                
												<?php $_from = $this->_tpl_vars['tsPrivacidad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['p']):
?>
                                                
												<?php if ($this->_tpl_vars['i'] != 6): ?><option value="<?php echo $this->_tpl_vars['i']; ?>
"<?php if ($this->_tpl_vars['tsPerfil']['p_configs']['rmp'] == $this->_tpl_vars['i']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['p']; ?>
</option><?php endif; ?>
                                                
												<?php endforeach; endif; unset($_from); ?>
                    						
											</select>
                    					
										</div>
                    				
									</div>
									
									<?php else: ?>
									
									<div class="mensajes error">Algunas opciones de su privacidad han sido deshabilitadas, contacte con la administraci&oacute;n.</div>
									
									<?php endif; ?>
									
									<?php endif; ?>
                                
								</fieldset>
									
									<?php if (! $this->_tpl_vars['tsUser']->is_admod): ?>
									<a onclick="$('#primi').slideUp(); $('#passi').slideDown(); $('#informa').slideDown(); $('#btninforma').slideDown();" id="primi">Desactivar Cuenta</a>
									
									<p style="display:none;" id="informa"> Si desactiva su cuenta, todo el contenido relacionado a usted dejar&aacute; de ser visible durante un tiempo. 
									Pasado ese tiempo, la administraci&oacute;n borrar&aacute; todo su contenido y no podr&aacute; recuperarlo.</p>
																		
									<a onclick="desactivate()" style="display:none;" id="btninforma"><input type="button" value="Lo s&eacute;, pero quiero desactivarla" style="position:right;" class="mBtn btnDelete"></a>
									<?php endif; ?>
									
								<div class="buttons">
                                    
									<input type="button" value="Guardar" onclick="cuenta.save(7)" class="mBtn btnOk">
                                
								</div>
                                
								<div class="clearfix"></div>
                            
							</div>