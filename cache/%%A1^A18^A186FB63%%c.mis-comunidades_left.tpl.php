<?php /* Smarty version 2.6.28, created on 2016-06-16 12:43:03
         compiled from comunidades/c.mis-comunidades_left.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'limit', 'comunidades/c.mis-comunidades_left.tpl', 31, false),)), $this); ?>
<div class="com_members_filter clearfix">
	<div class="box_title">
        <li>Mostrando <strong><?php if ($this->_tpl_vars['tsMisComus']['pages']['van'] > $this->_tpl_vars['tsMisComus']['total']): ?><?php echo $this->_tpl_vars['tsMisComus']['total']; ?>
<?php else: ?><?php echo $this->_tpl_vars['tsMisComus']['pages']['van']; ?>
<?php endif; ?></strong> resultados de <strong><?php echo $this->_tpl_vars['tsMisComus']['total']; ?>
</strong></li>
    </div>
    <ul class="cmf_select clearfix floatR">
    	<li><strong>Ordenar por:</strong></li>
    	<li <?php if ($this->_tpl_vars['tsMisComus']['orden'] == 'nombre'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/mis-comunidades/nombre">Nombre</a></li>
        <li <?php if ($this->_tpl_vars['tsMisComus']['orden'] == 'rango'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/mis-comunidades/rango">Rango</a></li>
        <li <?php if ($this->_tpl_vars['tsMisComus']['orden'] == 'miembros'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/mis-comunidades/miembros">Miembros</a></li>
        <li <?php if ($this->_tpl_vars['tsMisComus']['orden'] == 'temas'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/mis-comunidades/temas">Temas</a></li>
        <li <?php if ($this->_tpl_vars['tsMisComus']['orden'] == 'fecha'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/mis-comunidades/fecha">Fecha</a></li>
    </ul>
</div>
<?php if ($this->_tpl_vars['tsMisComus']['pages']['pages'] > 1): ?>
<div class="box_cuerpo clearfix">
<div class="com_pagination">
	<?php if ($this->_tpl_vars['tsMisComus']['pages']['prev']): ?><a class="cp_prev" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/mis-comunidades/<?php echo $this->_tpl_vars['tsMisComus']['orden']; ?>
.<?php echo $this->_tpl_vars['tsMisComus']['pages']['prev']; ?>
/"></a><?php endif; ?>
	<?php unset($this->_sections['pages']);
$this->_sections['pages']['name'] = 'pages';
$this->_sections['pages']['start'] = (int)1;
$this->_sections['pages']['loop'] = is_array($_loop=$this->_tpl_vars['tsMisComus']['pages']['pages']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pages']['max'] = (int)$this->_tpl_vars['tsMisComus']['pages']['pages'];
$this->_sections['pages']['show'] = true;
if ($this->_sections['pages']['max'] < 0)
    $this->_sections['pages']['max'] = $this->_sections['pages']['loop'];
$this->_sections['pages']['step'] = 1;
if ($this->_sections['pages']['start'] < 0)
    $this->_sections['pages']['start'] = max($this->_sections['pages']['step'] > 0 ? 0 : -1, $this->_sections['pages']['loop'] + $this->_sections['pages']['start']);
else
    $this->_sections['pages']['start'] = min($this->_sections['pages']['start'], $this->_sections['pages']['step'] > 0 ? $this->_sections['pages']['loop'] : $this->_sections['pages']['loop']-1);
if ($this->_sections['pages']['show']) {
    $this->_sections['pages']['total'] = min(ceil(($this->_sections['pages']['step'] > 0 ? $this->_sections['pages']['loop'] - $this->_sections['pages']['start'] : $this->_sections['pages']['start']+1)/abs($this->_sections['pages']['step'])), $this->_sections['pages']['max']);
    if ($this->_sections['pages']['total'] == 0)
        $this->_sections['pages']['show'] = false;
} else
    $this->_sections['pages']['total'] = 0;
if ($this->_sections['pages']['show']):

            for ($this->_sections['pages']['index'] = $this->_sections['pages']['start'], $this->_sections['pages']['iteration'] = 1;
                 $this->_sections['pages']['iteration'] <= $this->_sections['pages']['total'];
                 $this->_sections['pages']['index'] += $this->_sections['pages']['step'], $this->_sections['pages']['iteration']++):
$this->_sections['pages']['rownum'] = $this->_sections['pages']['iteration'];
$this->_sections['pages']['index_prev'] = $this->_sections['pages']['index'] - $this->_sections['pages']['step'];
$this->_sections['pages']['index_next'] = $this->_sections['pages']['index'] + $this->_sections['pages']['step'];
$this->_sections['pages']['first']      = ($this->_sections['pages']['iteration'] == 1);
$this->_sections['pages']['last']       = ($this->_sections['pages']['iteration'] == $this->_sections['pages']['total']);
?>
    <a <?php if ($this->_tpl_vars['tsMisComus']['pages']['current'] == $this->_sections['pages']['index']): ?>class="here"<?php endif; ?> href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/mis-comunidades/<?php echo $this->_tpl_vars['tsMisComus']['orden']; ?>
.<?php echo $this->_sections['pages']['index']; ?>
/"><?php echo $this->_sections['pages']['index']; ?>
</a>
    <?php endfor; endif; ?>
    <?php if ($this->_tpl_vars['tsMisComus']['pages']['pages'] > 1 && $this->_tpl_vars['tsMisComus']['pages']['pages'] > $this->_tpl_vars['tsMisComus']['pages']['current']): ?><a class="cp_next" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/mis-comunidades/<?php echo $this->_tpl_vars['tsMisComus']['orden']; ?>
.<?php echo $this->_tpl_vars['tsMisComus']['pages']['next']; ?>
/"></a><?php endif; ?>
</div>
<?php endif; ?>
<div id="com_members_result">
    <?php $_from = $this->_tpl_vars['tsMisComus']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
    <div class="com_list_members clearfix">
    	<div class="clm_avatar floatL"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['m']['c_nombre_corto']; ?>
/"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/uploads/c_<?php echo $this->_tpl_vars['m']['c_id']; ?>
.jpg" width="75" height="75" /></a></div>
        <ul class="clm_info clearfix floatL">
        	<li><h4><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['m']['c_nombre_corto']; ?>
/"><?php echo $this->_tpl_vars['m']['c_nombre']; ?>
</a></h4></li>
            <li>Categor&iacute;a: <strong><?php echo $this->_tpl_vars['m']['categoria']; ?>
</strong></li>
            <li title="<?php echo $this->_tpl_vars['m']['c_descripcion']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['m']['c_descripcion'])) ? $this->_run_mod_handler('limit', true, $_tmp, 85) : smarty_modifier_limit($_tmp, 85)); ?>
</li>
            <li>Miembros <strong><?php echo $this->_tpl_vars['m']['c_miembros']; ?>
</strong> - Temas <strong><?php echo $this->_tpl_vars['m']['c_temas']; ?>
</strong></li>
            <li>Mi rango: <strong><?php if ($this->_tpl_vars['m']['m_permisos'] == 5): ?>Administrador<?php elseif ($this->_tpl_vars['m']['m_permisos'] == 4): ?>Moderador<?php elseif ($this->_tpl_vars['m']['m_permisos'] == 3): ?>Posteador<?php elseif ($this->_tpl_vars['m']['m_permisos'] == 2): ?>Comentador<?php elseif ($this->_tpl_vars['m']['m_permisos'] == 1): ?>Visitante<?php endif; ?></strong></li>
        </ul>
    </div>
    <?php endforeach; endif; unset($_from); ?>
</div>
<?php if ($this->_tpl_vars['tsMisComus']['pages']['pages'] > 1): ?>
<div class="com_pagination">
	<?php if ($this->_tpl_vars['tsMisComus']['pages']['prev']): ?><a class="cp_prev" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/mis-comunidades/<?php echo $this->_tpl_vars['tsMisComus']['orden']; ?>
.<?php echo $this->_tpl_vars['tsMisComus']['pages']['prev']; ?>
/"></a><?php endif; ?>
	<?php unset($this->_sections['pages']);
$this->_sections['pages']['name'] = 'pages';
$this->_sections['pages']['start'] = (int)1;
$this->_sections['pages']['loop'] = is_array($_loop=$this->_tpl_vars['tsMisComus']['pages']['pages']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pages']['max'] = (int)$this->_tpl_vars['tsMisComus']['pages']['pages'];
$this->_sections['pages']['show'] = true;
if ($this->_sections['pages']['max'] < 0)
    $this->_sections['pages']['max'] = $this->_sections['pages']['loop'];
$this->_sections['pages']['step'] = 1;
if ($this->_sections['pages']['start'] < 0)
    $this->_sections['pages']['start'] = max($this->_sections['pages']['step'] > 0 ? 0 : -1, $this->_sections['pages']['loop'] + $this->_sections['pages']['start']);
else
    $this->_sections['pages']['start'] = min($this->_sections['pages']['start'], $this->_sections['pages']['step'] > 0 ? $this->_sections['pages']['loop'] : $this->_sections['pages']['loop']-1);
if ($this->_sections['pages']['show']) {
    $this->_sections['pages']['total'] = min(ceil(($this->_sections['pages']['step'] > 0 ? $this->_sections['pages']['loop'] - $this->_sections['pages']['start'] : $this->_sections['pages']['start']+1)/abs($this->_sections['pages']['step'])), $this->_sections['pages']['max']);
    if ($this->_sections['pages']['total'] == 0)
        $this->_sections['pages']['show'] = false;
} else
    $this->_sections['pages']['total'] = 0;
if ($this->_sections['pages']['show']):

            for ($this->_sections['pages']['index'] = $this->_sections['pages']['start'], $this->_sections['pages']['iteration'] = 1;
                 $this->_sections['pages']['iteration'] <= $this->_sections['pages']['total'];
                 $this->_sections['pages']['index'] += $this->_sections['pages']['step'], $this->_sections['pages']['iteration']++):
$this->_sections['pages']['rownum'] = $this->_sections['pages']['iteration'];
$this->_sections['pages']['index_prev'] = $this->_sections['pages']['index'] - $this->_sections['pages']['step'];
$this->_sections['pages']['index_next'] = $this->_sections['pages']['index'] + $this->_sections['pages']['step'];
$this->_sections['pages']['first']      = ($this->_sections['pages']['iteration'] == 1);
$this->_sections['pages']['last']       = ($this->_sections['pages']['iteration'] == $this->_sections['pages']['total']);
?>
    <a <?php if ($this->_tpl_vars['tsMisComus']['pages']['current'] == $this->_sections['pages']['index']): ?>class="here"<?php endif; ?> href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/mis-comunidades/<?php echo $this->_tpl_vars['tsMisComus']['orden']; ?>
.<?php echo $this->_sections['pages']['index']; ?>
/"><?php echo $this->_sections['pages']['index']; ?>
</a>
    <?php endfor; endif; ?>
    <?php if ($this->_tpl_vars['tsMisComus']['pages']['pages'] > 1 && $this->_tpl_vars['tsMisComus']['pages']['pages'] > $this->_tpl_vars['tsMisComus']['pages']['current']): ?><a class="cp_next" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/mis-comunidades/<?php echo $this->_tpl_vars['tsMisComus']['orden']; ?>
.<?php echo $this->_tpl_vars['tsMisComus']['pages']['next']; ?>
/"></a><?php endif; ?>
</div></div>
<?php endif; ?>