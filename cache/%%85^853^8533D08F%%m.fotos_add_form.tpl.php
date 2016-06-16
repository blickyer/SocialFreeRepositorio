<?php /* Smarty version 2.6.28, created on 2016-06-16 12:43:21
         compiled from modules/m.fotos_add_form.tpl */ ?>
				<?php if (( $this->_tpl_vars['tsAction'] == 'agregar' && ( $this->_tpl_vars['tsUser']->permisos['gopf'] || $this->_tpl_vars['tsUser']->is_admod ) ) || ( $this->_tpl_vars['tsAction'] == 'editar' && ( $this->_tpl_vars['tsUser']->permisos['moedfo'] || $this->_tpl_vars['tsUser']->is_admod ) )): ?> 
                <div id="centroDerecha" style="width: 630px; float: left;">
                	<div class="">
                        <h2 style="font-size: 15px;"><?php if ($this->_tpl_vars['tsAction'] == 'agregar'): ?>Agregar nueva<?php else: ?>Editar<?php endif; ?> foto</h2>
                    </div>
                    <form name="add_foto" method="post" action="" enctype="multipart/form-data" id="foto_form" class="form-add-post" autocomplete="off">
                    <div class="loader">
                        <img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/loading_bar.gif" /><br />
                        <h2>Cargando foto, espere por favor....</h2>
                    </div>
                    <div class="fade_out">
                        <ul class="clearbeta">
                            <li>
                            <label for="ftitle">T&iacute;tulo</label>
                            <span style="display: none;" class="errormsg"></span>
                            <input type="text" tabindex="1" name="titulo" id="ftitle" maxlength="40" class="text-inp required" value="<?php echo $this->_tpl_vars['tsFoto']['f_title']; ?>
"/>
                            </li>
                        <?php if ($this->_tpl_vars['tsAction'] != 'editar'): ?>
                            <?php if ($this->_tpl_vars['tsConfig']['c_allow_upload'] == 1): ?>
                            <li>
                            <label for="ffile">Archivo</label>
                            <input type="file" name="file" id="ffile" />
                            </li>
                            <?php else: ?>
                            <li>
                            <label for="furl">URL</label>
                            <span style="display: none;" class="errormsg"></span>
                            <input type="text" tabindex="2" name="url" id="furl" maxlength="200" class="text-inp required" value="<?php echo $this->_tpl_vars['tsFoto']['f_url']; ?>
"/>
                            </li>                            
                            <?php endif; ?>
                        <?php endif; ?>
                            <li>
                            <label for="fdesc">Descripci&oacute;n (<small>Max 500 car.</small>)</label>
                            <span style="display: none;" class="errormsg"></span>
                            <textarea name="desc" id="fdesc" cols="60" rows="5" onkeydown="return ControlLargo(this);" onkeyup="return ControlLargo(this);"><?php echo $this->_tpl_vars['tsFoto']['f_description']; ?>
</textarea>
                            </li>
                            <li>
                            <label>Opciones</label>
                            <div class="option clearbeta">  
                                <input type="checkbox" class="floatL" id="sin_comentarios" name="closed"<?php if ($this->_tpl_vars['tsFoto']['f_closed'] == 1): ?> checked="true"<?php endif; ?>/>
                                <p class="floatL">
                                    <label for="sin_comentarios">Cerrar Comentarios</label>
                                    Si no quieres recibir comentarios en tu foto.
                                </p>
                            </div>
							<div class="option clearbeta">  
                                <input type="checkbox" class="floatL" id="visitas" name="visitas"  <?php if ($this->_tpl_vars['tsFoto']['f_visitas'] == 1): ?> checked="true"<?php endif; ?>/>
                                <p class="floatL">
                                    <label for="visitas">&Uacute;ltimos visitantes</label>
                                    Se mostrar&aacute;n los &uacute;ltimos visitantes.
                                </p>
                            </div>
                            </li>
                        </ul>
						<?php if ($this->_tpl_vars['tsUser']->is_admod > 0 && $this->_tpl_vars['tsAction'] == 'editar' && $this->_tpl_vars['tsFoto']['f_user'] != $this->_tpl_vars['tsUser']->uid): ?>
                                    <li style="clear:both;">
                                    <label>Raz&oacute;n</label>
                                    <input type="text" tabindex="8" name="razon" maxlength="150" size="60" class="text-inp" value=""/>
                                     Si has modificado el contenido de esta foto, ingresa la raz&oacute;n.
                                    </li>
                                    <?php endif; ?>
                        <div class="end-form clearbeta">
                        	<input type="button" style="width: auto; margin-left: 5px;" class="mBtn btnGreen" name="new" value="<?php if ($this->_tpl_vars['tsAction'] == 'agregar'): ?>Agregar foto<?php else: ?>Guardar cambios<?php endif; ?>" onclick="fotos.agregar()"/>
                        </div>
                    </div>                    
                    </form>
                </div>
				<?php else: ?>
						<div class="emptyData clearfix">
                    	Lo sentimos, pero no puedes <?php if ($this->_tpl_vars['tsAction'] == 'agregar'): ?>agregar<?php else: ?>editar<?php endif; ?> una nueva foto.
						</div>
						<?php endif; ?>