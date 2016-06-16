<div class="bigBox">
    <div class="box_title clearfix">&Uacute;ltimos miembros</div>
    <div class="box_cuerpo">
        {foreach from=$tsUltimos item=a}
        <a href="{$tsConfig.url}/perfil/{$a.user_name}" class="hovercard" uid="{$a.m_user}" style="margin-right:1px;margin-bottom:1px;"><img src="{$tsConfig.url}/files/avatar/{$a.m_user}_50.jpg" width="35" height="35" /></a>
        {/foreach}
    </div>
</div>