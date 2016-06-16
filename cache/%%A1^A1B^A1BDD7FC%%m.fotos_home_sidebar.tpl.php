<?php /* Smarty version 2.6.28, created on 2016-06-16 12:43:15
         compiled from modules/m.fotos_home_sidebar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'modules/m.fotos_home_sidebar.tpl', 7, false),array('modifier', 'truncate', 'modules/m.fotos_home_sidebar.tpl', 7, false),)), $this); ?>
                <div style="font-family: sans-serif;width: 300px; float: right;" id="post-izquierda">
                   <div style="margin-bottom: 10px;" class="bordes-ge">
				 <div class="titulos-fotos">&Uacute;ltimos comentarios</div>
                    <div style="border-top: none;margin-bottom: 0;" class="categoriaList">
                        <ul>
                            <?php $_from = $this->_tpl_vars['tsLastComments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
                            <li class="fotos-coments"><img style="" src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['c']['c_user']; ?>
_50.jpg" class="avatar-coments" /><strong style="margin-left:5px;vertical-align: middle;"><?php if ($this->_tpl_vars['tsUser']->is_admod && $this->_tpl_vars['tsConfig']['c_see_mod'] == 1 && $this->_tpl_vars['tsFoto']['f_status'] != 0 || $this->_tpl_vars['tsFoto']['user_activo'] == 0): ?><span style="color: #1F9494;" class="qtip" title="<?php if ($this->_tpl_vars['c']['user_activo'] == 0): ?>El autor del comentario tiene la cuenta desactivada <?php elseif ($this->_tpl_vars['c']['f_status'] == 1): ?> La foto se encuentra oculta <?php elseif ($this->_tpl_vars['c']['f_status'] == 2): ?> La foto se encuentra eliminada<?php endif; ?>"><?php endif; ?><?php echo $this->_tpl_vars['tsUser']->getUsername($this->_tpl_vars['c']['c_user']); ?>
<?php if ($this->_tpl_vars['c']['user_activo'] == 0 || $this->_tpl_vars['c']['f_status'] != 0 && $this->_tpl_vars['tsUser']->is_admod): ?></span><?php endif; ?></strong> <a style="font-size:11px;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/fotos/<?php echo $this->_tpl_vars['c']['user_name']; ?>
/<?php echo $this->_tpl_vars['c']['foto_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['c']['f_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html#div_cmnt_<?php echo $this->_tpl_vars['c']['cid']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['c']['f_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 34) : smarty_modifier_truncate($_tmp, 34)); ?>
</a></li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    </div>
                   </div>
                    <center><?php echo $this->_tpl_vars['tsConfig']['ads_300']; ?>
</center>
                    <br />
			<div style="margin-bottom: 10px;" class="bordes-ge">
				 <div class="titulos-fotos">Estad&iacute;sticas</div>
                    <div style="margin-bottom: 0;border-top: none;" class="categoriaList estadisticasList">
                        <ul>
                            <li class="clearfix"><a href="#"><span class="floatL">Miembros</span><span class="floatR number"><?php echo $this->_tpl_vars['tsStats']['stats_miembros']; ?>
</span></a></li>
                            <li class="clearfix"><a href="#"><span class="floatL">Fotos</span><span class="floatR number"><?php echo $this->_tpl_vars['tsStats']['stats_fotos']; ?>
</span></a></li>
                            <li class="clearfix"><a href="#"><span class="floatL">Comentarios</span><span class="floatR number"><?php echo $this->_tpl_vars['tsStats']['stats_foto_comments']; ?>
</span></a></li>
                        </ul>
                    </div>
                </div>
                </div>