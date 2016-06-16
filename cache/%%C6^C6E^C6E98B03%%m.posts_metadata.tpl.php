<?php /* Smarty version 2.6.28, created on 2016-06-16 12:47:00
         compiled from modules/m.posts_metadata.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'modules/m.posts_metadata.tpl', 50, false),)), $this); ?>
<div class="P_opciones">
	<?php if ($this->_tpl_vars['tsPost']['post_user'] != $this->_tpl_vars['tsUser']->uid): ?>
    <div class="box_title">Opciones</div>
    <div class="box_cuerpo post-acciones">
        <div style="display:none" class="mensajes"></div>
        <?php if (( $this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['godp'] ) && $this->_tpl_vars['tsUser']->is_member == 1 && $this->_tpl_vars['tsPost']['post_user'] != $this->_tpl_vars['tsUser']->uid && $this->_tpl_vars['tsUser']->info['user_puntosxdar'] >= 1): ?>
        <div class="dar-puntos">
            <div class="P_puntos">
                <?php unset($this->_sections['puntos']);
$this->_sections['puntos']['name'] = 'puntos';
$this->_sections['puntos']['start'] = (int)1;
$this->_sections['puntos']['loop'] = is_array($_loop=$this->_tpl_vars['tsUser']->info['user_puntosxdar']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['puntos']['max'] = (int)10;
$this->_sections['puntos']['show'] = true;
if ($this->_sections['puntos']['max'] < 0)
    $this->_sections['puntos']['max'] = $this->_sections['puntos']['loop'];
$this->_sections['puntos']['step'] = 1;
if ($this->_sections['puntos']['start'] < 0)
    $this->_sections['puntos']['start'] = max($this->_sections['puntos']['step'] > 0 ? 0 : -1, $this->_sections['puntos']['loop'] + $this->_sections['puntos']['start']);
else
    $this->_sections['puntos']['start'] = min($this->_sections['puntos']['start'], $this->_sections['puntos']['step'] > 0 ? $this->_sections['puntos']['loop'] : $this->_sections['puntos']['loop']-1);
if ($this->_sections['puntos']['show']) {
    $this->_sections['puntos']['total'] = min(ceil(($this->_sections['puntos']['step'] > 0 ? $this->_sections['puntos']['loop'] - $this->_sections['puntos']['start'] : $this->_sections['puntos']['start']+1)/abs($this->_sections['puntos']['step'])), $this->_sections['puntos']['max']);
    if ($this->_sections['puntos']['total'] == 0)
        $this->_sections['puntos']['show'] = false;
} else
    $this->_sections['puntos']['total'] = 0;
if ($this->_sections['puntos']['show']):

            for ($this->_sections['puntos']['index'] = $this->_sections['puntos']['start'], $this->_sections['puntos']['iteration'] = 1;
                 $this->_sections['puntos']['iteration'] <= $this->_sections['puntos']['total'];
                 $this->_sections['puntos']['index'] += $this->_sections['puntos']['step'], $this->_sections['puntos']['iteration']++):
$this->_sections['puntos']['rownum'] = $this->_sections['puntos']['iteration'];
$this->_sections['puntos']['index_prev'] = $this->_sections['puntos']['index'] - $this->_sections['puntos']['step'];
$this->_sections['puntos']['index_next'] = $this->_sections['puntos']['index'] + $this->_sections['puntos']['step'];
$this->_sections['puntos']['first']      = ($this->_sections['puntos']['iteration'] == 1);
$this->_sections['puntos']['last']       = ($this->_sections['puntos']['iteration'] == $this->_sections['puntos']['total']);
?>
                <a href="#" onclick="votar_post(<?php echo $this->_sections['puntos']['index']; ?>
); return false;"><?php echo $this->_sections['puntos']['index']; ?>
</a>
                <?php endfor; endif; ?>
                <?php if ($this->_tpl_vars['tsUser']->info['user_puntosxdar'] > 20 || $this->_tpl_vars['tsPunteador']['rango'] > 20): ?>
                <?php unset($this->_sections['puntos']);
$this->_sections['puntos']['name'] = 'puntos';
$this->_sections['puntos']['start'] = (int)11;
$this->_sections['puntos']['loop'] = is_array($_loop=$this->_tpl_vars['tsUser']->info['user_puntosxdar']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['puntos']['max'] = (int)10;
$this->_sections['puntos']['show'] = true;
if ($this->_sections['puntos']['max'] < 0)
    $this->_sections['puntos']['max'] = $this->_sections['puntos']['loop'];
$this->_sections['puntos']['step'] = 1;
if ($this->_sections['puntos']['start'] < 0)
    $this->_sections['puntos']['start'] = max($this->_sections['puntos']['step'] > 0 ? 0 : -1, $this->_sections['puntos']['loop'] + $this->_sections['puntos']['start']);
else
    $this->_sections['puntos']['start'] = min($this->_sections['puntos']['start'], $this->_sections['puntos']['step'] > 0 ? $this->_sections['puntos']['loop'] : $this->_sections['puntos']['loop']-1);
if ($this->_sections['puntos']['show']) {
    $this->_sections['puntos']['total'] = min(ceil(($this->_sections['puntos']['step'] > 0 ? $this->_sections['puntos']['loop'] - $this->_sections['puntos']['start'] : $this->_sections['puntos']['start']+1)/abs($this->_sections['puntos']['step'])), $this->_sections['puntos']['max']);
    if ($this->_sections['puntos']['total'] == 0)
        $this->_sections['puntos']['show'] = false;
} else
    $this->_sections['puntos']['total'] = 0;
if ($this->_sections['puntos']['show']):

            for ($this->_sections['puntos']['index'] = $this->_sections['puntos']['start'], $this->_sections['puntos']['iteration'] = 1;
                 $this->_sections['puntos']['iteration'] <= $this->_sections['puntos']['total'];
                 $this->_sections['puntos']['index'] += $this->_sections['puntos']['step'], $this->_sections['puntos']['iteration']++):
$this->_sections['puntos']['rownum'] = $this->_sections['puntos']['iteration'];
$this->_sections['puntos']['index_prev'] = $this->_sections['puntos']['index'] - $this->_sections['puntos']['step'];
$this->_sections['puntos']['index_next'] = $this->_sections['puntos']['index'] + $this->_sections['puntos']['step'];
$this->_sections['puntos']['first']      = ($this->_sections['puntos']['iteration'] == 1);
$this->_sections['puntos']['last']       = ($this->_sections['puntos']['iteration'] == $this->_sections['puntos']['total']);
?>
                <a href="#" onclick="votar_post(<?php echo $this->_sections['puntos']['index']; ?>
); return false;"><?php echo $this->_sections['puntos']['index']; ?>
</a>
                <?php endfor; endif; ?>
                <a href="#" onclick="$('#P_max').toggle('fast'); return false">+</a>
                <?php endif; ?>
            </div>								
            <?php if ($this->_tpl_vars['tsUser']->info['user_puntosxdar'] > 20 || $this->_tpl_vars['tsPunteador']['rango'] > 20): ?>
            <div id="P_max" align="center" style="display: none;">
                <input type="text" id="points" style="height: 18px;" placeholder="<?php echo $this->_tpl_vars['tsPunteador']['rango']; ?>
"> 	
                <input type="submit" onclick="votar_post(document.getElementById('points').value); return false;" value="Votar" class="btn_g" style="margin: 0;">  
            </div>
            <?php endif; ?>
            (de <?php echo $this->_tpl_vars['tsUser']->info['user_puntosxdar']; ?>
 Disponibles)
        </div>
        <?php endif; ?>
        
        <ul> 
                       
            <?php if (! $this->_tpl_vars['tsUser']->is_member || $this->_tpl_vars['tsPost']['post_user'] != $this->_tpl_vars['tsUser']->uid): ?>
            <div class="floatR">
            <li<?php if (! $this->_tpl_vars['tsPost']['follow']): ?> style="display: none;"<?php endif; ?>>
            <a class="btn_g unfollow_post" onclick="notifica.unfollow('post', <?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
, notifica.inPostHandle, $(this).children('span'))"><span class="icons follow_post unfollow">No seguir</span></a>
            </li>
            <li<?php if ($this->_tpl_vars['tsPost']['follow'] > 0): ?> style="display: none;"<?php endif; ?>>
            <a class="btn_g follow_post" onclick="notifica.follow('post', <?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
, notifica.inPostHandle, $(this).children('span'))"><span class="icons follow_post follow">Seguir</span></a>
            </li>
            <li><a href="#" onclick="<?php if (! $this->_tpl_vars['tsUser']->is_member): ?>registro_load_form()<?php else: ?>add_favoritos()<?php endif; ?>; return false" class="btn_g"><span class="icons agregar_favoritos">A Favoritos</span></a></li>
            <li><a href="#" onclick="denuncia.nueva('post',<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
, '<?php echo $this->_tpl_vars['tsPost']['post_title']; ?>
', '<?php echo $this->_tpl_vars['tsPost']['user_name']; ?>
'); return false;" class="btn_g"><span class="icons denunciar_post">Denunciar</span></a></li>           
            </div>
            <?php endif; ?>
       </ul>
    </div>
    <?php endif; ?>
<div class="P_opciones">
    <div class="box_title">Recomienda este post a tus amigos:</div>
    <div class="box_cuerpo post-acciones">
            <li><a class="sharer-button web" href="<?php if (! $this->_tpl_vars['tsUser']->is_member): ?>javascript:registro_load_form(); return false<?php else: ?>javascript:notifica.sharePost(<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
)<?php endif; ?>" title="Compartir en <?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
">Compartir</a><span class="SB_popup"><?php echo $this->_tpl_vars['tsPost']['post_shared']; ?>
</span></li>    
            <li><a class="sharer-button twitter" href="https://twitter.com/intent/tweet?via=<?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
&related=<?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
&text=<?php echo $this->_tpl_vars['tsPost']['post_title']; ?>
.&url=<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['tsPost']['categoria']['c_seo']; ?>
/<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['tsPost']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html" target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=200'); return false;" title="Compartir en Twitter"></a></li>                                  
            <li><a class="sharer-button facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['tsPost']['categoria']['c_seo']; ?>
/<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['tsPost']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html" target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=200'); return false;" title="Compartir en Facebook"></a></li>
            <li><a class="sharer-button google" href="https://plus.google.com/share?hl=es_ES&url=<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['tsPost']['categoria']['c_seo']; ?>
/<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['tsPost']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html&gpsrc=frameless&partnerid=frameless" target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=200'); return false;" title="Compartir en Google+"></a></li>
       </div>   
</div> 
    <div class="box_title">Estad&iacute;sticas</div>
    <div class="box_cuerpo" style="overflow: hidden;">
    	<span class="floatL" style="font-size: 13px;">
            Creado <strong><?php echo $this->_tpl_vars['tsPost']['post_date']; ?>
</strong><br />
            Categor&iacute;a <strong><?php echo $this->_tpl_vars['tsPost']['categoria']['c_nombre']; ?>
</strong>
        </span>
        <ul class="post-estadisticas">                            	
            <li><span class="icons medallas"><?php echo $this->_tpl_vars['tsPost']['m_total']; ?>
</span><br />Medalla<?php if ($this->_tpl_vars['tsPost']['m_total'] != 1): ?>s<?php endif; ?></li>
            <li><span class="icons favoritos_post"><?php echo $this->_tpl_vars['tsPost']['post_favoritos']; ?>
</span><br />Favoritos</li>
            <li><span class="icons visitas_post"><?php echo $this->_tpl_vars['tsPost']['post_hits']; ?>
</span><br />Visitas</li>
            <li><span id="puntos_post" class="icons puntos_post"><?php echo $this->_tpl_vars['tsPost']['post_puntos']; ?>
</span><br />Puntos</li>
            <li><span class="icons monitor"><?php echo $this->_tpl_vars['tsPost']['post_seguidores']; ?>
</span><br />Seguidores</li>                                
        </ul>
    </div>	
</div> 