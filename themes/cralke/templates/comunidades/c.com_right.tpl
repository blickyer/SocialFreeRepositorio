<div id="bigBox">
    <div class="box_title">Buscar en la Comunidad</div>
    <div class="box_cuerpo">
        <form action="{$tsConfig.url}/comunidades/buscar/">
            <input type="text" class="input_text floatL" name="q" style="width: 180px;margin-right: 2px;" /><input type="submit" value="Buscar" class="input_button ibg" />
            <input type="hidden" name="tipo" value="temas" />
			<input type="hidden" name="comid" value="{$tsCom.c_id}" />
        </form>
    </div>
</div>


<div id="bigBox">						
	<div class="box_title">
		<div class="box_txt estadisticas">Staff de la Comunidad</div>
	</div>
	<div class="box_cuerpo" style="overflow: hidden;background: whitesmoke;">
{foreach from=$tsStaff item=a}
			<div class="divisor">
				<a class="ava" href="#"><img src="{$tsConfig.url}/files/avatar/{$a.m_user}_50.jpg"/></a>
				<div class="data-staff" style="margin-left: 52px;margin-top: -49px;">
					<a href="{$tsConfig.url}/perfil/{$a.user_name}">@{$a.user_name}</a>					
					<p style="color: #999;">Su rango es de {if $toup.user_rango == 1}<b style="color:#f00;">Administrador</b>{else}<b style="color: #006F00;">Moderador</b>{/if}</p>
				</div>
			</div>	

		{/foreach}
	</div>
</div>

<div id="bigBox">
    <div class="box_title">Comentarios recientes</div>
    <div class="box_cuerpo" id="ult_comm" style="padding: 0pt;">
    	{if $tsRespuestas}
        {foreach from=$tsRespuestas item=r}
        <div class="com_list_element" {if $r.t_estado == 1}style="opacity: 0.5;background: #000;" title="El tema ha sido eliminado"{/if}><a class="cle_autor" href="{$tsConfig.url}/perfil/{$r.user_name}">{$r.user_name}</a><a class="cle_title" href="{$tsConfig.url}/comunidades/{$tsCom.c_nombre_corto}/{$r.t_id}/{$r.t_titulo|seo}.html#coment_id_{$r.r_id}">{$r.t_titulo|limit:30}</a></div>
        {/foreach}
        {else}
        <div class="com_bigmsj_blue">No hay comentarios recientes</div>
        {/if}
    </div>
</div>

<div id="bigBox">
    <div class="box_title">&Uacute;ltimos miembros <a href="{$tsConfig.url}/comunidades/{$tsCom.c_nombre_corto}/miembros/"><small>(Ver mas)</small></a></div>
    <div class="box_cuerpo clearfix">
        {foreach from=$tsMiembros item=a}
        <a href="{$tsConfig.url}/perfil/{$a.user_name}" class="floatL hovercard" uid="{$a.m_user}" style="margin-right:1px;margin-bottom:1px;"><img src="{$tsConfig.url}/files/avatar/{$a.m_user}_50.jpg" width="35" height="35" /></a>
        {/foreach}
    </div>
</div>

    <div class="bigBox">
        <div class="com_box_title clearfix">
           <div class="box_title">Populares</div>
        </div>
    <div class="box_cuerpo" id="ult_comm" style="padding: 0pt;">
        <div id="com_change_pop">
            <div id="ccp_semana" style="display: block;">
            	{if $tsTop.semana}
                {foreach from=$tsTop.semana item=t key=i}
                <div class="com_list_element" {if $t.t_estado == 1}style="opacity: 0.5;background: #000;" title="El tema ha sido eliminado"{/if}>
                    <span class="cle_item">{$i+1}</span>
                    <a href="{$tsConfig.url}/comunidades/{$tsCom.c_nombre_corto}/{$t.t_id}/{$t.t_titulo|seo}">{$t.t_titulo|limit:30}</a>
                    <span class="cle_number">{$t.t_votos_pos}</span>
                </div>
                {/foreach}
                {else}
                <div class="com_bigmsj_blue">Nada por aqu&iacute;</div>
                {/if}
            </div>
            <div id="ccp_mes" style="display: none;">
            	{if $tsTop.mes}
                {foreach from=$tsTop.mes item=t key=i}
                <div class="com_list_element" {if $t.t_estado == 1}style="opacity: 0.5;background: #000;" title="El tema ha sido eliminado"{/if}>
                    <span class="cle_item">{$i+1}</span>
                    <a href="{$tsConfig.url}/comunidades/{$tsCom.c_nombre_corto}/{$t.t_id}/{$t.t_titulo|seo}">{$t.t_titulo|limit:30}</a>
                    <span class="cle_number">{$t.t_votos_pos}</span>
                </div>
                {/foreach}
                {else}
                <div class="com_bigmsj_blue">Nada por aqu&iacute;</div>
                {/if}
            </div>                
            <div id="ccp_historico" style="display: none;">
            	{if $tsTop.historico}
                {foreach from=$tsTop.historico item=t key=i}
                <div class="com_list_element" {if $t.t_estado == 1}style="opacity: 0.5;background: #000;" title="El tema ha sido eliminado"{/if}>
                    <span class="cle_item">{$i+1}</span>
                    <a href="{$tsConfig.url}/comunidades/{$tsCom.c_nombre_corto}/{$t.t_id}/{$t.t_titulo|seo}">{$t.t_titulo|limit:30}</a>
                    <span class="cle_number">{$t.t_votos_pos}</span>
                </div>
                {/foreach}
                {else}
                <div class="com_bigmsj_blue">Nada por aqu&iacute;</div>
                {/if}
            </div>
        </div>
    </div>
</div>
    
<div class="mod-actions">
<div class="box_title">Herramientas</div>
<div class="box_cuerpo" style="padding: 0;text-align: center;">
{if $tsUser->is_member}    
<a href="#" onclick="denuncia.nueva('comunidad',{$tsCom.c_id}, '{$tsCom.c_nombre}', ''); return false;"><i class="multiicons modOcultar"></i>Denunciar Comunidad</a>
 {else}
<a href="#" onclick="javascript:open_login_box(); return false"><i class="multiicons modOcultar"></i>Denunciar Comunidad</a>
{/if}
<a href="{$tsConfig.url}/comunidades/{$tsCom.c_nombre_corto}/mod-history/"><i class="multiicons modIp"></i> Historial</a></div></div>