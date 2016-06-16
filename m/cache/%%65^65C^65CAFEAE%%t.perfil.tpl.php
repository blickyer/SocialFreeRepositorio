<?php /* Smarty version 2.6.26, created on 2016-02-28 11:49:07
         compiled from t.perfil.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'posnum', 't.perfil.tpl', 34, false),array('modifier', 'hace', 't.perfil.tpl', 68, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/perfil.js"></script>
<script type="text/javascript">
//<?php echo '
$(function(){
	$(window).scroll(function(){
		var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
		var scrolltrigger = 0.95;
		if ((wintop / (docheight - winheight)) > scrolltrigger) {
			if(scrollContinue) {$(\'.load-more\').click()} else {return false}
		}
	 });
});
//'; ?>

</script>
<input type="hidden" id="info" value="<?php echo $this->_tpl_vars['tsInfo']['uid']; ?>
" />
<div class="head_perfil clearBoth">
    <div class="information clearBoth">
        <img class="avatar floatL" src="<?php echo $this->_tpl_vars['tsConfig']['web']; ?>
/files/avatar/<?php if ($this->_tpl_vars['tsInfo']['p_avatar']): ?><?php echo $this->_tpl_vars['tsInfo']['uid']; ?>
_120<?php else: ?>avatar<?php endif; ?>.jpg" />
        <div class="data floatL">
            <h1><?php if ($this->_tpl_vars['tsInfo']['p_nombre']): ?><?php echo $this->_tpl_vars['tsInfo']['p_nombre']; ?>
<?php else: ?><?php echo $this->_tpl_vars['tsInfo']['nick']; ?>
<?php endif; ?></h1>
            <span>@<?php echo $this->_tpl_vars['tsInfo']['nick']; ?>
 - <?php echo $this->_tpl_vars['tsInfo']['user_pais']; ?>
</span><br />
            <span><?php echo $this->_tpl_vars['tsInfo']['stats']['r_name']; ?>
</span><br />
            <span id="userFollow">
            <?php if ($this->_tpl_vars['tsUser']->uid != $this->_tpl_vars['tsInfo']['uid'] && $this->_tpl_vars['tsUser']->is_member): ?>
            <button onclick="seguir(<?php echo $this->_tpl_vars['tsInfo']['uid']; ?>
, 'unfollow')" <?php if ($this->_tpl_vars['tsInfo']['follow'] == 1): ?>class="active"<?php endif; ?>>Dejar de seguir</button>
            <button onclick="seguir(<?php echo $this->_tpl_vars['tsInfo']['uid']; ?>
, 'follow')" <?php if ($this->_tpl_vars['tsInfo']['follow'] == 0): ?>class="active"<?php endif; ?>>Seguir</button>
            <?php endif; ?>
            </span>
        </div>
    </div>
   	<div id="error" class="clearBoth"></div>
    <ul class="counters clearBoth">
        <li><?php echo ((is_array($_tmp=$this->_tpl_vars['tsInfo']['stats']['user_puntos'])) ? $this->_run_mod_handler('posnum', true, $_tmp) : smarty_modifier_posnum($_tmp)); ?>
<small>Puntos</small></li>
        <li><a href='<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['tsInfo']['nick']; ?>
/posts'><?php echo ((is_array($_tmp=$this->_tpl_vars['tsInfo']['stats']['user_posts'])) ? $this->_run_mod_handler('posnum', true, $_tmp) : smarty_modifier_posnum($_tmp)); ?>
<small>Posts</small></a></li>
        <li><?php echo ((is_array($_tmp=$this->_tpl_vars['tsInfo']['stats']['user_seguidores'])) ? $this->_run_mod_handler('posnum', true, $_tmp) : smarty_modifier_posnum($_tmp)); ?>
<small>Seguidores</small></li>
    </ul>
</div>
<?php if ($this->_tpl_vars['tsAction'] == ''): ?>
<?php if ($this->_tpl_vars['tsPrivacidad']['m']['v'] == false): ?>
<div class="emptyData"><?php echo $this->_tpl_vars['tsPrivacidad']['m']['m']; ?>
</div>
<?php elseif ($this->_tpl_vars['tsType'] == 'story'): ?>
<ul class="shouts">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.perfil_muro_story.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="blanco" style="margin-top: 15px;">
	<h1 class="Titulo">Comentarios<span class="floatR"><?php echo $this->_tpl_vars['tsComments']['total']; ?>
</span></h1>
    <?php if ($this->_tpl_vars['tsUser']->is_member): ?>
    <div class="box_comentario">
        <div class="caja_text">
            <img class="avatar" src="<?php echo $this->_tpl_vars['tsConfig']['web']; ?>
/files/avatar/<?php echo $this->_tpl_vars['tsUser']->uid; ?>
_50.jpg" width="40" />
            <textarea placeholder="Escribe un comentario" id="body_comment"></textarea>
        </div>
        <div class="caja_boton">
            <img id="comment_loading" src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/loading.gif">
            <input type="button" id="add_comment" value="Comentar" class="btn_blue" onclick="muro.comentar(<?php $_from = $this->_tpl_vars['tsMuro']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?><?php echo $this->_tpl_vars['p']['pub_id']; ?>
<?php endforeach; endif; unset($_from); ?>)" />
        </div>
        <div id="error"></div>
    </div>
    <?php endif; ?>
    <div class="post_comentarios">
        <div id="nuevos"></div>
        <?php if ($this->_tpl_vars['tsComments']['total'] > 0): ?>
        <?php $_from = $this->_tpl_vars['tsComments']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
        <div class="comment">                
                <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['c']['user_name']; ?>
" class="userinfo">
                    <img class="avatar" src="<?php echo $this->_tpl_vars['tsConfig']['web']; ?>
/files/avatar/<?php echo $this->_tpl_vars['c']['c_user']; ?>
_50.jpg" width="26">
                    <strong class="nick">@<?php echo $this->_tpl_vars['c']['user_name']; ?>
</strong>
                    <abbr class="fecha"><?php echo ((is_array($_tmp=$this->_tpl_vars['c']['c_date'])) ? $this->_run_mod_handler('hace', true, $_tmp) : smarty_modifier_hace($_tmp)); ?>
</abbr>
                </a>
                <p class="body"><?php echo $this->_tpl_vars['c']['c_body']; ?>
</p>
        </div>
        <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
        <div id="no-comments" class="emptyData">No hay comentarios</div>
        <?php endif; ?>
    </div>        
</div>
</ul>
<?php else: ?>
<div id="perfil_wall">
    <script type="text/javascript">
        muro.stream.total = <?php echo $this->_tpl_vars['tsMuro']['total']; ?>
;
    </script>
    <?php if ($this->_tpl_vars['tsPrivacidad']['mf']['v'] == true): ?>
        <div class="box_comentario">
            <div class="caja_text" style="padding-left: 0;">
                <textarea placeholder="Escribe un comentario en su muro" id="body_comment"></textarea>
            </div>
            <div class="caja_boton">
            	<img id="comment_loading" src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/loading.gif">
                <input type="button" id="add_comment" value="Comentar" class="btn_blue" onclick="muro.stream.compartir()" />
            </div>
            <div id="error"></div>
        </div>
    <?php else: ?>
        <div class="emptyData"><?php echo $this->_tpl_vars['tsPrivacidad']['mf']['m']; ?>
</div>
    <?php endif; ?>
    <ul class="shouts">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.perfil_muro_story.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   	</ul>
    <?php if ($this->_tpl_vars['tsMuro']['total'] >= 10): ?>
    <div class="load-more" onclick="muro.stream.loadMore('perfil'); return false;">Publicaciones m&aacute;s antiguas</div>
    <?php elseif ($this->_tpl_vars['tsMuro']['total'] == 0 && $this->_tpl_vars['tsUser']->is_member): ?>
    <div class="emptyData">Este usuario no tiene comentarios, se el primero.</div>
    <?php endif; ?>
</div>
<?php endif; ?>
<?php elseif ($this->_tpl_vars['tsAction'] == 'posts'): ?>
	<script type="text/javascript">
        var totalPosts = <?php echo $this->_tpl_vars['tsPosts']['total']; ?>
;
		//<?php echo '
		$(function(){
			$("img.plazyload").lazyload();
		});
		// '; ?>

    </script>
    <ul class="posts">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.home_last_posts.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </ul>
    <?php if ($this->_tpl_vars['tsPosts']['total'] >= 25): ?>
        <div class="load-more" onclick="load_more('perfil'); return false;">Cargar m&aacute;s posts</div>
   	<?php elseif ($this->_tpl_vars['tsPosts']['total'] == 0): ?>
        <div class="emptyData">Nada por aqu&iacute;.</div>
    <?php endif; ?>
<?php endif; ?>             
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>