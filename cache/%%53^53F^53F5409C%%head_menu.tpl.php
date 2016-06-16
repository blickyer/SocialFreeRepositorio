<?php /* Smarty version 2.6.28, created on 2016-06-16 07:25:58
         compiled from sections/head_menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'sections/head_menu.tpl', 106, false),)), $this); ?>
        <script type="text/javascript">
			var menu_section_actual = '<?php if ($this->_tpl_vars['tsDo'] == 'posts'): ?>posts<?php else: ?><?php echo $this->_tpl_vars['tsPage']; ?>
<?php endif; ?>';
		</script>
		<div id="menu_container">
        <div id="menu">
        	<!--LEFT MENU-->
			<ul class="menuTabs">

                <li class="tabbed <?php if ($this->_tpl_vars['tsPage'] == 'posts' || $this->_tpl_vars['tsPage'] == 'home'): ?>here<?php endif; ?>" id="<?php if ($this->_tpl_vars['tsConfig']['c_allow_portal'] && $this->_tpl_vars['tsUser']->is_member): ?>tabbedposts<?php else: ?>tabbedhome<?php endif; ?>">
                    <a title="Ir a Posts" onclick="menu('posts', this.href); return false;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/">Posts </a>
                </li>
                 <li class="tabbed <?php if ($this->_tpl_vars['tsPage'] == 'comunidades'): ?>here<?php endif; ?>" id="tabbedcomunidades">
                    <a title="Ir a Comunidades" onclick="menu('comunidades', this.href); return false;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/">Comunidades </a>
                </li>				
				<?php if ($this->_tpl_vars['tsConfig']['c_fotos_private'] == '1' && ! $this->_tpl_vars['tsUser']->is_member): ?><?php else: ?>								
                <li class="tabbed <?php if ($this->_tpl_vars['tsPage'] == 'fotos'): ?>here<?php endif; ?>" id="tabbedfotos">
                    <a title="Ir a Fotos" onclick="menu('fotos', this.href); return false;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/fotos/">Fotos </a>
                </li>								
				<?php endif; ?>
                 <li class="tabbed <?php if ($this->_tpl_vars['tsPage'] == 'juegos'): ?>here<?php endif; ?>" id="tabbedjuegos">
                    <a title="Ir a Juegos" onclick="menu('juegos', this.href); return false;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/juegos/">Juegos </a>
                </li>
                <li class="tabbed <?php if ($this->_tpl_vars['tsPage'] == 'tops'): ?>here<?php endif; ?>" id="tabbedtops">
                    <a title="Ir a TOPs" onclick="menu('tops', this.href); return false;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/top/">TOPs </a>
                </li>
                <?php if ($this->_tpl_vars['tsUser']->is_member): ?>
                <li class="tabbed <?php if ($this->_tpl_vars['tsPage'] == 'dinero'): ?>here<?php endif; ?>" id="tabbedtops">
                 <a title="Ir al Panel" onclick="menu('dinero', this.href); return false;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/dinero/">Dinero </a>
                </li>
                  <?php endif; ?>
                <li class="tabbed <?php if ($this->_tpl_vars['tsPage'] == 'calendario'): ?>here<?php endif; ?>" id="tabbedcalendario">
                 <a title="Ir al Calendario" onclick="menu('calendario', this.href); return false;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/calendario/">Calendario </a>
                </li>
                <?php if ($this->_tpl_vars['tsUser']->is_member): ?>
                    <?php if ($this->_tpl_vars['tsUser']->is_admod == 1): ?>
                <li class="tabbed <?php if ($this->_tpl_vars['tsPage'] == 'admin'): ?>here<?php endif; ?>" id="tabbedAdmin">
                    <a title="Panel de Administrador" onclick="menu('Admin', this.href); return false;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/">Administraci&oacute;n </a>
                </li>
   	                <?php endif; ?>
					<?php if ($this->_tpl_vars['tsAvisos']): ?>
				<li style="background: #B82020;border: 1px solid #690B0B;" class="tabbed <?php if ($this->_tpl_vars['tsPage'] == 'tops'): ?>here<?php endif; ?>" id="tabbedtops">
                    <a title="<?php echo $this->_tpl_vars['tsAvisos']; ?>
 aviso<?php if ($this->_tpl_vars['tsAvisos'] != 1): ?>s<?php endif; ?>" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/mensajes/avisos/">Avisos - <?php echo $this->_tpl_vars['tsAvisos']; ?>
 </a>
                </li>
				<?php endif; ?>
                <?php else: ?>
                <li class="tabbed registrate">
                    <a title="Registrate!" onclick="registro_load_form(); return false" href=""><b>Registrate!</b></a>
                </li>
                <?php endif; ?>
            </ul>
            <!--RIGHT MENU-->
            <div class="opciones_usuario <?php if (! $this->_tpl_vars['tsUser']->is_member): ?>anonimo<?php endif; ?>">
            	<?php if ($this->_tpl_vars['tsUser']->is_member): ?>
                <div class="userInfoLogin">
                  <ul>
                    <li class="monitor" style="position: relative">
                        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/monitor/" onclick="notifica.last(); return false" title="Monitor de usuario" name="Monitor">
                            <span class="systemicons monitor"></span>
                        </a>
                      <div class="notificaciones-list" id="mon_list">
					  		<div style="position:absolute;height:6px;width:12px;margin-top: -6px;left: 112px;background:url('<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/mega/down.png') no-repeat;"></div>
                        <div style="padding: 10px 10px 0 10px;font-size:13px">
                            <strong style="cursor:pointer" onclick="location.href='<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/monitor/'">Notificaciones</strong>
                        </div>
                        <ul>
                        </ul>
                        <a style="color: #FFF;border-right:0;padding: 8px;text-shadow: 1px 1px #21759B;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/monitor/" class="ver-mas">Ver m&aacute;s notificaciones</a>
                      </div>
                    </li>
                    <li class="mensajes" style="position:relative">
                        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/mensajes/" onclick="mensaje.last(); return false" title="Mensajes Personales" name="Mensajes">
                            <span class="systemicons mps"></span>
                        </a>
                        <div class="notificaciones-list" id="mp_list" style="width:270px">
						<div style="position:absolute;height:6px;width:12px;margin-top: -6px;left: 112px;background:url('<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/mega/down.png') no-repeat;"></div>
                            <div style="padding: 10px 10px 0 10px;font-size:13px">
                                <strong style="cursor:pointer" onclick="location.href='<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/mensajes/'">Mensajes</strong>
                            </div>
                            <ul id="boxMail">
                            </ul>
                            <a style="color: #FFF;border-right:0;padding: 8px;text-shadow: 1px 1px #21759B;" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/mensajes/" class="ver-mas">Ver todos los mensajes</a>
                        </div>
                    </li>
                    <li>
                        <a title="Mis Favoritos" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/favoritos.php">
                            <span class="systemicons favoritos"></span>
                        </a>
                    </li>
                    <li>
                        <a title="Mis Borradores" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/borradores.php">
                            <span class="systemicons borradores"></span>
                        </a>
                    </li>
                    <li>
                        <a title="Mi cuenta" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/cuenta/">
                            <span class="systemicons micuenta"></span>
                        </a>
                    </li>
                    <li class="logout">
                        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/login-salir.php" class="" style="vertical-align: middle" title="Salir">
                            <span class="systemicons logout"></span>
                        </a>
                    </li>
                    </ul>
                    <div style="clear:both"></div>
					<div style="position:absolute;margin-top: -25px;margin-left: 215px;"><a  href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['tsUser']->info['user_name']; ?>
" style="vertical-align: middle;border:none;" title=""><img class="avatar01" src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['tsUser']->uid; ?>
_120.jpg?<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y%m%d%H%M%S") : smarty_modifier_date_format($_tmp, "%Y%m%d%H%M%S")); ?>
" /></a></div>
                </div>
                <?php else: ?>
				<div class="identificarme">
					<a title="Identificarme" href="javascript:open_login_box()" class="iniciar_sesion">Identificarme</a>
				</div>
                <div id="login_box" style="display: none;">
                	<div class="login_header">
					<span>Loguearse</span>
                    	<img title="Cerrar mensaje" onclick="close_login_box();" class="login_cerrar" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/mega/close.png" style="left: 455px;top: 7px;">
                    </div>
                	<div class="login_cuerpo">
	                  <span class="gif_cargando floatR" id="login_cargando" style="display: none;"></span>
    	              <div id="login_error" style="display: none; padding:3px 0;padding: 7px 0px;background: #A33535;margin-bottom: 5px;font-family:sans-serif;font-size:12px;color:#FFF;"></div>
        	            <form action="javascript:login_ajax()" method="post">
            	            <label>Usuario</label>
                	        <input type="text" class="ilogin" id="nickname" name="nick" maxlength="64">
                    	    <label>Contraseña</label>
                        	<input type="password" class="ilogin" id="password" name="pass" maxlength="64">
                            <input type="checkbox" id="rem" name="rem" value="true" checked="checked" /> <label for="rem">Recordar usuario</label>
	                        <input type="submit" title="Entrar" value="Entrar" style="width:198px; margin-top:5px;" class="mBtn btnOk">
            	        </form>
                  </div>
				   <div class="login_footer">
	                      <a class="login-op" href="#" onclick="remind_password();">&#191;Olvidaste tu contrase&#241;a?</a>
        	                <br/>
							<a class="login-op-verde" href="#" onclick="resend_validation();">&#191;No lleg&oacute; el correo de validaci&oacute;n?</a>
        	                <br/>
            	          <a class="login-op-azul" style="" onclick="open_login_box(); registro_load_form(); return false" href="">
	                        <strong>Registrate Ahora!</strong>
    	                  </a>
                        </div>
                </div>
                <?php endif; ?>
			</div>
            <div class="clearBoth"></div>
        </div>
     </div>