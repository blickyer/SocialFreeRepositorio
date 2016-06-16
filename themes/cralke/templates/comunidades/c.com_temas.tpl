<div id="bigBox">
    <div class="box_title clearfix">Temas
    {if $tsCom.es_miembro && $tsCom.mi_rango > 2}<a href="{$tsConfig.url}/comunidades/{$tsCom.c_nombre_corto}/agregar/" class="floatR input_button ibg">Nuevo tema</a>{/if}
    </div>
    <div class="box_cuerpo" id="ult_comm" style="padding: 0pt;">
    {include file='t.comus_ajax/c.pages_temas.tpl'}
    </div>    
</div>