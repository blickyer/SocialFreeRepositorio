        <script type="text/javascript">
			var menu_section_actual = '{if $tsDo == 'posts'}posts{else}{$tsPage}{/if}';
		</script>
		<div id="menu_container">
        <div id="menu">
        	<!--LEFT MENU-->
			<ul class="menuTabs">

                <li class="tabbed {if $tsPage == 'posts' || $tsPage == 'home'}here{/if}" id="{if $tsConfig.c_allow_portal && $tsUser->is_member}tabbedposts{else}tabbedhome{/if}">
                    <a title="Ir a Posts" onclick="menu('posts', this.href); return false;" href="{$tsConfig.url}/posts/">Posts </a>
                </li>
                 <li class="tabbed {if $tsPage == 'comunidades'}here{/if}" id="tabbedcomunidades">
                    <a title="Ir a Comunidades" onclick="menu('comunidades', this.href); return false;" href="{$tsConfig.url}/comunidades/">Comunidades </a>
                </li>				
				{if $tsConfig.c_fotos_private == '1' && !$tsUser->is_member}{else}								
                <li class="tabbed {if $tsPage == 'fotos'}here{/if}" id="tabbedfotos">
                    <a title="Ir a Fotos" onclick="menu('fotos', this.href); return false;" href="{$tsConfig.url}/fotos/">Fotos </a>
                </li>								
				{/if}
                 <li class="tabbed {if $tsPage == 'juegos'}here{/if}" id="tabbedjuegos">
                    <a title="Ir a Juegos" onclick="menu('juegos', this.href); return false;" href="{$tsConfig.url}/juegos/">Juegos </a>
                </li>
                <li class="tabbed {if $tsPage == 'tops'}here{/if}" id="tabbedtops">
                    <a title="Ir a TOPs" onclick="menu('tops', this.href); return false;" href="{$tsConfig.url}/top/">TOPs </a>
                </li>
                {if $tsUser->is_member}
                <li class="tabbed {if $tsPage == 'dinero'}here{/if}" id="tabbedtops">
                 <a title="Ir al Panel" onclick="menu('dinero', this.href); return false;" href="{$tsConfig.url}/dinero/">Dinero </a>
                </li>
                  {/if}
                <li class="tabbed {if $tsPage == 'calendario'}here{/if}" id="tabbedcalendario">
                 <a title="Ir al Calendario" onclick="menu('calendario', this.href); return false;" href="{$tsConfig.url}/calendario/">Calendario </a>
                </li>
                {if $tsUser->is_member}
                    {if $tsUser->is_admod == 1}
                <li class="tabbed {if $tsPage == 'admin'}here{/if}" id="tabbedAdmin">
                    <a title="Panel de Administrador" onclick="menu('Admin', this.href); return false;" href="{$tsConfig.url}/admin/">Administraci&oacute;n </a>
                </li>
   	                {/if}
					{if $tsAvisos}
				<li style="background: #B82020;border: 1px solid #690B0B;" class="tabbed {if $tsPage == 'tops'}here{/if}" id="tabbedtops">
                    <a title="{$tsAvisos} aviso{if $tsAvisos != 1}s{/if}" href="{$tsConfig.url}/mensajes/avisos/">Avisos - {$tsAvisos} </a>
                </li>
				{/if}
                {else}
                <li class="tabbed registrate">
                    <a title="Registrate!" onclick="registro_load_form(); return false" href=""><b>Registrate!</b></a>
                </li>
                {/if}
            </ul>
            <!--RIGHT MENU-->
            <div class="opciones_usuario {if !$tsUser->is_member}anonimo{/if}">
            	{if $tsUser->is_member}
                <div class="userInfoLogin">
                  <ul>
                    <li class="monitor" style="position: relative">
                        <a href="{$tsConfig.url}/monitor/" onclick="notifica.last(); return false" title="Monitor de usuario" name="Monitor">
                            <span class="systemicons monitor"></span>
                        </a>
                      <div class="notificaciones-list" id="mon_list">
					  		<div style="position:absolute;height:6px;width:12px;margin-top: -6px;left: 112px;background:url('{$tsConfig.tema.t_url}/mega/down.png') no-repeat;"></div>
                        <div style="padding: 10px 10px 0 10px;font-size:13px">
                            <strong style="cursor:pointer" onclick="location.href='{$tsConfig.url}/monitor/'">Notificaciones</strong>
                        </div>
                        <ul>
                        </ul>
                        <a style="color: #FFF;border-right:0;padding: 8px;text-shadow: 1px 1px #21759B;" href="{$tsConfig.url}/monitor/" class="ver-mas">Ver m&aacute;s notificaciones</a>
                      </div>
                    </li>
                    <li class="mensajes" style="position:relative">
                        <a href="{$tsConfig.url}/mensajes/" onclick="mensaje.last(); return false" title="Mensajes Personales" name="Mensajes">
                            <span class="systemicons mps"></span>
                        </a>
                        <div class="notificaciones-list" id="mp_list" style="width:270px">
						<div style="position:absolute;height:6px;width:12px;margin-top: -6px;left: 112px;background:url('{$tsConfig.tema.t_url}/mega/down.png') no-repeat;"></div>
                            <div style="padding: 10px 10px 0 10px;font-size:13px">
                                <strong style="cursor:pointer" onclick="location.href='{$tsConfig.url}/mensajes/'">Mensajes</strong>
                            </div>
                            <ul id="boxMail">
                            </ul>
                            <a style="color: #FFF;border-right:0;padding: 8px;text-shadow: 1px 1px #21759B;" href="{$tsConfig.url}/mensajes/" class="ver-mas">Ver todos los mensajes</a>
                        </div>
                    </li>
                    <li>
                        <a title="Mis Favoritos" href="{$tsConfig.url}/favoritos.php">
                            <span class="systemicons favoritos"></span>
                        </a>
                    </li>
                    <li>
                        <a title="Mis Borradores" href="{$tsConfig.url}/borradores.php">
                            <span class="systemicons borradores"></span>
                        </a>
                    </li>
                    <li>
                        <a title="Mi cuenta" href="{$tsConfig.url}/cuenta/">
                            <span class="systemicons micuenta"></span>
                        </a>
                    </li>
                    <li class="logout">
                        <a href="{$tsConfig.url}/login-salir.php" class="" style="vertical-align: middle" title="Salir">
                            <span class="systemicons logout"></span>
                        </a>
                    </li>
                    </ul>
                    <div style="clear:both"></div>
					<div style="position:absolute;margin-top: -25px;margin-left: 215px;"><a  href="{$tsConfig.url}/perfil/{$tsUser->info.user_name}" style="vertical-align: middle;border:none;" title=""><img class="avatar01" src="{$tsConfig.url}/files/avatar/{$tsUser->uid}_120.jpg?{$smarty.now|date_format:"%Y%m%d%H%M%S"}" /></a></div>
                </div>
                {else}
				<div class="identificarme">
					<a title="Identificarme" href="javascript:open_login_box()" class="iniciar_sesion">Identificarme</a>
				</div>
                <div id="login_box" style="display: none;">
                	<div class="login_header">
					<span>Loguearse</span>
                    	<img title="Cerrar mensaje" onclick="close_login_box();" class="login_cerrar" src="{$tsConfig.tema.t_url}/mega/close.png" style="left: 455px;top: 7px;">
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
                {/if}
			</div>
            <div class="clearBoth"></div>
        </div>
     </div>