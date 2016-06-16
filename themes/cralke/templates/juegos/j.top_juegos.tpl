{* TOP JUEGOS CON MAS VISITAS *}

<div class="j-box_body j_Tops">
    <div class="j-box">
        <div class="boxy-title">Juegos con m&aacute;s visitas<div class="floatR"><span class="j_icon ji_visitas"></span></div></div>
        <div class="j-box_content j_top_juegos">
        {if $tsTopJuegos.visitas}
        {foreach from=$tsTopJuegos.visitas item=j}
        <div class="content">
        	<img src="{$tsConfig.images}/juegos/{$j.cat_img}.png" height="16" width="16" title="{$j.cat_title}" />
        	<a href="{$tsConfig.url}/juegos/{$j.juego_id}/{$j.j_title|seo}.html">{$j.j_title}</a>
            <span>{$j.j_visitas}</span>
        </div>
        {/foreach}
        {else}
        <div class="emptyData">Nada por aqui</div>
        {/if}
        </div>
    </div>
</div>

{* TOP JUEGOS CON MAS VOTOS POSITIVOS *}

<div class="j-box_body j_Tops">
    <div class="j-box">
        <div class="boxy-title">Juegos con m&aacute;s votos positivos<div class="floatR"><span class="j_icon"></span></div></div>
        <div class="j-box_content j_top_juegos">
        {if $tsTopJuegos.votos}
        {foreach from=$tsTopJuegos.votos item=j}
        <div class="content">
        	<img src="{$tsConfig.images}/juegos/{$j.cat_img}.png" height="16" width="16" title="{$j.cat_title}" />
        	<a href="{$tsConfig.url}/juegos/{$j.juego_id}/{$j.j_title|seo}.html">{$j.j_title}</a>
            <span>{$j.j_votos_pos}</span>
        </div>
        {/foreach}
        {else}
        <div class="emptyData">Nada por aqui</div>
        {/if}
        </div>
    </div>
</div>

{* TOP JUEGOS CON MAS COMENTARIOS *}

<div class="j-box_body j_Tops">
    <div class="j-box">
        <div class="boxy-title">Juegos con m&aacute;s comentarios<div class="floatR"><span class="j_icon ji_coment"></span></div></div>
        <div class="j-box_content j_top_juegos">
        {if $tsTopJuegos.comentarios}
        {foreach from=$tsTopJuegos.comentarios item=j}
        {if $j.total > 0}
        <div class="content">
        	<img src="{$tsConfig.images}/juegos/{$j.cat_img}.png" height="16" width="16" title="{$j.cat_title}" />
        	<a href="{$tsConfig.url}/juegos/{$j.juego_id}/{$j.j_title|seo}.html">{$j.j_title}</a>
            <span>{$j.total}</span>
        </div>
        {/if}
        {/foreach}
        {else}
        <div class="emptyData">Nada por aqui</div>
        {/if}
        </div>
    </div>
</div>

{* TOP JUEGOS CON MAS FAVORITOS *}

<div class="j-box_body j_Tops">
    <div class="j-box">
        <div class="boxy-title">Juegos con m&aacute;s favoritos<div class="floatR"><span class="j_icon ji_favs"></span></div></div>
        <div class="j-box_content j_top_juegos">
        {if $tsTopJuegos.favoritos}
        {foreach from=$tsTopJuegos.favoritos item=j}
        {if $j.total > 0}
        <div class="content">
        	<img src="{$tsConfig.images}/juegos/{$j.cat_img}.png" height="16" width="16" title="{$j.cat_title}" />
        	<a href="{$tsConfig.url}/juegos/{$j.juego_id}/{$j.j_title|seo}.html">{$j.j_title}</a>
            <span>{$j.total}</span>
        </div>
        {/if}
        {/foreach}
        {else}
        <div class="emptyData">Nada por aqui</div>
        {/if}
        </div>
    </div>
</div>