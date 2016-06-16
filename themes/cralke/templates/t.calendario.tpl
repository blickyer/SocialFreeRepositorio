{include file='sections/main_header.tpl'}
<style>
{literal}
.calendar {
width: 100%;
background: #FFF;	
}
.calendar thead {
background: #b6c7db;
color: #1d3652;	
}
.calendar thead th {
padding: 7px;
font-size: 15px;
text-align: center;
}
.calendar tbody tr {
background: #FFF;	
}
.calendar tbody tr td:hover {
background: #EDF1F5;
}
.calendar tbody tr:nth-child(2n+0) {
background: #f1f6f9;	
}
.calendar tbody tr td{
font-size: 0.9em;
vertical-align: top;
border: 1px solid #F1F4F7;
padding: 5px;
height: 95px;
width: 14%;
}
.calendar tbody tr .c_day {
display: block;
font-size: 15px;
margin-bottom: 4px;
font-weight: bold;
color: #225985;	
}
.calendar tbody tr td.hoy {
border: 1px solid #6f8f52;
background-color: #f1f6ec;	
}
.calendar tbody tr td.vacio {
background: #dbe2e8;
border-color: #dbe2e8;	
}
.calendar tbody tr td div a {
width: 100%;
font-size: 12px;
color: #1C74AF;	
}
.cont_left {
width: 70%;
float: left;	
}
.cont_right {
width: 30%;
float: left;	
}
.cont_right .cr_body  {
background: #FFF;
border-radius: 4px;
padding: 10px;	
}
.cont_right .cr_body.cr_cumple {
margin-top: 10px;
}
.cont_right .cr_body.cr_cumple .user_cumple {
margin-bottom: 3px;
font-size: 13px;
color: #A5A5A5;
}
.cont_right .cr_body.cr_cumple .user_cumple a {
color: #1C74AF;	
}
.cont_right .cr_body.cr_cumple .cr_avatar img {
padding: 1px;
border: 1px solid #d5d5d5;
background: #fff;
-webkit-box-shadow: 0px 2px 2px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 2px 2px rgba(0,0,0,0.1);
box-shadow: 0px 2px 2px rgba(0,0,0,0.1);
vertical-align: middle;
}
.cont_right .cr_body.cr_fecha div {
font: 300 84px/58px 'Helvetica Neue',helvetica,arial,sans-serif;
margin-bottom: 8px;	
}
.cont_right .cr_body.cr_fecha span {
text-transform: uppercase;
font-size: 16px;		
}
.e_item {
padding: 10px;
}
.e_item label {
font-weight: bold;
font-size: 15px;
display: block;
margin-bottom: 5px;	
}
.e_item input{
width: 890px;
padding: 10px 5px;	
}
.e_item textarea {
width: 926px;	
}
.markItUpHeader {
-moz-border-radius: 5px;
background: #eee;
border: 1px solid #ccc;
width: 936px;
border-bottom: 0;
height: 32px;
border-radius: 5px 5px 0 0;
}
.markItUpHeader ul li {
position: relative;
}
.et_titulo {
background: #D8DDE8;
margin-right: 10px;	
}
.et_titulo .et_avatar img {
padding: 2px;
border: 1px solid #d5d5d5;
background: #fff;
-webkit-box-shadow: 0px 2px 2px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 2px 2px rgba(0,0,0,0.1);
box-shadow: 0px 2px 2px rgba(0,0,0,0.1);
margin: 5px;
float: left;
}
.et_titulo b {
font-size: 16px;
padding-top: 13px;
margin-bottom: 3px;
display: block;	
}
.et_cuerpo {
background: #FFF;
padding: 10px;
margin-right: 10px;
font-size: 13px;
margin-bottom: 10px;
border-bottom: 1px solid #D6E2EB;	
word-wrap: break-word;
line-height: 1.5em;
}
.et_cuerpo img {
max-width: 100%;	
}
{/literal}
</style>
{if $Dia > 0}
{if $tsAct == 'nuevo' || $tsAct == 'editar'}
<div class="boxy-title">{if $tsAct == 'nuevo'}Crear nuevo evento {$Dia}/{$Mes}/{$Year}{else}Editar evento{/if}</div>
<div class="box_cuerpo clearfix">
<form action="{$tsConfig.url}/calendario/?dia={$Dia}&mes={$Month}&year={$Year}&act={if $tsAct == 'nuevo'}nuevo{else}editar&eid={$tsDato.eid}{/if}" method="post">
    <div class="e_item">
        <label for="titulo">Titulo del evento</label>
        <input type="text" name="titulo" id="titulo" value="{$tsDato.e_titulo}" maxlength="160" required="required" />
    </div>
    {if $tsAct == 'editar'}
    <div class="e_item">
    	<label>Fecha del evento</label>
        <input type="text" name="dia" value="{$tsDato.e_dia}" maxlength="2" style="width: 21px;text-align: center;display: inline-block;" required="required" />&nbsp;/&nbsp;
        <input type="text" name="mes" value="{$tsDato.e_mes}" maxlength="2" style="width: 21px;text-align: center;display: inline-block;" required="required" />&nbsp;/&nbsp;
        <input type="text" name="year" value="{$tsDato.e_year}" maxlength="4" style="width: 35px;text-align: center;" required="required" />
    </div>
    {/if}
    <div class="e_item">
        <label for="cuerpo">Descripci&oacute;n del evento</label>
        <textarea name="cuerpo" id="markItUp" placeholder="Detalla aqu&iacute; tu evento" style="min-height: 200px;border-radius: 0 0 5px 5px;" required="required">{$tsDato.e_cuerpo}</textarea>
    </div>
    <div class="e_item floatL">
        <select name="privado" id="privado" style="padding: 8px 5px;font-size: 12px;">
            <option value="1"{if $tsDato.e_privado == 1} selected="selected"{/if}>Evento p&uacute;blico (Visible para todos)</option>
            <option value="2"{if $tsDato.e_privado == 2} selected="selected"{/if}>Evento privado (Solo yo puedo verlo)</option>
        </select>
    </div>
    <div class="e_item floatR">
    	<input type="submit" value="{if $tsAct == 'nuevo'}Agregar evento{else}Guardar cambios{/if}" class="mBtn btnOk" />
    </div>
</form>
</div>
{else}
<div class="boxy-title">Eventos</div>
<div class="box_cuerpo clearfix">
	<div class="cont_left">
    	{if $tsEventos.data}
        {foreach from=$tsEventos.data item=e}
        {if $e.e_privado == 1 || $e.e_user == $tsUser->uid}
        <div class="et_titulo clearfix">
            <a href="{$tsConfig.url}/perfil/{$e.user_name}" class="et_avatar"><img src="{$tsConfig.url}/files/avatar/{$e.e_user}_50.jpg" width="40" height="40" /></a>
            <b id="title_{$e.eid}">{$e.e_titulo}</b>
            <span>Por <a href="{$tsConfig.url}/perfil/{$e.user_name}">{$e.user_name}</a></span>
            {if $tsUser->uid == $e.e_user || $tsUser->is_admod}<div class="floatR"><a href="{$tsConfig.url}/calendario/?dia={$e.e_dia}&mes={$e.e_mes}&year={$e.e_year}&eid={$e.eid}&act=editar">Editar</a> <a href="javascript:borrar_evento({$e.eid})">Eliminar</a></div>{/if}
        </div>
        <div class="et_cuerpo">{$e.e_cuerpo}</div>
        {/if}
        {/foreach}
        {else}
    	<div style="margin-right: 10px;"><div class="emptyData">No hay eventos programados para este d&iacute;a.</div></div>
        {/if}
        <div style="margin-top: 15px;margin-right: 10px;overflow: hidden;">
        <a href="{$tsConfig.url}/calendario/?mes={$Month}&year={$Year}" class="mBtn btnOk floatL">Volver</a>
        {if $tsUser->is_member}<a href="{$tsConfig.url}/calendario/?dia={$Dia}&mes={$Month}&year={$Year}&act=nuevo" class="mBtn btnOk floatR">Agregar nuevo evento</a>{/if}
        </div>
    </div>
    <div class="cont_right">
    	<div class="cr_body cr_fecha" align="center">
        	<div>{$Dia}</div>
            <span>{$Mes} {$Year}</span>
        </div>
        <div class="cr_body cr_cumple">
            <h2 style="margin-top: 0;">Cumplea&ntilde;os de este d&iacute;a</h2>
            {if $tsCumple}
            {foreach from=$tsCumple item=c}
            <div class="user_cumple">
                <a href="{$tsConfig.url}/perfil/{$c.user_name}" class="cr_avatar"><img src="{$tsConfig.url}/files/avatar/{$c.user_id}_50.jpg" width="20" height="20" /></a>
                ({$c.user_ano})
                <a href="{$tsConfig.url}/perfil/{$c.user_name}">{$c.user_name}</a>
            </div>
            {/foreach}
            {else}
            <div class="emptyData">No hay celebraciones este d&iacute;a.</div>
            {/if}
        </div>
    </div>
</div>
<script>
//{literal}
function borrar_evento(id) {
	mydialog.show();
	mydialog.title('Borrar evento');
	mydialog.body('&#191;Desea eliminar este evento:<b>' + $("#title_" + id).html() + '</b>?');
	mydialog.buttons(true, true, 'S&iacute;', 'location.href=\'' + global_data.url + '/calendario/?dia=1&act=borrar&eid=' + id + '\'' , true, false, true, 'No', 'close', true, true);
	mydialog.center();
}
//{/literal}
</script>
{/if}
{else}
<div class="boxy-title">Eventos {$Mes} del {$Year}</div>
<div class="box_cuerpo" style="padding: 0;">
    <table class="calendar" cellspacing="0" cellpadding="0">
    	<thead>
        <tr class="c_header"> 
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sabado</th>
            <th>Domingo</th>
        </tr>
        </thead>
        <tbody>
            {$html}
        </tbody>
    </table>
</div>
<div class="clearfix" align="center">
    <a href="{$tsConfig.url}/calendario/?mes={if $Month-1 == 0}{$Month+11}&year={$Year-1}{else}{$Month-1}&year={$Year}{/if}" class="mBtn btnOk floatL">Mes anterior</a>
    <a href="{$tsConfig.url}/calendario/?mes={if $Month+1 == 13}{$Month-11}&year={$Year+1}{else}{$Month+1}&year={$Year}{/if}" class="mBtn btnOk floatR">Mes siguiente</a>
    <form action="{$tsConfig.url}/calendario/" method="get" style="float: right;margin-right: 27%;">
    	<a href="{$tsConfig.url}/calendario/" class="mBtn btnOk" style="padding: 6px 15px;">Hoy</a>
        <select name="mes" style="padding: 5px;font-size: 12px;">
            {foreach from=$Meses item=m key=i}
            <option value="{$i}"{if $Mes == $m} selected{/if}>{$m}</option>
            {/foreach}
        </select>
        <select name="year" style="padding: 5px;font-size: 12px;">
            <option value="{$Year_a-2}"{if $Year == $Year_a-2} selected{/if}>{$Year_a-2}</option>
            <option value="{$Year_a-1}"{if $Year == $Year_a-1} selected{/if}>{$Year_a-1}</option>
            <option value="{$Year_a}"{if $Year == $Year_a} selected{/if}>{$Year_a}</option>
            <option value="{$Year_a+1}"{if $Year == $Year_a+1} selected{/if}>{$Year_a+1}</option>
            <option value="{$Year_a+2}"{if $Year == $Year_a+2} selected{/if}>{$Year_a+2}</option>
            <option value="{$Year_a+3}"{if $Year == $Year_a+3} selected{/if}>{$Year_a+3}</option>
            <option value="{$Year_a+4}"{if $Year == $Year_a+4} selected{/if}>{$Year_a+4}</option>
            <option value="{$Year_a+5}"{if $Year == $Year_a+5} selected{/if}>{$Year_a+5}</option>
            <option value="{$Year_a+6}"{if $Year == $Year_a+6} selected{/if}>{$Year_a+6}</option>
        </select>
        <input type="submit" value="Ir" class="mBtn btnOk" style="padding: 6px 15px;">
    </form>
</div>
<div class="boxy-title" style="margin-top: 20px;">Pr&oacute;ximos eventos</div>
<div class="box_cuerpo clearfix">
    <div class="floatL" style="width: 48%;margin-right: 4%;">
        {if $tsProximos.todos}
        {foreach from=$tsProximos.todos item=e}
        <div class="et_titulo clearfix" style="margin: 0;margin-bottom: 1px;">
            <a href="{$tsConfig.url}/perfil/{$e.user_name}" class="et_avatar"><img src="{$tsConfig.url}/files/avatar/{$e.e_user}_50.jpg" width="30" height="30" /></a>
            <b style="padding-top: 9px;font-size: 15px;"><a href="{$tsConfig.url}/calendario/?dia={$e.e_dia}&mes={$e.e_mes}&year={$e.e_year}" style="color: #225985;">{$e.e_titulo}</a></b>
            <span>Por <a href="{$tsConfig.url}/perfil/{$e.user_name}">{$e.user_name}</a> El {$e.e_dia}/{$e.e_mes}/{$e.e_year}</span>
        </div>
        {/foreach}
        {else}
        <div class="emptyData">No hay eventos programados</div>
        {/if}
    </div>
    <div class="floatL" style="width: 48%">
        {if $tsProximos.mios}
        {foreach from=$tsProximos.mios item=e}
        <div class="et_titulo clearfix" style="margin: 0;margin-bottom: 1px;">
            <a href="{$tsConfig.url}/perfil/{$e.user_name}" class="et_avatar"><img src="{$tsConfig.url}/files/avatar/{$e.e_user}_50.jpg" width="30" height="30" /></a>
            <b style="padding-top: 9px;font-size: 15px;"><a href="{$tsConfig.url}/calendario/?dia={$e.e_dia}&mes={$e.e_mes}&year={$e.e_year}" style="color: #225985;">{$e.e_titulo}</a></b>
            <span>El {$e.e_dia}/{$e.e_mes}/{$e.e_year}</span>
        </div>
        {/foreach}
        {else}
        <div class="emptyData">No tienes eventos programados</div>
        {/if}
    </div>
</div>
{/if}
{include file='sections/main_footer.tpl'}