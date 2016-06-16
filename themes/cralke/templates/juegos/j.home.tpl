<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title">{if $tsLastJuegos.cat}Juegos de {$tsLastJuegos.cat}{else}&Uacute;ltimos juegos{/if}<div class="floatR">{$tsLastJuegos.total}</div></div>
</div>
</div>
<div class="ccontenido">
	{if $tsLastJuegos.total > 0}
    <div class="cu-fotos">
        {foreach from=$tsLastJuegos.data item=j} 
		<div id="listjuegos" {if $j.j_status != 0 || $j.user_activo == 0 || $j.user_baneado == 1}class="qtip" title="{if $j.j_status == 2}Juego eliminada{elseif $j.j_status == 1}Juego oculta por acumulaci&oacute;n de denuncias{elseif $j.user_activo == 0}La cuenta del usuario est&aacute; desactivada{elseif $j.user_baneado == 1}La cuenta del usuario est&aacute; suspendida{/if}" style="border: 1px solid {if $j.j_status == 2}red{elseif $j.j_status == 1}coral{elseif $j.user_activo == 0}brown{elseif $j.user_baneado == 1}orange{/if};opacity: 0.5;filter: alpha(opacity=50);"{/if}> 
		<a href="{$tsConfig.url}/juegos/{$j.juego_id}/{$j.j_title|seo}.html">
			<span class="jtitle">{$j.j_title|truncate:35}</span> 
			<div class="jimagen">
				<img src="{$j.j_imagen}" title="{$j.j_title}">
			</div>
			<div class="javatar">
				<a href="{$tsConfig.url}/perfil/{$j.user_name}"><img src="{$tsConfig.url}/files/avatar/{$j.user_id}_50.jpg?{$smarty.now|date_format:"%Y%m%d%H%M%S"}" title="Ver perfil de {$j.user_name}"></a>
			</div>
			{if $j.j_hits > 10}
				<span class="jstar qtip" title="Popular"></span>
			{/if}
			<div class="jinfo">			
				<span class="visitas" title="Visitas"></span> {$j.j_hits}
				<span class="v_pos" title="Votos positivos"></span> {$j.j_votos_pos}
			</div> 
		</a> 
	</div>
	    {/foreach}				
    </div>
    <div class="sec-pagi" align="center">
        <div class="c-pagi" style="font-size: 15px;padding: 8px 0;">					
            P&aacute;ginas: {$tsLastJuegos.pages}
        </div>					
    </div>
	{else}
	<div class="emptyData" style="margin-right: 10px;">{if $tsLastJuegos.cat}No hay juegos con la categor&iacute;a {$tsLastJuegos.cat}.{else}A&uacute;n nadie ha compartido juegos, se el primero.{/if}</div>
	{/if}
</div> 