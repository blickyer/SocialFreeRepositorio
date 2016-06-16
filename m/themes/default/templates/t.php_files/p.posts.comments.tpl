{foreach from=$tsComments.data item=c}
<div class="comment" id="cid_{$c.cid}">                
    <div class="userinfo">
        <a href="{$tsConfig.url}/perfil/{$c.user_name}"><img class="avatar" src="{$tsConfig.web}/files/avatar/{$c.c_user}_50.jpg" width="26"></a>
        <a href="{$tsConfig.url}/perfil/{$c.user_name}" class="nick">@{$c.user_name}</a>
        <abbr class="fecha">{$c.c_date|hace}</abbr>
    </div>
    <p class="body">{$c.c_html}</p>
    <span class="likes" style="color: #{if $c.c_votos >= 0}18A718{else}900{/if}">{$c.c_votos}</span>
    {if $c.votado  == 0 && $c.c_user != $tsUser->uid}<div class="buttons"><a href="#" onclick="votar_comment({$c.cid}, 'pos'); return false;" class="b_like"></a><a href="#" onclick="votar_comment({$c.cid}, 'neg'); return false;" class="b_dislike"></a></div>{/if}
    <div class="bbody"><div style="display: none;" id="citar_comm_{$c.cid}">{$c.c_body}</div><a href="#" onclick="citar_comentario({$c.cid}, '{$c.user_name}'); return false;" class="btn_blue">Citar</a></div>
</div>
{/foreach}
<input type="hidden" id="total_comments" value="{$tsComments.total}" />