{include file='sections/main_header.tpl'}
<script type="text/javascript">
var totalFotos = {$tsLastFotos.total};
var scrollContinue = true;
//{literal}
$(function(){
	$(window).scroll(function(){
		var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
		var scrolltrigger = 0.95;
		if ((wintop / (docheight - winheight)) > scrolltrigger) {
			if(scrollContinue) {$('.load-more').click();} else return false;
		}
	 });
	 $("a.flazyload").lazyload();
});
//{/literal}
</script>
{if $tsAction == ''}
<h1 class="Titulo">&Uacute;ltimas fotos<span class="floatR">{$tsLastFotos.all}</span></h1>
<ul class="fotos">
{include file='modules/m.fotos_last_fotos.tpl'}    
</ul>
{if $tsLastFotos.total == 10}
<div class="load-more" onclick="more_fotos()">Ver m&aacute;s</div>
{/if}
{elseif $tsAction == 'ver'}
<h1 class="Titulo">{$tsFoto.f_title}</h1>
<div class="blanco" style="padding: 10px;">
    <div class="post_autor clearBoth">
        <a href="{$tsConfig.url}/perfil/{$tsFoto.user_name}" class="avatar"><img src="{$tsConfig.web}/files/avatar/{$tsFoto.f_user}_50.jpg" width="30" /></a>
        <div class="info">
            <a href="{$tsConfig.url}/perfil/{$tsFoto.user_name}">@{$tsFoto.user_name}</a>
            <span class="fecha">Publicada {$tsFoto.f_date|fecha}</span>
        </div>
    </div>
    <div class="big_foto">
    <img class="img" src="{$tsFoto.f_url}" />
    </div>
    <p class="foto_desc">{$tsFoto.f_description|nl2br}</p>
    <div id="error"></div>
</div>
<ul class="footer_foto">
    <li><a href="#" onclick="{if $tsFoto.vote}void(0);return false;{else}votar_foto('pos'); return false;{/if}"><img src="{$tsConfig.images}/like{if $tsFoto.vote == 1}ok{/if}.png" style="vertical-align: top;" /><span id="votos_total_pos">{$tsFoto.f_votos_pos}</span></a></li>
    <li><a href="#" onclick="{if $tsFoto.vote}void(0);return false;{else}votar_foto('neg'); return false;{/if}"><img src="{$tsConfig.images}/dislike{if $tsFoto.vote == 2}ok{/if}.png" style="vertical-align: middle;" /><span id="votos_total_neg">{$tsFoto.f_votos_neg}</span></a></li>
</ul>
<h1 class="Titulo">Comentarios<span class="floatR">{$tsFoto.f_comments}</span></h1>
<div id="tab_comments" class="content" style="background: #FFF;overflow: hidden;">
    	{if $tsUser->is_member}
    	<div class="box_comentario">
            <div class="caja_text">
        		<img class="avatar" src="{$tsConfig.web}/files/avatar/{$tsUser->uid}_50.jpg" width="40" />
                <textarea placeholder="Escribe un comentario" id="body_comment"></textarea>
            </div>
            <div class="caja_boton">
            	<img id="comment_loading" src="{$tsConfig.images}/loading.gif">
                <input type="button" id="add_comment" value="Comentar" class="btn_blue" onclick="comentar_foto()" />
            </div>
            <div id="error"></div>
        </div>
        {/if}
        <div class="post_comentarios">
        	<div id="nuevos"></div>
            {if $tsFoto.f_comments > 0}
            {foreach from=$tsFComments item=c}
            <div class="comment">                
                    <a href="{$tsConfig.url}/perfil/{$c.user_name}" class="userinfo">
                        <img class="avatar" src="{$tsConfig.web}/files/avatar/{$c.c_user}_50.jpg" width="26">
                        <strong class="nick">@{$c.user_name}</strong>
                        <abbr class="fecha">{$c.c_date|hace}</abbr>
                    </a>
                    <p class="body">{$c.c_body}</p>
            </div>
            {/foreach}
            {else}
            <div id="no-comments" class="emptyData">No hay comentarios</div>
            {/if}
        </div>        
    </div>
{/if}
{include file='sections/main_footer.tpl'}