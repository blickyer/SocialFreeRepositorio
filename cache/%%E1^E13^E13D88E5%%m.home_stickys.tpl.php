<?php /* Smarty version 2.6.28, created on 2016-06-16 07:25:58
         compiled from modules/m.home_stickys.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'modules/m.home_stickys.tpl', 11, false),array('modifier', 'truncate', 'modules/m.home_stickys.tpl', 11, false),)), $this); ?>
                    <?php if ($this->_tpl_vars['tsPostsStickys']): ?>
					<div class="bordes-ge" style="margin-bottom: 12px;">
					<div id="lastFotos" class="wMod clearbeta" style="margin-bottom: 0;">
                	<div class="header">
                    	<div class="wMod-h">Posts importantes en <?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
</div>
                       </div>
                    <div style="padding:0;margin-top: -5px;text-align:center;position:relative;overflow: hidden;">
                        <ul>
                        	<?php $_from = $this->_tpl_vars['tsPostsStickys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
                            <li <?php if ($this->_tpl_vars['p']['post_status'] == 3): ?>style="background-color:#f1f1f1;"<?php elseif ($this->_tpl_vars['p']['post_status'] == 1): ?>style="background-color:coral;"<?php elseif ($this->_tpl_vars['p']['post_status'] == 2): ?>style="background-color:rosyBrown;"<?php elseif ($this->_tpl_vars['p']['user_activo'] == 0): ?>style="background-color:burlyWood;"<?php elseif ($this->_tpl_vars['p']['user_baneado'] == 1): ?>style="background-color:orange;"<?php endif; ?> class="categoriaPost sticky<?php if ($this->_tpl_vars['p']['post_sponsored'] == 1): ?> patrocinado<?php endif; ?>">
                            <a <?php if ($this->_tpl_vars['p']['post_status'] == 3): ?>class="qtip" title="El post est&aacute; en revisi&oacute;n"<?php elseif ($this->_tpl_vars['p']['post_status'] == 1): ?>class="qtip" title="El post se encuentra en revisi&oacute;n por acumulaci&oacute;n de denuncias"<?php elseif ($this->_tpl_vars['p']['post_status'] == 2): ?>class="qtip" title="El post est&aacute; eliminado"<?php elseif ($this->_tpl_vars['p']['user_activo'] == 0): ?>class="qtip" title="La cuenta del usuario est&aacute; desactivada"<?php endif; ?>  href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['p']['c_seo']; ?>
/<?php echo $this->_tpl_vars['p']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html" style="" title="<?php echo $this->_tpl_vars['p']['post_title']; ?>
" target="_self" class="title"><img width="45" height="45" class="stycky-s" style="margin-top: -16px;float: left;position: relative;" class="Importante" title="<?php echo $this->_tpl_vars['p']['post_title']; ?>
" src="<?php if ($this->_tpl_vars['p']['post_portada']): ?><?php echo $this->_tpl_vars['p']['post_portada']; ?>
<?php else: ?><?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/mega/error.png<?php endif; ?>"/><span style="padding-left: 4px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 29) : smarty_modifier_truncate($_tmp, 29)); ?>
</span></a>
							<!-- Quitar el comentario para activar la imagen de usuario <img width="32" style="margin-top: -31px;border: 1px solid #CCC;padding: 1px;float: right;position: relative;" class="qtip" title="<?php echo $this->_tpl_vars['p']['user_name']; ?>
" src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['p']['user_id']; ?>
_120.jpg"/> -->
                            </li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    </div>
                    </div>
                    </div>
                    <?php endif; ?>