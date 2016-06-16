<?php /* Smarty version 2.6.28, created on 2016-06-16 12:33:38
         compiled from juegos/j.home.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'juegos/j.home.tpl', 11, false),array('modifier', 'truncate', 'juegos/j.home.tpl', 12, false),array('modifier', 'date_format', 'juegos/j.home.tpl', 17, false),)), $this); ?>
<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title"><?php if ($this->_tpl_vars['tsLastJuegos']['cat']): ?>Juegos de <?php echo $this->_tpl_vars['tsLastJuegos']['cat']; ?>
<?php else: ?>&Uacute;ltimos juegos<?php endif; ?><div class="floatR"><?php echo $this->_tpl_vars['tsLastJuegos']['total']; ?>
</div></div>
</div>
</div>
<div class="ccontenido">
	<?php if ($this->_tpl_vars['tsLastJuegos']['total'] > 0): ?>
    <div class="cu-fotos">
        <?php $_from = $this->_tpl_vars['tsLastJuegos']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['j']):
?> 
		<div id="listjuegos" <?php if ($this->_tpl_vars['j']['j_status'] != 0 || $this->_tpl_vars['j']['user_activo'] == 0 || $this->_tpl_vars['j']['user_baneado'] == 1): ?>class="qtip" title="<?php if ($this->_tpl_vars['j']['j_status'] == 2): ?>Juego eliminada<?php elseif ($this->_tpl_vars['j']['j_status'] == 1): ?>Juego oculta por acumulaci&oacute;n de denuncias<?php elseif ($this->_tpl_vars['j']['user_activo'] == 0): ?>La cuenta del usuario est&aacute; desactivada<?php elseif ($this->_tpl_vars['j']['user_baneado'] == 1): ?>La cuenta del usuario est&aacute; suspendida<?php endif; ?>" style="border: 1px solid <?php if ($this->_tpl_vars['j']['j_status'] == 2): ?>red<?php elseif ($this->_tpl_vars['j']['j_status'] == 1): ?>coral<?php elseif ($this->_tpl_vars['j']['user_activo'] == 0): ?>brown<?php elseif ($this->_tpl_vars['j']['user_baneado'] == 1): ?>orange<?php endif; ?>;opacity: 0.5;filter: alpha(opacity=50);"<?php endif; ?>> 
		<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/juegos/<?php echo $this->_tpl_vars['j']['juego_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['j']['j_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html">
			<span class="jtitle"><?php echo ((is_array($_tmp=$this->_tpl_vars['j']['j_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 35) : smarty_modifier_truncate($_tmp, 35)); ?>
</span> 
			<div class="jimagen">
				<img src="<?php echo $this->_tpl_vars['j']['j_imagen']; ?>
" title="<?php echo $this->_tpl_vars['j']['j_title']; ?>
">
			</div>
			<div class="javatar">
				<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['j']['user_name']; ?>
"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['j']['user_id']; ?>
_50.jpg?<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y%m%d%H%M%S") : smarty_modifier_date_format($_tmp, "%Y%m%d%H%M%S")); ?>
" title="Ver perfil de <?php echo $this->_tpl_vars['j']['user_name']; ?>
"></a>
			</div>
			<?php if ($this->_tpl_vars['j']['j_hits'] > 10): ?>
				<span class="jstar qtip" title="Popular"></span>
			<?php endif; ?>
			<div class="jinfo">			
				<span class="visitas" title="Visitas"></span> <?php echo $this->_tpl_vars['j']['j_hits']; ?>

				<span class="v_pos" title="Votos positivos"></span> <?php echo $this->_tpl_vars['j']['j_votos_pos']; ?>

			</div> 
		</a> 
	</div>
	    <?php endforeach; endif; unset($_from); ?>				
    </div>
    <div class="sec-pagi" align="center">
        <div class="c-pagi" style="font-size: 15px;padding: 8px 0;">					
            P&aacute;ginas: <?php echo $this->_tpl_vars['tsLastJuegos']['pages']; ?>

        </div>					
    </div>
	<?php else: ?>
	<div class="emptyData" style="margin-right: 10px;"><?php if ($this->_tpl_vars['tsLastJuegos']['cat']): ?>No hay juegos con la categor&iacute;a <?php echo $this->_tpl_vars['tsLastJuegos']['cat']; ?>
.<?php else: ?>A&uacute;n nadie ha compartido juegos, se el primero.<?php endif; ?></div>
	<?php endif; ?>
</div> 