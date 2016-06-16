<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
  {literal}
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73609429-1', 'auto');
  ga('send', 'pageview');

</script>
{/literal}

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
<meta property="og:image" content="{if $tsPost.post_id}{$tsPost.post_portada}{else}{$p.post_portada}{/if}"/>
<meta property="og:url" content="{$tsConfig.url}/posts/{$tsPost.post_category}/{$tsPost.post_id}/{$tsPost.post_title|seo}.html"/> 
<meta property="og:title" content="{if $tsPost.post_id}{$tsPost.post_title}{else}{$tsTitle}{/if}" />
<meta property="og:description" content="{if $tsPost.post_id}{$tsPost.post_desc}{else}{$tsConfig.descripcion}{/if}" />
<meta property="og:locale" content="es_ES" />
<title>{$tsTitle}</title>
<link href="{$tsConfig.tema.t_url}/estilo.css" rel="stylesheet" type="text/css" />
<link href="{$tsConfig.tema.t_url}/phpost.css" rel="stylesheet" type="text/css" />
<link href="{$tsConfig.tema.t_url}/extras.css" rel="stylesheet" type="text/css" />
<link href="{$tsConfig.css}/wysibb.css" rel="stylesheet" type="text/css" />
<link href="{$tsConfig.tema.t_url}/mega.css" rel="stylesheet" type="text/css" />

{if $tsUser->is_admod && $tsConfig.c_see_mod && $tsConfig.novemods.total}
<!-- AGREGAMOS ESTILO DE MODERACIÓN SI HAY CONTENIDO PARA REVISAR -->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,400italic' rel='stylesheet' type='text/css'>
<link href="{$tsConfig.tema.t_url}/css/moderacion.css" rel="stylesheet" type="text/css" />
<div id="stickymsg" onmouseover="$('#brandday').css('opacity',0.5);" onmouseout="$('#brandday').css('opacity',1);" onclick="location.href = '{$tsConfig.url}/moderacion/'" style="cursor:default;">Hay {$tsConfig.novemods.total} contenido{if $tsConfig.novemods.total != 1}s{/if} esperando revisi&oacute;n</div>
{/if}

<!-- AGREGAMOS UN ESTILO EXTRA SI EXISTE -->
<link href="{$tsConfig.css}/{$tsPage}.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="{$tsConfig.images}/favicon.ico" type="image/x-icon" />
<script src="{$tsConfig.js}/jquery.min.js" type="text/javascript"></script>
<!-- Cargamos libreria jQuery desde Google <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
<script src="{$tsConfig.js}/jquery.plugins.js" type="text/javascript"></script>
<script src="{$tsConfig.js}/acciones.js" type="text/javascript"></script>
<script src="{$tsConfig.js}/funciones.js" type="text/javascript"></script>
<script src="{$tsConfig.js}/wysibb.js" type="text/javascript"></script>
{if $tsUser->is_admod || $tsUser->permisos.moacp || $tsUser->permisos.most || $tsUser->permisos.moayca || $tsUser->permisos.mosu || $tsUser->permisos.modu || $tsUser->permisos.moep || $tsUser->permisos.moop || $tsUser->permisos.moedcopo || $tsUser->permisos.moaydcp || $tsUser->permisos.moecp}
<script src="{$tsConfig.js}/moderacion.js" type="text/javascript"></script>
{/if}
{if $tsConfig.c_allow_live}
<link href="{$tsConfig.css}/live.css" rel="stylesheet" type="text/css" />
<script src="{$tsConfig.js}/live.js" type="text/javascript"></script>
{/if}
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
<a class="NewCielo" href="#"></a>
</head>
<div id="fb-root"></div>
{literal}
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=524009914377787";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
{/literal}
<body style="background-image:url('http://i.imgur.com/wa4b0Dd.jpg');background-attachment: fixed;background-repeat: no-repeat;background-position: center">
{if $tsUser->is_admod == 1}{$tsConfig.install}{/if}
<!--JAVASCRIPT-->

<div id="loading" style="display:none"><img src="{$tsConfig.tema.t_url}/images/ajax-loader.gif" alt="Cargando"> Procesando...</div>
<div id="swf"></div>
<div id="js" style="display:none"></div>
<div id="mask"></div>
<div id="mydialog"></div>
<div class="UIBeeper" id="BeeperBox"></div>
<div id="brandday">
<!-- Menu -->
 {include file='sections/head_menu.tpl'}
    <div id="header">
	<div class="wrapper">
         <div class="logo_container">
			<a href="{$tsConfig.url}"><div class="logo"></div></a>
            </div>
			     </div>
			             </div>
						  {include file='sections/head_noticias.tpl'}
						     <div id="maincontainer">
    	<!--MAIN CONTAINER-->
        <div id="contenido_principal">
								 <!-- SubMenu -->
								 {include file='sections/head_submenu.tpl'}
        <div id="cuerpocontainer">
        <!--Cuerpo-->