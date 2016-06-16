{include file='sections/main_header.tpl'}
<script type="text/javascript">
var totalPosts = {$tsPosts.total};
//{literal}
$(function(){
	$(window).scroll(function(){
		var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
		var scrolltrigger = 0.95;
		if ((wintop / (docheight - winheight)) > scrolltrigger) {
			if(scrollContinue) {$('.load-more').click()} else {return}
		}
	 });
	$("img.plazyload").lazyload();
});
//{/literal}
</script>
<h1 class="Titulo">&Uacute;ltimos posts<span class="floatR">{$tsPosts.stats_posts}</span></h1>
{include file='sections/main_submenu.tpl'}
<div class="category-filter">
    <select onchange="document.location.href='{$tsConfig.url}/posts/' + $(this).val() + '/'">
        <option selected="selected" value="root">Seleccionar categoría</option>
        <option value="{if $tsConfig.c_allow_portal == 0}-1{else}-2{/if}">Ver Todas</option>
        {foreach from=$tsConfig.categorias item=c}
        <option value="{$c.c_seo}" {if $tsCategoria == '$c.c_seo'}selected="selected"{/if}>{$c.c_nombre}</option>
        {/foreach}
    </select>
    <i class="arrow"></i>
</div>
{if $tsCarrousel.total > 0}
<ul class="carrousel" total="{$tsCarrousel.total}">
    {foreach from=$tsCarrousel.data item=p key=i}
    <li id="cpost_{$i+1}" class="c_item{if $i+1 == 1} active{/if}">
        {if $tsCarrousel.total > 1}<a class="c_left" onclick="carrousel({$i})"></a>{/if}
        <a href="{$tsConfig.url}/posts/{$p.c_seo}/{$p.post_id}/{$p.post_title|seo}.html">
        {if $p.post_cover}        
        <img data-original="{$p.post_cover}" width="80" height="80" class="c_cover plazyload" />
        {else}
        <img src="{$tsConfig.images}/no-cover.jpg" width="80" height="80" class="c_cover thumbnail" />
        {/if}      
        <div class="c_desc">
            <h2 class="c_title">{$p.post_title}</h2>
            <img class="category" src="{$tsConfig.tema_web}/images/icons/cat/{$p.c_img}" /><span class="stats">{$p.post_puntos} Puntos &middot; {$p.post_comments} Comentarios</span>
            <ul class="dots">
            	{foreach from=$tsCarrousel.data item=p key=j}
                <li{if $i==$j} class="active"{/if}></li>
                {/foreach}
            </ul>
        </div>
        </a>
        {if $tsCarrousel.total > 1}<a class="c_right" onclick="carrousel({$i+2})"></a>{/if}
    </li>
    {/foreach}
</ul>
{/if}
{if $tsPosts.data}
<ul class="posts">
    {include file='modules/m.home_last_posts.tpl'}
</ul>
{else}
<li class="emptyData">No hay posts aqu&iacute;</li>
{/if}
{if $tsPosts.total == 25}
<div class="load-more" onclick="load_more('posts')">Ver m&aacute;s</div>
{/if}

{include file='sections/main_footer.tpl'}