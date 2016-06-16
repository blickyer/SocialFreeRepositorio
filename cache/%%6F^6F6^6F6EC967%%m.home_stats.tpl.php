<?php /* Smarty version 2.6.28, created on 2016-06-16 07:25:59
         compiled from modules/m.home_stats.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fecha', 'modules/m.home_stats.tpl', 6, false),)), $this); ?>
					<div style="margin-top:10px" id="webStats">
                        <div class="wMod clearbeta">
                            <div class="box_cuerpo">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                	<td style="text-align:center;color:#cf671c;"><span class="qtip" title="R&eacute;cord conectados: <?php echo $this->_tpl_vars['tsStats']['stats_max_online']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['tsStats']['stats_max_time'])) ? $this->_run_mod_handler('fecha', true, $_tmp) : smarty_modifier_fecha($_tmp)); ?>
"><span style="padding: 3px 9px;background:#F9F9F9;color: #cf671c;border-radius:5px;border:1px solid #BDBDBD;"><a class="usuarios_online" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/usuarios/?online=true" style="color: #16a5dd"><?php echo $this->_tpl_vars['tsStats']['stats_online']; ?>
</span> </span></a>Online
        	                        <span class="stats-mega"><a style="color:#16a5dd" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/usuarios/"><?php echo $this->_tpl_vars['tsStats']['stats_miembros']; ?>
</span> </a>Miembros
                                    <?php $_from = $this->_tpl_vars['tsUlt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
                                    <span class="stats-mega"><a class="hovercard" uid="<?php echo $this->_tpl_vars['m']['user_id']; ?>
" style="color:#16a5dd" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['m']['user_name']; ?>
">@<?php echo $this->_tpl_vars['m']['user_name']; ?>
</span> <?php endforeach; endif; unset($_from); ?></a>Ultimo Registrado
        	                        <span class="stats-mega"><?php echo $this->_tpl_vars['tsStats']['stats_posts']; ?>
</span> Posts
            	                    <span class="stats-mega"><?php echo $this->_tpl_vars['tsStats']['stats_comments']; ?>
</span> Comentarios
        	                        <span class="stats-mega"><?php echo $this->_tpl_vars['tsStats']['stats_fotos']; ?>
</span> Fotos
            	                    <span class="stats-mega"><?php echo $this->_tpl_vars['tsStats']['stats_foto_comments']; ?>
</span> Comentarios en fotos
								</td></tr>
                            </table>
                            </div>
                        </div>
                    </div>