<?php /* Smarty version 2.6.28, created on 2016-06-16 12:47:00
         compiled from modules/m.posts_content.tpl */ ?>
                	<div class="post-contenedor">	

                            <?php if (! $this->_tpl_vars['tsUser']->is_member): ?>
                            <div style="overflow: hidden;margin-bottom: 10px;">
                            
                            </div>
                            <?php endif; ?>				
                    	<div class="box_title">							
							<h1><?php echo $this->_tpl_vars['tsPost']['post_title']; ?>
</h1>                                         
                        </div>                        
						<div class="post-contenido">														                            
							<span>                            	
								<?php echo $this->_tpl_vars['tsPost']['post_body']; ?>
                            
							</span>                            
							<?php if ($this->_tpl_vars['tsPost']['user_firma'] && $this->_tpl_vars['tsConfig']['c_allow_firma']): ?>                            
							<hr class="divider" />                            
							<span>                            	
								<?php echo $this->_tpl_vars['tsPost']['user_firma']; ?>
                            
							</span>                            
							<?php endif; ?>
                        </div> 
                        	<?php if (! $this->_tpl_vars['tsUser']->is_member): ?>                          
							<div style="overflow: hidden;margin-top: 10px;">
                            
                            </div>  
                            <?php endif; ?>                  
						</div>	                    
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.posts_metadata.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>