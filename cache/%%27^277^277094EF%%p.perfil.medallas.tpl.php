<?php /* Smarty version 2.6.28, created on 2016-06-16 12:36:18
         compiled from t.php_files/p.perfil.medallas.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'hace', 't.php_files/p.perfil.medallas.tpl', 12, false),)), $this); ?>
1:
<div id="perfil_medallas" class="widget" status="activo">
	<div class="title-w clearfix">
        <h2>Medallas de <?php echo $this->_tpl_vars['tsUsername']; ?>
 (<?php echo $this->_tpl_vars['tsMedallas']['total']; ?>
)</h2>
    </div>
    <?php if ($this->_tpl_vars['tsMedallas']['medallas']): ?>
        <ul style="border: 1px solid #E8E8E8;font-family: sans-serif;" class="listado">
        <?php $_from = $this->_tpl_vars['tsMedallas']['medallas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
        <li class="clearfix">
        	<div class="listado-content clearfix">
        		<div class="listado-avatar">
        			<img src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/med/<?php echo $this->_tpl_vars['m']['m_image']; ?>
_32.png" class="qtip" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['m']['medal_date'])) ? $this->_run_mod_handler('hace', true, $_tmp, true) : smarty_modifier_hace($_tmp, true)); ?>
" width="32" height="32"/>

        		</div>
        		<div class="txt">
        			<strong><?php echo $this->_tpl_vars['m']['m_title']; ?>
</strong><br />
					<?php echo $this->_tpl_vars['m']['m_description']; ?>

        		</div>
        	</div>
        </li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
        <?php else: ?>
        <div class="emptyData">No tiene medallas</div>
        <?php endif; ?>
</div>