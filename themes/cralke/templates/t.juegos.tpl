{include file='sections/main_header.tpl'}
	<script type="text/javascript" src="{$tsConfig.js}/juegos.js"></script>
	{if $tsAction == ''}
	<div class="j-izq">
		{include file='juegos/j.home.tpl'}
	</div>
	<div class="j-der">
		{include file='juegos/j.home_right.tpl'}
	</div>
	{/if}
	<div id="bg-juegos">
		{if $tsAction == 'agregar' | $tsAction == 'editar'}
		<div class="j-izq">
			{include file='juegos/j.agregar.tpl'}
		</div>
		<div class="j-der">
			{include file='juegos/j.agregar_right.tpl'}
		</div>
		{elseif $tsAction == 'ver'}   
		<div class="j-izq">				
			{include file='juegos/j.jugar.tpl'}
		</div>
		<div class="j-der">
			{include file='juegos/j.jugar_right.tpl'}
		</div>
		{elseif $tsAction == 'album'}
		<div style="padding:10px;">
			{include file='juegos/j.album.tpl'}
		</div>
        {elseif $tsAction == 'favoritos'}
        <div style="padding:10px;">
			{include file='juegos/j.favoritos.tpl'}
		</div>
        {elseif $tsAction == 'tops'}
        <div style="overflow: hidden;">
			{include file='juegos/j.top_juegos.tpl'}
		</div>
		{/if}
	</div>
    <div align="right" style="opacity: 0.3;clear: both;font-size: 11px;">M&oacute;dulo de juegos creado por Kmario19 para PHPost</div>
    <div style="clear:both"></div>
{include file='sections/main_footer.tpl'}