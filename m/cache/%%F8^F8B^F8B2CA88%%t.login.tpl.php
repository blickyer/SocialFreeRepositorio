<?php /* Smarty version 2.6.26, created on 2016-02-28 11:49:37
         compiled from t.login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>