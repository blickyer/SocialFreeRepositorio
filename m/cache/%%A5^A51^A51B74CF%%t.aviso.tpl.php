<?php /* Smarty version 2.6.26, created on 2016-03-26 05:02:14
         compiled from t.aviso.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h1 class="Titulo" align="center"><?php echo $this->_tpl_vars['tsAviso']['titulo']; ?>
</h1>
<div class="modal modal-alerta" style="display: block;">
<p><?php echo $this->_tpl_vars['tsAviso']['mensaje']; ?>
</p>
<?php if ($this->_tpl_vars['tsAviso']['but']): ?>
<button onclick="location.href='<?php if ($this->_tpl_vars['tsAviso']['link']): ?><?php echo $this->_tpl_vars['tsAviso']['link']; ?>
<?php else: ?><?php echo $this->_tpl_vars['tsConfig']['url']; ?>
<?php endif; ?>'" class="btn_blue"><?php echo $this->_tpl_vars['tsAviso']['but']; ?>
</button>
<?php endif; ?>
<?php if ($this->_tpl_vars['tsAviso']['return']): ?>
<button onclick="history.go(-<?php echo $this->_tpl_vars['tsAviso']['return']; ?>
)" <?php if (! $this->_tpl_vars['tsAviso']['but']): ?>class="btn_blue"<?php endif; ?>>Volver</button>
<?php endif; ?>
</div>                
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>