<?php /* Smarty version 2.6.26, created on 2016-02-28 11:38:09
         compiled from modules/m.home_last_posts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'modules/m.home_last_posts.tpl', 3, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['tsPosts']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
<li class="post-item<?php if ($this->_tpl_vars['p']['post_status'] != 0): ?> inactive<?php endif; ?>" >
    <a title="<?php echo $this->_tpl_vars['p']['post_title']; ?>
" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['p']['c_seo']; ?>
/<?php echo $this->_tpl_vars['p']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html">
    	<?php if ($this->_tpl_vars['p']['post_cover']): ?>        
        <img data-original="<?php echo $this->_tpl_vars['p']['post_cover']; ?>
" width="80" height="80" class="thumbnail plazyload" />
        <?php else: ?>
        <img src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/no-cover.jpg" width="80" height="80" class="thumbnail" />
        <?php endif; ?>
        <div class="post-info">
            <h3><?php echo $this->_tpl_vars['p']['post_title']; ?>
</h3>        
            <p class="more-info"><img class="category" src="<?php echo $this->_tpl_vars['tsConfig']['tema_web']; ?>
/images/icons/cat/<?php echo $this->_tpl_vars['p']['c_img']; ?>
" /><span class="stats"><?php echo $this->_tpl_vars['p']['post_puntos']; ?>
 Puntos &middot; <?php echo $this->_tpl_vars['p']['post_comments']; ?>
 Comentarios</span></p>
        </div>
    </a>
</li>
<?php endforeach; endif; unset($_from); ?>