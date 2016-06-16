<?php /* Smarty version 2.6.28, created on 2016-06-16 12:47:03
         compiled from t.php_files/p.comentario.ajax.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'hace', 't.php_files/p.comentario.ajax.tpl', 38, false),)), $this); ?>
                        	<?php if ($this->_tpl_vars['tsComments']['num'] > 0): ?>
                        	
							<?php $_from = $this->_tpl_vars['tsComments']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
                        	
							<div id="div_cmnt_<?php echo $this->_tpl_vars['c']['cid']; ?>
" class="<?php if ($this->_tpl_vars['tsPost']['autor'] == $this->_tpl_vars['c']['c_user']): ?>especial1<?php elseif ($this->_tpl_vars['c']['c_user'] == $this->_tpl_vars['tsUser']->uid): ?>especial3<?php endif; ?> P_comments">
                            	
								<span id="citar_comm_<?php echo $this->_tpl_vars['c']['cid']; ?>
" style="display:none"><?php echo $this->_tpl_vars['c']['c_body']; ?>
</span>
                                
								<div class="comentario-post clearbeta">
                                	
									<div class="avatar-box" style="z-index: 99;">
                                    	
										<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['c']['user_name']; ?>
">
											
											<img width="48" height="48" title="Avatar de <?php echo $this->_tpl_vars['c']['user_name']; ?>
 en <?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
" src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['c']['c_user']; ?>
_50.jpg" class="avatar-48 lazy" style="position: relative; z-index: 1; display: inline;">
										
										</a>
                                        
										<?php if ($this->_tpl_vars['tsUser']->is_member && $this->_tpl_vars['tsUser']->info['user_id'] != $this->_tpl_vars['c']['c_user']): ?>
                                        
										<ul style="display: none;">
                                          
											<li class="enviar-mensaje"><a href="#" onclick="mensaje.nuevo('<?php echo $this->_tpl_vars['c']['user_name']; ?>
','','',''); return false">Enviar Mensaje <span></span></a></li>
                                            
											<li class="bloquear <?php if ($this->_tpl_vars['tsComments']['block']): ?>des<?php endif; ?>bloquear_1"><a href="javascript:bloquear(<?php echo $this->_tpl_vars['c']['c_user']; ?>
, <?php if ($this->_tpl_vars['tsComments']['block']): ?>false<?php else: ?>true<?php endif; ?>, 'comentarios')"><?php if ($this->_tpl_vars['tsComments']['block']): ?>Desbloquear<?php else: ?>Bloquear<?php endif; ?></a></li>
											
											</ul>
                                        
										<?php endif; ?>
                                    
									</div>
                                    
									<div class="comment-box" id="pp_<?php echo $this->_tpl_vars['c']['cid']; ?>
" <?php if ($this->_tpl_vars['c']['c_status'] == 1 || ! $this->_tpl_vars['c']['user_activo'] && $this->_tpl_vars['tsUser']->is_admod): ?>style="opacity:0.5"<?php endif; ?> >                                        
										<div class="comment-info clearbeta">                                        	
											<div class="floatL">                                            	
												<a style="color:#<?php echo $this->_tpl_vars['c']['r_color']; ?>
;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['c']['user_name']; ?>
" class="nick"><?php echo $this->_tpl_vars['c']['user_name']; ?>
</a> <?php if ($this->_tpl_vars['tsUser']->is_admod): ?>(<span style="color:red;">IP:</span> <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/moderacion/buscador/1/1/<?php echo $this->_tpl_vars['c']['c_ip']; ?>
" class="geoip" target="_blank"><?php echo $this->_tpl_vars['c']['c_ip']; ?>
</a>)<?php endif; ?> dijo
                                                
												<span><?php echo ((is_array($_tmp=$this->_tpl_vars['c']['c_date'])) ? $this->_run_mod_handler('hace', true, $_tmp) : smarty_modifier_hace($_tmp)); ?>
</span> :
                                            
											</div>
                                            
											<?php if ($this->_tpl_vars['tsUser']->is_member): ?>
                                            
											<div class="floatR answerOptions" id="opt_<?php echo $this->_tpl_vars['c']['cid']; ?>
">
                                            	
												<ul id="ul_cmt_<?php echo $this->_tpl_vars['c']['cid']; ?>
">
													
																										
													<li class="numbersvotes" <?php if ($this->_tpl_vars['c']['c_votos'] == 0): ?>style="display: none"<?php endif; ?>>
                            							
														<div class="overview">
                            								
															<span class="<?php if ($this->_tpl_vars['c']['c_votos'] >= 0): ?>positivo<?php else: ?>negativo<?php endif; ?>" id="votos_total_<?php echo $this->_tpl_vars['c']['cid']; ?>
"><?php if ($this->_tpl_vars['c']['c_votos'] != 0): ?><?php if ($this->_tpl_vars['c']['c_votos'] >= 0): ?>+<?php endif; ?><?php echo $this->_tpl_vars['c']['c_votos']; ?>
<?php endif; ?></span>
                            							
														</div>
                            						
													</li>
                                                    
													<?php if ($this->_tpl_vars['tsUser']->uid != $this->_tpl_vars['c']['c_user'] && $this->_tpl_vars['c']['votado'] == 0 && ( $this->_tpl_vars['tsUser']->permisos['govpp'] || $this->_tpl_vars['tsUser']->permisos['govpn'] || $this->_tpl_vars['tsUser']->is_admod )): ?>
                                                    
                                                    <?php if ($this->_tpl_vars['tsUser']->permisos['govpp'] || $this->_tpl_vars['tsUser']->is_admod): ?>
                                                    
													<li class="icon-thumb-up">
                                                        
														<a onclick="comentario.votar(<?php echo $this->_tpl_vars['c']['cid']; ?>
,1)">
                                                            
															<span class="voto-p-comentario"></span>
                                                        </a>
                                                    
													</li>
                                                    
                                                    <?php endif; ?>
                                                    
                                                    <?php if ($this->_tpl_vars['tsUser']->permisos['govpn'] || $this->_tpl_vars['tsUser']->is_admod): ?>
                                                    
													<li class="icon-thumb-down">
                                                        
														<a onclick="comentario.votar(<?php echo $this->_tpl_vars['c']['cid']; ?>
,-1)">
                                                            
															<span class="voto-n-comentario"></span>
                                                        </a>
                                                    
													</li>
                                                    
                                                    <?php endif; ?>
                                                    
													<?php endif; ?>
                                                    
														                                                
													<?php if ($this->_tpl_vars['tsUser']->is_member): ?>
                                                	
													<li class="answerCitar">
                                                    	
														<a onclick="citar_comment(<?php echo $this->_tpl_vars['c']['cid']; ?>
, '<?php echo $this->_tpl_vars['c']['user_name']; ?>
')" title="Citar">
                                                            
															<span class="citar-comentario"></span>
                                                        
														</a>
                                                    
													</li>
													
                                                    
													<?php if (( $this->_tpl_vars['c']['c_user'] == $this->_tpl_vars['tsUser']->uid && $this->_tpl_vars['tsUser']->permisos['goepc'] ) || $this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['moedcopo']): ?>
                                                	
													<li>
                                                    	
														<a onclick="comentario.editar(<?php echo $this->_tpl_vars['c']['cid']; ?>
, 'show')" title="Editar comentario">
                                                            
															<span class="<?php if ($this->_tpl_vars['c']['c_user'] == $this->_tpl_vars['tsUser']->uid): ?>editar<?php else: ?>moderar<?php endif; ?>-comentario"></span>
                                                        
														</a>
                                                    
													</li>
                                                    
													<?php endif; ?>
                                                    
													<?php if (( $this->_tpl_vars['c']['c_user'] == $this->_tpl_vars['tsUser']->uid && $this->_tpl_vars['tsUser']->permisos['godpc'] ) || $this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['moecp']): ?>
                                                    
													<li class="iconDelete">
                                                    	
														<a onclick="borrar_com(<?php echo $this->_tpl_vars['c']['cid']; ?>
, <?php echo $this->_tpl_vars['c']['c_user']; ?>
, <?php echo $this->_tpl_vars['c']['c_post_id']; ?>
)" title="Borrar">
															
															<span class="borrar-comentario"></span>
														
														</a>
                                                    
													</li>
													
													<?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['moaydcp']): ?>
													
													<li class="iconHide">
                                                    	
														<a onclick="ocultar_com(<?php echo $this->_tpl_vars['c']['cid']; ?>
, <?php echo $this->_tpl_vars['c']['c_user']; ?>
);" title="<?php if ($this->_tpl_vars['c']['c_status'] == 1): ?>Mostrar/Ocultar<?php else: ?>Ocultar/Mostrar<?php endif; ?>">
															
															<span class="moderar-comentario"></span>
														
														</a>
                                                    
													</li>
													
													<?php endif; ?>
                                                    
													<?php endif; ?>
                                                    
													<?php endif; ?>
                                                
												</ul>
                                            
											</div>
                                            
											<?php endif; ?>
                                        
										</div>
                                        
										<div id="comment-body-<?php echo $this->_tpl_vars['c']['cid']; ?>
" class="comment-content">
                                        	
											<?php if ($this->_tpl_vars['c']['c_votos'] <= -3 || $this->_tpl_vars['c']['c_status'] == 1 || ! $this->_tpl_vars['c']['user_activo'] || $this->_tpl_vars['c']['user_baneado']): ?><div>Escondido <?php if ($this->_tpl_vars['c']['c_status'] == 1): ?>por un moderador<?php elseif ($this->_tpl_vars['c']['c_votos'] <= -3): ?>por un puntaje bajo<?php elseif ($this->_tpl_vars['c']['user_activo'] == 0): ?>por pertener a una cuenta desactivada<?php else: ?>por pertenecer a una cuenta baneada<?php endif; ?>. <a href="#" onclick="$('#hdn_<?php echo $this->_tpl_vars['c']['cid']; ?>
').slideDown(); $(this).parent().slideUp(); return false;">Click para verlo</a>.</div>
                                            
											<div id="hdn_<?php echo $this->_tpl_vars['c']['cid']; ?>
" style="display:none"><?php endif; ?>
                                            
											<?php echo $this->_tpl_vars['c']['c_html']; ?>

                                            
											<?php if ($this->_tpl_vars['c']['c_votos'] <= -3 || $this->_tpl_vars['c']['c_status'] == 1 || ! $this->_tpl_vars['c']['user_activo']): ?></div><?php endif; ?>
											
                                        </div>
                                    
									</div>
                                
								</div>
                            
							</div>
                            
							<?php endforeach; endif; unset($_from); ?>
                            
							<?php else: ?>
                            	
								<div id="no-comments">Este post no tiene comentarios, S&eacute; el primero!</div>
                            
							<?php endif; ?>
                            
							<!---->
                            
							<div id="nuevos"></div>
                            
							<?php echo '
                            
							<script type="text/javascript">
                            
							$(function(){
                            
							var zIndexNumber = 99;
                                	
									$(\'div.avatar-box\').each(function(){
                                		
										$(this).css(\'zIndex\', zIndexNumber);
                                		
										zIndexNumber -= 1;
                                	
									});
                            
							});
                            
							</script>
                            
							'; ?>