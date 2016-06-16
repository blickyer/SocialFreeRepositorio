<?php /* Smarty version 2.6.28, created on 2016-06-16 12:33:38
         compiled from juegos/j.home_right.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'juegos/j.home_right.tpl', 38, false),array('modifier', 'hace', 'juegos/j.home_right.tpl', 38, false),)), $this); ?>
<!--MOD JUEGOS BY KMARIO19-->


<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title">Estad&iacute;sticas</div>
	<div class="j-box_content" style="padding: 10px 0px;">
	    <div class="j_stat">
        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/usuarios/">
        	<b><?php echo $this->_tpl_vars['tsStats']['stats_miembros']; ?>
</b>
		    <div>Miembros</div>
        </a>
		</div>
	    <div class="j_stat">
        	<b><?php echo $this->_tpl_vars['tsStats']['stats_juegos']; ?>
</b>
		    <div>Juegos</div>
		</div>
        <div class="j_stat"> 
        	<b><?php echo $this->_tpl_vars['tsStats']['stats_juego_comments']; ?>
</b>       	
			<div>Comentarios</div>
        </div>
	</div>
</div>
</div>


<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title">&Uacute;ltimos Comentarios</div>
    <div class="j-box_content" style="padding: 5px;">
	<?php if ($this->_tpl_vars['tsStats']['stats_juego_comments'] > 0): ?>
    	<?php $_from = $this->_tpl_vars['tsLastComments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['c']):
?>	
    	<div class="lcomen" style="height: auto;"> 
        	            <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['c']['user_name']; ?>
/" class="hovercard" uid="<?php echo $this->_tpl_vars['c']['c_user']; ?>
"><strong><?php echo $this->_tpl_vars['c']['user_name']; ?>
</strong></a> &raquo;
            <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/juegos/<?php echo $this->_tpl_vars['c']['juego_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['c']['j_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html#div_cmnt_<?php echo $this->_tpl_vars['c']['cid']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['c']['c_date'])) ? $this->_run_mod_handler('hace', true, $_tmp) : smarty_modifier_hace($_tmp)); ?>
"><?php echo $this->_tpl_vars['c']['j_title']; ?>
</a>
        </div>
		<?php endforeach; endif; unset($_from); ?>				
	<?php else: ?>
		<div class="emptyData">A&uacute;n no se han comentado juegos.</div>
	<?php endif; ?>
    </div>
</div>
</div>


<?php if ($this->_tpl_vars['tsStats']['stats_juegos'] > 2): ?>
<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title">Los m&aacute;s jugados</div>
</div>
</div>	
    <div id="j-hits">
        <?php $_from = $this->_tpl_vars['tsMostJuegos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['j']):
?>
        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/juegos/<?php echo $this->_tpl_vars['j']['juego_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['j']['j_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html">
            <img class="j-img qtip" src="<?php echo $this->_tpl_vars['j']['j_imagen']; ?>
" width="85" height="85" title="<?php echo $this->_tpl_vars['j']['j_title']; ?>
">			
                <span class="visitas" title="Visitas"><img src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/j-eye.png"> <?php echo $this->_tpl_vars['j']['j_hits']; ?>
</span>
        </a>				
        <?php endforeach; endif; unset($_from); ?>
    </div>
<?php endif; ?>


<div class="j-box_body" style="margin-top: 5px;">
<div class="j-box">
    <div class="boxy-title" style="border-bottom: 0;">Categor&iacute;as</div>
    <div class="j-box_content">				
			<?php $_from = $this->_tpl_vars['tsCategorias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
			<div style="padding: 5px;border-top: 1px solid #ccc;font-size: 14px;font-weight: bold;"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/juegos/cat/<?php echo $this->_tpl_vars['c']['cat_img']; ?>
" style="color: #1262BE;display: block;"><img src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/juegos/<?php echo $this->_tpl_vars['c']['cat_img']; ?>
.png" height="24" width="24" style="vertical-align: middle;" /> <?php echo $this->_tpl_vars['c']['cat_title']; ?>
 <span class="floatR" style="clear:both;"><?php echo $this->_tpl_vars['tsJuegos']->cat_total($this->_tpl_vars['c']['cat_id']); ?>
<?php echo $this->_tpl_vars['c']['total']; ?>
</span></a></div>
            <?php endforeach; endif; unset($_from); ?>
	</div>
</div>
</div>

<!--MOD JUEGOS BY KMARIO19-->