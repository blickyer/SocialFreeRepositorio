{include file='sections/main_header.tpl'}
<h1 class="Titulo" align="center">Opps!</h1>
<div class="modal modal-alerta" style="display: block;">
<p>{$tsAviso.1}</p>
<button onclick="history.back()" {if !$tsAviso.but}class="btn_blue"{/if}>Volver</button>
</div>
                
{include file='sections/main_footer.tpl'}