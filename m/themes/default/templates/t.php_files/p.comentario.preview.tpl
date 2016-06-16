1:
<div class="comment" id="cid_{$tsComment.0}">                
    <div class="userinfo">
        <a href="{$tsConfig.url}/perfil/{$tsUser->info.user_name}"><img class="avatar" src="{$tsConfig.web}/files/avatar/{$tsUser->uid}_50.jpg" width="26"></a>
        <a href="{$tsConfig.url}/perfil/{$tsUser->info.user_name}" class="nick">@{$tsUser->info.user_name}</a>
        <abbr class="fecha">{$tsComment.3|hace}</abbr>
    </div>
    <p class="body">{$tsComment.1|nl2br}</p>
    <span class="likes" style="color: #18A718">0</span>
</div>