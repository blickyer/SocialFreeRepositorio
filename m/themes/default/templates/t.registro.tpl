{include file='sections/main_header.tpl'}
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
    {section name=dias start=1 loop=32}
        <option value="{$smarty.section.dias.index}">{$smarty.section.dias.index}</option>
    {/section}
    </select>
    <select id="mes" name="mes" class="input-text" tabindex="6" title="Ingrese mes de nacimiento" style="width: 32%;float: left;margin: 10px 2%;">
        <option value="">Mes</option>
    {foreach from=$tsMeces key=mid item=mes}
        <option value="{$mid}">{$mes}</option>
    {/foreach}	
    </select>
    <select id="anio" name="anio" class="input-text" tabindex="7" title="Ingrese a&ntilde;o de nacimiento" style="width: 32%;float: left;">
        <option value="">A&ntilde;o</option>
    {section name=year start=$tsEndY loop=$tsEndY step=-1 max=$tsMax}
         <option value="{$smarty.section.year.index}">{$smarty.section.year.index}</option>
    {/section}
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
        {foreach from=$tsPaises key=code item=pais}
        <option value="{$code}">{$pais}</option>
        {/foreach}
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
    <label style="margin: 15px 2px;">Al registrarme en {$tsConfig.titulo} estoy aceptando los <a href="{$tsConfig.web}/pages/terminos-y-condiciones/">T&eacute;rminos y condiciones</a> del sitio</label>
    <div class="controls">
    	<input type="submit" value="Registrarme">
    </div>
</form>
<div class="line_separator"></div>
{include file='sections/main_footer.tpl'}
{literal}
<script type="text/javascript">
//Load recaptcha
$.getScript("http://www.google.com/recaptcha/api/js/recaptcha_ajax.js", function(){
	Recaptcha.create('6LcXvL0SAAAAAPJkBrro96lnXGZ56TBRExEmVM3L', 'recaptcha_ajax', {
		theme:'custom', lang:'es', tabindex:'11', custom_theme_widget: 'recaptcha_ajax'
	});
});
</script>
{/literal}