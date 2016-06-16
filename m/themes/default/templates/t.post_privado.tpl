{include file='sections/main_header.tpl'}
<div class="titulo_post">
	<h1>{$tsPost.1}</h1>
</div>
<div id="login_error"></div>
<form id="login" class="box" method="post" action="javascript:login_ajax()">
	<div class="post_privado">
        <h2>Este post es privado</h2>
        <p>Solo los usuarios registrados de {$tsConfig.titulo} pueden acceder.</p>
    </div>
    <input type="text" id="nickname" class="input-text" name="nick" placeholder="Usuario">
    <input type="password" id="password" class="input-text" name="pass" placeholder="Contrase&ntilde;a">
    <div class="controls clearfix">
    	<input type="submit" value="Ingresar">
    </div>
</form>
<div class="line_separator"></div>
{include file='sections/main_footer.tpl'}