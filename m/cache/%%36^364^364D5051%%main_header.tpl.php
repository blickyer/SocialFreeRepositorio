<?php /* Smarty version 2.6.26, created on 2016-02-28 11:38:09
         compiled from sections/main_header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php echo $this->_tpl_vars['tsTitle']; ?>
</title>
<link href="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/estilo.min.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/favicon.ico" type="image/x-icon" />
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/jquery.plugins.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/acciones.min.js" type="text/javascript"></script>
<script type="text/javascript">
// <?php echo '
var global_data={
// '; ?>

	user_key:'<?php echo $this->_tpl_vars['tsUser']->uid; ?>
',
	user_nick:'<?php echo $this->_tpl_vars['tsUser']->nick; ?>
',
	postid:'<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
',
	fotoid:'<?php echo $this->_tpl_vars['tsFoto']['foto_id']; ?>
',
	img:'<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/',
	web:'<?php echo $this->_tpl_vars['tsConfig']['web']; ?>
',
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
var scrollContinue = true;
// '; ?>

</script>
</head>
<body>
<div id="brandday">
    <header>
        <a class="menu_toggle" onclick="menu_toggle(1)"><?php if ($this->_tpl_vars['tsNots']+$this->_tpl_vars['tsMPs'] > 0): ?><span class="popup"><?php echo $this->_tpl_vars['tsNots']+$this->_tpl_vars['tsMPs']; ?>
</span><?php endif; ?></a>
        <a class="logo" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
"><?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
</a>
        <a class="top" title="Ir arriba" id="scroll-up">Ir arriba</a>
    </header>
	<div id="sidebar">
        <ul class="menu">
        	<?php if ($this->_tpl_vars['tsUser']->is_member): ?>
            <li class="<?php if ($this->_tpl_vars['tsPage'] == 'perfil'): ?>active<?php endif; ?>"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['tsUser']->nick; ?>
"><img class="avatar" src="<?php echo $this->_tpl_vars['tsConfig']['web']; ?>
/files/avatar/<?php echo $this->_tpl_vars['tsUser']->uid; ?>
_50.jpg">@<?php echo $this->_tpl_vars['tsUser']->nick; ?>
</a></li>
            <li class="<?php if ($this->_tpl_vars['tsPage'] == 'monitor'): ?>active<?php endif; ?>"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/monitor/"><i class="monitor"></i>Notificaciones<?php if ($this->_tpl_vars['tsNots'] > 0): ?><span class="popup"><?php echo $this->_tpl_vars['tsNots']; ?>
</span><?php endif; ?></a></li>
            <li class="<?php if ($this->_tpl_vars['tsPage'] == 'mensajes'): ?>active<?php endif; ?>"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/mensajes/"><i class="mensajes"></i>Mensajes<?php if ($this->_tpl_vars['tsMPs'] > 0): ?><span class="popup"><?php echo $this->_tpl_vars['tsMPs']; ?>
</span><?php endif; ?></a></li>
            <li class="<?php if ($this->_tpl_vars['tsPage'] == 'favoritos'): ?>active <?php endif; ?>radius"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/favoritos/"><i class="favoritos"></i>Favoritos</a></li>
            <li class="separator"></li>            
            <li class="<?php if ($this->_tpl_vars['tsPage'] == 'portal'): ?>active<?php endif; ?>"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/portal/"><i class="mi"></i>Mi <?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
</a></li>
            <?php endif; ?>
            <li class="<?php if ($this->_tpl_vars['tsPage'] == 'home'): ?>active<?php endif; ?>"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/"><i class="posts"></i>Posts recientes</a></li>
            <?php if ($this->_tpl_vars['tsConfig']['c_fotos_private'] == '1'): ?><?php else: ?>
            <li class="<?php if ($this->_tpl_vars['tsPage'] == 'fotos'): ?>active<?php endif; ?>"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/fotos/"><i class="fotos"></i>Fotos</a></li>
            <?php endif; ?>
            <li class="<?php if ($this->_tpl_vars['tsPage'] == 'tops'): ?>active <?php endif; ?>radius"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/top/posts/"><i class="tops"></i>TOP Posts</a></li>
            <li class="separator"></li>
            <?php if ($this->_tpl_vars['tsUser']->is_member): ?>
            <li class="radius"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/login-salir.php"><i class="salir"></i>Salir</a></li>
            <?php else: ?>
            <li class="<?php if ($this->_tpl_vars['tsPage'] == 'registro'): ?>active<?php endif; ?>"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/registro/"><i class="registro"></i>Registrarme</a></li>
            <li class="<?php if ($this->_tpl_vars['tsPage'] == 'login'): ?>active <?php endif; ?>radius"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/login/"><i class="login"></i>Ingresar</a></li>
            <?php endif; ?>
            <li class="separator"></li>
            <li class="radius back"><a href="<?php echo $this->_tpl_vars['tsConfig']['web']; ?>
<?php echo $this->_tpl_vars['tsUrlPatch']; ?>
?mobile=desktop">Versi&oacute;n de escritorio</a></li>
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
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/head_noticias.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>