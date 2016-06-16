{if $tsUser->is_admod || $tsUser->permisos.moep || $tsAutor.user_id == $tsUser->uid || $tsUser->permisos.moedpo || $tsUser->permisos.moayca || $tsUser->permisos.most || $tsUser->permisos.moayca || $tsUser->permisos.moop || $tsUser->permisos.mosu || $tsUser->permisos.modu}
<div class="mod-actions">
    <div class="box_title">Herramientas</div>
    <div class="box_cuerpo" style="padding: 0;text-align: center;">
    	{if $tsUser->is_admod || $tsUser->permisos.modu || $tsUser->permisos.mosu}
        <a href="{$tsConfig.url}/moderacion/buscador/1/1/{$tsPost.post_ip}" target="_blank"><i class="multiicons modIp"></i>{$tsPost.post_ip}
        </a>
        {/if}
        {if $tsUser->is_admod == 1}
        <a href="{$tsConfig.url}/admin/users?act=show&amp;uid={$tsAutor.user_id}"><i class="multiicons modEditar"></i>Editar Usuario</a>{/if}
        {if $tsAutor.user_id != $tsUser->uid}
        <a href="#" onclick="mod.users.action({$tsAutor.user_id}, 'aviso', false); return false;"><i class="multiicons modAviso"></i>Enviar Aviso</a>
        {/if}
        {if $tsAutor.user_id != $tsUser->uid && $tsUser->is_admod || $tsUser->permisos.modu || $tsUser->permisos.mosu}
        {if $tsAutor.user_baneado}
        {if $tsUser->is_admod || $tsUser->permisos.modu}
        <a href="#" onclick="mod.reboot({$tsAutor.user_id}, 'users', 'unban', false); $(this).remove(); return false;"><i class="multiicons modUban"></i>Desuspender Usuario</a>
        {/if}
        {else}
        {if $tsUser->is_admod || $tsUser->permisos.mosu}
        <a href="#" onclick="mod.users.action({$tsAutor.user_id}, 'ban', false); $(this).remove(); return false;"><i class="multiicons modBan"></i>Suspender Usuario</a>
        {/if}
        {/if}
        {/if}
        {if $tsPost.post_user == $tsUser->uid && $tsUser->is_admod == 0 && $tsUser->permisos.most == false && $tsUser->permisos.moayca == false && $tsUser->permisos.moo == false && $tsUser->permisos.moep ==  false && $tsUser->permisos.moedpo == false}
        <a title="Borrar Post" onclick="borrar_post(); return false;" href="#"><i class="multiicons modBorrar"></i>Borrar Post</a>
        <a title="Editar Post" onclick="location.href='{$tsConfig.url}/posts/editar/{$tsPost.post_id}'; return false" href="#"><i class="multiicons modEditar"></i>Editar Post</a>
    {elseif ($tsUser->is_admod && $tsPost.post_status == 0) || $tsUser->permisos.most || $tsUser->permisos.moayca || $tsUser->permisos.moop || $tsUser->permisos.moep || $tsUser->permisos.moedpo}
        {if $tsUser->is_admod || $tsUser->permisos.most}
        <a href="#" onclick="mod.reboot({$tsPost.post_id}, 'posts', 'sticky', false); if($(this).text() == 'Poner Sticky') $(this).text('Quitar Sticky'); else $(this).text('Poner Sticky'); return false;"><i class="multiicons modSticky"></i>{if $tsPost.post_sticky == 1}Quitar{else}Poner{/if} Sticky</a>
        {/if}                                
        {if $tsUser->is_admod || $tsUser->permisos.moayca}
        <a href="#" onclick="mod.reboot({$tsPost.post_id}, 'posts', 'openclosed', false); if($(this).text() == 'Cerrar Post') $(this).html('Abrir Comentarios'); else $(this).html('Cerrar Comentarios'); return false;">{if $tsPost.post_block_comments == 1}<i class="multiicons modAbrir"></i>Abrir{else}<i class="multiicons modCerrar"></i>Cerrar{/if} Comentarios</a>
        {/if}								
        {if $tsUser->is_admod || $tsUser->permisos.moop}
        <a id="desaprobar" href="#" onclick="$('#desapprove').slideToggle(); return false;"><i class="multiicons modOcultar"></i>Ocultar Post</a>
        {/if}								
        {if $tsUser->is_admod || $tsUser->permisos.moedpo || $tsAutor.user_id == $tsUser->uid}
        <a href="{$tsConfig.url}/posts/editar/{$tsPost.post_id}"><i class="multiicons modEditar"></i>Editar Post</a>
        {/if}
        {if $tsUser->is_admod || $tsUser->permisos.moep || $tsAutor.user_id == $tsUser->uid}
        <a href="#" onclick="{if $tsAutor.user_id != $tsUser->uid}mod.posts.borrar({$tsPost.post_id}, 'posts', null);{else}borrar_post();{/if} return false;"><i class="multiicons modBorrar"></i>Borrar Post</a>
        {/if}							
        <div id="desapprove" style="display:none;">
            <span style="display: none;" class="errormsg"></span>
            <input type="text" id="d_razon" name="d_razon" maxlength="150" size="60" class="text-inp" placeholder="Raz&oacute;n de la revisi&oacute;n" style="width: 217px;margin: 5px;"/ required>
            <input type="button" class="mBtn btnOk" name="desapprove" value="Continuar" href="#" onclick="mod.posts.ocultar('{$tsPost.post_id}'); return false;" style="margin-bottom: 8px;" />
        </div>                           
        {/if}
    </div>
</div>
{/if}