<?php /* Smarty version 2.6.26, created on 2016-02-28 11:38:09
         compiled from t.home.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 't.home.tpl', 34, false),)), $this); ?>
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
			if(scrollContinue) {$(\'.load-more\').click()} else {return}
		}
	 });
	$("img.plazyload").lazyload();
});
//'; ?>

</script>
<h1 class="Titulo">&Uacute;ltimos posts<span class="floatR"><?php echo $this->_tpl_vars['tsPosts']['stats_posts']; ?>
</span></h1>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_submenu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="category-filter">
    <select onchange="document.location.href='<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/' + $(this).val() + '/'">
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
<?php if ($this->_tpl_vars['tsCarrousel']['total'] > 0): ?>
<ul class="carrousel" total="<?php echo $this->_tpl_vars['tsCarrousel']['total']; ?>
">
    <?php $_from = $this->_tpl_vars['tsCarrousel']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['p']):
?>
    <li id="cpost_<?php echo $this->_tpl_vars['i']+1; ?>
" class="c_item<?php if ($this->_tpl_vars['i']+1 == 1): ?> active<?php endif; ?>">
        <?php if ($this->_tpl_vars['tsCarrousel']['total'] > 1): ?><a class="c_left" onclick="carrousel(<?php echo $this->_tpl_vars['i']; ?>
)"></a><?php endif; ?>
        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['p']['c_seo']; ?>
/<?php echo $this->_tpl_vars['p']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html">
        <?php if ($this->_tpl_vars['p']['post_cover']): ?>        
        <img data-original="<?php echo $this->_tpl_vars['p']['post_cover']; ?>
" width="80" height="80" class="c_cover plazyload" />
        <?php else: ?>
        <img src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/no-cover.jpg" width="80" height="80" class="c_cover thumbnail" />
        <?php endif; ?>      
        <div class="c_desc">
            <h2 class="c_title"><?php echo $this->_tpl_vars['p']['post_title']; ?>
</h2>
            <img class="category" src="<?php echo $this->_tpl_vars['tsConfig']['tema_web']; ?>
/images/icons/cat/<?php echo $this->_tpl_vars['p']['c_img']; ?>
" /><span class="stats"><?php echo $this->_tpl_vars['p']['post_puntos']; ?>
 Puntos &middot; <?php echo $this->_tpl_vars['p']['post_comments']; ?>
 Comentarios</span>
            <ul class="dots">
            	<?php $_from = $this->_tpl_vars['tsCarrousel']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['j'] => $this->_tpl_vars['p']):
?>
                <li<?php if ($this->_tpl_vars['i'] == $this->_tpl_vars['j']): ?> class="active"<?php endif; ?>></li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </div>
        </a>
        <?php if ($this->_tpl_vars['tsCarrousel']['total'] > 1): ?><a class="c_right" onclick="carrousel(<?php echo $this->_tpl_vars['i']+2; ?>
)"></a><?php endif; ?>
    </li>
    <?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>
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
<div class="load-more" onclick="load_more('posts')">Ver m&aacute;s</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>