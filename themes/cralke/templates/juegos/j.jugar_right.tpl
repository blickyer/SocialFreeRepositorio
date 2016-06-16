{* AUTOR DEL JUEGO *}
<div class="j-box_body">
<div class="j-box">
	<div class="boxy-title">Publicado por
    	<div class="floatR">
		    <img src="{$tsConfig.default}/images/icons/ran/{$tsJuego.r_image}" height="16" class="qtip" title="{$tsJuego.r_name}" />
			<img src="{$tsConfig.default}/images/icons/{if $tsJuego.user_sexo == 0}female{else}male{/if}.png" class="qtip" title="{if $tsJuego.user_sexo == 0}Mujer{else}Hombre{/if}" />
			<img src="{$tsConfig.default}/images/flags/{$tsJuego.user_pais.0|lower}.png" style="padding:2px" class="qtip" title="{$tsJuego.user_pais.1}" />
		</div>
    </div>
    <div class="j-box_content">	
        <div class="j_avatar">
            <a href="{$tsConfig.url}/perfil/{$tsJuego.user_name}">
                <img title="Ver perfil de {$tsJuego.user_name}" alt="Ver perfil de {$tsJuego.user_name}" src="{$tsConfig.url}/files/avatar/{$tsJuego.j_user}_120.jpg"/>
                <span>{$tsJuego.user_name}</span>
            </a>
        </div>
        
        <div class="au-d">
            {if $tsUser->uid != $tsJuego.j_user}
            <a class="btn_g v unfollow_user_post" onclick="notifica.unfollow('user', {$tsJuego.j_user}, notifica.userInPostHandle, $(this).children('span'))" {if $tsJuego.follow == 0}style="display: none;"{/if}>
                <span class="icons unfollow">Siguiendo</span>
            </a>
            <a class="btn_g follow_user_post" onclick="notifica.follow('user', {$tsJuego.j_user}, notifica.userInPostHandle, $(this).children('span'))" {if $tsJuego.follow == 1}style="display: none;"{/if}>
                <span class="icons follow">Seguir</span>
            </a>
            {/if}
            <div class="est-au">
                <div class="spa-a">
                    <b>{$tsJuego.user_seguidores}</b>
                    <div>Seguidores</div>
                </div>	
                <div class="spa-a">
                    <b>{$tsJuego.user_puntos}</b>
                    <div>Puntos</div>
                </div>
                <div class="spa-a">
                    <b>{$tsJuego.user_juegos}</b>
                    <div>Juegos</div>
                </div>		
            </div>
        </div>
	</div>
</div>
</div>


{* HERRAMIENTAS *}

{if $tsJuego.j_user == $tsUser->uid || $tsUser->is_admod}
<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title">Herramientas</div>
	<div class="j-box_content" style="padding: 8px;" align="center">
        <div style="display: inline-block;">
		    {if $tsJuego.j_status != 2 && ($tsUser->is_admod || $tsJuego.j_user == $tsUser->uid)}			
			<a href="#" onclick="juegos.borrar({$tsJuego.juego_id}, 'juego'); return false;" class="btn_g" style="display: inline-block;margin-right: 10px;"><img alt="Borrar" src="{$tsConfig.default}/images/borrar.png"/ style="padding-right: 8px;">Borrar Juego</a>
			{/if}
			{if $tsUser->is_admod || $tsJuego.j_user == $tsUser->uid}
			<a href="#" onclick="location.href='{$tsConfig.url}/juegos/editar/{$tsJuego.juego_id}'; return false" class="btn_g" style="display: inline-block;"><img alt="Editar" src="{$tsConfig.default}/images/editar.png"/ style="padding-right: 8px;">Editar Juego</a>
            {/if}			
		</div>	
	</div>
</div>
</div>
{/if}

{* JUEGOS DEL USUARIO *}

<div class="j-box_body">
<div class="j-box">
	<div class="boxy-title">Juegos de {$tsJuego.user_name}<span class="floatR">{$tsJuego.user_juegos}</span></div>
	<div class="j-box_content">
        <div id="t-auto" style="padding-top: 5px;">
		    {foreach from=$tsUJuego item=j}
			<a href="{$tsConfig.url}/juegos/{$j.juego_id}/{$j.j_title|seo}.html">
				<img src="{$j.j_imagen}" class="qtip" title="{$j.j_title}" height="85" width="88">
			</a>				
            {/foreach}
		</div>		
	</div>
	{if $tsJuego.user_juegos >=6}
    	<a href="{$tsConfig.url}/juegos/{$tsJuego.user_name}" class="mBtn btnOk" style="margin: 5px auto;display: block;text-align: center;">Ver todos</a>	
	{/if}
</div>
</div>

{* FAVORITOS *}

<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title">Usuarios que agregaron a favoritos</div>
	<div class="j-box_content">
    {if $tsJFavoritos}	
        <div id="t-auto" style="padding: 3px;" align="center">
		    {foreach from=$tsJFavoritos item=j}
          <a href="{$tsConfig.url}/perfil/{$j.user_name}" class="hovercard" uid="{$j.user_id}" style="display:inline-block;margin:2px 0 2px 2px;"><img class="vctip" src="{$tsConfig.url}/files/avatar/{$j.user_id}_50.jpg" title="{$j.fav_fecha|hace:true}" width="32" height="32"/></a>
        {/foreach}
		</div>
    {else}
	<div class="emptyData">Nadie ha agregado el juego a favoritos</div>
    {/if}	
	</div>
</div>
</div>

{* VISITAS *}
                    

{if $tsJVisitas}
<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title">Visitas recientes</div>
    <div class="j-box_content" style="padding: 3px;" align="center">
        {foreach from=$tsJVisitas item=j}
          <a href="{$tsConfig.url}/perfil/{$j.user_name}" class="hovercard" uid="{$j.user_id}" style="display:inline-block;margin:2px 0 2px 2px;"><img class="vctip" src="{$tsConfig.url}/files/avatar/{$j.user_id}_50.jpg" title="{$j.date|hace:true}" width="32" height="32"/></a>
        {/foreach}
    </div>
</div>
</div>
{/if}

<!--BY KMARIO19-->