1:
<div id="perfil_posts" status="activo">
    <div class="widget w-posts clearfix">
    	<div class="title-w clearfix">
            <h3 style="margin-top: 2px;">&Uacute;ltimos Posts creados por {$tsUsername}</h3>
            <span><a title="" href="/rss/posts-usuario/" class="systemicons sRss"></a></span>
        </div>
        {if $tsGeneral.posts}
        <ul  style="border: 1px solid #E8E8E8;padding:3px;font-family: sans-serif;" class="ultimos">
            {foreach from=$tsGeneral.posts item=p}
        	<li class="categoriaPost cat-posts" style="background-image:url({$tsConfig.tema.t_url}/mega/cat/{$p.c_img})">
                <a title="{$p.post_title}" target="_self" href="{$tsConfig.url}/posts/{$p.c_seo}/{$p.post_id}/{$p.post_title|seo}.html">{$p.post_title|truncate:45}</a>
                <span>{$p.post_puntos} Puntos</span>
            </li>
            {/foreach}
            {if $tsGeneral.total >= 18}
            <li class="see-more"><a href="{$tsConfig.url}/buscador/?autor={$tsGeneral.username}">Ver m&aacute;s &raquo;</a></li>
            {/if}
        </ul>
        {else}
        <div class="emptyData">No hay posts</div>
        {/if}
    </div>
</div>