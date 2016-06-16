{include file='sections/main_header.tpl'}
<script type="text/javascript" src="{$tsConfig.js}/perfil.js"></script>
<script type="text/javascript">
//{literal}
$(function(){
	$(window).scroll(function(){
		var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
		var scrolltrigger = 0.95;
		if ((wintop / (docheight - winheight)) > scrolltrigger) {
			if(scrollContinue) {$('.load-more').click()} else {return false}
		}
	 });
});
//{/literal}
</script>
<input type="hidden" id="info" value="{$tsInfo.uid}" />
<div class="head_perfil clearBoth">
    <div class="information clearBoth">
        <img class="avatar floatL" src="{$tsConfig.web}/files/avatar/{if $tsInfo.p_avatar}{$tsInfo.uid}_120{else}avatar{/if}.jpg" />
        <div class="data floatL">
            <h1>{if $tsInfo.p_nombre}{$tsInfo.p_nombre}{else}{$tsInfo.nick}{/if}</h1>
            <span>@{$tsInfo.nick} - {$tsInfo.user_pais}</span><br />
            <span>{$tsInfo.stats.r_name}</span><br />
            <span id="userFollow">
            {if $tsUser->uid != $tsInfo.uid && $tsUser->is_member}
            <button onclick="seguir({$tsInfo.uid}, 'unfollow')" {if $tsInfo.follow == 1}class="active"{/if}>Dejar de seguir</button>
            <button onclick="seguir({$tsInfo.uid}, 'follow')" {if $tsInfo.follow == 0}class="active"{/if}>Seguir</button>
            {/if}
            </span>
        </div>
    </div>
   	<div id="error" class="clearBoth"></div>
    <ul class="counters clearBoth">
        <li>{$tsInfo.stats.user_puntos|posnum}<small>Puntos</small></li>
        <li><a href='{$tsConfig.url}/perfil/{$tsInfo.nick}/posts'>{$tsInfo.stats.user_posts|posnum}<small>Posts</small></a></li>
        <li>{$tsInfo.stats.user_seguidores|posnum}<small>Seguidores</small></li>
    </ul>
</div>
{if $tsAction == ''}
{if $tsPrivacidad.m.v == false}
<div class="emptyData">{$tsPrivacidad.m.m}</div>
{elseif $tsType == 'story'}
<ul class="shouts">
{include file='modules/m.perfil_muro_story.tpl'}
<div class="blanco" style="margin-top: 15px;">
	<h1 class="Titulo">Comentarios<span class="floatR">{$tsComments.total}</span></h1>
    {if $tsUser->is_member}
    <div class="box_comentario">
        <div class="caja_text">
            <img class="avatar" src="{$tsConfig.web}/files/avatar/{$tsUser->uid}_50.jpg" width="40" />
            <textarea placeholder="Escribe un comentario" id="body_comment"></textarea>
        </div>
        <div class="caja_boton">
            <img id="comment_loading" src="{$tsConfig.images}/loading.gif">
            <input type="button" id="add_comment" value="Comentar" class="btn_blue" onclick="muro.comentar({foreach from=$tsMuro.data item=p}{$p.pub_id}{/foreach})" />
        </div>
        <div id="error"></div>
    </div>
    {/if}
    <div class="post_comentarios">
        <div id="nuevos"></div>
        {if $tsComments.total > 0}
        {foreach from=$tsComments.data item=c}
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
</ul>
{else}
<div id="perfil_wall">
    <script type="text/javascript">
        muro.stream.total = {$tsMuro.total};
    </script>
    {if $tsPrivacidad.mf.v == true}
        <div class="box_comentario">
            <div class="caja_text" style="padding-left: 0;">
                <textarea placeholder="Escribe un comentario en su muro" id="body_comment"></textarea>
            </div>
            <div class="caja_boton">
            	<img id="comment_loading" src="{$tsConfig.images}/loading.gif">
                <input type="button" id="add_comment" value="Comentar" class="btn_blue" onclick="muro.stream.compartir()" />
            </div>
            <div id="error"></div>
        </div>
    {else}
        <div class="emptyData">{$tsPrivacidad.mf.m}</div>
    {/if}
    <ul class="shouts">
    {include file='modules/m.perfil_muro_story.tpl'}
   	</ul>
    {if $tsMuro.total >= 10}
    <div class="load-more" onclick="muro.stream.loadMore('perfil'); return false;">Publicaciones m&aacute;s antiguas</div>
    {elseif $tsMuro.total == 0 && $tsUser->is_member}
    <div class="emptyData">Este usuario no tiene comentarios, se el primero.</div>
    {/if}
</div>
{/if}
{elseif $tsAction == 'posts'}
	<script type="text/javascript">
        var totalPosts = {$tsPosts.total};
		//{literal}
		$(function(){
			$("img.plazyload").lazyload();
		});
		// {/literal}
    </script>
    <ul class="posts">
    {include file='modules/m.home_last_posts.tpl'}
    </ul>
    {if $tsPosts.total >= 25}
        <div class="load-more" onclick="load_more('perfil'); return false;">Cargar m&aacute;s posts</div>
   	{elseif $tsPosts.total == 0}
        <div class="emptyData">Nada por aqu&iacute;.</div>
    {/if}
{/if}             
{include file='sections/main_footer.tpl'}