<?php /* Smarty version 2.6.28, created on 2016-06-16 12:36:12
         compiled from t.php_files/p.perfil.posts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 't.php_files/p.perfil.posts.tpl', 12, false),array('modifier', 'truncate', 't.php_files/p.perfil.posts.tpl', 12, false),)), $this); ?>
1:
<div id="perfil_posts" status="activo">
    <div class="widget w-posts clearfix">
    	<div class="title-w clearfix">
            <h3 style="margin-top: 2px;">&Uacute;ltimos Posts creados por <?php echo $this->_tpl_vars['tsUsername']; ?>
</h3>
            <span><a title="" href="/rss/posts-usuario/" class="systemicons sRss"></a></span>
        </div>
        <?php if ($this->_tpl_vars['tsGeneral']['posts']): ?>
        <ul  style="border: 1px solid #E8E8E8;padding:3px;font-family: sans-serif;" class="ultimos">
            <?php $_from = $this->_tpl_vars['tsGeneral']['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
        	<li class="categoriaPost cat-posts" style="background-image:url(<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/mega/cat/<?php echo $this->_tpl_vars['p']['c_img']; ?>
)">
                <a title="<?php echo $this->_tpl_vars['p']['post_title']; ?>
" target="_self" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['p']['c_seo']; ?>
/<?php echo $this->_tpl_vars['p']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 45) : smarty_modifier_truncate($_tmp, 45)); ?>
</a>
                <span><?php echo $this->_tpl_vars['p']['post_puntos']; ?>
 Puntos</span>
            </li>
            <?php endforeach; endif; unset($_from); ?>
            <?php if ($this->_tpl_vars['tsGeneral']['total'] >= 18): ?>
            <li class="see-more"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/buscador/?autor=<?php echo $this->_tpl_vars['tsGeneral']['username']; ?>
">Ver m&aacute;s &raquo;</a></li>
            <?php endif; ?>
        </ul>
        <?php else: ?>
        <div class="emptyData">No hay posts</div>
        <?php endif; ?>
    </div>
</div>