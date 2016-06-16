<?php /* Smarty version 2.6.28, created on 2016-06-16 07:25:58
         compiled from sections/main_header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'sections/main_header.tpl', 29, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
  <?php echo '
  <script>
  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');

  ga(\'create\', \'UA-73609429-1\', \'auto\');
  ga(\'send\', \'pageview\');

</script>
'; ?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--Descripcion--> 
<META NAME="description" CONTENT="<?php if ($this->_tpl_vars['tsPost']['post_id']): ?><?php echo $this->_tpl_vars['tsPost']['post_desc']; ?>
<?php else: ?><?php echo $this->_tpl_vars['tsConfig']['descripcion']; ?>
<?php endif; ?>" />
<!--Fin-->
<!--Keywords-->
<?php if ($this->_tpl_vars['tsPost']['post_tags']): ?>
<meta name="keywords" content="<?php echo $this->_tpl_vars['tsConfig']['keywords']; ?>
,<?php $_from = $this->_tpl_vars['tsPost']['post_tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['tag']):
?><?php echo $this->_tpl_vars['tag']; ?>
,<?php endforeach; endif; unset($_from); ?>" />
<?php else: ?>
<meta name="keywords" content="<?php echo $this->_tpl_vars['tsConfig']['keywords']; ?>
,<?php $_from = $this->_tpl_vars['tsConfig']['categorias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?><?php echo $this->_tpl_vars['c']['c_nombre']; ?>
,<?php endforeach; endif; unset($_from); ?>" />
<?php endif; ?>
<!--fin-->
<meta property="og:image" content="<?php if ($this->_tpl_vars['tsPost']['post_id']): ?><?php echo $this->_tpl_vars['tsPost']['post_portada']; ?>
<?php else: ?><?php echo $this->_tpl_vars['p']['post_portada']; ?>
<?php endif; ?>"/>
<meta property="og:url" content="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['tsPost']['post_category']; ?>
/<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['tsPost']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html"/> 
<meta property="og:title" content="<?php if ($this->_tpl_vars['tsPost']['post_id']): ?><?php echo $this->_tpl_vars['tsPost']['post_title']; ?>
<?php else: ?><?php echo $this->_tpl_vars['tsTitle']; ?>
<?php endif; ?>" />
<meta property="og:description" content="<?php if ($this->_tpl_vars['tsPost']['post_id']): ?><?php echo $this->_tpl_vars['tsPost']['post_desc']; ?>
<?php else: ?><?php echo $this->_tpl_vars['tsConfig']['descripcion']; ?>
<?php endif; ?>" />
<meta property="og:locale" content="es_ES" />
<title><?php echo $this->_tpl_vars['tsTitle']; ?>
</title>
<link href="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/estilo.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/phpost.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/extras.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['tsConfig']['css']; ?>
/wysibb.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/mega.css" rel="stylesheet" type="text/css" />

<?php if ($this->_tpl_vars['tsUser']->is_admod && $this->_tpl_vars['tsConfig']['c_see_mod'] && $this->_tpl_vars['tsConfig']['novemods']['total']): ?>
<!-- AGREGAMOS ESTILO DE MODERACIÓN SI HAY CONTENIDO PARA REVISAR -->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,400italic' rel='stylesheet' type='text/css'>
<link href="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/css/moderacion.css" rel="stylesheet" type="text/css" />
<div id="stickymsg" onmouseover="$('#brandday').css('opacity',0.5);" onmouseout="$('#brandday').css('opacity',1);" onclick="location.href = '<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/moderacion/'" style="cursor:default;">Hay <?php echo $this->_tpl_vars['tsConfig']['novemods']['total']; ?>
 contenido<?php if ($this->_tpl_vars['tsConfig']['novemods']['total'] != 1): ?>s<?php endif; ?> esperando revisi&oacute;n</div>
<?php endif; ?>

<!-- AGREGAMOS UN ESTILO EXTRA SI EXISTE -->
<link href="<?php echo $this->_tpl_vars['tsConfig']['css']; ?>
/<?php echo $this->_tpl_vars['tsPage']; ?>
.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/favicon.ico" type="image/x-icon" />
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/jquery.min.js" type="text/javascript"></script>
<!-- Cargamos libreria jQuery desde Google <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/jquery.plugins.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/acciones.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/funciones.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/wysibb.js" type="text/javascript"></script>
<?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['moacp'] || $this->_tpl_vars['tsUser']->permisos['most'] || $this->_tpl_vars['tsUser']->permisos['moayca'] || $this->_tpl_vars['tsUser']->permisos['mosu'] || $this->_tpl_vars['tsUser']->permisos['modu'] || $this->_tpl_vars['tsUser']->permisos['moep'] || $this->_tpl_vars['tsUser']->permisos['moop'] || $this->_tpl_vars['tsUser']->permisos['moedcopo'] || $this->_tpl_vars['tsUser']->permisos['moaydcp'] || $this->_tpl_vars['tsUser']->permisos['moecp']): ?>
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/moderacion.js" type="text/javascript"></script>
<?php endif; ?>
<?php if ($this->_tpl_vars['tsConfig']['c_allow_live']): ?>
<link href="<?php echo $this->_tpl_vars['tsConfig']['css']; ?>
/live.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/live.js" type="text/javascript"></script>
<?php endif; ?>
<script type="text/javascript">
// <?php echo '
var global_data={
// '; ?>

	user_key:'<?php echo $this->_tpl_vars['tsUser']->uid; ?>
',
	postid:'<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
',
	fotoid:'<?php echo $this->_tpl_vars['tsFoto']['foto_id']; ?>
',
	img:'<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/',
	url:'<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
',
	domain:'<?php echo $this->_tpl_vars['tsConfig']['domain']; ?>
',
    s_title: '<?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
',
    s_slogan: '<?php echo $this->_tpl_vars['tsConfig']['slogan']; ?>
'
// <?php echo '
};
// '; ?>
 <?php echo '
$(document).ready(function(){
// '; ?>

    <?php if ($this->_tpl_vars['tsNots'] > 0): ?> 
	notifica.popup(<?php echo $this->_tpl_vars['tsNots']; ?>
);
    <?php endif; ?>
    <?php if ($this->_tpl_vars['tsMPs'] > 0 && $this->_tpl_vars['tsAction'] != 'leer'): ?>
    mensaje.popup(<?php echo $this->_tpl_vars['tsMPs']; ?>
);
    <?php endif; ?>
// <?php echo '
});
//	'; ?>

</script>
<a class="NewCielo" href="#"></a>
</head>
<div id="fb-root"></div>
<?php echo '
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=524009914377787";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>
'; ?>

<body style="background-image:url('http://i.imgur.com/wa4b0Dd.jpg');background-attachment: fixed;background-repeat: no-repeat;background-position: center">
<?php if ($this->_tpl_vars['tsUser']->is_admod == 1): ?><?php echo $this->_tpl_vars['tsConfig']['install']; ?>
<?php endif; ?>
<!--JAVASCRIPT-->

<div id="loading" style="display:none"><img src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/ajax-loader.gif" alt="Cargando"> Procesando...</div>
<div id="swf"></div>
<div id="js" style="display:none"></div>
<div id="mask"></div>
<div id="mydialog"></div>
<div class="UIBeeper" id="BeeperBox"></div>
<div id="brandday">
<!-- Menu -->
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/head_menu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div id="header">
	<div class="wrapper">
         <div class="logo_container">
			<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
"><div class="logo"></div></a>
            </div>
			     </div>
			             </div>
						  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/head_noticias.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
						     <div id="maincontainer">
    	<!--MAIN CONTAINER-->
        <div id="contenido_principal">
								 <!-- SubMenu -->
								 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/head_submenu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div id="cuerpocontainer">
        <!--Cuerpo-->