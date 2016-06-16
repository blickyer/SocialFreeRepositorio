<?php /* Smarty version 2.6.28, created on 2016-06-16 12:36:15
         compiled from t.php_files/p.perfil.follows.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', 't.php_files/p.perfil.follows.tpl', 16, false),)), $this); ?>
1:
<?php if ($this->_tpl_vars['tsHide'] != 'true'): ?><div id="perfil_<?php echo $this->_tpl_vars['tsType']; ?>
" class="widget" status="activo"><?php endif; ?>
	<div class="title-w clearfix">
        <h2><?php if ($this->_tpl_vars['tsType'] == 'seguidores'): ?>Usuarios que siguen a <?php echo $this->_tpl_vars['tsUsername']; ?>
<?php else: ?>Usuarios que <?php echo $this->_tpl_vars['tsUsername']; ?>
 sigue<?php endif; ?></h2>
    </div>
    <?php if ($this->_tpl_vars['tsData']['data']): ?>
    <ul style="font-family: sans-serif;border: 1px solid #E8E8E8;" class="listado">
        <?php $_from = $this->_tpl_vars['tsData']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['u']):
?>
        <li class="clearfix">
        	<div class="listado-content clearfix">
        		<div class="listado-avatar">
        			<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['u']['user_name']; ?>
"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['u']['user_id']; ?>
_50.jpg" width="32" height="32"/></a>
        		</div>
        		<div class="txt">
        			<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['u']['user_name']; ?>
"><?php echo $this->_tpl_vars['u']['user_name']; ?>
</a><br>
        			<img src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/flags/<?php echo ((is_array($_tmp=$this->_tpl_vars['u']['user_pais'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
.png"/> <span class="grey"><?php echo $this->_tpl_vars['u']['p_mensaje']; ?>
</span>
        		</div>
        	</div>
        </li>
        <?php endforeach; endif; unset($_from); ?>
        <li class="listado-paginador clearfix">
    		<?php if ($this->_tpl_vars['tsData']['pages']['prev'] != 0): ?><a href="#" onclick="perfil.follows('<?php echo $this->_tpl_vars['tsType']; ?>
', <?php echo $this->_tpl_vars['tsData']['pages']['prev']; ?>
); return false;" class="anterior-listado floatL">Anterior</a><?php endif; ?>
    		<?php if ($this->_tpl_vars['tsData']['pages']['next'] != 0): ?><a href="#" onclick="perfil.follows('<?php echo $this->_tpl_vars['tsType']; ?>
', <?php echo $this->_tpl_vars['tsData']['pages']['next']; ?>
); return false;" class="siguiente-listado floatR">Siguiente</a><?php endif; ?>
        </li>
    </ul>
    <?php else: ?>
    <div class="emptyData"><?php if ($this->_tpl_vars['tsType'] == 'seguidores'): ?>No tiene seguidores<?php else: ?>No sigue usuarios<?php endif; ?></div>
    <?php endif; ?>    
<?php if ($this->_tpl_vars['tsHide'] != 'true'): ?></div><?php endif; ?>