<?php /* Smarty version 2.6.28, created on 2016-06-16 12:43:07
         compiled from comunidades/c.buscar_right.tpl */ ?>
<?php if ($this->_tpl_vars['tipo'] == 'comus'): ?>
<div class="com_new_box">
    <div class="box_title">Categor&iacute;a</div>
    <div class="box_cuerpo">
    <br />
    <select name="cat" id="ShowCats" class="required" onChange="$('#search_form').submit();">
        <option value="0">Todas</option>
        <?php $_from = $this->_tpl_vars['tsCats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
        <option value="<?php echo $this->_tpl_vars['c']['cid']; ?>
" <?php if ($this->_tpl_vars['cat'] == $this->_tpl_vars['c']['cid']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['c']['c_nombre']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
    </select>
    </div>
</div>
<?php endif; ?>

<div class="com_new_box">
    <div class="box_title">Ordenar por</div>
    <div class="box_cuerpo">
   		<div><input type="radio" name="ord" value="fecha" checked="checked" /> Fecha</div>
    	<div><input type="radio" name="ord" value="titulo" <?php if ($this->_tpl_vars['ord'] == 'titulo'): ?>checked="checked"<?php endif; ?> /> T&iacute;tulo</div>
        <?php if ($this->_tpl_vars['tipo'] == 'temas'): ?>
        <div><input type="radio" name="ord" value="votos" <?php if ($this->_tpl_vars['ord'] == 'votos'): ?>checked="checked"<?php endif; ?> /> Votos</div>
        <div><input type="radio" name="ord" value="respuestas" <?php if ($this->_tpl_vars['ord'] == 'respuestas'): ?>checked="checked"<?php endif; ?> /> Respuestas</div>
        <?php else: ?>
        <div><input type="radio" name="ord" value="miembros" <?php if ($this->_tpl_vars['ord'] == 'miembros'): ?>checked="checked"<?php endif; ?> /> Miembros</div>
        <div><input type="radio" name="ord" value="temas" <?php if ($this->_tpl_vars['ord'] == 'temas'): ?>checked="checked"<?php endif; ?> /> Temas</div>
        <?php endif; ?>
        <br />
        <div align="center"><input type="submit" class="input_button ibg" value="Filtrar" /></div>
    </div>
</div>

<input type="hidden" name="tipo" value="<?php echo $this->_tpl_vars['tipo']; ?>
" />
<?php if ($this->_tpl_vars['tipo'] == 'temas'): ?><input type="hidden" name="comid" value="<?php echo $this->_tpl_vars['comid']; ?>
" /><?php endif; ?>
</form>