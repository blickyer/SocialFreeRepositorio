<?php /* Smarty version 2.6.26, created on 2016-02-28 11:49:20
         compiled from t.registro.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h1 class="Titulo">Nuevo registro</h1>
<div id="login_error"></div>
<form id="registro" class="box" method="post" action="javascript:registro.verify()" autocomplete="off">
    <label for="nick">Ingresa tu usuario</label>
	<input name="nick" type="text" id="nick" class="input-text"  tabindex="1" placeholder="Ingrese un nombre de usuario &uacute;nico" />
    <label for="password">Contrase&ntilde;a deseada</label>
    <input name="password" type="password" class="input-text" id="password" tabindex="2" placeholder="Ingresa una contrase&ntilde;a segura" />
    <label for="password2">Confirme contrase&ntilde;a</label>
    <input name="password2" type="password" class="input-text" id="password2" tabindex="3" placeholder="Vuelve a ingresar la contrase&ntilde;a" />
    <label for="email">E-mail</label>
    <input name="email" type="text" class="input-text" id="email" tabindex="4" placeholder="Ingresa tu direcci&oacute;n de email" />
    <label>Fecha de Nacimiento</label>
    <select id="dia" name="dia" class="input-text" tabindex="5" title="Ingrese d&iacute;a de nacimiento" style="width: 32%;float: left;">
        <option value="">D&iacute;a</option>
    <?php unset($this->_sections['dias']);
$this->_sections['dias']['name'] = 'dias';
$this->_sections['dias']['start'] = (int)1;
$this->_sections['dias']['loop'] = is_array($_loop=32) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dias']['show'] = true;
$this->_sections['dias']['max'] = $this->_sections['dias']['loop'];
$this->_sections['dias']['step'] = 1;
if ($this->_sections['dias']['start'] < 0)
    $this->_sections['dias']['start'] = max($this->_sections['dias']['step'] > 0 ? 0 : -1, $this->_sections['dias']['loop'] + $this->_sections['dias']['start']);
else
    $this->_sections['dias']['start'] = min($this->_sections['dias']['start'], $this->_sections['dias']['step'] > 0 ? $this->_sections['dias']['loop'] : $this->_sections['dias']['loop']-1);
if ($this->_sections['dias']['show']) {
    $this->_sections['dias']['total'] = min(ceil(($this->_sections['dias']['step'] > 0 ? $this->_sections['dias']['loop'] - $this->_sections['dias']['start'] : $this->_sections['dias']['start']+1)/abs($this->_sections['dias']['step'])), $this->_sections['dias']['max']);
    if ($this->_sections['dias']['total'] == 0)
        $this->_sections['dias']['show'] = false;
} else
    $this->_sections['dias']['total'] = 0;
if ($this->_sections['dias']['show']):

            for ($this->_sections['dias']['index'] = $this->_sections['dias']['start'], $this->_sections['dias']['iteration'] = 1;
                 $this->_sections['dias']['iteration'] <= $this->_sections['dias']['total'];
                 $this->_sections['dias']['index'] += $this->_sections['dias']['step'], $this->_sections['dias']['iteration']++):
$this->_sections['dias']['rownum'] = $this->_sections['dias']['iteration'];
$this->_sections['dias']['index_prev'] = $this->_sections['dias']['index'] - $this->_sections['dias']['step'];
$this->_sections['dias']['index_next'] = $this->_sections['dias']['index'] + $this->_sections['dias']['step'];
$this->_sections['dias']['first']      = ($this->_sections['dias']['iteration'] == 1);
$this->_sections['dias']['last']       = ($this->_sections['dias']['iteration'] == $this->_sections['dias']['total']);
?>
        <option value="<?php echo $this->_sections['dias']['index']; ?>
"><?php echo $this->_sections['dias']['index']; ?>
</option>
    <?php endfor; endif; ?>
    </select>
    <select id="mes" name="mes" class="input-text" tabindex="6" title="Ingrese mes de nacimiento" style="width: 32%;float: left;margin: 10px 2%;">
        <option value="">Mes</option>
    <?php $_from = $this->_tpl_vars['tsMeces']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mid'] => $this->_tpl_vars['mes']):
?>
        <option value="<?php echo $this->_tpl_vars['mid']; ?>
"><?php echo $this->_tpl_vars['mes']; ?>
</option>
    <?php endforeach; endif; unset($_from); ?>	
    </select>
    <select id="anio" name="anio" class="input-text" tabindex="7" title="Ingrese a&ntilde;o de nacimiento" style="width: 32%;float: left;">
        <option value="">A&ntilde;o</option>
    <?php unset($this->_sections['year']);
$this->_sections['year']['name'] = 'year';
$this->_sections['year']['start'] = (int)$this->_tpl_vars['tsEndY'];
$this->_sections['year']['loop'] = is_array($_loop=$this->_tpl_vars['tsEndY']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['year']['step'] = ((int)-1) == 0 ? 1 : (int)-1;
$this->_sections['year']['max'] = (int)$this->_tpl_vars['tsMax'];
$this->_sections['year']['show'] = true;
if ($this->_sections['year']['max'] < 0)
    $this->_sections['year']['max'] = $this->_sections['year']['loop'];
if ($this->_sections['year']['start'] < 0)
    $this->_sections['year']['start'] = max($this->_sections['year']['step'] > 0 ? 0 : -1, $this->_sections['year']['loop'] + $this->_sections['year']['start']);
else
    $this->_sections['year']['start'] = min($this->_sections['year']['start'], $this->_sections['year']['step'] > 0 ? $this->_sections['year']['loop'] : $this->_sections['year']['loop']-1);
if ($this->_sections['year']['show']) {
    $this->_sections['year']['total'] = min(ceil(($this->_sections['year']['step'] > 0 ? $this->_sections['year']['loop'] - $this->_sections['year']['start'] : $this->_sections['year']['start']+1)/abs($this->_sections['year']['step'])), $this->_sections['year']['max']);
    if ($this->_sections['year']['total'] == 0)
        $this->_sections['year']['show'] = false;
} else
    $this->_sections['year']['total'] = 0;
if ($this->_sections['year']['show']):

            for ($this->_sections['year']['index'] = $this->_sections['year']['start'], $this->_sections['year']['iteration'] = 1;
                 $this->_sections['year']['iteration'] <= $this->_sections['year']['total'];
                 $this->_sections['year']['index'] += $this->_sections['year']['step'], $this->_sections['year']['iteration']++):
$this->_sections['year']['rownum'] = $this->_sections['year']['iteration'];
$this->_sections['year']['index_prev'] = $this->_sections['year']['index'] - $this->_sections['year']['step'];
$this->_sections['year']['index_next'] = $this->_sections['year']['index'] + $this->_sections['year']['step'];
$this->_sections['year']['first']      = ($this->_sections['year']['iteration'] == 1);
$this->_sections['year']['last']       = ($this->_sections['year']['iteration'] == $this->_sections['year']['total']);
?>
         <option value="<?php echo $this->_sections['year']['index']; ?>
"><?php echo $this->_sections['year']['index']; ?>
</option>
    <?php endfor; endif; ?>
    </select>
    <label for="sexo">Sexo</label>
    <select name="sexo" id="sexo" tabindex="8" class="input-text" style="background-position-x: 98%!important;">
    	<option value="">Selecciona tu genero</option>
    	<option value="m">Masculino</option>
        <option value="f">Femenino</option>
    </select>
    <label for="pais">Pa&iacute;s</label>
    <select id="pais" name="pais" tabindex="9" class="input-text" onchange="registro.geo($(this).val())">
        <option value="">Pa&iacute;s</option>
        <?php $_from = $this->_tpl_vars['tsPaises']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['code'] => $this->_tpl_vars['pais']):
?>
        <option value="<?php echo $this->_tpl_vars['code']; ?>
"><?php echo $this->_tpl_vars['pais']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
    </select>
    <label for="estado">Regi&oacute;n</label>
    <select title="Ingrese su estado" tabindex="10" name="estado" id="estado" class="input-text">
    	<option value="">Regi&oacute;n</option>
    </select>
    <label for="recaptcha_response_field" style="margin-bottom: 10px;">Ingresa el c&oacute;digo de la imagen:</label>
    <div id="recaptcha_ajax">
        <div id="recaptcha_image"></div>
        <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" class="input-text" />
    </div> <div class="help recaptcha"><span><em></em></span></div>
    <label style="margin: 15px 2px;">Al registrarme en <?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
 estoy aceptando los <a href="<?php echo $this->_tpl_vars['tsConfig']['web']; ?>
/pages/terminos-y-condiciones/">T&eacute;rminos y condiciones</a> del sitio</label>
    <div class="controls">
    	<input type="submit" value="Registrarme">
    </div>
</form>
<div class="line_separator"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script type="text/javascript">
//Load recaptcha
$.getScript("http://www.google.com/recaptcha/api/js/recaptcha_ajax.js", function(){
	Recaptcha.create(\'6LcXvL0SAAAAAPJkBrro96lnXGZ56TBRExEmVM3L\', \'recaptcha_ajax\', {
		theme:\'custom\', lang:\'es\', tabindex:\'11\', custom_theme_widget: \'recaptcha_ajax\'
	});
});
</script>
'; ?>