<?php /* Smarty version 2.6.28, created on 2016-06-16 12:37:53
         compiled from t.php_files/p.notificaciones.ajax.tpl */ ?>
    <?php if ($this->_tpl_vars['tsData']): ?>
	<?php $_from = $this->_tpl_vars['tsData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['noti']):
?>
   	<li<?php if ($this->_tpl_vars['noti']['unread'] > 0): ?>  class="unread"<?php endif; ?>><span class="monac_icons ma_<?php echo $this->_tpl_vars['noti']['style']; ?>
"></span><?php if ($this->_tpl_vars['noti']['total'] == 1): ?><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['noti']['user']; ?>
" title="<?php echo $this->_tpl_vars['noti']['user']; ?>
"><?php echo $this->_tpl_vars['noti']['user']; ?>
</a><?php endif; ?> <?php echo $this->_tpl_vars['noti']['text']; ?>
 <a title="<?php echo $this->_tpl_vars['noti']['ltit']; ?>
" class="obj" href="<?php echo $this->_tpl_vars['noti']['link']; ?>
"><?php echo $this->_tpl_vars['noti']['ltext']; ?>
</a></li>
    <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    <li style="padding:10px;"><b>No hay notificaciones</b></li>
    <?php endif; ?>