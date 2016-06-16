<?php /* Smarty version 2.6.26, created on 2016-02-28 11:38:09
         compiled from sections/main_submenu.tpl */ ?>
<div class="submenu">
	<a <?php if ($this->_tpl_vars['tsPage'] == 'home'): ?>class="active"<?php endif; ?> href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/">Recientes</a>
    <a <?php if ($this->_tpl_vars['tsPage'] == 'tops'): ?>class="active"<?php endif; ?> href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/top/posts/">Tops</a>
    <?php if ($this->_tpl_vars['tsUser']->is_member): ?><a <?php if ($this->_tpl_vars['tsPage'] == 'favoritos'): ?>class="active"<?php endif; ?> href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/favoritos/">Favoritos</a><?php endif; ?>
</div>