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
<h1 class="Titulo">Posts favoritos<span class="floatR">{$tsPosts.stats_posts}</span></h1>
{include file='sections/main_submenu.tpl'}
{if $tsPosts.data}
<ul class="posts">
    {include file='modules/m.home_last_posts.tpl'}
</ul>
{else}
<li class="emptyData">No haz agregado posts en tus favoritos.</li>
{/if}
{if $tsPosts.total == 25}
<div class="load-more" onclick="load_more('favs')">Ver m&aacute;s</div>
{/if}

{include file='sections/main_footer.tpl'}