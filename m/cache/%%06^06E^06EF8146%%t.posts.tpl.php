<?php /* Smarty version 2.6.26, created on 2016-02-28 11:48:55
         compiled from t.posts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fecha', 't.posts.tpl', 34, false),array('modifier', 'posnum', 't.posts.tpl', 57, false),array('modifier', 'seo', 't.posts.tpl', 69, false),array('modifier', 'hace', 't.posts.tpl', 119, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
var totalRelated = <?php echo $this->_tpl_vars['tsRelated']['total']; ?>
;
var totalComments = <?php echo $this->_tpl_vars['tsComments']['total']; ?>
;
//<?php echo '
$(function(){
	$(window).scroll(function(){
		var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
		var scrolltrigger = 0.95;
		if ((wintop / (docheight - winheight)) > scrolltrigger) {
			if(scrollContinue) {
				$(\'.content.active .load-more\').click();
			} else return false;
		}
	 });
});
$(function() {
    $("img.rlazyload").lazyload();
});
//'; ?>

</script>
<?php if ($this->_tpl_vars['tsPost']['post_status'] > 0 || $this->_tpl_vars['tsAutor']['user_activo'] != 1): ?>
<div class="emptyData">Este post se encuentra <?php if ($this->_tpl_vars['tsPost']['post_status'] == 2): ?>eliminado<?php elseif ($this->_tpl_vars['tsPost']['post_status'] == 1): ?> inactivo por acomulaci&oacute;n de denuncias<?php elseif ($this->_tpl_vars['tsPost']['post_status'] == 3): ?> en revisi&oacute;n<?php elseif ($this->_tpl_vars['tsPost']['post_status'] == 3): ?> en revisi&oacute;n<?php elseif ($this->_tpl_vars['tsAutor']['user_activo'] != 1): ?> oculto porque pertenece a una cuenta desactivada<?php endif; ?>, t&uacute; puedes verlo porque <?php if ($this->_tpl_vars['tsUser']->is_admod == 1): ?>eres Administrador<?php elseif ($this->_tpl_vars['tsUser']->is_admod == 2): ?>eres Moderador<?php else: ?>tienes permiso<?php endif; ?>.</div>
<?php endif; ?>
<div class="post">
    <div class="post_titulo">
        <a class="categoria" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['tsPost']['categoria']['c_seo']; ?>
/"><?php echo $this->_tpl_vars['tsPost']['categoria']['c_nombre']; ?>
</a>
        <h1><?php echo $this->_tpl_vars['tsPost']['post_title']; ?>
</h1>
    </div>
    <div class="post_autor clearBoth">
    	<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['tsAutor']['user_name']; ?>
" class="avatar"><img src="<?php echo $this->_tpl_vars['tsConfig']['web']; ?>
/files/avatar/<?php echo $this->_tpl_vars['tsAutor']['user_id']; ?>
_50.jpg" width="30" /></a>
        <div class="info">
        	<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['tsAutor']['user_name']; ?>
">@<?php echo $this->_tpl_vars['tsAutor']['user_name']; ?>
</a>
            <span class="fecha">Publicado <?php echo ((is_array($_tmp=$this->_tpl_vars['tsPost']['post_date'])) ? $this->_run_mod_handler('fecha', true, $_tmp) : smarty_modifier_fecha($_tmp)); ?>
</span>
        </div>
    </div>
    <div class="post_contenido <?php if ($this->_tpl_vars['tsPost']['max']): ?>short<?php endif; ?>">
    	<?php echo $this->_tpl_vars['tsPost']['post_body']; ?>

    </div>
    <?php if ($this->_tpl_vars['tsPost']['max']): ?>
    <a class="load-more" onclick="seguir_leyendo()">Seguir leyendo</a>
    <?php endif; ?>
</div>
<div class="post_detalles clearBoth">
	<?php if (( $this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['godp'] ) && $this->_tpl_vars['tsUser']->is_member == 1 && $this->_tpl_vars['tsPost']['post_user'] != $this->_tpl_vars['tsUser']->uid && $this->_tpl_vars['tsUser']->info['user_puntosxdar'] >= 1): ?>
	<div class="post_puntuar">
        <select onchange="$('#Puntear').show()">
        <option value="0">Puntuar</option>
        <?php unset($this->_sections['puntos']);
$this->_sections['puntos']['name'] = 'puntos';
$this->_sections['puntos']['start'] = (int)1;
$this->_sections['puntos']['loop'] = is_array($_loop=$this->_tpl_vars['tsUser']->info['user_puntosxdar']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['puntos']['max'] = (int)$this->_tpl_vars['tsPunteador']['rango'];
$this->_sections['puntos']['show'] = true;
if ($this->_sections['puntos']['max'] < 0)
    $this->_sections['puntos']['max'] = $this->_sections['puntos']['loop'];
$this->_sections['puntos']['step'] = 1;
if ($this->_sections['puntos']['start'] < 0)
    $this->_sections['puntos']['start'] = max($this->_sections['puntos']['step'] > 0 ? 0 : -1, $this->_sections['puntos']['loop'] + $this->_sections['puntos']['start']);
else
    $this->_sections['puntos']['start'] = min($this->_sections['puntos']['start'], $this->_sections['puntos']['step'] > 0 ? $this->_sections['puntos']['loop'] : $this->_sections['puntos']['loop']-1);
if ($this->_sections['puntos']['show']) {
    $this->_sections['puntos']['total'] = min(ceil(($this->_sections['puntos']['step'] > 0 ? $this->_sections['puntos']['loop'] - $this->_sections['puntos']['start'] : $this->_sections['puntos']['start']+1)/abs($this->_sections['puntos']['step'])), $this->_sections['puntos']['max']);
    if ($this->_sections['puntos']['total'] == 0)
        $this->_sections['puntos']['show'] = false;
} else
    $this->_sections['puntos']['total'] = 0;
if ($this->_sections['puntos']['show']):

            for ($this->_sections['puntos']['index'] = $this->_sections['puntos']['start'], $this->_sections['puntos']['iteration'] = 1;
                 $this->_sections['puntos']['iteration'] <= $this->_sections['puntos']['total'];
                 $this->_sections['puntos']['index'] += $this->_sections['puntos']['step'], $this->_sections['puntos']['iteration']++):
$this->_sections['puntos']['rownum'] = $this->_sections['puntos']['iteration'];
$this->_sections['puntos']['index_prev'] = $this->_sections['puntos']['index'] - $this->_sections['puntos']['step'];
$this->_sections['puntos']['index_next'] = $this->_sections['puntos']['index'] + $this->_sections['puntos']['step'];
$this->_sections['puntos']['first']      = ($this->_sections['puntos']['iteration'] == 1);
$this->_sections['puntos']['last']       = ($this->_sections['puntos']['iteration'] == $this->_sections['puntos']['total']);
?>
        <option value="<?php echo $this->_sections['puntos']['index']; ?>
"><?php echo $this->_sections['puntos']['index']; ?>
 punto<?php if ($this->_sections['puntos']['index'] != 1): ?>s<?php endif; ?></option>
        <?php endfor; endif; ?>
        </select>
        <button id="Puntear" onclick="dar_puntos()" style="display: none;">Dar</button>
    </div>
    <?php endif; ?>
    <div class="post_info">
        <div class="post_puntos" puntos="<?php echo $this->_tpl_vars['tsPost']['post_puntos']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['tsPost']['post_puntos'])) ? $this->_run_mod_handler('posnum', true, $_tmp) : smarty_modifier_posnum($_tmp)); ?>
</div>
        <div class="post_visitas"><?php echo ((is_array($_tmp=$this->_tpl_vars['tsPost']['post_hits'])) ? $this->_run_mod_handler('posnum', true, $_tmp) : smarty_modifier_posnum($_tmp)); ?>
</div>
    </div>
</div>
<div class="post_herramientas clearBoth">
	<?php if ($this->_tpl_vars['tsUser']->is_member && $this->_tpl_vars['tsAutor']['user_id'] != $this->_tpl_vars['tsUser']->uid): ?>
    <div class="floatL">
        <a class="sharer-button web" href="javascript:modal.abrir('share');"></a><span class="SB_popup" id="total_shares"><?php echo $this->_tpl_vars['tsPost']['post_shared']; ?>
</span></li>
        <a class="sharer-button fav" href="javascript:modal.abrir('fav');"></a><span class="SB_popup" id="total_favs"><?php echo $this->_tpl_vars['tsPost']['post_favoritos']; ?>
</span></li>
    </div>
    <?php endif; ?>
    <div class="floatR">
        <a class="sharer-button whatsapp" href="whatsapp://send?text=Visita este post en <?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
: <?php echo $this->_tpl_vars['tsPost']['post_title']; ?>
 - <?php echo $this->_tpl_vars['tsConfig']['web']; ?>
/posts/<?php echo $this->_tpl_vars['tsPost']['categoria']['c_seo']; ?>
/<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['tsPost']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html" target="_blank" title="Compartir en Whatsapp"></a>
        <a class="sharer-button facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $this->_tpl_vars['tsConfig']['web']; ?>
/posts/<?php echo $this->_tpl_vars['tsPost']['categoria']['c_seo']; ?>
/<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['tsPost']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html" target="_blank" title="Compartir en Facebook"></a>
        <a class="sharer-button twitter" href="https://twitter.com/intent/tweet?text=<?php echo $this->_tpl_vars['tsPost']['post_title']; ?>
&amp;url=<?php echo $this->_tpl_vars['tsConfig']['web']; ?>
/posts/<?php echo $this->_tpl_vars['tsPost']['categoria']['c_seo']; ?>
/<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['tsPost']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html" target="_blank" title="Compartir en Twitter"></a>
        <a class="sharer-button google" href="https://plus.google.com/share?hl=es_ES&amp;url=<?php echo $this->_tpl_vars['tsConfig']['web']; ?>
/posts/<?php echo $this->_tpl_vars['tsPost']['categoria']['c_seo']; ?>
/<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['tsPost']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html&amp;gpsrc=frameless&amp;partnerid=frameless" target="_blank" title="Compartir en Google+"></a>
    </div>
</div>
<div class="post_extras">
    <div class="items clearBoth">
        <a id="btn_tab_related" class="active" href="javascript:load_tab('related')">Relacionados</a>
        <a id="btn_tab_comments" href="javascript:load_tab('comments')">Comentarios - <?php echo $this->_tpl_vars['tsPost']['post_comments']; ?>
</a>
    </div>
    <div id="tab_related" class="content">
        <?php if ($this->_tpl_vars['tsRelated']['data']): ?>
        <div class="result clearBoth">
        <?php $_from = $this->_tpl_vars['tsRelated']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
        <a title="<?php echo $this->_tpl_vars['p']['post_title']; ?>
" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['p']['c_seo']; ?>
/<?php echo $this->_tpl_vars['p']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html">
        <div>                
        <img <?php if ($this->_tpl_vars['p']['post_cover']): ?>data-original="<?php echo $this->_tpl_vars['p']['post_cover']; ?>
" class="rlazyload"<?php else: ?>src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/no-cover.jpg"<?php endif; ?> width="145" height="111" />
        <span><?php echo $this->_tpl_vars['p']['post_title']; ?>
</span></div></a>
        <?php endforeach; endif; unset($_from); ?>
        </div>
        <input type="hidden" id="tags_related" value="<?php echo $this->_tpl_vars['tsPost']['post_tags']; ?>
" />
        <div id="loader"><img src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/large-loading.gif"></div>
        <div class="load-more" onclick="more_related()" style="display: none;">Ver m&aacute;s</div>
        <?php else: ?>
        <div class="emptyData">No se encontraron posts relacionados</div>
        <?php endif; ?>
    </div>
    <div id="tab_comments" class="content" style="display: none;">
    	<?php if ($this->_tpl_vars['tsUser']->is_member): ?>
    	<div class="box_comentario">
            <div class="caja_text">
        		<img class="avatar" src="<?php echo $this->_tpl_vars['tsConfig']['web']; ?>
/files/avatar/<?php echo $this->_tpl_vars['tsUser']->uid; ?>
_50.jpg" width="40" />
                <textarea placeholder="Escribe un comentario" id="body_comment" class="autogrow" onclick="if(!$(this).val()) $(this).val('\n\nEnviado desde la versi&oacute;n mobile de <?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
.').selectRange(0);"></textarea>
            </div>
            <div class="caja_boton">
            	<img id="comment_loading" src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/loading.gif">
                <input type="button" id="add_comment" value="Comentar" class="btn_blue" onclick="comentar_post()" />
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
            	<div class="comment" id="cid_<?php echo $this->_tpl_vars['c']['cid']; ?>
">                
                    <div class="userinfo">
                        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['c']['user_name']; ?>
"><img class="avatar" src="<?php echo $this->_tpl_vars['tsConfig']['web']; ?>
/files/avatar/<?php echo $this->_tpl_vars['c']['c_user']; ?>
_50.jpg" width="26"></a>
                        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['c']['user_name']; ?>
" class="nick">@<?php echo $this->_tpl_vars['c']['user_name']; ?>
</a>
                        <abbr class="fecha"><?php echo ((is_array($_tmp=$this->_tpl_vars['c']['c_date'])) ? $this->_run_mod_handler('hace', true, $_tmp) : smarty_modifier_hace($_tmp)); ?>
</abbr>
                    </div>
                    <p class="body"><?php echo $this->_tpl_vars['c']['c_html']; ?>
</p>
                    <span class="likes" style="color: #<?php if ($this->_tpl_vars['c']['c_votos'] >= 0): ?>18A718<?php else: ?>900<?php endif; ?>"><?php echo $this->_tpl_vars['c']['c_votos']; ?>
</span>
                    <?php if ($this->_tpl_vars['c']['votado'] == 0 && $this->_tpl_vars['c']['c_user'] != $this->_tpl_vars['tsUser']->uid): ?><div class="buttons"><a href="#" onclick="votar_comment(<?php echo $this->_tpl_vars['c']['cid']; ?>
, 'pos'); return false;" class="b_like"></a><a href="#" onclick="votar_comment(<?php echo $this->_tpl_vars['c']['cid']; ?>
, 'neg'); return false;" class="b_dislike"></a></div><?php endif; ?>
                    <div class="bbody"><div style="display: none;" id="citar_comm_<?php echo $this->_tpl_vars['c']['cid']; ?>
"><?php echo $this->_tpl_vars['c']['c_body']; ?>
</div><a href="#" onclick="citar_comentario(<?php echo $this->_tpl_vars['c']['cid']; ?>
, '<?php echo $this->_tpl_vars['c']['user_name']; ?>
'); return false;" class="btn_blue">Citar</a></div>
            	</div>
            <?php endforeach; endif; unset($_from); ?>
            <?php else: ?>
            <div id="no-comments" class="emptyData">No hay comentarios</div>
            <?php endif; ?>
        </div>
        <?php if ($this->_tpl_vars['tsComments']['total'] >= 2): ?>
            <div id="loader"><img src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/large-loading.gif"></div>
            <div class="load-more" onclick="more_comments()" style="display: none;">Ver m&aacute;s</div>
        <?php endif; ?>
    </div>
    <input type="hidden" id="auser_post" value="<?php echo $this->_tpl_vars['tsAutor']['user_id']; ?>
" />
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>