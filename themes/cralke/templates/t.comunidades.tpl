{include file='sections/main_header.tpl'}

	<script type="text/javascript">
    // {literal}
    var global_com = {
    // {/literal}
        comid:'{$tsCom.c_id}',
        temaid:'{$tsTema.t_id}',
    // {literal}
    };
    // {/literal}
    </script>	
    	
	<script type="text/javascript" src="{$tsConfig.js}/comunidades.js"></script>  
    
    {if $tsCom.c_id}
        <body style="background-color: #{$tsCom.c_back_color};background-repeat: {if $tsCom.c_back_repeat}repeat{else}no-repeat{/if};">
    {/if}
    {if $tsTema.t_estado == 1}
    <div class="com_bigmsj_red">Este tema est&aacute; eliminado</div>
    {/if}
    
    {if $tsAction == '' || $tsAction == 'home'}
<div id="izquierda">
    		{include file='comunidades/c.inicio_left.tpl'}
               </div>
            <div id="centro">
            {include file='comunidades/c.inicio_center.tpl'}
        </div>
       <div id="derecha">
        	{include file='comunidades/c.inicio_right.tpl'}
            <br class="spacer"/>
            {include file='modules/m.global_ads_160.tpl'}
        </div>
    {elseif $tsAction == 'crear' || $tsAction == 'editar'}    
		<form action="" method="post" id="add_new_com" enctype="multipart/form-data">
            <div class="com_left">
            	{include file='comunidades/c.crear_left.tpl'}
            </div>
            <div class="com_right">
            	{include file='comunidades/c.crear_right.tpl'}
            </div>
        </form>
    {elseif $tsAction == 'agregar' || $tsAction == 'editar-tema'}
    	{include file='comunidades/c.agregar_tema.tpl'}
    {elseif $tsAction == 'tema'}
    	<div class="com_left">
            {include file='comunidades/c.com_info.tpl'}
            {include file='comunidades/c.tema_cuerpo.tpl'}
            {include file='comunidades/c.tema_comentarios.tpl'}
        </div>
        <div class="com_right">
        	{include file='comunidades/c.tema_autor.tpl'}
        </div>
    {elseif $tsAction == 'mis-comunidades'}
    	<div class="com_left">
            {include file='comunidades/c.mis-comunidades_left.tpl'}
        </div>
        <div class="com_right">
        </div>
    {elseif $tsAction == 'miembros'}
    	<div class="com_left">
            {include file='comunidades/c.miembros_left.tpl'}
        </div>
        <div class="com_right">
        	{include file='comunidades/c.miembros_right.tpl'}
        </div>
    {elseif $tsAction == 'dir'}
    	<div class="com_left">
	    	{include file='comunidades/c.directorio_left.tpl'}
        </div>
        <div class="com_right">
	    	{include file='comunidades/c.directorio_right.tpl'}
        </div>
    {elseif $tsAction == 'mod-history'}
	    {include file='comunidades/c.historial.tpl'}
    {elseif $tsAction == 'com-mod-history'}
	    {include file='comunidades/c.com_historial.tpl'}
    {elseif $tsAction == 'buscar'}
        <div class="com_left">
            {include file='comunidades/c.buscar_left.tpl'}
        </div>
        <div class="com_right">
            {include file='comunidades/c.buscar_right.tpl'}
        </div>
	{elseif $tsAction == 'favoritos'}
    	{if $tsFavoritos.data}
        <div class="com_left">
            {include file='comunidades/c.favoritos_left.tpl'}
        </div>
        <div class="com_right">
            {include file='comunidades/c.favoritos_right.tpl'}
        </div>
        {else}
        <div class="com_bigmsj_blue">No has agregado temas a tus favoritos a&uacute;n</div>
        <br>
        {/if}
    {elseif $tsAction == 'borradores'}
    	{if $tsBorradores.data}
        <div class="com_left">
            {include file='comunidades/c.borradores_left.tpl'}
        </div>
        <div class="com_right">
            {include file='comunidades/c.borradores_right.tpl'}
        </div>
        {else}
        <div class="com_bigmsj_blue">No tienes ning&uacute;n borrador a&uacute;n</div>
        <br>
        {/if}
    {else}
        <div class="com_left">
            {include file='comunidades/c.com_info.tpl'}
            {include file='comunidades/c.com_temas.tpl'}
        </div>
        <div class="com_right">
        	{include file='comunidades/c.com_right.tpl'}
        </div>
    {/if}

{include file='sections/main_footer.tpl'}