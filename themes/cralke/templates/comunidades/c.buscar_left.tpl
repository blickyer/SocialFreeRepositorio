<div id="bigBox">
    <div class="box_title">
        <div class="box_txt ultimos_posts">Buscar</div>
        <div class="box_rss"><span class="systemicons monitor"></span></div>
    </div>
    <div class="box_cuerpo" id="H_search">
        <form action="" method="GET" class="clearfix" id="search_form">
            <input type="text" autocomplete="off" placeholder="Buscar..." name="q" class="input-search-middle" style="margin-right: 5px;width: 500px;" />            
            <input type="submit" value="Buscar" class="input_button ibg" />
    </div>
</div>

{if $tsQuery.comus.data || $tsQuery.temas.data}
<div id="search_result">
	{if $tsQuery.comus.data}
	<div class="box_title">Comunidades</div>
    <div class="box_cuerpo">
        {foreach from=$tsQuery.comus.data item=c}
        <div class="result_item clearfix">
        	<div class="ri_image floatL"><img src="{$tsConfig.url}/files/uploads/c_{$c.c_id}.jpg" width="32" height="32" /></div>
            <div class="ri_info floatL">
        		<a class="ri_title" href="{$tsConfig.url}/comunidades/{$c.c_nombre_corto}/">{$c.c_nombre}</a><br />
            	{$c.categoria} - {$c.subcategoria} - {$c.c_temas} Temas
            </div>
            <div class="ri_right floatR">
            	<strong>{$c.c_miembros}</strong>
                Miembros
            </div>
        </div>
        {/foreach}
    </div>
    {if !$tipo && $tsQuery.comus.total > 10}<div class="com_msj_blue" style="padding: 10px;"><a href="{$tsConfig.url}/comunidades/buscar/?tipo=comus&q={$q}">Ver m&aacute;s resultados</a></div>{/if}
    <br /><br />
	{/if}
    {if $tipo == 'comus' && !$tsQuery.comus.data}<div class="com_bigmsj_yellow">No se han encontrado resultados</div>{/if}
    {if $tsQuery.temas.data} 
    <div class="com_box_title clearfix"><h2>Temas</h2><div class="cbt_right"><strong style="font-size: 14px;">{$tsQuery.temas.total}</strong></div></div>
    <div class="com_box_cuerpo clearfix">
        {foreach from=$tsQuery.temas.data item=t}
        <div class="result_item clearfix">
            <div class="ri_info floatL">
                <i class="com_icon {$t.sub_cat.c_seo}" style="vertical-align: top;"></i><a class="ri_title" href="{$tsConfig.url}/comunidades/{$t.c_nombre_corto}/{$t.t_id}/{$t.t_titulo|seo}.html">{$t.t_titulo}</a><br />
                {$t.t_fecha|hace} - En <a href="{$tsConfig.url}/comunidades/{$t.c_nombre_corto}/">{$t.c_nombre}</a> - Por  <a href="{$tsConfig.url}/perfil/{$t.user_name}/">{$t.user_name}</a> - {$t.t_votos_pos} Votos
            </div>
            <div class="ri_right floatR">
                <strong>{$t.t_respuestas}</strong>
                Respuestas
            </div>
        </div>
        {/foreach}
    </div>
    {if !$tipo && $tsQuery.temas.total > 10}<div class="com_msj_blue" style="padding: 10px;"><a href="{$tsConfig.url}/comunidades/buscar/?tipo=temas&q={$q}">Ver m&aacute;s resultados</a></div>{/if}
    {/if}
    {if $tipo == 'temas' && !$tsQuery.temas.data}<div class="com_bigmsj_yellow">No se han encontrado resultados</div>{/if}
</div>
{if $tsQuery.pages.pages > 1}
<div class="com_pagination">
    {if $tsQuery.pages.prev}<a class="cp_prev" href="{$tsConfig.url}/comunidades/buscar/?q={$q}&cat={$cat}&ord={$ord}&tipo={$tipo}&page={$tsQuery.pages.prev}"></a>{/if}
    {if $tsQuery.pages.current <= 9}
    {section name=pages start=1 loop=$tsQuery.pages.pages+1 max=9}
    <a {if $tsQuery.pages.current == $smarty.section.pages.index}class="here"{/if} href="{$tsConfig.url}/comunidades/buscar/?q={$q}&cat={$cat}&ord={$ord}&tipo={$tipo}&page={$smarty.section.pages.index}">{$smarty.section.pages.index}</a>
    {/section}
    {else}
    <a href="{$tsConfig.url}/comunidades/buscar/?q={$q}&cat={$cat}&ord={$ord}&tipo={$tipo}&page={$tsQuery.pages.current-4}">{$tsQuery.pages.current-4}</a>
    <a href="{$tsConfig.url}/comunidades/buscar/?q={$q}&cat={$cat}&ord={$ord}&tipo={$tipo}&page={$tsQuery.pages.current-3}">{$tsQuery.pages.current-3}</a>
    <a href="{$tsConfig.url}/comunidades/buscar/?q={$q}&cat={$cat}&ord={$ord}&tipo={$tipo}&page={$tsQuery.pages.current-2}">{$tsQuery.pages.current-2}</a>
    <a href="{$tsConfig.url}/comunidades/buscar/?q={$q}&cat={$cat}&ord={$ord}&tipo={$tipo}&page={$tsQuery.pages.current-1}">{$tsQuery.pages.current-1}</a>
    <a class="here" href="{$tsConfig.url}/comunidades/buscar/?q={$q}&cat={$cat}&ord={$ord}&tipo={$tipo}&page={$tsQuery.pages.current}">{$tsQuery.pages.current}</a>
    {if $tsQuery.pages.pages >= $tsQuery.pages.current+1}
    <a href="{$tsConfig.url}/comunidades/buscar/?q={$q}&cat={$cat}&ord={$ord}&tipo={$tipo}&page={$tsQuery.pages.current+1}">{$tsQuery.pages.current+1}</a>
    {/if}
    {if $tsQuery.pages.pages >= $tsQuery.pages.current+2}
    <a href="{$tsConfig.url}/comunidades/buscar/?q={$q}&cat={$cat}&ord={$ord}&tipo={$tipo}&page={$tsQuery.pages.current+2}">{$tsQuery.pages.current+2}</a>
    {/if}
    {if $tsQuery.pages.pages >= $tsQuery.pages.current+3}
    <a href="{$tsConfig.url}/comunidades/buscar/?q={$q}&cat={$cat}&ord={$ord}&tipo={$tipo}&page={$tsQuery.pages.current+3}">{$tsQuery.pages.current+3}</a>
    {/if}
    {if $tsQuery.pages.pages >= $tsQuery.pages.current+4}
    <a href="{$tsConfig.url}/comunidades/buscar/?q={$q}&cat={$cat}&ord={$ord}&tipo={$tipo}&page={$tsQuery.pages.current+4}</a>
    {/if}
    {/if}
    {if $tsQuery.pages.pages > 1 && $tsQuery.pages.pages > $tsQuery.pages.current}<a class="cp_next" href="{$tsConfig.url}/comunidades/buscar/?q={$q}&cat={$cat}&ord={$ord}&tipo={$tipo}&page={$tsQuery.pages.next}"></a>{/if}
</div>
{/if}
{else}
{if $q}
<div class="com_bigmsj_yellow">No se han encontrado resultados para "{$q}"</div>
{else}
<div class="com_bigmsj_blue">Empieza por escribir una palabra clave</div>
{/if}
{/if}