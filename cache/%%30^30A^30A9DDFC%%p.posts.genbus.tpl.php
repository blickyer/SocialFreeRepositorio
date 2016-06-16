<?php /* Smarty version 2.6.28, created on 2016-06-16 12:46:27
         compiled from t.php_files/p.posts.genbus.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 't.php_files/p.posts.genbus.tpl', 4, false),)), $this); ?>
<?php if ($this->_tpl_vars['tsDo'] == 'search' && $this->_tpl_vars['tsPosts']): ?>
<div class="emptyData" style="padding:5px; margin:5px 0">Parece que existen posts similares al que quieres agregar, te recomendamos leerlos antes para evitar un repost.</div>
| <?php $_from = $this->_tpl_vars['tsPosts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
&bull; <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['p']['c_seo']; ?>
/<?php echo $this->_tpl_vars['p']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html" target="_blank"><b><?php echo $this->_tpl_vars['p']['post_title']; ?>
</b></a> &bull; | 
<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
<?php echo $this->_tpl_vars['tsTags']; ?>

<?php endif; ?>