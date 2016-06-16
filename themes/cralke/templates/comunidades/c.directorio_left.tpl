{*<div class="com_members_filter clearfix">
	<div class="clearfix floatL">
	<input type="text" class="input_text floatL" style="width: 305px;margin: 0;margin-right: 3px;" placeholder="Buscar en comunidades" /><input type="button" value="Buscar" class="input_button ibg" style="margin: 0;" />
    </div>
</div>*}
<div class="com_loc_global">
	<ul class="clearfix">
    	<li><a href="{$tsConfig.url}/comunidades/">Comunidades</a></li>
        <li><a href="{$tsConfig.url}/comunidades/dir/">Directorio</a></li>
        {if $tsDir.c_seo}
        <li><a href="{$tsConfig.url}/comunidades/dir/{$tsDir.global_url}/">{$tsDir.global_pais}</a></li>
        <li>{$tsDir.c_nombre}</li>
        {elseif $tsDir.sub.sid > 0}
        <li><a href="{$tsConfig.url}/comunidades/dir/{$tsDir.global_url}">{$tsDir.global_pais}</a></li>
        <li><a href="{$tsConfig.url}/comunidades/dir/{$tsDir.global_url}/{$tsDir.sub.c_seo}">{$tsDir.sub.c_nombre}</a></li>
        <li>{$tsDir.sub.s_nombre}</li>
        {else}
        <li>{$tsDir.global_pais}</li>
        {/if}
    </ul>
</div>
<div class="box_title">Directorio</div>
<div class="box_cuerpo">
	{if $tsDir.c_seo}
    	{foreach from=$tsDir.data item=d}
        <div class="cdr_item" style="height:26px;">
            <i class="com_icon {$tsDir.c_seo}"></i>
            <a class="nombre" href="{$tsConfig.url}/comunidades/dir/{$tsDir.global_url}/{$d.c_seo}/{$d.s_seo}">{$d.s_nombre}</a>
            <span>{$d.total}</span>
        </div>
        {/foreach}
    {elseif $tsDir.sub.sid > 0}
    	<div id="com_members_result">
            {foreach from=$tsDir.data item=m}
            <div class="cdr_list clearfix">
                <div class="cdrl_avatar floatL"><a href="{$tsConfig.url}/comunidades/{$m.c_nombre_corto}/"><img src="{$tsConfig.url}/files/uploads/c_{$m.c_id}.jpg" width="75" height="75" /></a></div>
                <ul class="cdrl_info clearfix floatL">
                    <li><h4><a href="{$tsConfig.url}/comunidades/{$m.c_nombre_corto}/">{$m.c_nombre}</a></h4></li>
                    <li style="width: 530px;">{$m.c_descripcion|limit:150}</li>
                    <li>Miembros <strong>{$m.c_miembros}</strong> - Temas <strong>{$m.c_temas}</strong></li>
                </ul>
            </div>
            {/foreach}
            {if $tsDir.pages.pages > 1}
            <div style="margin-top: 10px;" class="clearfix">
            	{if $tsDir.pages.prev}<a class="floatL" href="{$tsConfig.url}/comunidades/dir/{$tsDir.global_url}/{$tsDir.sub.c_seo}/{$tsDir.sub.s_seo}/{$tsDir.pages.prev}">&laquo; Anterior</a>{/if}
                {if $tsDir.pages.pages > 1 && $tsDir.pages.pages > $tsDir.pages.current}<a class="floatR" href="{$tsConfig.url}/comunidades/dir/{$tsDir.global_url}/{$tsDir.sub.c_seo}/{$tsDir.sub.s_seo}/{$tsDir.pages.next}">Siguiente &raquo;</a>{/if}
            
            {/if}
        </div>
    {else}
        {foreach from=$tsDir.data item=d}
        <div class="cdr_item">
            <i class="com_icon {$d.c_seo}"></i>
            <a class="nombre" href="{$tsConfig.url}/comunidades/dir/{$tsDir.global_url}/{$d.c_seo}">{$d.c_nombre}</a>
            <span>{$d.total}</span>
            <div class="cdr_subs">
                {foreach from=$d.sub_cat item=s key=i}
                {if $i > 0}, {/if}<a href="{$tsConfig.url}/comunidades/dir/{$tsDir.global_url}/{$d.c_seo}/{$s.s_seo}" title="{$s.total} Comunidad{if $s.total > 1}es{/if}">{$s.s_nombre}</a>
                {/foreach}
            </div>
        </div>
        {/foreach}
    {/if}
</div>