{foreach from=$tsMuro.data item=p}
<li class="shout" id="pub_{$p.pub_id}">
    <a class="userinfo" href="{$tsConfig.url}/perfil/{$p.user_name}">
        <img class="avatar floatL" src="{$tsConfig.web}/files/avatar/{$p.p_user_pub}_50.jpg">
        <strong class="nick">@{$p.user_name}</strong>
        <span class="timeago">Publicado {$p.p_date|fecha}</span>
    </a>
    {if $p.p_body != ' '}<p class="body">{$p.p_body|quot}</p>{/if}
    {if $p.p_type != 1}
    <div class="mvm">
        {if $p.p_type == 2}
        <img src="{$p.a_img}"/>
        {elseif $p.p_type == 3}
        <div class="uiLink">
            <div><a href="{$p.a_url}" target="_blank" class="a_blue"><strong>{$p.a_title}</strong></a></div>
            <a href="{$p.a_url}" target="_blank" class="a_blue">{$p.a_url}</a>
        </div>
        {elseif $p.p_type == 4}
        <a href="#" onclick="muro.load_atta('video','{$p.a_url}', this); return false;"class="uiVideoThumb">
            <img src="{$tsConfig.images}/video-icon.png" style="background-image:url(https://i1.ytimg.com/vi/{$p.a_url}/0.jpg);background-size: 100%;">           
            <i></i>
        </a>
        {/if}
    </div>
    {/if}
    <div class="counters">
        <span><abbr id="tlikes_{$p.pub_id}">{$p.p_likes}</abbr> Me gusta</span>
        <span>{$p.p_comments} Comentarios</span>
    </div>
    <div id="error"></div>
    <div class="actions">
        <a class="shbtn shlike {if $p.mylike}ok{/if}" onclick="muro.like_this({$p.pub_id})"></a>
        <a class="shbtn shcomment" href="{$tsConfig.url}/perfil/{$tsUser->getUserName($p.p_user)}/{$p.pub_id}"></a>
        <a class="shbtn shreshout ok"></a>
    </div>
</li>
{/foreach}