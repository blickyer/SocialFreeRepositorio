{include file='sections/main_header.tpl'}
<h1 class="Titulo" align="center">{$tsAviso.titulo}</h1>
<div class="modal modal-alerta" style="display: block;">
<p>{$tsAviso.mensaje}</p>
{if $tsAviso.but}
<button onclick="location.href='{if $tsAviso.link}{$tsAviso.link}{else}{$tsConfig.url}{/if}'" class="btn_blue">{$tsAviso.but}</button>
{/if}
{if $tsAviso.return}
<button onclick="history.go(-{$tsAviso.return})" {if !$tsAviso.but}class="btn_blue"{/if}>Volver</button>
{/if}
</div>                
{include file='sections/main_footer.tpl'}