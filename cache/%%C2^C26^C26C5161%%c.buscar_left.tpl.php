<?php /* Smarty version 2.6.28, created on 2016-06-16 12:43:07
         compiled from comunidades/c.buscar_left.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'comunidades/c.buscar_left.tpl', 42, false),array('modifier', 'hace', 'comunidades/c.buscar_left.tpl', 43, false),)), $this); ?>
<div id="bigBox">
    <div class="box_title">
        <div class="box_txt ultimos_posts">Buscar</div>
        <div class="box_rss"><span class="systemicons monitor"></span></div>
    </div>
    <div class="box_cuerpo" id="H_search">
        <form action="" method="GET" class="clearfix" id="search_form">
            <input type="text" autocomplete="off" placeholder="Buscar..." name="q" class="input-search-middle" style="margin-right: 5px;width: 500px;" />            
            <input type="submit" value="Buscar" class="input_button ibg" />
    </div>
</div>

<?php if ($this->_tpl_vars['tsQuery']['comus']['data'] || $this->_tpl_vars['tsQuery']['temas']['data']): ?>
<div id="search_result">
	<?php if ($this->_tpl_vars['tsQuery']['comus']['data']): ?>
	<div class="box_title">Comunidades</div>
    <div class="box_cuerpo">
        <?php $_from = $this->_tpl_vars['tsQuery']['comus']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
        <div class="result_item clearfix">
        	<div class="ri_image floatL"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/uploads/c_<?php echo $this->_tpl_vars['c']['c_id']; ?>
.jpg" width="32" height="32" /></div>
            <div class="ri_info floatL">
        		<a class="ri_title" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['c']['c_nombre_corto']; ?>
/"><?php echo $this->_tpl_vars['c']['c_nombre']; ?>
</a><br />
            	<?php echo $this->_tpl_vars['c']['categoria']; ?>
 - <?php echo $this->_tpl_vars['c']['subcategoria']; ?>
 - <?php echo $this->_tpl_vars['c']['c_temas']; ?>
 Temas
            </div>
            <div class="ri_right floatR">
            	<strong><?php echo $this->_tpl_vars['c']['c_miembros']; ?>
</strong>
                Miembros
            </div>
        </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <?php if (! $this->_tpl_vars['tipo'] && $this->_tpl_vars['tsQuery']['comus']['total'] > 10): ?><div class="com_msj_blue" style="padding: 10px;"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/buscar/?tipo=comus&q=<?php echo $this->_tpl_vars['q']; ?>
">Ver m&aacute;s resultados</a></div><?php endif; ?>
    <br /><br />
	<?php endif; ?>
    <?php if ($this->_tpl_vars['tipo'] == 'comus' && ! $this->_tpl_vars['tsQuery']['comus']['data']): ?><div class="com_bigmsj_yellow">No se han encontrado resultados</div><?php endif; ?>
    <?php if ($this->_tpl_vars['tsQuery']['temas']['data']): ?> 
    <div class="com_box_title clearfix"><h2>Temas</h2><div class="cbt_right"><strong style="font-size: 14px;"><?php echo $this->_tpl_vars['tsQuery']['temas']['total']; ?>
</strong></div></div>
    <div class="com_box_cuerpo clearfix">
        <?php $_from = $this->_tpl_vars['tsQuery']['temas']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['t']):
?>
        <div class="result_item clearfix">
            <div class="ri_info floatL">
                <i class="com_icon <?php echo $this->_tpl_vars['t']['sub_cat']['c_seo']; ?>
" style="vertical-align: top;"></i><a class="ri_title" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['t']['c_nombre_corto']; ?>
/<?php echo $this->_tpl_vars['t']['t_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['t']['t_titulo'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html"><?php echo $this->_tpl_vars['t']['t_titulo']; ?>
</a><br />
                <?php echo ((is_array($_tmp=$this->_tpl_vars['t']['t_fecha'])) ? $this->_run_mod_handler('hace', true, $_tmp) : smarty_modifier_hace($_tmp)); ?>
 - En <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['t']['c_nombre_corto']; ?>
/"><?php echo $this->_tpl_vars['t']['c_nombre']; ?>
</a> - Por  <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['t']['user_name']; ?>
/"><?php echo $this->_tpl_vars['t']['user_name']; ?>
</a> - <?php echo $this->_tpl_vars['t']['t_votos_pos']; ?>
 Votos
            </div>
            <div class="ri_right floatR">
                <strong><?php echo $this->_tpl_vars['t']['t_respuestas']; ?>
</strong>
                Respuestas
            </div>
        </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <?php if (! $this->_tpl_vars['tipo'] && $this->_tpl_vars['tsQuery']['temas']['total'] > 10): ?><div class="com_msj_blue" style="padding: 10px;"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/buscar/?tipo=temas&q=<?php echo $this->_tpl_vars['q']; ?>
">Ver m&aacute;s resultados</a></div><?php endif; ?>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['tipo'] == 'temas' && ! $this->_tpl_vars['tsQuery']['temas']['data']): ?><div class="com_bigmsj_yellow">No se han encontrado resultados</div><?php endif; ?>
</div>
<?php if ($this->_tpl_vars['tsQuery']['pages']['pages'] > 1): ?>
<div class="com_pagination">
    <?php if ($this->_tpl_vars['tsQuery']['pages']['prev']): ?><a class="cp_prev" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/buscar/?q=<?php echo $this->_tpl_vars['q']; ?>
&cat=<?php echo $this->_tpl_vars['cat']; ?>
&ord=<?php echo $this->_tpl_vars['ord']; ?>
&tipo=<?php echo $this->_tpl_vars['tipo']; ?>
&page=<?php echo $this->_tpl_vars['tsQuery']['pages']['prev']; ?>
"></a><?php endif; ?>
    <?php if ($this->_tpl_vars['tsQuery']['pages']['current'] <= 9): ?>
    <?php unset($this->_sections['pages']);
$this->_sections['pages']['name'] = 'pages';
$this->_sections['pages']['start'] = (int)1;
$this->_sections['pages']['loop'] = is_array($_loop=$this->_tpl_vars['tsQuery']['pages']['pages']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pages']['max'] = (int)9;
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
    <a <?php if ($this->_tpl_vars['tsQuery']['pages']['current'] == $this->_sections['pages']['index']): ?>class="here"<?php endif; ?> href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/buscar/?q=<?php echo $this->_tpl_vars['q']; ?>
&cat=<?php echo $this->_tpl_vars['cat']; ?>
&ord=<?php echo $this->_tpl_vars['ord']; ?>
&tipo=<?php echo $this->_tpl_vars['tipo']; ?>
&page=<?php echo $this->_sections['pages']['index']; ?>
"><?php echo $this->_sections['pages']['index']; ?>
</a>
    <?php endfor; endif; ?>
    <?php else: ?>
    <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/buscar/?q=<?php echo $this->_tpl_vars['q']; ?>
&cat=<?php echo $this->_tpl_vars['cat']; ?>
&ord=<?php echo $this->_tpl_vars['ord']; ?>
&tipo=<?php echo $this->_tpl_vars['tipo']; ?>
&page=<?php echo $this->_tpl_vars['tsQuery']['pages']['current']-4; ?>
"><?php echo $this->_tpl_vars['tsQuery']['pages']['current']-4; ?>
</a>
    <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/buscar/?q=<?php echo $this->_tpl_vars['q']; ?>
&cat=<?php echo $this->_tpl_vars['cat']; ?>
&ord=<?php echo $this->_tpl_vars['ord']; ?>
&tipo=<?php echo $this->_tpl_vars['tipo']; ?>
&page=<?php echo $this->_tpl_vars['tsQuery']['pages']['current']-3; ?>
"><?php echo $this->_tpl_vars['tsQuery']['pages']['current']-3; ?>
</a>
    <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/buscar/?q=<?php echo $this->_tpl_vars['q']; ?>
&cat=<?php echo $this->_tpl_vars['cat']; ?>
&ord=<?php echo $this->_tpl_vars['ord']; ?>
&tipo=<?php echo $this->_tpl_vars['tipo']; ?>
&page=<?php echo $this->_tpl_vars['tsQuery']['pages']['current']-2; ?>
"><?php echo $this->_tpl_vars['tsQuery']['pages']['current']-2; ?>
</a>
    <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/buscar/?q=<?php echo $this->_tpl_vars['q']; ?>
&cat=<?php echo $this->_tpl_vars['cat']; ?>
&ord=<?php echo $this->_tpl_vars['ord']; ?>
&tipo=<?php echo $this->_tpl_vars['tipo']; ?>
&page=<?php echo $this->_tpl_vars['tsQuery']['pages']['current']-1; ?>
"><?php echo $this->_tpl_vars['tsQuery']['pages']['current']-1; ?>
</a>
    <a class="here" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/buscar/?q=<?php echo $this->_tpl_vars['q']; ?>
&cat=<?php echo $this->_tpl_vars['cat']; ?>
&ord=<?php echo $this->_tpl_vars['ord']; ?>
&tipo=<?php echo $this->_tpl_vars['tipo']; ?>
&page=<?php echo $this->_tpl_vars['tsQuery']['pages']['current']; ?>
"><?php echo $this->_tpl_vars['tsQuery']['pages']['current']; ?>
</a>
    <?php if ($this->_tpl_vars['tsQuery']['pages']['pages'] >= $this->_tpl_vars['tsQuery']['pages']['current']+1): ?>
    <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/buscar/?q=<?php echo $this->_tpl_vars['q']; ?>
&cat=<?php echo $this->_tpl_vars['cat']; ?>
&ord=<?php echo $this->_tpl_vars['ord']; ?>
&tipo=<?php echo $this->_tpl_vars['tipo']; ?>
&page=<?php echo $this->_tpl_vars['tsQuery']['pages']['current']+1; ?>
"><?php echo $this->_tpl_vars['tsQuery']['pages']['current']+1; ?>
</a>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['tsQuery']['pages']['pages'] >= $this->_tpl_vars['tsQuery']['pages']['current']+2): ?>
    <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/buscar/?q=<?php echo $this->_tpl_vars['q']; ?>
&cat=<?php echo $this->_tpl_vars['cat']; ?>
&ord=<?php echo $this->_tpl_vars['ord']; ?>
&tipo=<?php echo $this->_tpl_vars['tipo']; ?>
&page=<?php echo $this->_tpl_vars['tsQuery']['pages']['current']+2; ?>
"><?php echo $this->_tpl_vars['tsQuery']['pages']['current']+2; ?>
</a>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['tsQuery']['pages']['pages'] >= $this->_tpl_vars['tsQuery']['pages']['current']+3): ?>
    <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/buscar/?q=<?php echo $this->_tpl_vars['q']; ?>
&cat=<?php echo $this->_tpl_vars['cat']; ?>
&ord=<?php echo $this->_tpl_vars['ord']; ?>
&tipo=<?php echo $this->_tpl_vars['tipo']; ?>
&page=<?php echo $this->_tpl_vars['tsQuery']['pages']['current']+3; ?>
"><?php echo $this->_tpl_vars['tsQuery']['pages']['current']+3; ?>
</a>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['tsQuery']['pages']['pages'] >= $this->_tpl_vars['tsQuery']['pages']['current']+4): ?>
    <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/buscar/?q=<?php echo $this->_tpl_vars['q']; ?>
&cat=<?php echo $this->_tpl_vars['cat']; ?>
&ord=<?php echo $this->_tpl_vars['ord']; ?>
&tipo=<?php echo $this->_tpl_vars['tipo']; ?>
&page=<?php echo $this->_tpl_vars['tsQuery']['pages']['current']+4; ?>
</a>
    <?php endif; ?>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['tsQuery']['pages']['pages'] > 1 && $this->_tpl_vars['tsQuery']['pages']['pages'] > $this->_tpl_vars['tsQuery']['pages']['current']): ?><a class="cp_next" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/buscar/?q=<?php echo $this->_tpl_vars['q']; ?>
&cat=<?php echo $this->_tpl_vars['cat']; ?>
&ord=<?php echo $this->_tpl_vars['ord']; ?>
&tipo=<?php echo $this->_tpl_vars['tipo']; ?>
&page=<?php echo $this->_tpl_vars['tsQuery']['pages']['next']; ?>
"></a><?php endif; ?>
</div>
<?php endif; ?>
<?php else: ?>
<?php if ($this->_tpl_vars['q']): ?>
<div class="com_bigmsj_yellow">No se han encontrado resultados para "<?php echo $this->_tpl_vars['q']; ?>
"</div>
<?php else: ?>
<div class="com_bigmsj_blue">Empieza por escribir una palabra clave</div>
<?php endif; ?>
<?php endif; ?>