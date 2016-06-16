{include file='sections/main_header.tpl'}
<div class="blanco">
    {if $tsAction == ''}
        <h1 class="Titulo">&Uacute;ltimas {$tsData.total} notificaciones</h1>
        {if $tsData.data}
        <ul class="monitor">
            {foreach from=$tsData.data item=noti}
            <li {if $noti.unread > 0}class="unread"{/if}>
                <a href="{$tsConfig.url}/perfil/{$noti.user}" class="avatar">
                    <img height="32" width="32" src="{$tsConfig.web}/files/avatar/{$noti.avatar}"/>
                </a>
                <div class="m_info">
                    <div class="m_autor">
                        {if $noti.total == 1}<a href="{$tsConfig.url}/perfil/{$noti.user}">{$noti.user}</a>{/if} 
                        <span title="{$noti.date|fecha}" class="time">{$noti.date|fecha}</span>
                    </div>
                    <div class="m_body">
                        <span class="monac_icons ma_{$noti.style}"></span>{$noti.text}
                        <a href="{$noti.link}">{$noti.ltext}</a>
                    </div>
                </div>
            </li>
            {/foreach}
        </ul>
        {else}
        <div class="emptyData">No tienes notificaciones</div>
        {/if}
    {/if}
</div>                
{include file='sections/main_footer.tpl'}