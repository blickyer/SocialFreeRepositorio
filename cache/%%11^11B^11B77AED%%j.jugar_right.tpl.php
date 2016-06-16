<?php /* Smarty version 2.6.28, created on 2016-06-16 12:33:57
         compiled from juegos/j.jugar_right.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', 'juegos/j.jugar_right.tpl', 8, false),array('modifier', 'seo', 'juegos/j.jugar_right.tpl', 76, false),array('modifier', 'hace', 'juegos/j.jugar_right.tpl', 97, false),)), $this); ?>
<div class="j-box_body">
<div class="j-box">
	<div class="boxy-title">Publicado por
    	<div class="floatR">
		    <img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/ran/<?php echo $this->_tpl_vars['tsJuego']['r_image']; ?>
" height="16" class="qtip" title="<?php echo $this->_tpl_vars['tsJuego']['r_name']; ?>
" />
			<img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/<?php if ($this->_tpl_vars['tsJuego']['user_sexo'] == 0): ?>female<?php else: ?>male<?php endif; ?>.png" class="qtip" title="<?php if ($this->_tpl_vars['tsJuego']['user_sexo'] == 0): ?>Mujer<?php else: ?>Hombre<?php endif; ?>" />
			<img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/flags/<?php echo ((is_array($_tmp=$this->_tpl_vars['tsJuego']['user_pais']['0'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
.png" style="padding:2px" class="qtip" title="<?php echo $this->_tpl_vars['tsJuego']['user_pais']['1']; ?>
" />
		</div>
    </div>
    <div class="j-box_content">	
        <div class="j_avatar">
            <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['tsJuego']['user_name']; ?>
">
                <img title="Ver perfil de <?php echo $this->_tpl_vars['tsJuego']['user_name']; ?>
" alt="Ver perfil de <?php echo $this->_tpl_vars['tsJuego']['user_name']; ?>
" src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['tsJuego']['j_user']; ?>
_120.jpg"/>
                <span><?php echo $this->_tpl_vars['tsJuego']['user_name']; ?>
</span>
            </a>
        </div>
        
        <div class="au-d">
            <?php if ($this->_tpl_vars['tsUser']->uid != $this->_tpl_vars['tsJuego']['j_user']): ?>
            <a class="btn_g v unfollow_user_post" onclick="notifica.unfollow('user', <?php echo $this->_tpl_vars['tsJuego']['j_user']; ?>
, notifica.userInPostHandle, $(this).children('span'))" <?php if ($this->_tpl_vars['tsJuego']['follow'] == 0): ?>style="display: none;"<?php endif; ?>>
                <span class="icons unfollow">Siguiendo</span>
            </a>
            <a class="btn_g follow_user_post" onclick="notifica.follow('user', <?php echo $this->_tpl_vars['tsJuego']['j_user']; ?>
, notifica.userInPostHandle, $(this).children('span'))" <?php if ($this->_tpl_vars['tsJuego']['follow'] == 1): ?>style="display: none;"<?php endif; ?>>
                <span class="icons follow">Seguir</span>
            </a>
            <?php endif; ?>
            <div class="est-au">
                <div class="spa-a">
                    <b><?php echo $this->_tpl_vars['tsJuego']['user_seguidores']; ?>
</b>
                    <div>Seguidores</div>
                </div>	
                <div class="spa-a">
                    <b><?php echo $this->_tpl_vars['tsJuego']['user_puntos']; ?>
</b>
                    <div>Puntos</div>
                </div>
                <div class="spa-a">
                    <b><?php echo $this->_tpl_vars['tsJuego']['user_juegos']; ?>
</b>
                    <div>Juegos</div>
                </div>		
            </div>
        </div>
	</div>
</div>
</div>



<?php if ($this->_tpl_vars['tsJuego']['j_user'] == $this->_tpl_vars['tsUser']->uid || $this->_tpl_vars['tsUser']->is_admod): ?>
<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title">Herramientas</div>
	<div class="j-box_content" style="padding: 8px;" align="center">
        <div style="display: inline-block;">
		    <?php if ($this->_tpl_vars['tsJuego']['j_status'] != 2 && ( $this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsJuego']['j_user'] == $this->_tpl_vars['tsUser']->uid )): ?>			
			<a href="#" onclick="juegos.borrar(<?php echo $this->_tpl_vars['tsJuego']['juego_id']; ?>
, 'juego'); return false;" class="btn_g" style="display: inline-block;margin-right: 10px;"><img alt="Borrar" src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/borrar.png"/ style="padding-right: 8px;">Borrar Juego</a>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsJuego']['j_user'] == $this->_tpl_vars['tsUser']->uid): ?>
			<a href="#" onclick="location.href='<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/juegos/editar/<?php echo $this->_tpl_vars['tsJuego']['juego_id']; ?>
'; return false" class="btn_g" style="display: inline-block;"><img alt="Editar" src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/editar.png"/ style="padding-right: 8px;">Editar Juego</a>
            <?php endif; ?>			
		</div>	
	</div>
</div>
</div>
<?php endif; ?>


<div class="j-box_body">
<div class="j-box">
	<div class="boxy-title">Juegos de <?php echo $this->_tpl_vars['tsJuego']['user_name']; ?>
<span class="floatR"><?php echo $this->_tpl_vars['tsJuego']['user_juegos']; ?>
</span></div>
	<div class="j-box_content">
        <div id="t-auto" style="padding-top: 5px;">
		    <?php $_from = $this->_tpl_vars['tsUJuego']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['j']):
?>
			<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/juegos/<?php echo $this->_tpl_vars['j']['juego_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['j']['j_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html">
				<img src="<?php echo $this->_tpl_vars['j']['j_imagen']; ?>
" class="qtip" title="<?php echo $this->_tpl_vars['j']['j_title']; ?>
" height="85" width="88">
			</a>				
            <?php endforeach; endif; unset($_from); ?>
		</div>		
	</div>
	<?php if ($this->_tpl_vars['tsJuego']['user_juegos'] >= 6): ?>
    	<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/juegos/<?php echo $this->_tpl_vars['tsJuego']['user_name']; ?>
" class="mBtn btnOk" style="margin: 5px auto;display: block;text-align: center;">Ver todos</a>	
	<?php endif; ?>
</div>
</div>


<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title">Usuarios que agregaron a favoritos</div>
	<div class="j-box_content">
    <?php if ($this->_tpl_vars['tsJFavoritos']): ?>	
        <div id="t-auto" style="padding: 3px;" align="center">
		    <?php $_from = $this->_tpl_vars['tsJFavoritos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['j']):
?>
          <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['j']['user_name']; ?>
" class="hovercard" uid="<?php echo $this->_tpl_vars['j']['user_id']; ?>
" style="display:inline-block;margin:2px 0 2px 2px;"><img class="vctip" src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['j']['user_id']; ?>
_50.jpg" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['j']['fav_fecha'])) ? $this->_run_mod_handler('hace', true, $_tmp, true) : smarty_modifier_hace($_tmp, true)); ?>
" width="32" height="32"/></a>
        <?php endforeach; endif; unset($_from); ?>
		</div>
    <?php else: ?>
	<div class="emptyData">Nadie ha agregado el juego a favoritos</div>
    <?php endif; ?>	
	</div>
</div>
</div>

                    

<?php if ($this->_tpl_vars['tsJVisitas']): ?>
<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title">Visitas recientes</div>
    <div class="j-box_content" style="padding: 3px;" align="center">
        <?php $_from = $this->_tpl_vars['tsJVisitas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['j']):
?>
          <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['j']['user_name']; ?>
" class="hovercard" uid="<?php echo $this->_tpl_vars['j']['user_id']; ?>
" style="display:inline-block;margin:2px 0 2px 2px;"><img class="vctip" src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['j']['user_id']; ?>
_50.jpg" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['j']['date'])) ? $this->_run_mod_handler('hace', true, $_tmp, true) : smarty_modifier_hace($_tmp, true)); ?>
" width="32" height="32"/></a>
        <?php endforeach; endif; unset($_from); ?>
    </div>
</div>
</div>
<?php endif; ?>

<!--BY KMARIO19-->