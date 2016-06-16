{include file='sections/main_header.tpl'}
<div id="login_error"></div>
<form id="login" class="box" method="post" action="javascript:login_ajax()">
    <input type="hidden" id="redir" name="redir" value="/">
    <input type="text" id="nickname" class="input-text" name="nick" placeholder="Usuario">
    <input type="password" id="password" class="input-text" name="pass" placeholder="Contrase&ntilde;a">
    <div class="controls clearfix">
    	<input type="submit" value="Ingresar">
    </div>
</form>
<div class="line_separator"></div>
{include file='sections/main_footer.tpl'}