<?php /* Smarty version 2.6.26, created on 2016-02-28 11:55:06
         compiled from t.tops.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
var totalPosts = <?php echo $this->_tpl_vars['tsPosts']['total']; ?>
;
//<?php echo '
$(function(){
	$(window).scroll(function(){
		var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
		var scrolltrigger = 0.95;
		if ((wintop / (docheight - winheight)) > scrolltrigger) {
			//'; ?>

			$('.load-more').click();
			// <?php echo '
		}
	 });
	 $("img.plazyload").lazyload();
});
//'; ?>

</script>
<h1 class="Titulo">Top posts</h1>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_submenu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['tsAction'] == 'posts'): ?>
<div class="category-filter">
    <select onchange="document.location.href='<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/top/posts/?cat=' + $(this).val()">
        <option selected="selected" value="root">Seleccionar categoría</option>
        <option value="<?php if ($this->_tpl_vars['tsConfig']['c_allow_portal'] == 0): ?>-1<?php else: ?>-2<?php endif; ?>">Ver Todas</option>
        <?php $_from = $this->_tpl_vars['tsConfig']['categorias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
        <option value="<?php echo $this->_tpl_vars['c']['c_seo']; ?>
" <?php if ($this->_tpl_vars['tsCategoria'] == '$c.c_seo'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['c']['c_nombre']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
    </select>
    <i class="arrow"></i>
</div>
<?php if ($this->_tpl_vars['tsPosts']['data']): ?>
<ul class="posts">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.home_last_posts.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</ul>
<?php else: ?>
<li class="emptyData">No hay posts aqu&iacute;</li>
<?php endif; ?>
<?php if ($this->_tpl_vars['tsPosts']['total'] == 25): ?>
<div class="load-more" onclick="load_more('tops')">Ver m&aacute;s</div>
<?php endif; ?>
<?php endif; ?>                
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>