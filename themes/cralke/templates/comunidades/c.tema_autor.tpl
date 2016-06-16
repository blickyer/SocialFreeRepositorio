    <div class="post-autor vcard" style="margin-bottom: 10px;">
        <div class="box_title">Autor del post<div class="box_rss"><img src="{$tsConfig.default}/images/flags/{$tsAutor.pais.icon}.png" style="padding:2px" title="{$tsAutor.pais.name}" /></div></div>
        <div class="box_cuerpo" style="padding: 0;">
            <a href="{$tsConfig.url}/perfil/{$tsAutor.user_name}" class="PA_avatar" title="Ver perfil de {$tsAutor.user_name}">
                <img alt="Ver perfil de {$tsAutor.user_name}" src="{$tsConfig.url}/files/avatar/{$tsAutor.user_id}_120.jpg"/>
                <span>{$tsAutor.user_name}</span>
                <i class="qtip PA_estado {$tsAutor.status.css}" title="{$tsAutor.status.t}"></i>
            </a>
            <div class="PA_avatar_right">
            	<span>
                	<img src="{$tsConfig.default}/images/icons/{if $tsAutor.user_sexo == 0}female{else}male{/if}.png" title="{if $tsAutor.user_sexo == 0}Mujer{else}Hombre{/if}" /> {if $tsAutor.user_sexo == 0}Mujer{else}Hombre{/if}
                </span>
				<span>
                	<img src="{$tsConfig.default}/images/icons/ran/{$tsAutor.rango.r_image}" title="{$tsAutor.rango.r_name}" /> <font color="#{$tsAutor.rango.r_color}">{$tsAutor.rango.r_name}</font>
                </span>
            	<span>
                	{if !$tsUser->is_member}    
                    <a class="btn_g follow_user_post" href="#" onclick="open_login_box(); return false" style="text-align: center;"><strong class="icons follow"  style="padding-left: 17px;">&nbsp;Seguir</strong></a>
                    {elseif $tsAutor.user_id != $tsUser->uid}                    
                    <a class=" btn_g unfollow_user_post" onclick="notifica.unfollow('user', {$tsAutor.user_id}, notifica.userInPostHandle, $(this).children('strong'))" style="text-align: center;{if !$tsAutor.follow}display: none;{/if}" title="Dejar de seguir"><strong class="icons unfollow" style="padding-left: 17px;">&nbsp;No seguir</strong></a>
                    <a class="btn_g follow_user_post" onclick="notifica.follow('user', {$tsAutor.user_id}, notifica.userInPostHandle, $(this).children('strong'))" style="text-align: center;{if $tsAutor.follow > 0}display: none;{/if}" title="Seguir usuario"><strong class="icons follow" style="padding-left: 17px;">&nbsp;Seguir</strong></a>
                	{/if}
                </span>
                {if $tsAutor.user_id != $tsUser->uid}
                <span>
                    <a class="btn_g" style="text-align: center;" href="#" title="Enviar mensaje privado" onclick="{if !$tsUser->is_member}open_login_box();{else}mensaje.nuevo('{$tsAutor.user_name}','','','');{/if}return false"><strong><img src="{$tsConfig.images}/msg.gif" />&nbsp;Mensaje</strong></a>
                </span>
                {/if}       	
            </div>
            <div class="PA_detalles">
            	<span class="PA_estat" title="Puntos" style="width: 75px;"><i class="multiicons postPuntos"></i>{$tsAutor.user_puntos|number_format}</span>
                <span class="PA_estat" title="Posts" style="width: 70px;"><i class="multiicons postPosts"></i>{$tsAutor.user_posts|number_format}</span>
                <span class="PA_estat" title="Comentarios" style="border-right: 0;width: 75px;"><i class="multiicons postComentarios"></i>{$tsAutor.user_comentarios|number_format}</span>
            </div>
        </div>
    </div>

{if $tsAutor.user_id == $tsUser->uid || $tsCom.mi_rango >= 4 || $tsUser->is_admod}
<div class="mod-actions">
<div class="box_title">Herramientas</div>
<div class="box_cuerpo" style="padding: 0;text-align: center;">
{if $tsTema.t_estado == 1}
<a href="#" onclick="javascript:com.reactivar_tema();"><i class="multiicons modSticky"></i>Reactivar</a>
{else}
<a href="{$tsConfig.url}/comunidades/{$tsCom.c_nombre_corto}/editar-tema/{$tsTema.t_id}/"><i class="multiicons modEditar"></i>Editar Tema</a>
{if $tsAutor.user_id == $tsUser->uid}
<a href="#" onclick="javascript:com.del_tema();"><i class="multiicons modBorrar"></i>Borrar Tema</a>
{else}
<a href="#" onclick="javascript:com.del_mod_tema();"><i class="multiicons modBorrar"></i>Borrar Tema</a>
{/if}
{/if}
<a href="#" onclick="denuncia.nueva('tema',{$tsTema.t_id}, '{$tsTema.t_titulo}', '{$tsAutor.user_name}'); return false;"><i class="multiicons modOcultar"></i>Denunciar Tema</a>
<a href="{$tsConfig.url}/comunidades/{$tsCom.c_nombre_corto}/mod-history/"><i class="multiicons modIp"></i>Historial</a></div></div>
{/if}

<div id="bigBox">
    <div class="box_title">Comentarios recientes</div>
    <div class="box_cuerpo" id="P_related">
    	{if $tsLastRespuestas}
        {foreach from=$tsLastRespuestas item=r}
        <div class="com_list_element"><a class="cle_autor" href="{$tsConfig.url}/perfil/{$r.user_name}">{$r.user_name}</a><a class="cle_title" href="{$tsConfig.url}/comunidades/{$tsCom.c_nombre_corto}/{$r.t_id}/{$r.t_titulo|seo}.html#coment_id_{$r.r_id}">{$r.t_titulo|limit:30}</a></div>
        {/foreach}
        {else}
        <div class="com_bigmsj_blue">No hay comentarios recientes</div>
        {/if}
    </div>
</div>