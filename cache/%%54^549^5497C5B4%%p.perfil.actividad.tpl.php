<?php /* Smarty version 2.6.28, created on 2016-06-16 12:36:04
         compiled from t.php_files/p.perfil.actividad.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'hace', 't.php_files/p.perfil.actividad.tpl', 35, false),)), $this); ?>
1:
<?php if ($this->_tpl_vars['tsDo'] == ''): ?>
<div id="perfil_actividad" status="activo">
    <div class="widget big-info clearfix">
        <div class="title-w clearfix">
			<h3 style="margin-top: 4px;">&Uacute;ltima actividad de <?php echo $this->_tpl_vars['tsUsername']; ?>
</h3>
			<select onchange="actividad.cargar(<?php echo $this->_tpl_vars['tsUserID']; ?>
,'filtrar', this.value)" id="last-activity-filter">
				<option value="0">Todas</option>
                <option value="1">Post nuevo</option>
                <option value="2">Post favorito</option>
                <option value="3">Post votado</option>
                <option value="4">Post recomendado</option>
                <option value="5">Comentario nuevo</option>
                <option value="6">Comentario votado</option>
                <option value="7">Siguiendo un post</option>
                <option value="8">Siguiendo un suario</option>
                <option value="9">Foto nueva</option>
                <option value="10">Publicaci&oacute;nes en muro</option>
                <option value="11">Le gusta</option>
			</select>
		</div>
        <?php if ($this->_tpl_vars['tsActividad']['total'] > 0): ?>
        <div id="last-activity-container" style="border: 1px solid #E8E8E8;" class="last-activity">
            <?php $_from = $this->_tpl_vars['tsActividad']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['ad']):
?>
            <?php if ($this->_tpl_vars['ad']['data']): ?>
            <div id="last-activity-date-<?php echo $this->_tpl_vars['id']; ?>
" class="date-sep"  active="true">
                <h3><?php echo $this->_tpl_vars['ad']['title']; ?>
</h3>
                <?php $_from = $this->_tpl_vars['ad']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ac']):
?>
                <div class="sep">
                    <div class="ac_content">
                        <?php if ($this->_tpl_vars['ac']['style'] != ''): ?><span class="monac_icons ma_<?php echo $this->_tpl_vars['ac']['style']; ?>
"></span><?php endif; ?>
             			<?php echo $this->_tpl_vars['ac']['text']; ?>
 <a href="<?php echo $this->_tpl_vars['ac']['link']; ?>
"><?php echo $this->_tpl_vars['ac']['ltext']; ?>
</a>
                        <?php if ($this->_tpl_vars['tsUserID'] == $this->_tpl_vars['tsUser']->uid): ?><span class="remove"><a onclick="actividad.borrar(<?php echo $this->_tpl_vars['ac']['id']; ?>
, this); return false;">x</a></span><?php endif; ?>
                    </div>
            		<span class="time"><?php echo ((is_array($_tmp=$this->_tpl_vars['ac']['date'])) ? $this->_run_mod_handler('hace', true, $_tmp) : smarty_modifier_hace($_tmp)); ?>
</span>
            	</div>
                <?php endforeach; endif; unset($_from); ?>
            </div>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
            <?php if ($this->_tpl_vars['tsActividad']['total'] > 0 && $this->_tpl_vars['tsActividad']['total'] >= 25): ?>
            <h3 id="last-activity-view-more">
                <a onclick="actividad.cargar(<?php echo $this->_tpl_vars['tsUserID']; ?>
,'more', 0); return false;" href="">Ver m&aacute;s actividad</a>
            </h3>
            <?php endif; ?>
        </div>
        <?php else: ?>
        <div class="emptyData">Este usuario no tiene actividad.</div>
        <?php endif; ?>
    </div>
</div>
<?php else: ?>
            <?php $_from = $this->_tpl_vars['tsActividad']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['ad']):
?>
            <?php if ($this->_tpl_vars['ad']['data']): ?>
            <div id="more-<?php echo $this->_tpl_vars['id']; ?>
" nid="last-activity-date-<?php echo $this->_tpl_vars['id']; ?>
" class="date-sep" active="false">
                <h3 style="display:none"><?php echo $this->_tpl_vars['ad']['title']; ?>
</h3>
                <?php $_from = $this->_tpl_vars['ad']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ac']):
?>
                <div class="sep">
                    <div class="ac_content">
                        <?php if ($this->_tpl_vars['ac']['style'] != ''): ?><span class="monac_icons ma_<?php echo $this->_tpl_vars['ac']['style']; ?>
"></span><?php endif; ?>
             			<?php echo $this->_tpl_vars['ac']['text']; ?>
 <a href="<?php echo $this->_tpl_vars['ac']['link']; ?>
"><?php echo $this->_tpl_vars['ac']['ltext']; ?>
</a>
                        <?php if ($this->_tpl_vars['tsUserID'] == $this->_tpl_vars['tsUser']->uid): ?><span class="remove"><a onclick="actividad.borrar(<?php echo $this->_tpl_vars['ac']['id']; ?>
, this); return false;">x</a></span><?php endif; ?>
                    </div>
            		<span class="time"><?php echo ((is_array($_tmp=$this->_tpl_vars['ac']['date'])) ? $this->_run_mod_handler('hace', true, $_tmp) : smarty_modifier_hace($_tmp)); ?>
</span>
            	</div>
                <?php endforeach; endif; unset($_from); ?>
            </div>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
            <?php if ($this->_tpl_vars['tsActividad']['total'] > 0 && $this->_tpl_vars['tsActividad']['total'] >= 25): ?>
            <h3 id="last-activity-view-more">
                <a onclick="actividad.cargar(<?php echo $this->_tpl_vars['tsUserID']; ?>
,'more', 0); return false;" href="">Ver m&aacute;s actividad</a>
            </h3>
            <?php endif; ?>
            <div id="total_acts" val="<?php echo $this->_tpl_vars['tsActividad']['total']; ?>
"></div>
            <div id="jsdump">
            <script type="text/javascript">
            // <?php echo '
            $(function(){
                /*
                    EL SIGUIENTE CODIGO SIRBE PARA NO MOSTRAR LOS SEPARADORES DE FECHA POR SI YA ESTAN,
                    ESTO FUE HECHO ASI PARA EVITAR MAS CONSULTAS AL SERVIDOR... 
                */
                var ac_dates = new Array(\'today\', \'yesterday\', \'month\', \'old\');
                for(var i = 0; i < ac_dates.length; i++){
                    var obj_name = \'last-activity-date-\' + ac_dates[i];
                    var obj = $(\'#\' + obj_name);
                    // MORE
                    var m_name = \'more-\' + ac_dates[i];
                    var mobj = $(\'#\' + m_name);
                    // ACTIVO
                    var active = obj.attr(\'active\');
                    // VALIDAMOS
                    if(typeof active == \'undefined\'){
                        //
                        var new_id = $(mobj).attr(\'nid\');
                        $(mobj).attr(\'id\',new_id);
                        $(mobj).find(\'h3\').show();
                        $(mobj).removeAttr(\'nid\').attr(\'active\',\'true\');
                        
                    } else {
                        $(mobj).find(\'h3\').remove();
                        var html = $(mobj).html();
                        $(obj).append(html)
                        $(mobj).remove();
                    }
                }
                // ME AUTO ELIMINO
                $(\'#jsdump\').remove();
            });
            // '; ?>

            </script>
            </div>
<?php endif; ?>