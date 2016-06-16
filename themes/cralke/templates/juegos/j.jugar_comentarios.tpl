<div class="j-box_body">
<div class="j-box">
	<div class="boxy-title">Comentarios<span class="floatR" id="total_com">{$tsJuego.j_comments}</span></div>
	<div class="j-box_content">
        <div id="mensajes">
            {if $tsJuego.j_comments > 0}
            {foreach from=$tsJComments item=c}
            <div class="item" id="div_cmnt_{$c.cid}">
                <a class="avatar-box" href="{$tsConfig.url}/perfil/{$c.user_name}">
                    <img  src="{$tsConfig.url}/files/avatar/{$c.c_user}_50.jpg" width="50" height="50" class="floatL"/>
                </a>
                <div class="firma">
                    <div class="options">
                        {if $tsJuego.j_user == $tsUser->info.user_id || $tsUser->is_admod || $tsUser->uid == $c.c_user }
                        <a href="#" onclick="juegos.borrar({$c.cid}, 'com'); return false" class="floatR" style="margin:8px 5px">
                          <img title="Borrar Comentario" alt="borrar" src="{$tsConfig.default}/images/borrar.png"/>
                        </a>
                        {/if}
                    </div>
                    
                    <div class="info"><a href="{$tsConfig.url}/juegos/{$c.user_name}"><strong>{$c.user_name}</strong></a> Publicado el {$c.c_date|fecha|date_format:"%d/%m/%Y"} {if $tsUser->is_admod}<span style="color:red;">IP:</span> <a href="{$tsConfig.url}/moderacion/buscador/1/1/{$c.c_ip}" class="geoip" target="_blank">{$c.c_ip}</a>{/if}</div>
                    
                    {if !$c.user_activo}<div>Escondido por pertener a una cuenta desactivada <a href="#" onclick="$('#hdn_{$c.cid}').slideDown(); $(this).parent().slideUp(); return false;">Click para verlo</a>.</div>
                        <div id="hdn_{$c.cid}" style="display:none">
                    {/if}
                    <div class="clearfix">{$c.c_body|nl2br}</div>									
                    {if !$c.user_activo}</div>{/if}									
                </div>
                <div class="clearBoth"></div>
            </div>
            {/foreach}
            {else}
            {if $tsJuego.j_closed == 0}
            <div id="no-comments">Este juego no tiene comentarios, Se el primero!.</div>
            {/if}
            {/if}
    	</div>
        <div class="mensajes error" style="display: none;"></div>
        {if $tsJuego.j_closed}
        <div id="no-comments">El juego se encuentra cerrado y no se permiten comentarios.</div>
        {/if}
        {if $tsUser->is_member}   
        {if $tsJuego.j_closed == 0 || $tsUser->uid == $tsJuego.j_user || $tsUser->is_admod}
        <div class="form" style="padding: 7px;">
            <form method="post" action="" name="firmar">
                 <img  src="{$tsConfig.url}/files/avatar/{$tsUser->uid}_50.jpg" width="30" height="30" class="floatL" style="margin-right: 5px;padding: 2px; border: solid 1px #ccc; background: white; "/>
                <div style="float: left;">
                    <textarea name="mensaje" id="mensaje" rows="2" style="width: 465px; margin: 0px; display: block; border-radius: 4px;border: 1px solid #ccc; padding: 8px; height: 14px!important;line-height: 14px;" placeholder="Escribe un comentario"></textarea>
                </div>
                <input type="button" id="btnComment" class="mBtn btnOk" value="Comentar" onclick="juegos.comentar({$tsJuego.juego_id})" style="float: right;padding: 7px 10px"/>
            </form>
            <div class="clearBoth"></div>
        </div>
        {/if}
        {else}
        <div class="emptyData">Para poder comentar necesitas estar <a onclick="registro_load_form(); return false" href="">Registrado.</a> O.. ya eres usuario? <a onclick="open_login_box('open')" href="#">Logueate!</a></div>
        {/if}
    </div>
</div>
</div>