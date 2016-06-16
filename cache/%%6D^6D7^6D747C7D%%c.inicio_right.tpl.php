<?php /* Smarty version 2.6.28, created on 2016-06-16 12:42:56
         compiled from comunidades/c.inicio_right.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'comunidades/c.inicio_right.tpl', 25, false),array('modifier', 'hace', 'comunidades/c.inicio_right.tpl', 27, false),)), $this); ?>
<div class="com_home_right">
    
	<div class="emptyData">
        <?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
 te permite crear tu comunidad para que puedas compartir gustos e intereses con los dem&aacute;s.
                <?php if ($this->_tpl_vars['tsUser']->is_member): ?>
        <div class="cbi_footer clearfix"><a class="input_button" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/crear/">¡Crea la tuya!</a></div>
		<?php else: ?>
		<div class="cbi_footer clearfix"><a class="input_button" onclick="javascript:open_login_box(); return false">¡Crea la tuya!</a></div></div>
        <?php endif; ?>
    </div><br />
        
    <?php if ($this->_tpl_vars['tsPopulares']['semana']): ?>
    <div class="box_title">Comunidad destacada!</div>
    <div class="com_bigmsj_yellow">
        
        <div class="cbi_body clearfix">
            <?php $_from = $this->_tpl_vars['tsPopulares']['semana']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['c']):
?>
            <?php if ($this->_tpl_vars['i'] == 0): ?>
            <div class="com_destacada">
            	<div class="cd_left floatL">
                <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['c']['c_nombre_corto']; ?>
/" title="<?php echo $this->_tpl_vars['c']['c_nombre']; ?>
"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/uploads/c_<?php echo $this->_tpl_vars['c']['c_id']; ?>
.jpg" alt="<?php echo $this->_tpl_vars['c']['c_nombre']; ?>
" width="50" height="50" /></a>                
            	</div>
                <div class="cd_right floatL">
                	<h2 style="color: #ED7DB5;"><?php echo ((is_array($_tmp=$this->_tpl_vars['c']['c_nombre'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 19) : smarty_modifier_truncate($_tmp, 19)); ?>
</h2>
                	<ul><small>
                    	<li>Creada <?php echo ((is_array($_tmp=$this->_tpl_vars['c']['c_fecha'])) ? $this->_run_mod_handler('hace', true, $_tmp) : smarty_modifier_hace($_tmp)); ?>
</li>
                        <li><strong>Miembros: </strong><?php echo $this->_tpl_vars['c']['c_miembros']; ?>
</li>
                        <li><strong>Temas: </strong><?php echo $this->_tpl_vars['c']['c_temas']; ?>
</li>
                        <a class="input_button" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['c']['c_nombre_corto']; ?>
/">Ver comunidad</a>                      
                    </small></ul>
                </div>
            </div>
            <?php endif; ?>
        	<?php endforeach; endif; unset($_from); ?>
    	</div>
    </div>
    <?php endif; ?>
</div>