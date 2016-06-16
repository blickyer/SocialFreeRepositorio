<?php /* Smarty version 2.6.28, created on 2016-06-16 12:44:28
         compiled from admin_mods/m.admin_configs.tpl */ ?>
                                <div class="boxy-title">
                                    <h3>Caracter&iacute;sticas y Opciones</h3>
                                </div>
                                <div id="res" class="boxy-content">
                                <?php if ($this->_tpl_vars['tsSave']): ?><div style="display: block;" class="mensajes ok">Configuraciones guardadas</div><?php endif; ?>
                                	<form action="" method="post" autocomplete="off">
                                    <fieldset>
                                        <legend>Configuraci&oacute;n del Sitio</legend>
                                        <dl>
                                            <dt><label for="ai_titulo">Nombre del Sitio:</label></dt>
                                            <dd><input type="text" id="ai_titulo" name="titulo" maxlength="24" value="<?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
" /></dd>
                                        </dl>
                                        <dl>
                                            <dt><label for="ai_slogan">Descripci&oacute;n del Sitio:</label></dt>
                                            <dd><input type="text" id="ai_slogan" name="slogan" maxlength="32" value="<?php echo $this->_tpl_vars['tsConfig']['slogan']; ?>
"/></dd>
                                        </dl>
                                        <dl>

                                         <dt><label for="ai_keywords">keywords del Sitio:</label></dt>

                                         <dd><input type="text" id="ai_keywords" name="keywords" maxlength="200" value="<?php echo $this->_tpl_vars['tsConfig']['keywords']; ?>
"/></dd>

                                     </dl>

         <dl>

                                         <dt><label for="ai_descripcion">Descripci&oacute;n del Sitio Web (SEO):</label></dt>

                                         <dd><input type="text" id="ai_descripcion" name="descripcion" maxlength="200"

         value="<?php echo $this->_tpl_vars['tsConfig']['descripcion']; ?>
"/></dd>

                                     </dl>
                                        <dl>
                                            <dt><label for="ai_url">Direcci&oacute;n del sitio:</label></dt>
                                            <dd><input type="text" id="ai_url" name="url" maxlength="32" value="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
" /></dd>
                                        </dl>
                                        <dl>
                                        <dt><label for="mobile">Dirección del sitio para móviles:</label></dt>
                                        <dd><input type="text" id="mobile" name="mobile" maxlength="40" value="<?php echo $this->_tpl_vars['tsConfig']['mobile']; ?>
" /></dd>
                                        </dl>
                                        <dl>
                                            <dt><label for="ai_offline">Modo mantenimiento:</label><br /><span>Esto har&aacute; al Sitio inaccesible a los usuarios. Si quiere, tambi&eacute;n puede introducir un breve mensaje (255 caracteres) para mostrar.</span></dt>
                                            <dd>
                                                <label><input name="offline" type="radio" id="ai_offline" value="1" <?php if ($this->_tpl_vars['tsConfig']['offline'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/> S&iacute;</label>
                                                <label><input name="offline" type="radio" id="ai_offline" value="0" <?php if ($this->_tpl_vars['tsConfig']['offline'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/> No</label>
                                                <br />
                                                <input type="text" name="offline_message" id="ai_offline" value="<?php echo $this->_tpl_vars['tsConfig']['offline_message']; ?>
" />
                                            </dd>
                                        </dl>
                                        <hr>
<dl>
<dt><label for="dinerox">Activar Dinero por posts.</label><br /><span>Aqu&iacute; podras activar el pago de dinero por posts creados. Desea activarlo?</span></dt>
<dd>
<label><input name="dinerox" type="radio" id="dinerox" value="1" <?php if ($this->_tpl_vars['tsConfig']['dinerox'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/> S&iacute;</label>
<label><input name="dinerox" type="radio" id="dinerox" value="0" <?php if ($this->_tpl_vars['tsConfig']['dinerox'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/> No</label>
</dd>
</dl>
<dl>
<dt><label for="dinerp">Cantidad Dinero</label><br /><span>Indique la cantidad m&iacute;nima de dinero que el usuario necesita para poder cobrar.</span></dt>
<dd><input type="text" id="dinerp" name="dinerp" style="width:10%" maxlength="5" value="<?php echo $this->_tpl_vars['tsConfig']['dinerp']; ?>
" /> </dd>
</dl>
<hr>
                                        <dl>
                                            <dt><label for="ai_chat">Chatango ID:</label><br /><span>Por defecto puedes agregar un chat de <a href="http://chatango.com">Chatango</a> para tu web, solo crea tu grupo he ingresa el nombre. (Dejar vac&iacute;o para usar xat)</span></dt>
                                            <dd><input type="text" id="ai_chat" name="chat" maxlength="20" value="<?php echo $this->_tpl_vars['tsConfig']['chat_id']; ?>
" /> </dd>
                                        </dl>
										<dl>
                                            <dt><label for="ai_xat">Xat ID:</label><br /><span>Por defecto puedes agregar un chat de <a href="http://xat.com">Xat</a> para tu web, solo crea tu grupo he ingresa el nombre.</span></dt>
                                            <dd><input type="text" id="ai_xat" name="xat" maxlength="20" value="<?php echo $this->_tpl_vars['tsConfig']['xat_id']; ?>
" /> </dd>
                                        </dl>
                                        <hr />
                                        <dl>
                                            <dt><label for="ai_edad">Edad requerida:</label> <br /><span>A partir de que edad los usuarios pueden registrarse.</span></dt>
                                            <dd><input type="text" id="ai_edad" name="edad" style="width:10%" maxlength="2" value="<?php echo $this->_tpl_vars['tsConfig']['c_allow_edad']; ?>
" /> a&ntilde;os.</dd>
                                        </dl>
										 <dl>
                                            <dt><label for="ai_met_welcome">Mensaje de Bienvenida:</label><br /><span id="desc_message_welcome"  <?php if ($this->_tpl_vars['tsConfig']['c_met_welcome'] == 0): ?>style="display:none;"<?php endif; ?>> <br /> [usuario] => Nombre del registrado <br /> [welcome] => Bienvenido/a depende del sexo <br /> [web] => Nombre de esta web <br /> <br />(Se aceptan BBCodes y Smileys)</span></dt>
                                            <dd>
											<select id="ai_met_welcome" name="met_welcome" style="width: 266px;" class="select" <?php if ($this->_tpl_vars['tsConfig']['c_met_welcome'] == 0): ?> onchange="if($('#ai_met_welcome').val() != 0) $('textarea[name=message_welcome]').slideDown(); $('#desc_message_welcome').slideDown();" <?php endif; ?>>
											<option value="0" <?php if ($this->_tpl_vars['tsConfig']['c_met_welcome'] == 0): ?>selected<?php endif; ?> >No dar bienvenida</option>
						                    <option value="1" <?php if ($this->_tpl_vars['tsConfig']['c_met_welcome'] == 1): ?>selected<?php endif; ?> >Muro</option>
						                    <option value="2" <?php if ($this->_tpl_vars['tsConfig']['c_met_welcome'] == 2): ?>selected<?php endif; ?> >Mensaje privado</option>
						                    <option value="3" <?php if ($this->_tpl_vars['tsConfig']['c_met_welcome'] == 3): ?>selected<?php endif; ?> >Aviso</option>
            				                </select>
											<br />
                                            <textarea name="message_welcome" id="ai_met_welcome" style="width: 260px; height: 100px; <?php if ($this->_tpl_vars['tsConfig']['c_met_welcome'] == 0): ?> display:none; <?php endif; ?>" ><?php echo $this->_tpl_vars['tsConfig']['c_message_welcome']; ?>
</textarea>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt><label for="ai_active">Usuario online:</label><br /><span>Tiempo que debe trascurrir para considerar que un usuario est&aacute; en linea.</span></dt>
                                            <dd><input type="text" id="ai_active" name="active" style="width:10%" maxlength="2" value="<?php echo $this->_tpl_vars['tsConfig']['c_last_active']; ?>
" /> min.</dd>
                                        </dl>
                                        <dl>
                                            <dt><label for="ai_stats_cache">Estad&iacute;sticas en buffer:</label><br /><span>Tiempo que debe trascurrir para actualizar las estad&iacute;sticas del sitio.</span></dt>
                                            <dd><input type="text" id="ai_stats_cache" name="stats_cache" style="width:10%" maxlength="2" value="<?php echo $this->_tpl_vars['tsConfig']['c_stats_cache']; ?>
" /> min.</dd>
                                        </dl>
                                        <dl>
                                            <dt><label for="ai_sess_ip">Login por IP:</label><br /><span>Por seguridad cada que un usuario cambie de IP se le pedir&aacute; loguearse nuevamente.</span></dt>
                                            <dd>
                                                <label><input name="sess_ip" type="radio" id="ai_sess_ip" value="1" <?php if ($this->_tpl_vars['tsConfig']['c_allow_sess_ip'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>S&iacute;</label>
                                                <label><input name="sess_ip" type="radio" id="ai_sess_ip" value="0" <?php if ($this->_tpl_vars['tsConfig']['c_allow_sess_ip'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>No</label>
                                            </dd>
                                        </dl>
                                        <dl>
										    <dt><label for="ai_count_guests">Los visitantes suman estad&iacute;sticas</label><br /><span>Contar a los visitantes en las estad&iacute;sticas generales.</span></dt>                                          
                                            <dd>
										     <label><input name="count_guests" type="radio" id="ai_count_guests" value="1" <?php if ($this->_tpl_vars['tsConfig']['c_count_guests'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>S&iacute;</label>                                              
										     <label><input name="count_guests" type="radio" id="ai_count_guests" value="0" <?php if ($this->_tpl_vars['tsConfig']['c_count_guests'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>No</label>
                                            </dd>
                                        </dl>
										
										<dl>
										    <dt><label for="ai_hits_guest">Los visitantes suman visitas</label><br /><span>Contar las visitas de los visitantes en posts y fotos.</span></dt>                                          
                                            <dd>
										     <label><input name="hits_guest" type="radio" id="ai_hits_guest" value="1" <?php if ($this->_tpl_vars['tsConfig']['c_hits_guest'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>S&iacute;</label>                                              
										     <label><input name="hits_guest" type="radio" id="ai_hits_guest" value="0" <?php if ($this->_tpl_vars['tsConfig']['c_hits_guest'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>No</label>
                                            </dd>
                                        </dl>

                                        <hr />
                                        <dl>
                                            <dt><label for="ai_reg_active">Registro abierto:</label><br /><span>Permitir el registro de nuevos usuarios</span></dt>
                                            <dd>
                                                <label><input name="reg_active" type="radio" id="ai_reg_active" value="1" <?php if ($this->_tpl_vars['tsConfig']['c_reg_active'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>S&iacute;</label>
                                                <label><input name="reg_active" type="radio" id="ai_reg_active" value="0" <?php if ($this->_tpl_vars['tsConfig']['c_reg_active'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>No</label>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt><label for="ai_reg_activate">Activar usuarios:</label><br /><span>Activar autom&aacute;ticamente la cuenta de usuario.</span></dt>
                                            <dd>
                                                <label><input name="reg_activate" type="radio" id="ai_reg_activate" value="1" <?php if ($this->_tpl_vars['tsConfig']['c_reg_activate'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>S&iacute;</label>
                                                <label><input name="reg_activate" type="radio" id="ai_reg_activate" value="0" <?php if ($this->_tpl_vars['tsConfig']['c_reg_activate'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>No</label>
                                            </dd>
                                        </dl>
										
										<dl>
										
                                            <dt><label for="ai_firma">Firma de usuario:</label><br /><span>Las firmas de los usuarios son visibles en los post.</span></dt>
											<dd>
                                                <label><input name="firma" type="radio" id="ai_firma" value="1" <?php if ($this->_tpl_vars['tsConfig']['c_allow_firma'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>S&iacute;</label>
												<label><input name="firma" type="radio" id="ai_firma" value="0" <?php if ($this->_tpl_vars['tsConfig']['c_allow_firma'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>No</label>
											</dd>
										</dl>
										
                                        <hr />
                                        <dl>
                                            <dt><label for="ai_upload">Carga externa:</label><br /><span>Si cuentas con un servidor de pago o la librer&iacute;a CURL puedes subir im&aacute;genes remotamente a imgur.com</span></dt>
                                            <dd>
                                                <label><input name="upload" type="radio" id="ai_upload" value="1" <?php if ($this->_tpl_vars['tsConfig']['c_allow_upload'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>S&iacute;</label>
                                                <label><input name="upload" type="radio" id="ai_upload" value="0" <?php if ($this->_tpl_vars['tsConfig']['c_allow_upload'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>No</label>
                                            </dd>
                                        </dl>
										
                                        <dl>
                                            <dt><label for="ai_portal">Activar portal:</label><br /><span>Los usuarios podr&aacute;n tener un inicio perzonalizado.</span></dt>
                                            <dd>
                                                <label><input name="portal" type="radio" id="ai_portal" value="1" <?php if ($this->_tpl_vars['tsConfig']['c_allow_portal'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>S&iacute;</label>
                                                <label><input name="portal" type="radio" id="ai_portal" value="0" <?php if ($this->_tpl_vars['tsConfig']['c_allow_portal'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>No</label>
                                            </dd>
                                        </dl>
										
										<dl>
										    <dt><label for="ai_fotos_private">Secci&oacute;n de fotos oculta</label><br /><span>Si est&aacute; activado, los visitantes no podr&aacute;n ver la secci&oacute;n fotos.</span></dt>                                            
                                            <dd>
										      <label><input name="fotos_private" type="radio" id="ai_fotos_private" value="1" <?php if ($this->_tpl_vars['tsConfig']['c_fotos_private'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>S&iacute;</label>                                               
										      <label><input name="fotos_private" type="radio" id="ai_fotos_private" value="0" <?php if ($this->_tpl_vars['tsConfig']['c_fotos_private'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>No</label>                                            
                                            </dd>
                                        </dl>
										
										<dl>
										    <dt><label for="ai_see_mod">Vista moderativa amplia</label><br /><span>Si est&aacute; activado, el equipo de moderaci&oacute;n podr&aacute; ver, diferenciado por colores, los distintos estados de los posts.</span></dt>                                            
                                            <dd>
										      <label><input name="see_mod" type="radio" id="ai_see_mod" value="1" <?php if ($this->_tpl_vars['tsConfig']['c_see_mod'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>S&iacute;</label>                                               
										      <label><input name="see_mod" type="radio" id="ai_see_mod" value="0" <?php if ($this->_tpl_vars['tsConfig']['c_see_mod'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>No</label>                                            
                                            </dd>
                                        </dl>
										
										<dl>
										    <dt><label for="ai_desapprove_post">Revisi&oacute;n de posts tras su publicaci&oacute;n</label><br /><span>Si est&aacute; activado, el equipo de moderaci&oacute;n deber&aacute; aprobar un post antes de que &eacute;ste sea publicado.</span></dt>                                            
                                            <dd>
										      <label><input name="desapprove_post" type="radio" id="ai_desapprove_post" value="1" <?php if ($this->_tpl_vars['tsConfig']['c_desapprove_post'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>S&iacute;</label>                                               
										      <label><input name="desapprove_post" type="radio" id="ai_desapprove_post" value="0" <?php if ($this->_tpl_vars['tsConfig']['c_desapprove_post'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>No</label>                                            
                                            </dd>
                                        </dl>
										
                                        <hr />
										<dl>
                                            <dt><label for="ai_keep_points">Mantener los puntos:</label><br /><span>Al momento de recargar los puntos, si est&aacute; habilitado se conservar&aacute;n los puntos que el usuario no haya gastado los puntos en el d&iacute;, si est&aacute; deshabilitado, se restablecer&aacute;n a los puntos asignados para cada rango.</span></dt>
                                            <dd>
                                                <label><input name="keep_points" type="radio" id="ai_keep_points" value="1" <?php if ($this->_tpl_vars['tsConfig']['c_keep_points'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>S&iacute;</label>
                                                <label><input name="keep_points" type="radio" id="ai_keep_points" value="0" <?php if ($this->_tpl_vars['tsConfig']['c_keep_points'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>No</label>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt><label for="ai_live">Notificaciones Live:</label><br /><span>Los usuarios podr&aacute;n ver en tiempo real sus notificaciones. (Esta opci&oacute;n puede consumir un poco m&aacute;s de recursos.)</span></dt>
                                            <dd>
                                                <label><input name="live" type="radio" id="ai_live" value="1" <?php if ($this->_tpl_vars['tsConfig']['c_allow_live'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>S&iacute;</label>
                                                <label><input name="live" type="radio" id="ai_live" value="0" <?php if ($this->_tpl_vars['tsConfig']['c_allow_live'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>No</label>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt><label for="ai_max_nots">M&aacute;ximo de notificaciones:</label><br /><span>Cuantas notificaciones puede recibir un usuario.</span></dt>
                                            <dd><input type="text" id="ai_max_nots" name="max_nots" style="width:10%" maxlength="3" value="<?php echo $this->_tpl_vars['tsConfig']['c_max_nots']; ?>
" /></dd>
                                        </dl>
                                        <dl>
                                            <dt><label for="ai_max_acts">M&aacute;ximo de actividades:</label><br /><span>Cuantas actividades puede registrar un usuario.</span></dt>
                                            <dd><input type="text" id="ai_max_acts" name="max_acts" style="width:10%" maxlength="3" value="<?php echo $this->_tpl_vars['tsConfig']['c_max_acts']; ?>
" /></dd>
                                        </dl>
                                        <hr />
                                        <dl>
                                            <dt><label for="ai_max_post">Posts por p&aacute;gina:</label><br /><span>N&uacute;mero m&aacute;ximo de posts a mostrar en cada p&aacute;gina de la portada.</span></dt>
                                            <dd><input type="text" id="ai_max_post" name="max_posts" style="width:10%" maxlength="3" value="<?php echo $this->_tpl_vars['tsConfig']['c_max_posts']; ?>
" /></dd>
                                        </dl>
                                        <dl>
                                            <dt><label for="ai_max_com">Comentarios por post:</label><br /><span>N&uacute;mero m&aacute;ximo de comentarios por p&aacute;gina en los post.</span></dt>

                                            <dd><input type="text" id="ai_max_com" name="max_com" style="width:10%" maxlength="3" value="<?php echo $this->_tpl_vars['tsConfig']['c_max_com']; ?>
" /></dd>
                                        </dl>
                                        <dl>
                                        <dt><label for="p_p_refs">Puntos por referido</label><br /><span>Puntos que recibira como bonificacion un user al subir un posts.</span></dt>
                                        <dd><input type="text" id="p_p_refs" name="p_p_refs" style="width:10%" maxlength="3" value="<?php echo $this->_tpl_vars['tsConfig']['p_p_refs']; ?>
" /></dd>
                                        </dl>
										<dl>
                                            <dt><label for="ai_allow_points" class="qtip" title="Si introducimos '0', se permitir&aacute; dar los puntos definidos por el rango del usuario. <br /> <br />  Si introducimos '-1', se podr&aacute;n dar todos los puntos que el usuario tenga para dar hoy. <br /> <br /> Introduciendo un n&uacute;mero superior a 0, todos los usuarios sin importar su rango, tend&aacute;n esa cantidad para dar." >Puntos por post:</label><br /><span>N&uacute;mero m&aacute;ximo de puntos que permitimos dar en los posts. </span></dt>
                                            <dd><input type="text" id="ai_allow_points" name="allow_points" style="width:10%" maxlength="3" value="<?php echo $this->_tpl_vars['tsConfig']['c_allow_points']; ?>
" /></dd>
                                        </dl>
                                        <dl>
                                            <dt><label for="ai_sum_p">Los votos suman puntos:</label><br /><span>Cada voto positivo en un comentario es un punto m&aacute;s para el usuario. <strong>Nota:</strong> Los votos negativos no restan puntos</span></dt>
                                            <dd>
                                                <label><input name="sump" type="radio" id="ai_sum_p" value="1" <?php if ($this->_tpl_vars['tsConfig']['c_allow_sump'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>Si</label>
                                                <label><input name="sump" type="radio" id="ai_sum_p" value="0" <?php if ($this->_tpl_vars['tsConfig']['c_allow_sump'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>No</label>
                                            </dd>
                                        </dl>
                                        <hr />
                                        <dl>
                                            <dt><label for="ai_nfu">Cambio de rango:</label><br /><span>Un usuario sube de rango cuando obtiene los puntos m&iacute;nimos en:</span></dt>
                                            <dd>
                                                <label><input name="newr" type="radio" id="ai_nfu" value="1" <?php if ($this->_tpl_vars['tsConfig']['c_newr_type'] == 1): ?>checked="checked"<?php endif; ?> class="radio"/>Todos sus post</label>
                                                <label><input name="newr" type="radio" id="ai_nfu" value="0" <?php if ($this->_tpl_vars['tsConfig']['c_newr_type'] != 1): ?>checked="checked"<?php endif; ?> class="radio"/>Solo en un post</label>
                                            </dd>
                                        </dl>
                                        <p><input type="submit" name="save" value="Guardar Cambios" class="btn_g"/></p>
                                    </fieldset>
                                    </form>
                                </div>