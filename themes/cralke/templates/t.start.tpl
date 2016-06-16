<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--Descripcion--> 
<META NAME="description" CONTENT="{if $tsPost.post_id}{$tsPost.post_desc}{else}{$tsConfig.descripcion}{/if}" />
<!--Fin-->
<!--Keywords-->
{if $tsPost.post_tags}
<meta name="keywords" content="{$tsConfig.keywords},{foreach from=$tsPost.post_tags key=i item=tag}{$tag},{/foreach}" />
{else}
<meta name="keywords" content="{$tsConfig.keywords},{foreach from=$tsConfig.categorias item=c}{$c.c_nombre},{/foreach}" />
{/if}
<!--fin-->
<meta property="og:image" content="http://i.imgur.com/KJX8fDO.png"/>
<meta property="og:title" content="{if $tsPost.post_id}{$tsPost.post_title}{else}{$tsTitle}{/if}" />
<meta property="og:description" content="{if $tsPost.post_id}{$tsPost.post_desc}{else}{$tsConfig.descripcion}{/if}" />
<meta property="og:locale" content="es_ES" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>Bienvenido a {$tsTitle} </title>
	<!-- ESTILOS CSS -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic|Raleway:400,200,300,500,700,600,800,900' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="{$tsConfig.tema.t_url}/css/start.css" rel="stylesheet" type="text/css">
	<link href="{$tsConfig.tema.t_url}/css/start2.css" rel="stylesheet" type="text/css">
	<link href="{$tsConfig.tema.t_url}/estilo.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="{$tsConfig.images}/favicon.ico" type="image/x-icon" />
	<!-- JAVASCRIPT -->
	<script src="{$tsConfig.js}/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="{$tsConfig.js}/device.min.js" type="text/javascript"></script>
	<script src="{$tsConfig.js}/jquery.mb.YTPlayer.js" type="text/javascript"></script>	
	<script src="{$tsConfig.js}/custom.js" type="text/javascript"></script>
	<script src="{$tsConfig.js}/registro.js" type="text/javascript"></script>
	<script src="{$tsConfig.js}/funciones.js" type="text/javascript"></script>
	<script src="{$tsConfig.js}/jquery.plugins.js" type="text/javascript"></script>
	<script src="{$tsConfig.js}/acciones.js" type="text/javascript"></script>
		<script type="text/javascript">
		// {literal}
		var global_data={
		// {/literal}
			user_key:'{$tsUser->uid}',
			postid:'{$tsPost.post_id}',
			fotoid:'{$tsFoto.foto_id}',
			img:'{$tsConfig.tema.t_url}/',
			url:'{$tsConfig.url}',
			domain:'{$tsConfig.domain}',
		    s_title: '{$tsConfig.titulo}',
		    s_slogan: '{$tsConfig.slogan}'
		// {literal}
		};
		// {/literal} {literal}
		$(document).ready(function(){
		// {/literal}
		    {if $tsNots > 0} 
			notifica.popup({$tsNots});
		    {/if}
		    {if $tsMPs > 0 &&  $tsAction != 'leer'}
		    mensaje.popup({$tsMPs});
		    {/if}
		// {literal}
		});
		//	{/literal}

		</script>



</head>
<body style="margin: 0 0 0 0;">
		<div id="mydialog"></div>
	<div id="mask"></div>
		    <section class="big-background">
	 {literal}
        <a id="bgndVideo" class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=CU4hnzAhWIc',containment:'body',autoPlay:true, mute:false, startAt:0, opacity:1}"></a>
		{/literal}
        <div class="pattern"></div> 
            <div class="big-background-container">
                    <h6 class="big-background-title">{$tsConfig.titulo}</h6>
                    <div class="divider2"></div>
                    <h6 id="colorize">{$tsConfig.slogan}</h6>
                    <a onclick="registro_load_form(); return false" href="" class="big-background-btn" style="text-decoration: none;color: #fff;">Registrate!</a>
                    <a href="javascript:open_login_box()" class="big-background-btn2" style="text-decoration: none;color: #fff;">Identificarme</a>
                    <div id="login_box" style="display: none; margin-top: -233px; margin-left: 150px; width: 0px; border: 1px;">
                	<div class="login_header">
                    	<img title="Cerrar mensaje" onclick="close_login_box();" class="login_cerrar" src="http://i.imgur.com/0niwbQF.png" style="left:220px;width: 32px;height: 32px;top: 1px;">
                    </div>
                	<div class="login_cuerpo" style="background: #fff;">
	                  <span class="gif_cargando floatR" id="login_cargando" style="display: none;"></span>
    	              <div id="login_error" style="display: none; padding:3px 0;"></div>
        	            <form action="javascript:login_ajax()" method="post">
            	            <label>Usuario</label>
                	        <input type="text" class="ilogin" id="nickname" name="nick" maxlength="64">
                    	    <label>Contraseña</label>
                        	<input type="password" class="ilogin" id="password" name="pass" maxlength="64">
                            <input type="checkbox" id="rem" name="rem" value="true" checked="checked" /> <label for="rem">Recordar usuario</label>
	                        <input type="submit" title="Entrar" value="Entrar" style="width:198px; margin-top:5px;" class="mBtn btnOk">
            	        </form>
                	    <div class="login_footer">
	                      <a href="#" onclick="remind_password();">&#191;Olvidaste tu contrase&#241;a?</a>
        	                <br/>
							<a href="#" onclick="resend_validation();">&#191;No lleg&oacute; el correo de validaci&oacute;n?</a>
        	                <br/>
            	          <a style="color:green;" onclick="open_login_box(); registro_load_form(); return false" href="">
	                        <strong>Registrate Ahora!</strong>
    	                  </a>
                        </div>
                  </div>
                </div>
                                                  
    </section>
</body>
</html>