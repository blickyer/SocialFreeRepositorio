                                    <script type="text/javascript">
										var action_menu = '{$tsAction}';
										//{literal} <-- no borrar
										$(function(){
											if(action_menu != '') $('#a_' + action_menu).addClass('active');
											else $('#a_main').addClass('active');
										});
									</script>
                                    {/literal}
                                    <a class="megaadmin" href="#" onclick="cambiar('general-admin'); return false;"><h4 style="margin: 0">General</h4></a>
                                    <ul style="margin-bottom: 0;" class="cat-list">
									<div id="general-admin" style="display: none;">
									<li id="a_main"><span class="cat-title"><a href="{$tsConfig.url}/admin/">Centro de Administraci&oacute;n</a></span></li>
                                        <li id="a_creditos"><span class="cat-title"><a href="{$tsConfig.url}/admin/creditos">Soporte y Cr&eacute;ditos</a></span></li>
									</div>
                                    </ul>
                                   <a class="megaadmin" href="#" onclick="cambiar('phpost-admin'); return false;"><h4 style="margin: 0">Configuraci&oacute;n de PHPost</h4></a>
                                    <ul style="margin-bottom: 0;" class="cat-list">
										<div id="phpost-admin" style="display: none;">
                                        <li id="a_configs"><span class="cat-title"><a href="{$tsConfig.url}/admin/configs">Configuraci&oacute;n </a></span></li>
                                        <li id="a_temas"><span class="cat-title"><a href="{$tsConfig.url}/admin/temas">Temas y apariencia</a></span></li>
                                        <li id="a_news"><span class="cat-title"><a href="{$tsConfig.url}/admin/news">Noticias</a></span></li>
                                        <li id="a_ads"><span class="cat-title"><a href="{$tsConfig.url}/admin/ads">Publicidad</a></span></li>
									</div>
								 </ul>
                                    <a class="megaadmin" href="#" onclick="cambiar('control-admin'); return false;"><h4 style="margin: 0">Control de PHPost</h4></a>
                                    <ul style="margin-bottom: 0;" class="cat-list">
										<div id="control-admin" style="display: none;">
                                        <li id="a_medals"><span class="cat-title"><a href="{$tsConfig.url}/admin/medals">Medallas</a></span></li>
                                        <li id="a_afs"><span class="cat-title"><a href="{$tsConfig.url}/admin/afs">Afiliados</a></span></li>
										<li id="a_stats"><span class="cat-title"><a href="{$tsConfig.url}/admin/stats">Estad&iacute;sticas</a></span></li>
                                        <li id="a_blacklist"><span class="cat-title"><a href="{$tsConfig.url}/admin/blacklist">Bloqueos</a></span></li>
                                        <li id="a_badwords"><span class="cat-title"><a href="{$tsConfig.url}/admin/badwords">Censuras</a></span></li>
                                    </div>
                                    </ul>
									<a class="megaadmin" href="#" onclick="cambiar('contenido-admin'); return false;"><h4 style="margin: 0">Control de Contenido</h4></a>
                                    <ul style="margin-bottom: 0;" class="cat-list">
										<div id="contenido-admin" style="display: none;">
                                        <li id="a_posts"><span class="cat-title"><a href="{$tsConfig.url}/admin/posts">Todos los Posts</a></span></li>
                                        <li id="a_users"><span class="cat-title"><a href="{$tsConfig.url}/admin/comunidades">Comunidades</a></span></li>
                                        <li id="a_fotos"><span class="cat-title"><a href="{$tsConfig.url}/admin/fotos">Todas las Fotos</a></span></li>
										<li id="a_cats"><span class="cat-title"><a href="{$tsConfig.url}/admin/cats">Categor&iacute;as</a></span></li>
                                    </div>
                                    </ul>
                                <a class="megaadmin" href="#" onclick="cambiar('usuarios-admin'); return false;"><h4 style="margin: 0">Control de Usuarios</h4></a>
                                    <ul style="margin-bottom: 0;" class="cat-list">
										<div id="usuarios-admin" style="display: none;">
                                    	<li id="a_users"><span class="cat-title"><a href="{$tsConfig.url}/admin/users">Todos los Usuarios</a></span></li>
                                    	<li id="a_sesiones"><span class="cat-title"><a href="{$tsConfig.url}/admin/sesiones">Sesiones</a></span></li>
                                    	<li id="a_nicks"><span class="cat-title"><a href="{$tsConfig.url}/admin/nicks">Cambios de Nicks</a></span></li>
                                        <li id="a_rangos"><span class="cat-title"><a href="{$tsConfig.url}/admin/rangos">Rangos de Usuarios</a></span></li>
                                        <li id="a_badwords"><span class="cat-title"><a href="javascript:enviar.mps.all();">Mensajes masivos</a></span></li>
                                        <li id="a_users"><span class="cat-title"><a href="{$tsConfig.url}/admin/referidos">Referidos</a></span></li>
                                    </div>
                                    </ul>