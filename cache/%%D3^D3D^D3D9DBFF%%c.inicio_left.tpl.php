<?php /* Smarty version 2.6.28, created on 2016-06-16 12:42:56
         compiled from comunidades/c.inicio_left.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'comunidades/c.inicio_left.tpl', 16, false),array('modifier', 'truncate', 'comunidades/c.inicio_left.tpl', 18, false),)), $this); ?>

<div id="bigBox" style="margin-bottom: 10px;">
	<div class="box_title">&Uacute;ltimos temas
            <div class="floatR"><select class="com_select_home" onchange="com.ir_a_categoria(this.value)">
            	<option value="<?php if ($this->_tpl_vars['tsAct']): ?>-1<?php endif; ?>"><?php if ($this->_tpl_vars['tsAct']): ?>Ver todas<?php else: ?>Seleccionar categor&iacute;a<?php endif; ?></option>
                <?php $_from = $this->_tpl_vars['tsCats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
                <option value="<?php echo $this->_tpl_vars['c']['c_seo']; ?>
" <?php if ($this->_tpl_vars['tsAct'] == $this->_tpl_vars['c']['c_seo']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['c']['c_nombre']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
            	</select>
            </div>
	</div>
    <?php if ($this->_tpl_vars['tsLastTemas']['data']): ?>
    <div class="box_cuerpo" id="ult_comm" style="padding: 0pt;">
        <?php $_from = $this->_tpl_vars['tsLastTemas']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['t']):
?>
         <div id="postList" <?php if ($this->_tpl_vars['c']['c_estado'] == 1 || $this->_tpl_vars['t']['t_estado'] == 1): ?>style="opacity: 0.5;background: #000;" title="La tema ha sido eliminado"<?php endif; ?>>
                            <div class="LP_avatar"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['t']['c_nombre_corto']; ?>
/<?php echo $this->_tpl_vars['t']['t_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['t']['t_titulo'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html">
                               </a></div>
           <div class="LP_titulo"><a alt="<?php echo $this->_tpl_vars['t']['t_titulo']; ?>
" title="<?php echo $this->_tpl_vars['t']['t_titulo']; ?>
" target="_self" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['t']['c_nombre_corto']; ?>
/<?php echo $this->_tpl_vars['t']['t_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['t']['t_titulo'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html" style="width: 356px;overflow: hidden;display: inline-block;height: 15px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['t']['t_titulo'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 45) : smarty_modifier_truncate($_tmp, 45)); ?>
</a><a style="float: right;" ><i class="com_icon <?php echo $this->_tpl_vars['t']['sub_cat']['c_seo']; ?>
"></i></a></div>
                            <div id="LP_hr"></div>
                            <div class="LP_info">                                

                                Autor <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['t']['user_name']; ?>
/" ><strong><?php echo $this->_tpl_vars['t']['user_name']; ?>
</strong></a> | En
                                <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['t']['c_nombre_corto']; ?>
/"><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['t']['c_nombre'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 45) : smarty_modifier_truncate($_tmp, 45)); ?>
</strong></a>

                            </div>                            
                            </div>


        	
   
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <div class="com_temas_footer">
    	<?php if ($this->_tpl_vars['tsPages']['next'] <= $this->_tpl_vars['tsPages']['pages'] || $this->_tpl_vars['tsPages']['prev'] > 0): ?>
    	<div class="com_msj_blue clearfix">
        	<?php if ($this->_tpl_vars['tsPages']['prev'] > 0 && $this->_tpl_vars['tsPages']['max'] == false): ?><a href="pagina.<?php echo $this->_tpl_vars['tsPages']['prev']; ?>
" class="floatL">&laquo; Anterior</a><?php endif; ?>
            <?php if ($this->_tpl_vars['tsPages']['next'] <= $this->_tpl_vars['tsPages']['pages']): ?><a href="pagina.<?php echo $this->_tpl_vars['tsPages']['next']; ?>
" class="floatR">Siguiente &raquo;</a>
            <?php elseif ($this->_tpl_vars['tsPages']['max'] == true): ?><a href="pagina.2">Siguiente &raquo;</a><?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
    <?php else: ?>
    	<div class="com_bigmsj_blue" style="margin-top: 5px;">No se han creado temas <?php if ($this->_tpl_vars['tsAct']): ?>para esta categor&iacute;a<?php else: ?>a&uacute;n<?php endif; ?></div>
    <?php endif; ?>
</div>