<?php /* Smarty version 2.6.28, created on 2016-06-16 07:25:58
         compiled from modules/m.home_last_comments.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'modules/m.home_last_comments.tpl', 12, false),array('modifier', 'seo', 'modules/m.home_last_comments.tpl', 13, false),array('modifier', 'truncate', 'modules/m.home_last_comments.tpl', 14, false),)), $this); ?>
					<div id="lastCommBox">
                        <div class="box_title">
                            <div class="box_txt estadisticas">&Uacute;ltimos comentarios</div>
                            <div class="box_rss">
                            	<a onclick="actualizar_comentarios('-1','0'); return false;" class="size9" href="#"><span class="systemicons actualizar"></span></a>
                            </div>
                        </div>
                        <div class="box_cuerpo" id="ult_comm" style="padding: 0pt; height: 404px;">
                            <ol id="filterByTodos" class="filterBy cleanlist" style="display:block;">
                            	<?php $_from = $this->_tpl_vars['tsComments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['c']):
?>
								<li>
									<?php if ($this->_tpl_vars['c']['post_status'] != 0 || $this->_tpl_vars['c']['user_activo'] == 0 || $this->_tpl_vars['c']['user_baneado'] || $this->_tpl_vars['c']['c_status'] != 0): ?><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['c']['user_name']; ?>
/"><strong style="color: <?php if ($this->_tpl_vars['c']['post_status'] == 3): ?> #BBB <?php elseif ($this->_tpl_vars['c']['post_status'] == 1): ?> purple <?php elseif ($this->_tpl_vars['c']['post_status'] == 2): ?> rosyBrown <?php elseif ($this->_tpl_vars['c']['c_status'] == 1): ?> coral<?php elseif ($this->_tpl_vars['c']['user_activo'] == 0): ?> brown <?php elseif ($this->_tpl_vars['c']['user_baneado'] == 1): ?> orange <?php endif; ?>;" class="qtip" title="<?php if ($this->_tpl_vars['c']['post_status'] == 3): ?> El post se encuentra en revisi&oacute;n<?php elseif ($this->_tpl_vars['c']['post_status'] == 1): ?> El post se encuentra oculto por acumulaci&oacute;n de denuncias <?php elseif ($this->_tpl_vars['c']['post_status'] == 2): ?> El post se encuentra eliminado <?php elseif ($this->_tpl_vars['c']['c_status'] == 1): ?> El comentario est&aacute; oculto<?php elseif ($this->_tpl_vars['c']['user_activo'] == 0): ?>El autor del comentario tiene la cuenta desactivada<?php elseif ($this->_tpl_vars['c']['user_baneado'] == 1): ?>El autor del comentario tiene la cuenta suspendida<?php endif; ?>"><?php echo $this->_tpl_vars['c']['user_name']; ?>
</strong></a><?php else: ?><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['c']['user_name']; ?>
/"><strong style="font-family: sans-serif;color: #424242;"> <img style="" src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['c']['user_id']; ?>
_50.jpg?<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y%m%d%H%M%S") : smarty_modifier_date_format($_tmp, "%Y%m%d%H%M%S")); ?>
" class="avatar-coments" /><strong style="color: #16A5DD;margin-left:5px;"><?php echo $this->_tpl_vars['c']['user_name']; ?>
</strong></strong></a> <?php endif; ?>
                                    <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['c']['c_seo']; ?>
/<?php echo $this->_tpl_vars['c']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['c']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html#comentarios-abajo" class="size10">
                                    <?php echo ((is_array($_tmp=$this->_tpl_vars['c']['post_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 45) : smarty_modifier_truncate($_tmp, 45)); ?>
</a>
                                </li>
                                <?php endforeach; endif; unset($_from); ?>
                            </ol>
                        </div>
                        <br class="space"/>
                    </div>