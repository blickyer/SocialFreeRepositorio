{include file='sections/main_header.tpl'}
<script type="text/javascript">
var totalPosts = {$tsPosts.total};
//{literal}
$(function(){
	$(window).scroll(function(){
		var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
		var scrolltrigger = 0.95;
		if ((wintop / (docheight - winheight)) > scrolltrigger) {
			//{/literal}
			$('.load-more').click();
			// {literal}
		}
	 });
	 $("img.plazyload").lazyload();
});
//{/literal}
</script>
<h1 class="Titulo">Top posts</h1>
{include file='sections/main_submenu.tpl'}
{if $tsAction == 'posts'}
<div class="category-filter">
    <select onchange="document.location.href='{$tsConfig.url}/top/posts/?cat=' + $(this).val()">
        <option selected="selected" value="root">Seleccionar categoría</option>
        <option value="{if $tsConfig.c_allow_portal == 0}-1{else}-2{/if}">Ver Todas</option>
        {foreach from=$tsConfig.categorias item=c}
        <option value="{$c.c_seo}" {if $tsCategoria == '$c.c_seo'}selected="selected"{/if}>{$c.c_nombre}</option>
        {/foreach}
    </select>
    <i class="arrow"></i>
</div>
{if $tsPosts.data}
<ul class="posts">
    {include file='modules/m.home_last_posts.tpl'}
</ul>
{else}
<li class="emptyData">No hay posts aqu&iacute;</li>
{/if}
{if $tsPosts.total == 25}
<div class="load-more" onclick="load_more('tops')">Ver m&aacute;s</div>
{/if}
{/if}                
{include file='sections/main_footer.tpl'}