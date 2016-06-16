{foreach from=$tsRelated.data item=p}
<a title="{$p.post_title}" href="{$tsConfig.url}/posts/{$p.c_seo}/{$p.post_id}/{$p.post_title|seo}.html"><div><img src="{if $p.post_cover}{$tsConfig.url}/inc/php/timthumb.php?src={$p.post_cover}&h=111&w=145{else}{$tsConfig.tema.t_url}/images/no-cover.jpg{/if}" /><span>{$p.post_title}</span></div></a>
{/foreach}
<input type="hidden" id="total_related" value="{$tsRelated.total}" />