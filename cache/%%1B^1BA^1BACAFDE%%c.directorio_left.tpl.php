<?php /* Smarty version 2.6.28, created on 2016-06-16 12:43:05
         compiled from comunidades/c.directorio_left.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'limit', 'comunidades/c.directorio_left.tpl', 39, false),)), $this); ?>
<div class="com_loc_global">
	<ul class="clearfix">
    	<li><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/">Comunidades</a></li>
        <li><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/dir/">Directorio</a></li>
        <?php if ($this->_tpl_vars['tsDir']['c_seo']): ?>
        <li><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/dir/<?php echo $this->_tpl_vars['tsDir']['global_url']; ?>
/"><?php echo $this->_tpl_vars['tsDir']['global_pais']; ?>
</a></li>
        <li><?php echo $this->_tpl_vars['tsDir']['c_nombre']; ?>
</li>
        <?php elseif ($this->_tpl_vars['tsDir']['sub']['sid'] > 0): ?>
        <li><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/dir/<?php echo $this->_tpl_vars['tsDir']['global_url']; ?>
"><?php echo $this->_tpl_vars['tsDir']['global_pais']; ?>
</a></li>
        <li><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/dir/<?php echo $this->_tpl_vars['tsDir']['global_url']; ?>
/<?php echo $this->_tpl_vars['tsDir']['sub']['c_seo']; ?>
"><?php echo $this->_tpl_vars['tsDir']['sub']['c_nombre']; ?>
</a></li>
        <li><?php echo $this->_tpl_vars['tsDir']['sub']['s_nombre']; ?>
</li>
        <?php else: ?>
        <li><?php echo $this->_tpl_vars['tsDir']['global_pais']; ?>
</li>
        <?php endif; ?>
    </ul>
</div>
<div class="box_title">Directorio</div>
<div class="box_cuerpo">
	<?php if ($this->_tpl_vars['tsDir']['c_seo']): ?>
    	<?php $_from = $this->_tpl_vars['tsDir']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['d']):
?>
        <div class="cdr_item" style="height:26px;">
            <i class="com_icon <?php echo $this->_tpl_vars['tsDir']['c_seo']; ?>
"></i>
            <a class="nombre" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/dir/<?php echo $this->_tpl_vars['tsDir']['global_url']; ?>
/<?php echo $this->_tpl_vars['d']['c_seo']; ?>
/<?php echo $this->_tpl_vars['d']['s_seo']; ?>
"><?php echo $this->_tpl_vars['d']['s_nombre']; ?>
</a>
            <span><?php echo $this->_tpl_vars['d']['total']; ?>
</span>
        </div>
        <?php endforeach; endif; unset($_from); ?>
    <?php elseif ($this->_tpl_vars['tsDir']['sub']['sid'] > 0): ?>
    	<div id="com_members_result">
            <?php $_from = $this->_tpl_vars['tsDir']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
            <div class="cdr_list clearfix">
                <div class="cdrl_avatar floatL"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['m']['c_nombre_corto']; ?>
/"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/uploads/c_<?php echo $this->_tpl_vars['m']['c_id']; ?>
.jpg" width="75" height="75" /></a></div>
                <ul class="cdrl_info clearfix floatL">
                    <li><h4><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['m']['c_nombre_corto']; ?>
/"><?php echo $this->_tpl_vars['m']['c_nombre']; ?>
</a></h4></li>
                    <li style="width: 530px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['m']['c_descripcion'])) ? $this->_run_mod_handler('limit', true, $_tmp, 150) : smarty_modifier_limit($_tmp, 150)); ?>
</li>
                    <li>Miembros <strong><?php echo $this->_tpl_vars['m']['c_miembros']; ?>
</strong> - Temas <strong><?php echo $this->_tpl_vars['m']['c_temas']; ?>
</strong></li>
                </ul>
            </div>
            <?php endforeach; endif; unset($_from); ?>
            <?php if ($this->_tpl_vars['tsDir']['pages']['pages'] > 1): ?>
            <div style="margin-top: 10px;" class="clearfix">
            	<?php if ($this->_tpl_vars['tsDir']['pages']['prev']): ?><a class="floatL" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/dir/<?php echo $this->_tpl_vars['tsDir']['global_url']; ?>
/<?php echo $this->_tpl_vars['tsDir']['sub']['c_seo']; ?>
/<?php echo $this->_tpl_vars['tsDir']['sub']['s_seo']; ?>
/<?php echo $this->_tpl_vars['tsDir']['pages']['prev']; ?>
">&laquo; Anterior</a><?php endif; ?>
                <?php if ($this->_tpl_vars['tsDir']['pages']['pages'] > 1 && $this->_tpl_vars['tsDir']['pages']['pages'] > $this->_tpl_vars['tsDir']['pages']['current']): ?><a class="floatR" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/dir/<?php echo $this->_tpl_vars['tsDir']['global_url']; ?>
/<?php echo $this->_tpl_vars['tsDir']['sub']['c_seo']; ?>
/<?php echo $this->_tpl_vars['tsDir']['sub']['s_seo']; ?>
/<?php echo $this->_tpl_vars['tsDir']['pages']['next']; ?>
">Siguiente &raquo;</a><?php endif; ?>
            
            <?php endif; ?>
        </div>
    <?php else: ?>
        <?php $_from = $this->_tpl_vars['tsDir']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['d']):
?>
        <div class="cdr_item">
            <i class="com_icon <?php echo $this->_tpl_vars['d']['c_seo']; ?>
"></i>
            <a class="nombre" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/dir/<?php echo $this->_tpl_vars['tsDir']['global_url']; ?>
/<?php echo $this->_tpl_vars['d']['c_seo']; ?>
"><?php echo $this->_tpl_vars['d']['c_nombre']; ?>
</a>
            <span><?php echo $this->_tpl_vars['d']['total']; ?>
</span>
            <div class="cdr_subs">
                <?php $_from = $this->_tpl_vars['d']['sub_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['s']):
?>
                <?php if ($this->_tpl_vars['i'] > 0): ?>, <?php endif; ?><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/dir/<?php echo $this->_tpl_vars['tsDir']['global_url']; ?>
/<?php echo $this->_tpl_vars['d']['c_seo']; ?>
/<?php echo $this->_tpl_vars['s']['s_seo']; ?>
" title="<?php echo $this->_tpl_vars['s']['total']; ?>
 Comunidad<?php if ($this->_tpl_vars['s']['total'] > 1): ?>es<?php endif; ?>"><?php echo $this->_tpl_vars['s']['s_nombre']; ?>
</a>
                <?php endforeach; endif; unset($_from); ?>
            </div>
        </div>
        <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>
</div>