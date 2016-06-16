<?php /* Smarty version 2.6.28, created on 2016-06-16 12:35:43
         compiled from t.php_files/p.perfil.info.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fecha', 't.php_files/p.perfil.info.tpl', 10, false),)), $this); ?>
1:
<div id="perfil_info" status="activo">
    <div class="widget big-info clearfix">
        <div class="title-w clearfix">
            <h3>Informaci&oacute;n de <?php echo $this->_tpl_vars['tsUsername']; ?>
</h3>
        </div>
        <ul style="font-family: sans-serif;border: 1px solid #E8E8E8;">
            <li><label>Pa&iacute;s</label><strong><?php echo $this->_tpl_vars['tsPais']; ?>
</strong></li>
			<?php if ($this->_tpl_vars['tsPerfil']['p_sitio']): ?><li><label>Sitio Web</label><strong><a rel="nofollow" href="<?php echo $this->_tpl_vars['tsPerfil']['p_sitio']; ?>
"><?php echo $this->_tpl_vars['tsPerfil']['p_sitio']; ?>
</a></strong></li><?php endif; ?>			
            <li><label>Es usuario desde</label><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['tsPerfil']['user_registro'])) ? $this->_run_mod_handler('fecha', true, $_tmp, 'd_Ms_a') : smarty_modifier_fecha($_tmp, 'd_Ms_a')); ?>
</strong></li>
            <li><label>&Uacute;ltima vez activo</label><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['tsPerfil']['user_lastactive'])) ? $this->_run_mod_handler('fecha', true, $_tmp) : smarty_modifier_fecha($_tmp)); ?>
</strong></li>
			<?php if ($this->_tpl_vars['tsPerfil']['p_estudios']): ?><li><label>Estudios</label><strong><?php echo $this->_tpl_vars['tsPData']['estudios'][$this->_tpl_vars['tsPerfil']['p_estudios']]; ?>
</strong></li><?php endif; ?>
			<li class="sep"><h4>Idiomas</h4></li>
        	<?php $_from = $this->_tpl_vars['tsPData']['idiomas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iid'] => $this->_tpl_vars['idioma']):
?>
            <?php if ($this->_tpl_vars['tsPerfil']['p_idiomas'][$this->_tpl_vars['iid']] != 0): ?><li><label><?php echo $this->_tpl_vars['idioma']; ?>
</label><?php $_from = $this->_tpl_vars['tsPData']['inivel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?><?php if ($this->_tpl_vars['tsPerfil']['p_idiomas'][$this->_tpl_vars['iid']] == $this->_tpl_vars['val']): ?><strong><?php echo $this->_tpl_vars['text']; ?>
</strong><?php endif; ?><?php endforeach; endif; unset($_from); ?></li><?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>															
			<li class="sep"><h4>Datos profesionales</h4></li>
			<?php if ($this->_tpl_vars['tsPerfil']['p_profesion']): ?><li><label>Profesi&oacute;n</label><strong><?php echo $this->_tpl_vars['tsPerfil']['p_profesion']; ?>
</strong></li><?php endif; ?>			
            <?php if ($this->_tpl_vars['tsPerfil']['p_empresa']): ?><li><label>Empresa</label><strong><?php echo $this->_tpl_vars['tsPerfil']['p_empresa']; ?>
</strong></li><?php endif; ?>			
            <?php if ($this->_tpl_vars['tsPerfil']['p_sector']): ?><li><label>Sector</label><strong><?php echo $this->_tpl_vars['tsPData']['sector'][$this->_tpl_vars['tsPerfil']['p_sector']]; ?>
</strong></li><?php endif; ?>			
            <?php if ($this->_tpl_vars['tsPerfil']['p_ingresos']): ?><li><label>Ingresos</label><strong><?php echo $this->_tpl_vars['tsPData']['ingresos'][$this->_tpl_vars['tsPerfil']['p_ingresos']]; ?>
</strong></li><?php endif; ?>			
            <?php if ($this->_tpl_vars['tsPerfil']['p_int_prof']): ?><li><label>Intereses profesionales</label><strong><?php echo $this->_tpl_vars['tsPerfil']['p_int_prof']; ?>
</strong></li><?php endif; ?>			
            <?php if ($this->_tpl_vars['tsPerfil']['p_hab_prof']): ?><li><label>Habilidades profesionales</label><strong><?php echo $this->_tpl_vars['tsPerfil']['p_hab_prof']; ?>
</strong></li><?php endif; ?>
			<li class="sep"><h4>Vida personal</h4></li>
			<?php if ($this->_tpl_vars['tsGustos'] == 'show'): ?><li><label>Le gustar&iacute;a</label><strong><?php $_from = $this->_tpl_vars['tsPData']['gustos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?><?php if ($this->_tpl_vars['tsPerfil']['p_gustos'][$this->_tpl_vars['val']] == 1): ?><?php echo $this->_tpl_vars['text']; ?>
, <?php endif; ?><?php endforeach; endif; unset($_from); ?></strong></li><?php endif; ?>			
            <?php if ($this->_tpl_vars['tsPerfil']['p_estado']): ?><li><label>Estado civil</label><strong><?php echo $this->_tpl_vars['tsPData']['estado'][$this->_tpl_vars['tsPerfil']['p_estado']]; ?>
</strong></li><?php endif; ?>			
            <?php if ($this->_tpl_vars['tsPerfil']['p_hijos']): ?><li><label>Hijos</label><strong><?php echo $this->_tpl_vars['tsPData']['hijos'][$this->_tpl_vars['tsPerfil']['p_hijos']]; ?>
</strong></li><?php endif; ?>			
            <?php if ($this->_tpl_vars['tsPerfil']['p_vivo']): ?><li><label>Vive con</label><strong><?php echo $this->_tpl_vars['tsPData']['vivo'][$this->_tpl_vars['tsPerfil']['p_vivo']]; ?>
</strong></li><?php endif; ?>
			<li class="sep"><h4>&iquest;C&oacute;mo es?</h4></li>
			<?php if ($this->_tpl_vars['tsPerfil']['p_altura']): ?><li><label>Mide</label><strong><?php echo $this->_tpl_vars['tsPerfil']['p_altura']; ?>
 centimetros</strong></li><?php endif; ?>			
            <?php if ($this->_tpl_vars['tsPerfil']['p_peso']): ?><li><label>Pesa</label><strong><?php echo $this->_tpl_vars['tsPerfil']['p_peso']; ?>
 kilos</strong></li><?php endif; ?>			
            <?php if ($this->_tpl_vars['tsPerfil']['p_pelo']): ?><li><label>Su pelo es</label><strong><?php echo $this->_tpl_vars['tsPData']['pelo'][$this->_tpl_vars['tsPerfil']['p_pelo']]; ?>
</strong></li><?php endif; ?>			
            <?php if ($this->_tpl_vars['tsPerfil']['p_ojos']): ?><li><label>Sus ojos son</label><strong><?php echo $this->_tpl_vars['tsPData']['ojos'][$this->_tpl_vars['tsPerfil']['p_ojos']]; ?>
</strong></li><?php endif; ?>
            <?php if ($this->_tpl_vars['tsPerfil']['p_fisico']): ?><li><label>Su f&iacute;sico es</label><strong><?php echo $this->_tpl_vars['tsPData']['fisico'][$this->_tpl_vars['tsPerfil']['p_fisico']]; ?>
</strong></li><?php endif; ?>
            <?php if ($this->_tpl_vars['tsPerfil']['p_tengo']['0'] != 0 || $this->_tpl_vars['tsPerfil']['p_tengo']['1'] != 0): ?>
            <?php $_from = $this->_tpl_vars['tsPData']['tengo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['text']):
?>
            <li><label></label><strong><?php if ($this->_tpl_vars['tsPerfil']['p_tengo'][$this->_tpl_vars['val']] == 1): ?>Tiene<?php else: ?>No tiene<?php endif; ?> <?php echo $this->_tpl_vars['text']; ?>
</strong></li>
            <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>				
			<li class="sep"><h4>Habitos personales</h4></li>
			<?php if ($this->_tpl_vars['tsPerfil']['p_dieta']): ?><li><label>Mantiene una dieta</label><strong><?php echo $this->_tpl_vars['tsPData']['dieta'][$this->_tpl_vars['tsPerfil']['p_dieta']]; ?>
</strong></li><?php endif; ?>			
            <?php if ($this->_tpl_vars['tsPerfil']['p_fumo']): ?><li><label>Fuma</label><strong><?php echo $this->_tpl_vars['tsPData']['fumo_tomo'][$this->_tpl_vars['tsPerfil']['p_fumo']]; ?>
</strong></li><?php endif; ?>			
            <?php if ($this->_tpl_vars['tsPerfil']['p_tomo']): ?><li><label>Toma alcohol</label><strong><?php echo $this->_tpl_vars['tsPData']['fumo_tomo'][$this->_tpl_vars['tsPerfil']['p_tomo']]; ?>
</strong></li><?php endif; ?>
			<li class="sep"><h4>Sus propias palabras</h4></li>
			<?php if ($this->_tpl_vars['tsPerfil']['p_intereses']): ?><li><label>Intereses</label><strong><?php echo $this->_tpl_vars['tsPerfil']['p_intereses']; ?>
</strong></li><?php endif; ?>
            <?php if ($this->_tpl_vars['tsPerfil']['p_hobbies']): ?><li><label>Hobbies</label><strong><?php echo $this->_tpl_vars['tsPerfil']['p_hobbies']; ?>
</strong></li><?php endif; ?>
            <?php if ($this->_tpl_vars['tsPerfil']['p_tv']): ?><li><label>Series de TV favoritas</label><strong><?php echo $this->_tpl_vars['tsPerfil']['p_tv']; ?>
</strong></li><?php endif; ?>			
            <?php if ($this->_tpl_vars['tsPerfil']['p_musica']): ?><li><label>M&uacute;sica favorita</label><strong><?php echo $this->_tpl_vars['tsPerfil']['p_musica']; ?>
</strong></li><?php endif; ?>
            <?php if ($this->_tpl_vars['tsPerfil']['p_deportes']): ?><li><label>Deportes y Equipos</label><strong><?php echo $this->_tpl_vars['tsPerfil']['p_deportes']; ?>
</strong></li><?php endif; ?>	
            <?php if ($this->_tpl_vars['tsPerfil']['p_libros']): ?><li><label>Libros favoritos</label><strong><?php echo $this->_tpl_vars['tsPerfil']['p_libros']; ?>
</strong></li><?php endif; ?>
            <?php if ($this->_tpl_vars['tsPerfil']['p_peliculas']): ?><li><label>Pel&iacute;culas favoritas</label><strong><?php echo $this->_tpl_vars['tsPerfil']['p_peliculas']; ?>
</strong></li><?php endif; ?>			
            <?php if ($this->_tpl_vars['tsPerfil']['p_comida']): ?><li><label>Comida favor&iacute;ta</label><strong><?php echo $this->_tpl_vars['tsPerfil']['p_comida']; ?>
</strong></li><?php endif; ?>
            <?php if ($this->_tpl_vars['tsPerfil']['p_heroes']): ?><li><label>Sus heroes son</label><strong><?php echo $this->_tpl_vars['tsPerfil']['p_heroes']; ?>
</strong></li><?php endif; ?>
        </ul>
    </div>
</div>