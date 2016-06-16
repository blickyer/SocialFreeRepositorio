<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>{$tsTitle}</title>
<link href="{$tsConfig.default}/estilo.min.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="{$tsConfig.images}/favicon.ico" type="image/x-icon" />
<script src="{$tsConfig.js}/jquery.min.js" type="text/javascript"></script>
<script src="{$tsConfig.js}/jquery.plugins.js" type="text/javascript"></script>
<script src="{$tsConfig.js}/acciones.min.js" type="text/javascript"></script>
<script type="text/javascript">
// {literal}
var global_data={
// {/literal}
	user_key:'{$tsUser->uid}',
	user_nick:'{$tsUser->nick}',
	postid:'{$tsPost.post_id}',
	fotoid:'{$tsFoto.foto_id}',
	img:'{$tsConfig.images}/',
	web:'{$tsConfig.web}',
	url:'{$tsConfig.url}',
	domain:'{$tsConfig.domain}',
    s_title: '{$tsConfig.titulo}',
    s_slogan: '{$tsConfig.slogan}'
// {literal}
};
var scrollContinue = true;
// {/literal}
</script>
</head>
<body>
<div id="brandday">
    <header>
        <a class="menu_toggle" onclick="menu_toggle(1)">{if $tsNots+$tsMPs > 0}<span class="popup">{$tsNots+$tsMPs}</span>{/if}</a>
        <a class="logo" href="{$tsConfig.url}">{$tsConfig.titulo}</a>
        <a class="top" title="Ir arriba" id="scroll-up">Ir arriba</a>
    </header>
	<div id="sidebar">
        <ul class="menu">
        	{if $tsUser->is_member}
            <li class="{if $tsPage == 'perfil'}active{/if}"><a href="{$tsConfig.url}/perfil/{$tsUser->nick}"><img class="avatar" src="{$tsConfig.web}/files/avatar/{$tsUser->uid}_50.jpg">@{$tsUser->nick}</a></li>
            <li class="{if $tsPage == 'monitor'}active{/if}"><a href="{$tsConfig.url}/monitor/"><i class="monitor"></i>Notificaciones{if $tsNots > 0}<span class="popup">{$tsNots}</span>{/if}</a></li>
            <li class="{if $tsPage == 'mensajes'}active{/if}"><a href="{$tsConfig.url}/mensajes/"><i class="mensajes"></i>Mensajes{if $tsMPs > 0}<span class="popup">{$tsMPs}</span>{/if}</a></li>
            <li class="{if $tsPage == 'favoritos'}active {/if}radius"><a href="{$tsConfig.url}/favoritos/"><i class="favoritos"></i>Favoritos</a></li>
            <li class="separator"></li>            
            <li class="{if $tsPage == 'portal'}active{/if}"><a href="{$tsConfig.url}/portal/"><i class="mi"></i>Mi {$tsConfig.titulo}</a></li>
            {/if}
            <li class="{if $tsPage == 'home'}active{/if}"><a href="{$tsConfig.url}/posts/"><i class="posts"></i>Posts recientes</a></li>
            {if $tsConfig.c_fotos_private == '1'}{else}
            <li class="{if $tsPage == 'fotos'}active{/if}"><a href="{$tsConfig.url}/fotos/"><i class="fotos"></i>Fotos</a></li>
            {/if}
            <li class="{if $tsPage == 'tops'}active {/if}radius"><a href="{$tsConfig.url}/top/posts/"><i class="tops"></i>TOP Posts</a></li>
            <li class="separator"></li>
            {if $tsUser->is_member}
            <li class="radius"><a href="{$tsConfig.url}/login-salir.php"><i class="salir"></i>Salir</a></li>
            {else}
            <li class="{if $tsPage == 'registro'}active{/if}"><a href="{$tsConfig.url}/registro/"><i class="registro"></i>Registrarme</a></li>
            <li class="{if $tsPage == 'login'}active {/if}radius"><a href="{$tsConfig.url}/login/"><i class="login"></i>Ingresar</a></li>
            {/if}
            <li class="separator"></li>
            <li class="radius back"><a href="{$tsConfig.web}{$tsUrlPatch}?mobile=desktop">Versi&oacute;n de escritorio</a></li>
        </ul>
    </div>
    <div id="maincontainer">
        <div class="modal modal-share">
            <p>&iquest;Quieres compartir este post con tus seguidores?</p>
            <button onclick="modal.action('share')" class="btn_blue">Compartir</button>
            <button onclick="modal.cerrar()">Cancelar</button>
        </div>
        <div class="modal modal-fav">
            <p>&iquest;Quieres agregar este post a favoritos?</p>
            <button onclick="modal.action('fav')" class="btn_blue">Aceptar</button>
            <button onclick="modal.cerrar()">Cancelar</button>
        </div>
        <div class="modal modal-alerta">
            <p>Error</p>
            <button onclick="modal.cerrar(false, '#total_shares')" class="btn_blue">Aceptar</button>
        </div>
        <div class="modal modal-home">
            <p>Ok</p>
            <button onclick="location.href=global_data.url" class="btn_blue">Aceptar</button>
        </div>
        <div id="cuerpo">
        {include file='sections/head_noticias.tpl'}