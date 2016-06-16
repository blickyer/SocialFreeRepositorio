{include file='sections/main_header.tpl'}
<script type="text/javascript">
var totalRelated = {$tsRelated.total};
var totalComments = {$tsComments.total};
//{literal}
$(function(){
	$(window).scroll(function(){
		var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
		var scrolltrigger = 0.95;
		if ((wintop / (docheight - winheight)) > scrolltrigger) {
			if(scrollContinue) {
				$('.content.active .load-more').click();
			} else return false;
		}
	 });
});
$(function() {
    $("img.rlazyload").lazyload();
});
//{/literal}
</script>
{if $tsPost.post_status > 0 || $tsAutor.user_activo != 1}
<div class="emptyData">Este post se encuentra {if $tsPost.post_status == 2}eliminado{elseif $tsPost.post_status == 1} inactivo por acomulaci&oacute;n de denuncias{elseif $tsPost.post_status == 3} en revisi&oacute;n{elseif $tsPost.post_status == 3} en revisi&oacute;n{elseif $tsAutor.user_activo != 1} oculto porque pertenece a una cuenta desactivada{/if}, t&uacute; puedes verlo porque {if $tsUser->is_admod == 1}eres Administrador{elseif $tsUser->is_admod == 2}eres Moderador{else}tienes permiso{/if}.</div>
{/if}
<div class="post">
    <div class="post_titulo">
        <a class="categoria" href="{$tsConfig.url}/posts/{$tsPost.categoria.c_seo}/">{$tsPost.categoria.c_nombre}</a>
        <h1>{$tsPost.post_title}</h1>
    </div>
    <div class="post_autor clearBoth">
    	<a href="{$tsConfig.url}/perfil/{$tsAutor.user_name}" class="avatar"><img src="{$tsConfig.web}/files/avatar/{$tsAutor.user_id}_50.jpg" width="30" /></a>
        <div class="info">
        	<a href="{$tsConfig.url}/perfil/{$tsAutor.user_name}">@{$tsAutor.user_name}</a>
            <span class="fecha">Publicado {$tsPost.post_date|fecha}</span>
        </div>
    </div>
    <div class="post_contenido {if $tsPost.max}short{/if}">
    	{$tsPost.post_body}
    </div>
    {if $tsPost.max}
    <a class="load-more" onclick="seguir_leyendo()">Seguir leyendo</a>
    {/if}
</div>
<div class="post_detalles clearBoth">
	{if ($tsUser->is_admod || $tsUser->permisos.godp) && $tsUser->is_member == 1 && $tsPost.post_user != $tsUser->uid && $tsUser->info.user_puntosxdar >= 1}
	<div class="post_puntuar">
        <select onchange="$('#Puntear').show()">
        <option value="0">Puntuar</option>
        {section name=puntos start=1 loop=$tsUser->info.user_puntosxdar+1 max=$tsPunteador.rango}
        <option value="{$smarty.section.puntos.index}">{$smarty.section.puntos.index} punto{if $smarty.section.puntos.index != 1}s{/if}</option>
        {/section}
        </select>
        <button id="Puntear" onclick="dar_puntos()" style="display: none;">Dar</button>
    </div>
    {/if}
    <div class="post_info">
        <div class="post_puntos" puntos="{$tsPost.post_puntos}">{$tsPost.post_puntos|posnum}</div>
        <div class="post_visitas">{$tsPost.post_hits|posnum}</div>
    </div>
</div>
<div class="post_herramientas clearBoth">
	{if $tsUser->is_member && $tsAutor.user_id != $tsUser->uid}
    <div class="floatL">
        <a class="sharer-button web" href="javascript:modal.abrir('share');"></a><span class="SB_popup" id="total_shares">{$tsPost.post_shared}</span></li>
        <a class="sharer-button fav" href="javascript:modal.abrir('fav');"></a><span class="SB_popup" id="total_favs">{$tsPost.post_favoritos}</span></li>
    </div>
    {/if}
    <div class="floatR">
        <a class="sharer-button whatsapp" href="whatsapp://send?text=Visita este post en {$tsConfig.titulo}: {$tsPost.post_title} - {$tsConfig.web}/posts/{$tsPost.categoria.c_seo}/{$tsPost.post_id}/{$tsPost.post_title|seo}.html" target="_blank" title="Compartir en Whatsapp"></a>
        <a class="sharer-button facebook" href="https://www.facebook.com/sharer/sharer.php?u={$tsConfig.web}/posts/{$tsPost.categoria.c_seo}/{$tsPost.post_id}/{$tsPost.post_title|seo}.html" target="_blank" title="Compartir en Facebook"></a>
        <a class="sharer-button twitter" href="https://twitter.com/intent/tweet?text={$tsPost.post_title}&amp;url={$tsConfig.web}/posts/{$tsPost.categoria.c_seo}/{$tsPost.post_id}/{$tsPost.post_title|seo}.html" target="_blank" title="Compartir en Twitter"></a>
        <a class="sharer-button google" href="https://plus.google.com/share?hl=es_ES&amp;url={$tsConfig.web}/posts/{$tsPost.categoria.c_seo}/{$tsPost.post_id}/{$tsPost.post_title|seo}.html&amp;gpsrc=frameless&amp;partnerid=frameless" target="_blank" title="Compartir en Google+"></a>
    </div>
</div>
<div class="post_extras">
    <div class="items clearBoth">
        <a id="btn_tab_related" class="active" href="javascript:load_tab('related')">Relacionados</a>
        <a id="btn_tab_comments" href="javascript:load_tab('comments')">Comentarios - {$tsPost.post_comments}</a>
    </div>
    <div id="tab_related" class="content">
        {if $tsRelated.data}
        <div class="result clearBoth">
        {foreach from=$tsRelated.data item=p}
        <a title="{$p.post_title}" href="{$tsConfig.url}/posts/{$p.c_seo}/{$p.post_id}/{$p.post_title|seo}.html">
        <div>                
        <img {if $p.post_cover}data-original="{$p.post_cover}" class="rlazyload"{else}src="{$tsConfig.images}/no-cover.jpg"{/if} width="145" height="111" />
        <span>{$p.post_title}</span></div></a>
        {/foreach}
        </div>
        <input type="hidden" id="tags_related" value="{$tsPost.post_tags}" />
        <div id="loader"><img src="{$tsConfig.images}/large-loading.gif"></div>
        <div class="load-more" onclick="more_related()" style="display: none;">Ver m&aacute;s</div>
        {else}
        <div class="emptyData">No se encontraron posts relacionados</div>
        {/if}
    </div>
    <div id="tab_comments" class="content" style="display: none;">
    	{if $tsUser->is_member}
    	<div class="box_comentario">
            <div class="caja_text">
        		<img class="avatar" src="{$tsConfig.web}/files/avatar/{$tsUser->uid}_50.jpg" width="40" />
                <textarea placeholder="Escribe un comentario" id="body_comment" class="autogrow" onclick="if(!$(this).val()) $(this).val('\n\nEnviado desde la versi&oacute;n mobile de {$tsConfig.titulo}.').selectRange(0);"></textarea>
            </div>
            <div class="caja_boton">
            	<img id="comment_loading" src="{$tsConfig.images}/loading.gif">
                <input type="button" id="add_comment" value="Comentar" class="btn_blue" onclick="comentar_post()" />
            </div>
            <div id="error"></div>
        </div>
        {/if}
        <div class="post_comentarios">
        	<div id="nuevos"></div>
            {if $tsComments.total > 0}
            {foreach from=$tsComments.data item=c}
            	<div class="comment" id="cid_{$c.cid}">                
                    <div class="userinfo">
                        <a href="{$tsConfig.url}/perfil/{$c.user_name}"><img class="avatar" src="{$tsConfig.web}/files/avatar/{$c.c_user}_50.jpg" width="26"></a>
                        <a href="{$tsConfig.url}/perfil/{$c.user_name}" class="nick">@{$c.user_name}</a>
                        <abbr class="fecha">{$c.c_date|hace}</abbr>
                    </div>
                    <p class="body">{$c.c_html}</p>
                    <span class="likes" style="color: #{if $c.c_votos >= 0}18A718{else}900{/if}">{$c.c_votos}</span>
                    {if $c.votado  == 0 && $c.c_user != $tsUser->uid}<div class="buttons"><a href="#" onclick="votar_comment({$c.cid}, 'pos'); return false;" class="b_like"></a><a href="#" onclick="votar_comment({$c.cid}, 'neg'); return false;" class="b_dislike"></a></div>{/if}
                    <div class="bbody"><div style="display: none;" id="citar_comm_{$c.cid}">{$c.c_body}</div><a href="#" onclick="citar_comentario({$c.cid}, '{$c.user_name}'); return false;" class="btn_blue">Citar</a></div>
            	</div>
            {/foreach}
            {else}
            <div id="no-comments" class="emptyData">No hay comentarios</div>
            {/if}
        </div>
        {if $tsComments.total >= 2}
            <div id="loader"><img src="{$tsConfig.images}/large-loading.gif"></div>
            <div class="load-more" onclick="more_comments()" style="display: none;">Ver m&aacute;s</div>
        {/if}
    </div>
    <input type="hidden" id="auser_post" value="{$tsAutor.user_id}" />
</div>
{include file='sections/main_footer.tpl'}