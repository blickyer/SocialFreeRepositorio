<div class="P_opciones">
	{if $tsPost.post_user != $tsUser->uid}
    <div class="box_title">Opciones</div>
    <div class="box_cuerpo post-acciones">
        <div style="display:none" class="mensajes"></div>
        {if ($tsUser->is_admod || $tsUser->permisos.godp) && $tsUser->is_member == 1 && $tsPost.post_user != $tsUser->uid && $tsUser->info.user_puntosxdar >= 1}
        <div class="dar-puntos">
            <div class="P_puntos">
                {section name=puntos start=1 loop=$tsUser->info.user_puntosxdar+1 max=10}
                <a href="#" onclick="votar_post({$smarty.section.puntos.index}); return false;">{$smarty.section.puntos.index}</a>
                {/section}
                {if $tsUser->info.user_puntosxdar > 20 || $tsPunteador.rango > 20}
                {section name=puntos start=11 loop=$tsUser->info.user_puntosxdar+1 max=10}
                <a href="#" onclick="votar_post({$smarty.section.puntos.index}); return false;">{$smarty.section.puntos.index}</a>
                {/section}
                <a href="#" onclick="$('#P_max').toggle('fast'); return false">+</a>
                {/if}
            </div>								
            {if $tsUser->info.user_puntosxdar > 20 || $tsPunteador.rango > 20}
            <div id="P_max" align="center" style="display: none;">
                <input type="text" id="points" style="height: 18px;" placeholder="{$tsPunteador.rango}"> 	
                <input type="submit" onclick="votar_post(document.getElementById('points').value); return false;" value="Votar" class="btn_g" style="margin: 0;">  
            </div>
            {/if}
            (de {$tsUser->info.user_puntosxdar} Disponibles)
        </div>
        {/if}
        
        <ul> 
                       
            {if !$tsUser->is_member || $tsPost.post_user != $tsUser->uid}
            <div class="floatR">
            <li{if !$tsPost.follow} style="display: none;"{/if}>
            <a class="btn_g unfollow_post" onclick="notifica.unfollow('post', {$tsPost.post_id}, notifica.inPostHandle, $(this).children('span'))"><span class="icons follow_post unfollow">No seguir</span></a>
            </li>
            <li{if $tsPost.follow > 0} style="display: none;"{/if}>
            <a class="btn_g follow_post" onclick="notifica.follow('post', {$tsPost.post_id}, notifica.inPostHandle, $(this).children('span'))"><span class="icons follow_post follow">Seguir</span></a>
            </li>
            <li><a href="#" onclick="{if !$tsUser->is_member}registro_load_form(){else}add_favoritos(){/if}; return false" class="btn_g"><span class="icons agregar_favoritos">A Favoritos</span></a></li>
            <li><a href="#" onclick="denuncia.nueva('post',{$tsPost.post_id}, '{$tsPost.post_title}', '{$tsPost.user_name}'); return false;" class="btn_g"><span class="icons denunciar_post">Denunciar</span></a></li>           
            </div>
            {/if}
       </ul>
    </div>
    {/if}
<div class="P_opciones">
    <div class="box_title">Recomienda este post a tus amigos:</div>
    <div class="box_cuerpo post-acciones">
            <li><a class="sharer-button web" href="{if !$tsUser->is_member}javascript:registro_load_form(); return false{else}javascript:notifica.sharePost({$tsPost.post_id}){/if}" title="Compartir en {$tsConfig.titulo}">Compartir</a><span class="SB_popup">{$tsPost.post_shared}</span></li>    
            <li><a class="sharer-button twitter" href="https://twitter.com/intent/tweet?via={$tsConfig.titulo}&related={$tsConfig.titulo}&text={$tsPost.post_title}.&url={$tsConfig.url}/posts/{$tsPost.categoria.c_seo}/{$tsPost.post_id}/{$tsPost.post_title|seo}.html" target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=200'); return false;" title="Compartir en Twitter"></a></li>                                  
            <li><a class="sharer-button facebook" href="https://www.facebook.com/sharer/sharer.php?u={$tsConfig.url}/posts/{$tsPost.categoria.c_seo}/{$tsPost.post_id}/{$tsPost.post_title|seo}.html" target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=200'); return false;" title="Compartir en Facebook"></a></li>
            <li><a class="sharer-button google" href="https://plus.google.com/share?hl=es_ES&url={$tsConfig.url}/posts/{$tsPost.categoria.c_seo}/{$tsPost.post_id}/{$tsPost.post_title|seo}.html&gpsrc=frameless&partnerid=frameless" target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=200'); return false;" title="Compartir en Google+"></a></li>
       </div>   
</div> 
    <div class="box_title">Estad&iacute;sticas</div>
    <div class="box_cuerpo" style="overflow: hidden;">
    	<span class="floatL" style="font-size: 13px;">
            Creado <strong>{$tsPost.post_date}</strong><br />
            Categor&iacute;a <strong>{$tsPost.categoria.c_nombre}</strong>
        </span>
        <ul class="post-estadisticas">                            	
            <li><span class="icons medallas">{$tsPost.m_total}</span><br />Medalla{if $tsPost.m_total != 1}s{/if}</li>
            <li><span class="icons favoritos_post">{$tsPost.post_favoritos}</span><br />Favoritos</li>
            <li><span class="icons visitas_post">{$tsPost.post_hits}</span><br />Visitas</li>
            <li><span id="puntos_post" class="icons puntos_post">{$tsPost.post_puntos}</span><br />Puntos</li>
            <li><span class="icons monitor">{$tsPost.post_seguidores}</span><br />Seguidores</li>                                
        </ul>
    </div>	
</div> 