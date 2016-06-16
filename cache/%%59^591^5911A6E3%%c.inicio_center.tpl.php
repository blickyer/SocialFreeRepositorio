<?php /* Smarty version 2.6.28, created on 2016-06-16 12:42:56
         compiled from comunidades/c.inicio_center.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'comunidades/c.inicio_center.tpl', 10, false),array('modifier', 'seo', 'comunidades/c.inicio_center.tpl', 37, false),array('modifier', 'limit', 'comunidades/c.inicio_center.tpl', 37, false),)), $this); ?>
<div class="com_home_center">
<div id="bigBox">
    <div class="box_title">
        <div class="box_txt estadisticas">Estad&iacute;sticas</div>
        <div class="box_rss"><span class="systemicons historyMod"></span></div>
    </div>
    <div class="box_cuerpo" id="WStats">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <th><?php echo ((is_array($_tmp=$this->_tpl_vars['tsStats']['stats_online'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ',', '.') : number_format($_tmp, 0, ',', '.')); ?>
</th>
                <th><?php echo ((is_array($_tmp=$this->_tpl_vars['tsStats']['stats_comunidades'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ',', '.') : number_format($_tmp, 0, ',', '.')); ?>
</th>
                <th><?php echo ((is_array($_tmp=$this->_tpl_vars['tsStats']['stats_temas'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ',', '.') : number_format($_tmp, 0, ',', '.')); ?>
</th>
                <th><?php echo ((is_array($_tmp=$this->_tpl_vars['tsStats']['stats_respuestas'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ',', '.') : number_format($_tmp, 0, ',', '.')); ?>
</th>
            </tr>
            <tr>
                <td><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/usuarios/?online=true">Online</a></td>
                <td>Comus</td>
                <td>Temas</td>
                <td>Comentarios</td>
            </tr>
        </table>
        </div>
</div>
    <div class="bigBox">
        <div class="box_title">Comentarios recientes</div>
        <div class="box_cuerpo" id="ult_comm" style="padding: 0pt;">
        	<?php if ($this->_tpl_vars['tsRespuestas']): ?>
        	<?php $_from = $this->_tpl_vars['tsRespuestas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['r']):
?>
            <div class="UC_cont" <?php if ($this->_tpl_vars['r']['t_estado'] == 1): ?> title="El tema ha sido eliminado"<?php endif; ?>>


                <div class="UC_avatar">

</div>
                    <div class="UC_post" style="
    width: 246px;
">                          <a class="cle_autor" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['r']['user_name']; ?>
"><?php echo $this->_tpl_vars['r']['user_name']; ?>
</a><b><a style="color: #16A5DD; font-size: 12px;" class="cle_title" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['r']['c_nombre_corto']; ?>
/<?php echo $this->_tpl_vars['r']['t_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['r']['t_titulo'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html#coment_id_<?php echo $this->_tpl_vars['r']['r_id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['r']['t_titulo'])) ? $this->_run_mod_handler('limit', true, $_tmp, 30) : smarty_modifier_limit($_tmp, 30)); ?>
</a></b>

          
</div>

            </div>
            <?php endforeach; endif; unset($_from); ?>
            <?php else: ?>
            <div class="com_bigmsj_blue">No hay comentarios recientes</div>
            <?php endif; ?>
        </div>
    </div>

    <div class="com_new_box">
        <div class="box_title">Comunidades recientes</div>
        <div class="box_cuerpo" id="ult_comm" style="padding: 0pt;">
        	<?php if ($this->_tpl_vars['tsRecientes']): ?>
            <?php $_from = $this->_tpl_vars['tsRecientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
            <div class="UC_cont"  <?php if ($this->_tpl_vars['c']['c_estado'] == 1): ?>style="opacity: 0.5;background: #000;" title="La comunidad ha sido eliminada"<?php endif; ?>>

                 <div class="UC_avatar">

</div>

                    <div class="UC_post" style="
    width: 246px;
">
                         <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['c']['c_nombre_corto']; ?>
/" class="size10" title="<?php echo $this->_tpl_vars['c']['c_nombre']; ?>
"><?php echo $this->_tpl_vars['c']['c_nombre']; ?>
</a>
          
</div>
               </div>
            <?php endforeach; endif; unset($_from); ?>
            <?php else: ?>
            <div class="com_bigmsj_blue">No se han creado comunidades a&uacute;n</div>
            <?php endif; ?>
        </div>
    </div>
</div>