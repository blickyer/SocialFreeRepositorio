<?php /* Smarty version 2.6.28, created on 2016-06-16 12:37:36
         compiled from t.cuenta.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				
				<script type="text/javascript" src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/cuenta.js"></script>
                <?php echo '
				<script type="text/javascript">
                $(document).ready(function(){
                    //document.domain = global_data.domain;
                	// '; ?>

                    avatar.uid = '<?php echo $this->_tpl_vars['tsUser']->uid; ?>
';
                    avatar.current = '<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php if ($this->_tpl_vars['tsPerfil']['p_avatar']): ?><?php echo $this->_tpl_vars['tsPerfil']['user_id']; ?>
<?php else: ?>avatar<?php endif; ?>.jpg';
                	// <?php echo '                
                    if (typeof location.href.split(\'#\')[1] != \'undefined\') {
                        $(\'ul.menu-tab > li > a:contains(\'+location.href.split(\'#\')[1]+\')\').click();
                    }
                
                });
                </script>
                '; ?>

                <div class="tabbed-d">
                	<div class="floatL">
                        <ul class="menu-tab">
                            <li class="active"><a onclick="cuenta.chgtab(this)">Cuenta</a></li>
                            <li><a onclick="cuenta.chgtab(this)">Perfil</a></li>    
                            <li><a onclick="cuenta.chgtab(this)">Bloqueados</a></li>
                            <li><a onclick="cuenta.chgtab(this)">Cambiar Clave</a></li>
							<li><a onclick="cuenta.chgtab(this)">Cambiar Nick</a></li>
                            <li class="privacy"><a onclick="cuenta.chgtab(this)">Privacidad</a></li>
                        </ul>
                        <a name="alert-cuenta"></a>
                        <form class="horizontal" method="post" action="" name="editarcuenta">
                        	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.cuenta_cuenta.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.cuenta_perfil.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.cuenta_block.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.cuenta_clave.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.cuenta_nick.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.cuenta_config.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        </form>
                    </div>
                    <div class="floatR">
	                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.cuenta_sidebar.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                </div>
                <div style="clear:both"></div>
                
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>