<?php /* Smarty version 2.6.28, created on 2016-06-16 12:46:14
         compiled from modules/m.agregar_form.tpl */ ?>
					<?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['gopp']): ?>
                        <div class="form-add-post">
                        	<form action="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/agregar.php<?php if ($this->_tpl_vars['tsAction'] == 'editar'): ?>?action=editar&pid=<?php echo $this->_tpl_vars['tsPid']; ?>
<?php endif; ?>" method="post" name="newpost" autocomplete="off">
                            	<input type="hidden" value="<?php echo $this->_tpl_vars['tsDraft']['bid']; ?>
" name="borrador_id"/>
                                <ul class="clearbeta">
                                    <li> 
                                    <label>T&iacute;tulo</label>
                                    <span style="display: none;" class="errormsg"></span>
                                    <input type="text" tabindex="1" name="titulo" maxlength="60" size="60" class="text-inp required" value="<?php echo $this->_tpl_vars['tsDraft']['b_title']; ?>
" style="width:760px"/>
                                    <div id="repost"></div>
                                    </li>
									   <li>
                                    <label>Portada</label>
                                    <span style="display: none;" class="errormsg"></span>
                                    <input type="text" tabindex="2" name="imagen" maxlength="180" size="60" class="text-inp required" value="<?php echo $this->_tpl_vars['tsDraft']['b_portada']; ?>
" />
                                    <p style="color:#999;font-size: 11px;margin: 2px 0 5px 2px;">URL de la imagen como caratula para la home</p>
                                    </li> 
                                    <li>
                                    <a name="post"></a>
                                    <label>Contenido del Post</label>
                                    <span style="display: none;" class="errormsg"></span>
                                    <textarea id="markItUp" name="cuerpo" tabindex="2" style="min-height:400px;" class="required"><?php echo $this->_tpl_vars['tsDraft']['b_body']; ?>
</textarea>
                                    <div style="margin:10px 0 0;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.global_emoticons.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
                                    </li>
                                    <li>
                                    <label>Tags</label>
                                    <span style="display: none;" class="errormsg"></span>
                                    <input type="text" tabindex="4" name="tags" maxlength="128" class="text-inp required" value="<?php echo $this->_tpl_vars['tsDraft']['b_tags']; ?>
"/>
                                    Una lista separada por comas, que describa el contenido. Ejemplo: <b>Jugadores, Animales, Descargas, Paises, Peliculas, Zombie</b>
                                    </li>
                                    <li class="special-left clearbeta">
                                    <label>Categor&iacute;a</label>
                                    <span style="display: none;" class="errormsg"></span>
                                    <select class="agregar required" tabindex="5" size="9" style="width:260px; float:left" size="<?php echo $this->_tpl_vars['tsConfig']['categorias']['ncats']; ?>
" name="categoria">
                                    <option value="" selected="selected" style="color: #000; font-weight: bold; padding: 3px; background:none;">Elegir una categor&iacute;a</option>
                                        <?php $_from = $this->_tpl_vars['tsConfig']['categorias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
                                        <option value="<?php echo $this->_tpl_vars['c']['cid']; ?>
" <?php if ($this->_tpl_vars['tsDraft']['b_category'] == $this->_tpl_vars['c']['cid']): ?>selected="selected"<?php endif; ?> style="background-image:url(<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/mega/cat/<?php echo $this->_tpl_vars['c']['c_img']; ?>
)"><?php echo $this->_tpl_vars['c']['c_nombre']; ?>
</option>
                                        <?php endforeach; endif; unset($_from); ?>
                                    </select>
                                    </li>
                                    <div style="float: right;margin-bottom:10px;" class="bordes-ge">
                                    <li class="special-right clearbeta posts-op" style="margin:0;">
                                    <label style="padding: 5px;">Opciones</label>
                                    <div class="option clearbeta">  
                                        <input type="checkbox" tabindex="6" name="privado" id="privado" class="floatL" <?php if ($this->_tpl_vars['tsDraft']['b_private'] == 1): ?>checked="checked"<?php endif; ?> />
                                        <p class="floatL">
                                            <label for="privado">S&oacute;lo usuarios registrados</label>
                                            Tu post ser&aacute; visto s&oacute;lo por los usuarios que tengan cuenta en <?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>

                                        </p>
                                    </div>
                                    <div class="option clearbeta">  
                                        <input type="checkbox" tabindex="7" name="sin_comentarios" id="sin_comentarios" class="floatL" <?php if ($this->_tpl_vars['tsDraft']['b_block_comments'] == 1): ?>checked="checked"<?php endif; ?>>
                                        <p class="floatL">
                                            <label for="sin_comentarios">Cerrar Comentarios</label>
                                            Si tu post es pol&eacute;mico ser&iacute;a mejor que cierres los comentarios.
                                        </p>
                                    </div>
									<div class="option clearbeta">  
                                        <input type="checkbox" tabindex="8" name="visitantes" id="visitantes" class="floatL" <?php if ($this->_tpl_vars['tsDraft']['b_visitantes'] == 1): ?>checked="checked"<?php endif; ?> />
                                        <p class="floatL">
                                            <label for="visitantes">Mostrar visitantes recientes</label>
                                            Tu post mostrar&aacute; los &uacute;ltimos visitantes que ha tenido
                                        </p>
                                    </div>
									<div class="option clearbeta">  
                                        <input type="checkbox" tabindex="9" name="smileys" id="smileys" class="floatL" <?php if ($this->_tpl_vars['tsDraft']['b_smileys'] == 1): ?>checked=<?php endif; ?>>
                                        <p class="floatL">
                                            <label for="smileys">Sin Smileys</label>
                                            Si tu post no necesita smileys, desact&iacute;valos.
                                        </p>
                                    </div>
                                    <?php if ($this->_tpl_vars['tsUser']->is_admod == 1): ?>
                                    <div class="option clearbeta">  
                                        <input type="checkbox" tabindex="9" name="patrocinado" id="patrocinado" class="floatL" <?php if ($this->_tpl_vars['tsDraft']['b_sponsored'] == 1): ?>checked="checked"<?php endif; ?> >
                                        <p class="floatL">
                                            <label for="patrocinado">Patrocinado</label>
                                            Resalta este post entre los dem&aacute;s.
                                        </p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['most']): ?>
                                    <div class="option clearbeta">  
                                        <input type="checkbox" tabindex="7" name="sticky" id="sticky" class="floatL" <?php if ($this->_tpl_vars['tsDraft']['b_sticky'] == 1): ?>checked="checked"<?php endif; ?> >
                                        <p class="floatL">
                                            <label for="sticky">Sticky</label>
                                            Colocar a este post fijo en la home.
                                        </p>
                                    </div>
                                    <?php endif; ?>
                                    </li>
									</div>
                                    <?php if (( $this->_tpl_vars['tsUser']->is_admod > 0 || $this->_tpl_vars['tsUser']->permisos['moedpo'] ) && $this->_tpl_vars['tsDraft']['b_title'] && $this->_tpl_vars['tsDraft']['b_user'] != $this->_tpl_vars['tsUser']->uid): ?>
									<li style="clear:both;">
                                    <label>Raz&oacute;n</label>
                                    <span style="display: none;" class="errormsg"></span>
                                    <input type="text" tabindex="8" name="razon" maxlength="150" size="60" class="text-inp" value="" style="width:578px"/>
                                   Si has modificado el contenido de este post ingresa la raz&oacute;n por la cual lo modificaste.
                                    </li>
                                    <?php endif; ?>
                                </ul>
                                <div class="end-form clearbeta">
                                    <input type="button" tabindex="9" title="Guardar en borradores" value="Guardar en borradores" onclick="save_borrador()" class="mBtn btnOk floatL" id="borrador-save">
                                	<input type="button" title="Publicar" value="Continuar &raquo;" name="postPublic" class="mBtn btnGreen" style="width: auto; margin-left: 5px;">
                            <div id="borrador-guardado" style="float: right; font-style: italic; margin: 7px 0pt 0pt;"></div>
                                </div>
                            </form>
                        </div>
						<?php else: ?>
						<div class="emptyData clearfix">
                    	Lo sentimos, pero no puedes publicar un nuevo post.
						</div>
						<?php endif; ?>