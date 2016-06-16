{include file='sections/main_header.tpl'}
<div class="blanco">
    <h1 class="Titulo">Usuario suspendido</h1>
    <div style="padding:10px;"
    <p>Hola, <b>{$tsUser->nick}</b> lamentamos informarte que has sido suspendido de <b>{$tsConfig.titulo}</b></p><br />
    <h4>Raz&oacute;n:</h4>
    {$tsBanned.susp_causa}<br /><br />
    <h4>Fin de suspensi&oacute;n:</h4>
    {if $tsBanned.susp_termina == 0}Indefinidamente{elseif $tsBanned.susp_termina == 1}Permanentemente{else}{$tsBanned.susp_termina|date_format:"%d/%m/%Y a las %H:%M:%S"}hs{/if}<br /><br />
    <h4>Fecha actual:</h4>
    {$smarty.now|date_format:"%d/%m/%Y %H:%M:%S"}hs.
    </div>
</div>
{include file='sections/main_footer.tpl'}
                                    