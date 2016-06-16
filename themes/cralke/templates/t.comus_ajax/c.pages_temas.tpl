{if $tsTemas.sticky || $tsTemas.data}
{if $tsTemas.pages.current == 1}
{foreach from=$tsTemas.sticky item=t}

<div class="com_tema_list clearfix">
    <div class="ctl_autor floatL">
        <a href="{$tsConfig.url}/perfil/{$t.user_name}/" title="Ver perfil de {$t.user_name}"><img src="{$tsConfig.url}/files/avatar/{$t.t_autor}_50.jpg" width="32" height="32" /></a>
    </div>
    <div class="ctl_info">
        <a href="{$tsConfig.url}/comunidades/{$t.c_nombre_corto}/{$t.t_id}/{$t.t_titulo|seo}.html"><i class="com_icon icon_sticky"></i>{$t.t_titulo}</a>
        <span class="ctli_detalles">Por <a href="{$tsConfig.url}/perfil/{$t.user_name}/" title="Ver perfil de {$t.user_name}">{$t.user_name}</a> {$t.t_fecha|hace}</span>
        <div class="ctli_comment">
            <i class="com_icon icon_comment"></i><span>{$t.t_respuestas}</span>
        </div>
        <div class="ctli_like">
            <i class="com_icon icon_hand_up"></i><span>{$t.t_votos_pos-$t.t_votos_neg}</span>
        </div>
    </div>
</div>
{/foreach}
{/if}
{foreach from=$tsTemas.data item=t}
<div class="com_tema_list clearfix" {if $t.t_estado == 1}style="opacity: 0.5;background: #000;" title="El tema ha sido eliminado"{/if}>
    <div class="ctl_autor floatL">
        <a href="{$tsConfig.url}/perfil/{$t.user_name}/" title="Ver perfil de {$t.user_name}"><img src="{$tsConfig.url}/files/avatar/{$t.t_autor}_50.jpg" width="32" height="32" /></a>
    </div>
    <div class="ctl_info">
        <a href="{$tsConfig.url}/comunidades/{$t.c_nombre_corto}/{$t.t_id}/{$t.t_titulo|seo}.html">{$t.t_titulo}</a>
        <span class="ctli_detalles">Por <a href="{$tsConfig.url}/perfil/{$t.user_name}/" title="Ver perfil de {$t.user_name}">{$t.user_name}</a> {$t.t_fecha|hace}</span>
        <div class="ctli_comment">
            <i class="com_icon icon_comment"></i><span>{$t.t_respuestas}</span>
        </div>
        <div class="ctli_like">
            <i class="com_icon icon_hand_up"></i><span>{$t.t_votos_pos-$t.t_votos_neg}</span>
        </div>
    </div>
</div>
{/foreach}
{if $tsTemas.pages.pages > 1}
<div class="com_pagination">
    {if $tsTemas.pages.prev}<a class="cp_prev" href="javascript:com.pages_temas({$tsTemas.pages.prev});"></a>{/if}
    {if $tsTemas.pages.current <= 9}
    {section name=pages start=1 loop=$tsTemas.pages.pages+1 max=9}
    <a {if $tsTemas.pages.current == $smarty.section.pages.index}class="here"{/if} href="javascript:com.pages_temas({$smarty.section.pages.index});">{$smarty.section.pages.index}</a>
    {/section}
    {else}
    <a href="javascript:com.pages_temas({$tsTemas.pages.current-4});">{$tsTemas.pages.current-4}</a>
    <a href="javascript:com.pages_temas({$tsTemas.pages.current-3});">{$tsTemas.pages.current-3}</a>
    <a href="javascript:com.pages_temas({$tsTemas.pages.current-2});">{$tsTemas.pages.current-2}</a>
    <a href="javascript:com.pages_temas({$tsTemas.pages.current-1});">{$tsTemas.pages.current-1}</a>
    <a class="here" href="javascript:com.pages_temas({$tsTemas.pages.current});">{$tsTemas.pages.current}</a>
    {if $tsTemas.pages.pages >= $tsTemas.pages.current+1}
    <a href="javascript:com.pages_temas({$tsTemas.pages.current+1});">{$tsTemas.pages.current+1}</a>
    {/if}
    {if $tsTemas.pages.pages >= $tsTemas.pages.current+2}
    <a href="javascript:com.pages_temas({$tsTemas.pages.current+2});">{$tsTemas.pages.current+2}</a>
    {/if}
    {if $tsTemas.pages.pages >= $tsTemas.pages.current+3}
    <a href="javascript:com.pages_temas({$tsTemas.pages.current+3});">{$tsTemas.pages.current+3}</a>
    {/if}
    {if $tsTemas.pages.pages >= $tsTemas.pages.current+4}
    <a href="javascript:com.pages_temas({$tsTemas.pages.current+1});">{$tsTemas.pages.current+4}</a>
    {/if}
    {/if}
    {if $tsTemas.pages.pages > 1 && $tsTemas.pages.pages > $tsTemas.pages.current}<a class="cp_next" href="javascript:com.pages_temas({$tsTemas.pages.next});"></a>{/if}
</div>
{/if}

{else}
<div class="com_bigmsj_blue">No se han creado temas en esta comunidad</div>
{/if}