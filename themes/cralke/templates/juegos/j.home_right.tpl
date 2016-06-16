<!--MOD JUEGOS BY KMARIO19-->

{* ESTADISTICAS *}

<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title">Estad&iacute;sticas</div>
	<div class="j-box_content" style="padding: 10px 0px;">
	    <div class="j_stat">
        <a href="{$tsConfig.url}/usuarios/">
        	<b>{$tsStats.stats_miembros}</b>
		    <div>Miembros</div>
        </a>
		</div>
	    <div class="j_stat">
        	<b>{$tsStats.stats_juegos}</b>
		    <div>Juegos</div>
		</div>
        <div class="j_stat"> 
        	<b>{$tsStats.stats_juego_comments}</b>       	
			<div>Comentarios</div>
        </div>
	</div>
</div>
</div>

{* ULTIMOS COMENTARIOS *}

<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title">&Uacute;ltimos Comentarios</div>
    <div class="j-box_content" style="padding: 5px;">
	{if $tsStats.stats_juego_comments > 0}
    	{foreach from=$tsLastComments item=c key=i}	
    	<div class="lcomen" style="height: auto;"> 
        	{* <span style="color: #1262BE; font-weight: bold;">{if $i < 9}0{/if}{$i+1}. </span> *}
            <a href="{$tsConfig.url}/perfil/{$c.user_name}/" class="hovercard" uid="{$c.c_user}"><strong>{$c.user_name}</strong></a> &raquo;
            <a href="{$tsConfig.url}/juegos/{$c.juego_id}/{$c.j_title|seo}.html#div_cmnt_{$c.cid}" title="{$c.c_date|hace}">{$c.j_title}</a>
        </div>
		{/foreach}				
	{else}
		<div class="emptyData">A&uacute;n no se han comentado juegos.</div>
	{/if}
    </div>
</div>
</div>

{* LOS MAS JUGADOS *}

{if $tsStats.stats_juegos > 2}
<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title">Los m&aacute;s jugados</div>
</div>
</div>	
    <div id="j-hits">
        {foreach from=$tsMostJuegos item=j}
        <a href="{$tsConfig.url}/juegos/{$j.juego_id}/{$j.j_title|seo}.html">
            <img class="j-img qtip" src="{$j.j_imagen}" width="85" height="85" title="{$j.j_title}">			
                <span class="visitas" title="Visitas"><img src="{$tsConfig.tema.t_url}/images/j-eye.png"> {$j.j_hits}</span>
        </a>				
        {/foreach}
    </div>
{/if}

{* CATEGORIAS *}

<div class="j-box_body" style="margin-top: 5px;">
<div class="j-box">
    <div class="boxy-title" style="border-bottom: 0;">Categor&iacute;as</div>
    <div class="j-box_content">				
			{foreach from=$tsCategorias item=c}
			<div style="padding: 5px;border-top: 1px solid #ccc;font-size: 14px;font-weight: bold;"><a href="{$tsConfig.url}/juegos/cat/{$c.cat_img}" style="color: #1262BE;display: block;"><img src="{$tsConfig.images}/juegos/{$c.cat_img}.png" height="24" width="24" style="vertical-align: middle;" /> {$c.cat_title} <span class="floatR" style="clear:both;">{$tsJuegos->cat_total($c.cat_id)}{$c.total}</span></a></div>
            {/foreach}
	</div>
</div>
</div>

<!--MOD JUEGOS BY KMARIO19-->