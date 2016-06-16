{include file='sections/main_header.tpl'}
{if $tsAction == '' || $tsAction == 'enviados' || $tsAction == 'respondidos' || $tsAction == 'search'}
<div class="blanco">
    <h1 class="Titulo">Mensajes<a href="{$tsConfig.url}/mensajes/nuevo/" class="floatR">Nuevo mensaje</a></h1>
    {if $tsMensajes.data}
    <ul class="monitor">
        {foreach from=$tsMensajes.data item=mp}
        <li {if $mp.mp_read_to == 0}class="unread"{/if}>
            <a href="{$tsConfig.url}/perfil/{$noti.user}" class="avatar">
                <img height="32" width="32" src="{$tsConfig.web}/files/avatar/{$mp.mp_from}_50.jpg"/>
            </a>
            <div class="m_info">
                <div class="m_autor">
                    <a href="{$tsConfig.url}/perfil/{$mp.user_name}">{$mp.user_name}</a> 
                    <span class="time">{$mp.mp_date|fecha:'d_Ms_a'}</span>
                </div>
                <div class="m_body">
                    <a href="{$tsConfig.url}/mensajes/leer/{$mp.mp_id}" class="body_link"><strong>{$mp.mp_subject}</strong><br />{$mp.mp_preview}{if $mp.mp_preview|strlen > 74}...{/if}</a>
                </div>
            </div>
        </li>
        {/foreach}
    </ul>
    {else}
    <div class="emptyData">No hay mensajes</div>
    {/if}
    {if $tsMensajes.pages.prev != 0 || $tsMensajes.pages.next != 0}
    <div class="mpFooter">	   
        {if $tsMensajes.pages.prev != 0}
        <a href="{$tsConfig.url}/mensajes/{if $tsAction}{$tsAction}/{/if}?page={$tsMensajes.pages.prev}{if $tsQT != ''}&qt=unread{/if}" class="floatL btn_blue">Anterior</a>
        {/if}
        {if $tsMensajes.pages.next != 0}
        <a href="{$tsConfig.url}/mensajes/{if $tsAction}{$tsAction}/{/if}?page={$tsMensajes.pages.next}{if $tsQT != ''}&qt=unread{/if}" class="floatR btn_blue">Siguiente</a>{/if}
    </div>
    {/if}
</div>
{elseif $tsAction == 'leer'}
<div class="blanco">
    <h1 class="Titulo">{$tsMensajes.msg.mp_subject}<span class="info">Entre <a href="{$tsConfig.url}/perfil/{$tsUser->nick}">T&uacute;</a> y <a href="{$tsConfig.url}/perfil/{$tsMensajes.ext.user}">{$tsMensajes.ext.user}</a></span></h1>
    <ul class="monitor" id="misMps">
        {if $tsMensajes.res}{foreach from=$tsMensajes.res item=mp}
        <li>
            <a href="{$tsConfig.url}/perfil/{$mp.user_name}" class="avatar">
                <img height="32" width="32" src="{$tsConfig.web}/files/avatar/{$mp.mr_from}_50.jpg"/>
            </a>
            <div class="m_info">
                <div class="m_autor">
                    <a href="{$tsConfig.url}/perfil/{$mp.user_name}">{$mp.user_name}</a> 
                    <span class="time">{$mp.mr_date|fecha}</span>
                </div>
                <div class="m_body">
                    {$mp.mr_body|nl2br}
                </div>
            </div>
        </li>
        {/foreach}
        {else}
        <li class="emptyData">No se pudieron cargar los mensajes.</li>
        {/if}
    </ul>
    {if $tsUser->is_admod || ($tsMensajes.msg.mp_del_to == 0 && $tsMensajes.msg.mp_del_from == 0 && $tsMensajes.ext.can_read == 1)}
    <div class="box_comentario">
        <div class="caja_text">
            <img class="avatar" src="{$tsConfig.web}/files/avatar/{$tsUser->uid}_50.jpg" width="40" />
            <textarea placeholder="Escribe un mensaje" id="body_comment"></textarea>
        </div>
        <div class="caja_boton">
            <img id="comment_loading" src="{$tsConfig.images}/loading.gif">
            <a href="{$tsConfig.url}/mensajes/" class="btn_blue" style="float: left;">Volver</a>
            <input type="button" id="add_comment" value="Comentar" class="btn_blue" onclick="responder_mensaje({$tsMensajes.msg.mp_id})" />
        </div>
        <div id="error"></div>
    </div>
    {else}
    <li class="emptyData">Un participante abandon&oacute; la conversaci&oacute;n o no tienes permiso para responder</li>
    {/if}
</div> 
{elseif $tsAction == 'nuevo'}
<form class="mp_nuevo box" action="javascript:mps.verify()">
    <div id="error"></div>
    <label for="para">Para</label>
    <input type="text" id="para" name="para" placeholder="Nick del usuario" class="input-text" />
    <label for="asunto">Asunto</label>
    <input type="text" id="asunto" name="asunto" placeholder="Asunto del mensaje" class="input-text" />
    <label for="asunto">Mensaje</label>
    <textarea id="mensaje" name="mensaje" placeholder="Asunto del mensaje" class="input-text" rows="6"></textarea>
    <div class="controls">
        <input type="submit" value="Enviar mensaje">
    </div>
</form>
{/if}         
{include file='sections/main_footer.tpl'}