1:    
<li>
    <a href="{$tsConfig.url}/perfil/{$tsUser->nick}" class="avatar">
        <img height="32" width="32" src="{$tsConfig.web}/files/avatar/{$tsUser->uid}_50.jpg"/>
    </a>
    <div class="m_info">
        <div class="m_autor">
            <a href="{$tsConfig.url}/perfil/{$tsUser->nick}">{$tsUser->nick}</a> 
            <span class="time">{$mp.mp_date|hace:true}</span>
        </div>
        <div class="m_body">
            {$mp.mp_body|nl2br}
        </div>
    </div>
</li>