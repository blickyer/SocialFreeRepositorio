<div class="com_members_filter clearfix">
	<div class="box_title">
        <li>Mostrando <strong>{if $tsMisComus.pages.van > $tsMisComus.total}{$tsMisComus.total}{else}{$tsMisComus.pages.van}{/if}</strong> resultados de <strong>{$tsMisComus.total}</strong></li>
    </div>
    <ul class="cmf_select clearfix floatR">
    	<li><strong>Ordenar por:</strong></li>
    	<li {if $tsMisComus.orden == 'nombre'}class="active"{/if}><a href="{$tsConfig.url}/comunidades/mis-comunidades/nombre">Nombre</a></li>
        <li {if $tsMisComus.orden == 'rango'}class="active"{/if}><a href="{$tsConfig.url}/comunidades/mis-comunidades/rango">Rango</a></li>
        <li {if $tsMisComus.orden == 'miembros'}class="active"{/if}><a href="{$tsConfig.url}/comunidades/mis-comunidades/miembros">Miembros</a></li>
        <li {if $tsMisComus.orden == 'temas'}class="active"{/if}><a href="{$tsConfig.url}/comunidades/mis-comunidades/temas">Temas</a></li>
        <li {if $tsMisComus.orden == 'fecha'}class="active"{/if}><a href="{$tsConfig.url}/comunidades/mis-comunidades/fecha">Fecha</a></li>
    </ul>
</div>
{if $tsMisComus.pages.pages > 1}
<div class="box_cuerpo clearfix">
<div class="com_pagination">
	{if $tsMisComus.pages.prev}<a class="cp_prev" href="{$tsConfig.url}/comunidades/mis-comunidades/{$tsMisComus.orden}.{$tsMisComus.pages.prev}/"></a>{/if}
	{section name=pages start=1 loop=$tsMisComus.pages.pages+1 max=$tsMisComus.pages.pages}
    <a {if $tsMisComus.pages.current == $smarty.section.pages.index}class="here"{/if} href="{$tsConfig.url}/comunidades/mis-comunidades/{$tsMisComus.orden}.{$smarty.section.pages.index}/">{$smarty.section.pages.index}</a>
    {/section}
    {if $tsMisComus.pages.pages > 1 && $tsMisComus.pages.pages > $tsMisComus.pages.current}<a class="cp_next" href="{$tsConfig.url}/comunidades/mis-comunidades/{$tsMisComus.orden}.{$tsMisComus.pages.next}/"></a>{/if}
</div>
{/if}
<div id="com_members_result">
    {foreach from=$tsMisComus.data item=m}
    <div class="com_list_members clearfix">
    	<div class="clm_avatar floatL"><a href="{$tsConfig.url}/comunidades/{$m.c_nombre_corto}/"><img src="{$tsConfig.url}/files/uploads/c_{$m.c_id}.jpg" width="75" height="75" /></a></div>
        <ul class="clm_info clearfix floatL">
        	<li><h4><a href="{$tsConfig.url}/comunidades/{$m.c_nombre_corto}/">{$m.c_nombre}</a></h4></li>
            <li>Categor&iacute;a: <strong>{$m.categoria}</strong></li>
            <li title="{$m.c_descripcion}">{$m.c_descripcion|limit:85}</li>
            <li>Miembros <strong>{$m.c_miembros}</strong> - Temas <strong>{$m.c_temas}</strong></li>
            <li>Mi rango: <strong>{if $m.m_permisos == 5}Administrador{elseif $m.m_permisos == 4}Moderador{elseif $m.m_permisos == 3}Posteador{elseif $m.m_permisos == 2}Comentador{elseif $m.m_permisos == 1}Visitante{/if}</strong></li>
        </ul>
    </div>
    {/foreach}
</div>
{if $tsMisComus.pages.pages > 1}
<div class="com_pagination">
	{if $tsMisComus.pages.prev}<a class="cp_prev" href="{$tsConfig.url}/comunidades/mis-comunidades/{$tsMisComus.orden}.{$tsMisComus.pages.prev}/"></a>{/if}
	{section name=pages start=1 loop=$tsMisComus.pages.pages+1 max=$tsMisComus.pages.pages}
    <a {if $tsMisComus.pages.current == $smarty.section.pages.index}class="here"{/if} href="{$tsConfig.url}/comunidades/mis-comunidades/{$tsMisComus.orden}.{$smarty.section.pages.index}/">{$smarty.section.pages.index}</a>
    {/section}
    {if $tsMisComus.pages.pages > 1 && $tsMisComus.pages.pages > $tsMisComus.pages.current}<a class="cp_next" href="{$tsConfig.url}/comunidades/mis-comunidades/{$tsMisComus.orden}.{$tsMisComus.pages.next}/"></a>{/if}
</div></div>
{/if}