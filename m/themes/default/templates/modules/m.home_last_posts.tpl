{foreach from=$tsPosts.data item=p}
<li class="post-item{if $p.post_status != 0} inactive{/if}" >
    <a title="{$p.post_title}" href="{$tsConfig.url}/posts/{$p.c_seo}/{$p.post_id}/{$p.post_title|seo}.html">
    	{if $p.post_cover}        
        <img data-original="{$p.post_cover}" width="80" height="80" class="thumbnail plazyload" />
        {else}
        <img src="{$tsConfig.images}/no-cover.jpg" width="80" height="80" class="thumbnail" />
        {/if}
        <div class="post-info">
            <h3>{$p.post_title}</h3>        
            <p class="more-info"><img class="category" src="{$tsConfig.tema_web}/images/icons/cat/{$p.c_img}" /><span class="stats">{$p.post_puntos} Puntos &middot; {$p.post_comments} Comentarios</span></p>
        </div>
    </a>
</li>
{/foreach}