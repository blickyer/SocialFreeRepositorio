<?php /* Smarty version 2.6.28, created on 2016-06-16 12:43:15
         compiled from modules/m.fotos_home_content.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'modules/m.fotos_home_content.tpl', 13, false),array('modifier', 'truncate', 'modules/m.fotos_home_content.tpl', 27, false),array('modifier', 'date_format', 'modules/m.fotos_home_content.tpl', 29, false),)), $this); ?>
                <div id="centroDerecha" style="width: 630px; float: left;">
                	
					<div class="bordes-fotos"><div class="last-picks">&Uacute;ltimas fotos</div></div>
                    
					<ul class="fotos-detail listado-content">
                        
						<?php $_from = $this->_tpl_vars['tsLastFotos']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f']):
?>
                    	
						<li>
                        	
							<div class="fotos-home " style="z-index: 99;">
                            	
								<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/fotos/<?php echo $this->_tpl_vars['f']['user_name']; ?>
/<?php echo $this->_tpl_vars['f']['foto_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['f_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html">
                            		
									<img height="155" width="298" <?php if ($this->_tpl_vars['f']['f_status'] != 0 || $this->_tpl_vars['f']['user_activo'] == 0 || $this->_tpl_vars['f']['user_baneado'] == 1): ?>class="qtip" title="<?php if ($this->_tpl_vars['f']['f_status'] == 2): ?>Imagen eliminada<?php elseif ($this->_tpl_vars['f']['f_status'] == 1): ?>Imagen oculta por acumulaci&oacute;n de denuncias<?php elseif ($this->_tpl_vars['f']['user_activo'] == 0): ?>La cuenta del usuario est&aacute; desactivada<?php elseif ($this->_tpl_vars['f']['user_baneado'] == 1): ?>La cuenta del usuario est&aacute; suspendida<?php endif; ?>" style="border: 1px solid <?php if ($this->_tpl_vars['f']['f_status'] == 2): ?>rosyBrown<?php elseif ($this->_tpl_vars['f']['f_status'] == 1): ?>coral<?php elseif ($this->_tpl_vars['f']['user_activo'] == 0): ?>brown<?php elseif ($this->_tpl_vars['f']['user_baneado'] == 1): ?>orange<?php endif; ?>;opacity: 0.5;filter: alpha(opacity=50);"<?php endif; ?> src="<?php echo $this->_tpl_vars['f']['f_url']; ?>
"/>
									<div class="info-foto"><a href="#"><img class="qtip"  title="<?php echo $this->_tpl_vars['f']['f_title']; ?>
" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/mega/more.png"/></a></div>
								</a>
                            
							</div>
                            
							<div class="notification-info">
                            	
								<span>
                                    
									<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/fotos/<?php echo $this->_tpl_vars['f']['user_name']; ?>
/<?php echo $this->_tpl_vars['f']['foto_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['f_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html"></a>
                            		
										<span class="time"><?php if ($this->_tpl_vars['f']['f_description']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['f']['f_description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 94) : smarty_modifier_truncate($_tmp, 94)); ?>
<?php else: ?><?php echo $this->_tpl_vars['f']['f_title']; ?>
<?php endif; ?></span><hr />
									
									<span title="<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['f_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%y a las %H:%M hs.") : smarty_modifier_date_format($_tmp, "%d.%m.%y a las %H:%M hs.")); ?>
" class="time"><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['f']['f_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</strong><span style="float: right;">Publicado por <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['f']['user_name']; ?>
">&#64;<?php echo $this->_tpl_vars['f']['user_name']; ?>
</a></span></span>
                                    
                                
								</span>
                            
							</div>
                        
						</li>
                        
						<?php endforeach; endif; unset($_from); ?>
						
                    </ul>
					
				<div style="float: left;padding: 5px;border: 1px solid #E5E5E5;margin: 5px 4px;font-family: sans-serif;background: #FFFFFF;color: #9B9B9B;"><?php if ($this->_tpl_vars['tsLastFotos']['data'] > 10): ?>P&aacute;ginas: <?php echo $this->_tpl_vars['tsLastFotos']['pages']; ?>
<?php endif; ?></div>
					
                </div>