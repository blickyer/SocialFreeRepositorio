<?php /* Smarty version 2.6.26, created on 2016-02-28 11:54:50
         compiled from t.fotos.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fecha', 't.fotos.tpl', 33, false),array('modifier', 'nl2br', 't.fotos.tpl', 39, false),array('modifier', 'hace', 't.fotos.tpl', 69, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
var totalFotos = <?php echo $this->_tpl_vars['tsLastFotos']['total']; ?>
;
var scrollContinue = true;
//<?php echo '
$(function(){
	$(window).scroll(function(){
		var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
		var scrolltrigger = 0.95;
		if ((wintop / (docheight - winheight)) > scrolltrigger) {
			if(scrollContinue) {$(\'.load-more\').click();} else return false;
		}
	 });
	 $("a.flazyload").lazyload();
});
//'; ?>

</script>
<?php if ($this->_tpl_vars['tsAction'] == ''): ?>
<h1 class="Titulo">&Uacute;ltimas fotos<span class="floatR"><?php echo $this->_tpl_vars['tsLastFotos']['all']; ?>
</span></h1>
<ul class="fotos">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.fotos_last_fotos.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>    
</ul>
<?php if ($this->_tpl_vars['tsLastFotos']['total'] == 10): ?>
<div class="load-more" onclick="more_fotos()">Ver m&aacute;s</div>
<?php endif; ?>
<?php elseif ($this->_tpl_vars['tsAction'] == 'ver'): ?>
<h1 class="Titulo"><?php echo $this->_tpl_vars['tsFoto']['f_title']; ?>
</h1>
<div class="blanco" style="padding: 10px;">
    <div class="post_autor clearBoth">
        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['tsFoto']['user_name']; ?>
" class="avatar"><img src="<?php echo $this->_tpl_vars['tsConfig']['web']; ?>
/files/avatar/<?php echo $this->_tpl_vars['tsFoto']['f_user']; ?>
_50.jpg" width="30" /></a>
        <div class="info">
            <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['tsFoto']['user_name']; ?>
">@<?php echo $this->_tpl_vars['tsFoto']['user_name']; ?>
</a>
            <span class="fecha">Publicada <?php echo ((is_array($_tmp=$this->_tpl_vars['tsFoto']['f_date'])) ? $this->_run_mod_handler('fecha', true, $_tmp) : smarty_modifier_fecha($_tmp)); ?>
</span>
        </div>
    </div>
    <div class="big_foto">
    <img class="img" src="<?php echo $this->_tpl_vars['tsFoto']['f_url']; ?>
" />
    </div>
    <p class="foto_desc"><?php echo ((is_array($_tmp=$this->_tpl_vars['tsFoto']['f_description'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
    <div id="error"></div>
</div>
<ul class="footer_foto">
    <li><a href="#" onclick="<?php if ($this->_tpl_vars['tsFoto']['vote']): ?>void(0);return false;<?php else: ?>votar_foto('pos'); return false;<?php endif; ?>"><img src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/like<?php if ($this->_tpl_vars['tsFoto']['vote'] == 1): ?>ok<?php endif; ?>.png" style="vertical-align: top;" /><span id="votos_total_pos"><?php echo $this->_tpl_vars['tsFoto']['f_votos_pos']; ?>
</span></a></li>
    <li><a href="#" onclick="<?php if ($this->_tpl_vars['tsFoto']['vote']): ?>void(0);return false;<?php else: ?>votar_foto('neg'); return false;<?php endif; ?>"><img src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/dislike<?php if ($this->_tpl_vars['tsFoto']['vote'] == 2): ?>ok<?php endif; ?>.png" style="vertical-align: middle;" /><span id="votos_total_neg"><?php echo $this->_tpl_vars['tsFoto']['f_votos_neg']; ?>
</span></a></li>
</ul>
<h1 class="Titulo">Comentarios<span class="floatR"><?php echo $this->_tpl_vars['tsFoto']['f_comments']; ?>
</span></h1>
<div id="tab_comments" class="content" style="background: #FFF;overflow: hidden;">
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
                <input type="button" id="add_comment" value="Comentar" class="btn_blue" onclick="comentar_foto()" />
            </div>
            <div id="error"></div>
        </div>
        <?php endif; ?>
        <div class="post_comentarios">
        	<div id="nuevos"></div>
            <?php if ($this->_tpl_vars['tsFoto']['f_comments'] > 0): ?>
            <?php $_from = $this->_tpl_vars['tsFComments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>