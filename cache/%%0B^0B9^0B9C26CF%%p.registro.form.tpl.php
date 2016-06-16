<?php /* Smarty version 2.6.28, created on 2016-06-16 12:36:27
         compiled from t.php_files/p.registro.form.tpl */ ?>
1:
<div id="RegistroForm">
	<!-- Paso Uno -->
	<div class="pasoUno">
		<div class="form-line">
			<label for="nick">Ingresa tu usuario</label>

			<input name="nick" type="text" id="nick" tabindex="1" title="Ingrese un nombre de usuario &uacute;nico" onfocus="registro.focus(this)" onblur="registro.blur(this)" onkeydown="registro.clear_time(this.name)" onkeyup="registro.set_time(this.name)" autocomplete="off" /> <div class="help"><span><em></em></span></div>
		</div>

		<div class="form-line">
			<label for="password">Contrase&ntilde;a deseada</label>
			<input name="password" type="password" id="password" tabindex="2" title="Ingresa una contrase&ntilde;a segura" onfocus="registro.focus(this)" onblur="registro.blur(this)" autocomplete="off" /> <div class="help"><span><em></em></span></div>
		</div>

		<div class="form-line">
			<label for="password2">Confirme contrase&ntilde;a</label>
			<input name="password2" type="password" id="password2" tabindex="3" title="Vuelve a ingresar la contrase&ntilde;a" onfocus="registro.focus(this)" onblur="registro.blur(this)" autocomplete="off" /> <div class="help"><span><em></em></span></div>
		</div>

		<div class="form-line">
			<label for="email">E-mail</label>

			<input name="email" type="text" id="email" tabindex="4" title="Ingresa tu direcci&oacute;n de email" onfocus="registro.focus(this)" onblur="registro.blur(this)" onkeydown="registro.clear_time(this.name)" onkeyup="registro.set_time(this.name)" autocomplete="off" /> <div class="help"><span><em></em></span></div>
		</div>

		<div class="form-line">

<label for="referido">Ingresa tu referido (opcional)</label>

<input name="referido" type="text" id="referido" tabindex="1" title="Ingrese el nick del referido" onfocus="registro.focus(this)" onblur="registro.blur(this)" onkeydown="registro.clear_time(this.name)" onkeyup="registro.set_time(this.name)" autocomplete="off" /> <div class="help"><span><em></em></span></div>

</div>


		<div class="form-line">
			<label>Fecha de Nacimiento</label>
			<select id="dia" name="dia" tabindex="5" onblur="registro.blur(this)" onfocus="registro.focus(this)" autocomplete="off" title="Ingrese d&iacute;a de nacimiento">
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
			<select id="mes" name="mes" tabindex="6" onblur="registro.blur(this)" onfocus="registro.focus(this)" autocomplete="off" title="Ingrese mes de nacimiento">
				<option value="">Mes</option>
            <?php $_from = $this->_tpl_vars['tsMeces']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mid'] => $this->_tpl_vars['mes']):
?>
                <option value="<?php echo $this->_tpl_vars['mid']; ?>
"><?php echo $this->_tpl_vars['mes']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>	
            </select>
			<select id="anio" name="anio" tabindex="7" onblur="registro.blur(this)" onfocus="registro.focus(this)" autocomplete="off" title="Ingrese a&ntilde;o de nacimiento">
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
			</select> <div class="help"><span><em></em></span></div>
		</div>
		<div class="clearfix"></div>
	</div>

	<!-- Paso Dos -->
	<div class="pasoDos">

		<div class="form-line">
			<label for="sexo">Sexo</label>
			<input class="radio" type="radio" id="sexo_m" tabindex="8" name="sexo" value="1" onblur="registro.blur(this)" onfocus="registro.focus(this)" autocomplete="off" title="Selecciona tu g&eacute;nero" /> <label class="list-label" for="sexo_m">Masculino</label>
			<input class="radio" type="radio" id="sexo_f" tabindex="8" name="sexo" value="0" onblur="registro.blur(this)" onfocus="registro.focus(this)" autocomplete="off" title="Selecciona tu g&eacute;nero" /> <label class="list-label" for="sexo_f">Femenino</label>

			<div class="help"><span><em></em></span></div>
		</div>

		<div class="form-line">
			<label for="pais">Pa&iacute;s</label>
			<select id="pais" name="pais" tabindex="9" onblur="registro.blur(this)" onchange="registro.blur(this)" onfocus="registro.focus(this)" autocomplete="off" title="Ingrese su pa&iacute;s">
				<option value="">Pa&iacute;s</option>
            <?php $_from = $this->_tpl_vars['tsPaises']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['code'] => $this->_tpl_vars['pais']):
?>
                <option value="<?php echo $this->_tpl_vars['code']; ?>
"><?php echo $this->_tpl_vars['pais']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
			</select> <div class="help"><span><em></em></span></div>
		</div>
        
		<div class="form-line">
			<label for="estado">Regi&oacute;n</label>
			<select title="Ingrese su estado" autocomplete="off" onfocus="registro.focus(this)" onchange="registro.blur(this)" onblur="registro.blur(this)" tabindex="10" name="estado" id="estado">
				<option value="">Regi&oacute;n</option>
				</select> <div class="help"><span><em></em></span></div>
		</div>

		<div class="form-line">
			<label for="recaptcha_response_field">Ingresa el c&oacute;digo de la imagen:</label>

			<div id="recaptcha_ajax">
				<div id="recaptcha_image"></div>
				<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
			</div> <div class="help recaptcha"><span><em></em></span></div>
		</div>

		<div class="footerReg">
			<div class="form-line">
				<input type="checkbox" class="checkbox" id="terminos" name="terminos" tabindex="14" onblur="registro.blur(this)" onfocus="registro.focus(this)" title="Acepta los T&eacute;rminos y Condiciones?" /> <label class="list-label" for="terminos">Acepto los <a href="/pages/terminos-y-condiciones/" target="_blank">T&eacute;rminos de uso</a></label> <div class="help"><span><em></em></span></div>

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
//
$.getScript("<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/registro.js<?php echo '", function(){
	//Seteo el pais seleccionado
	//registro.datos[\'pais\']=\'MX\';
	//registro.datos_status[\'pais\']=\'ok\';
	//registro.datos_text[\'pais\']=\'OK\';
	//
	registro.change_paso(1);
	
	//Genero el autocomplete de la ciudad
	/*$(\'#RegistroForm .pasoDos #ciudad\').autocomplete(\'/registro-geo.php\', {
		minChars: 2,
		width: 298
	}).result(function(event, data, formatted){
		registro.datos[\'ciudad_id\'] = (data) ? data[1] : \'\';
		registro.datos[\'ciudad_text\'] = (data) ? data[0].toLowerCase() : \'\';
		if(data)
			$(\'#RegistroForm .pasoDos #terminos\').focus();
	});*/
	mydialog.procesando_fin();
});

//Load recaptcha
$.getScript("http://www.google.com/recaptcha/api/js/recaptcha_ajax.js", function(){
	Recaptcha.create(\'6LcXvL0SAAAAAPJkBrro96lnXGZ56TBRExEmVM3L\', \'recaptcha_ajax\', {
		theme:\'white\', lang:\'es\', tabindex:\'13\', custom_theme_widget: \'recaptcha_ajax\',
		callback: function(){
			$(\'#recaptcha_response_field\').blur(function(){
				registro.blur(this);
			}).focus(function(){
				registro.focus(this);
			}).attr(\'title\', \'Ingrese el c&oacute;digo de la imagen\');
		}
	});
});
</script>
'; ?>