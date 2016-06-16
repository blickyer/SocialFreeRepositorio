{if ($tsAction == 'agregar' && ($tsUser->is_member || $tsUser->is_admod)) || ($tsAction == 'editar' && ($tsUser->is_admod) || $tsUser->uid == $tsJuego.j_user)} 
    <form name="add_juego" method="post" action="" enctype="multipart/form-data" id="juego_form" class="form-add-post" autocomplete="true">
    		<div class="loader" align="center">
                <img src="{$tsConfig.default}/images/loading_bar.gif" /><br />
                <h2>Cargando juego, espere por favor....</h2>
            </div>
            <ul class="clearbeta" id="sevaxD" style="padding: 25px;">
                            <li>
                            <label for="title">T&iacute;tulo del juego</label>
                            <span style="display: none;" class="errormsg"></span>
                            <input type="text" tabindex="1" name="titulo" id="title" maxlength="70" class="text-inp required" value="{$tsJuego.j_title}"/>
                            </li>
                        {if $tsAction != 'editar'}
                            <li>
                            <label for="url">URL del SWF del juego</label>
                            <span style="display: none;" class="errormsg"></span>
                            <input type="text" tabindex="2" name="url" id="url" maxlength="200" class="text-inp required" style="margin-bottom:5px;" value="{$tsJuego.j_url}"/>
                            <span style="opacity:0.7;"><b>Ejemplo: </b>http://www.games68.com/games/mario_star_catcher2<font color="red">.swf</font>: termina en <font color="red">.swf</font></span>
                            </li> 
                        {/if}
                            <li>
                            <label for="img">URL de la imagen de portada</label>
                            <span style="display: none;" class="errormsg"></span>
                            <input type="text" tabindex="3" name="img" id="img" maxlength="200" class="text-inp required" value="{$tsJuego.j_imagen}"/>
                            </li>
                            <li>
                            <label for="desc">Descripci&oacute;n del juego <small>(Max 500 caracteres)</small></label>
                            <textarea tabindex="4" name="desc" id="desc" cols="60" rows="5" onkeydown="return ControlLargo(this);" onkeyup="return ControlLargo(this);">{$tsJuego.j_description}</textarea>
                            </li>     
                            <li style="width: 290px;float: left;">
							<label>Opciones de Privacidad</label>                        
                            <div class="option clearbeta alin-op-fo" style="width: auto;">							
                                <input type="checkbox" tabindex="6" class="floatL" id="sin_comentarios" name="closed" {if $tsJuego.j_closed == 1}checked="true"{/if}/>
                                <p class="floatL">
                                    <label for="sin_comentarios" style="font-size: 12px;font-weight: 700;">Cerrar Comentarios</label>
                                    Si no quieres recibir comentarios en tu juego.
                                </p>
                            </div>
                            <div class="option clearbeta alin-op-fo" style="width: auto;">  
                                <input type="checkbox" tabindex="7" class="floatL" id="visitas" name="visitas" {if $tsJuego.j_visitas == 1}checked="true"{/if}/>							
                                <p class="floatL">
                                    <label for="visitas" style="font-size: 12px;font-weight: 700;">&Uacute;ltimos visitantes</label>
                                    Se mostrar&aacute;n los &uacute;ltimos visitantes del juego.
                                </p>
                            </div>
                            </li>
                            <li  style="width: 290px;float: left;">
                            <span style="display: none;" class="errormsg"></span>
                            <label>Categor&iacute;a</label>
                            <select name="cat" size="6" class="required" style="width: 250px;">
                            	<option>Selecciona la catego&iacute;a del juego</option>
                                {foreach from=$tsCategoria item=c}
                                <option value="{$c.cat_id}" {if $tsJuego.j_cat == $c.cat_id}selected="selected"{/if}>{$c.cat_title}</option>
                                {/foreach}
                            </select>
                            </li>
						{if $tsUser->is_admod > 0 && $tsAction == 'editar' && $tsJuego.j_user  != $tsUser->uid}
                                    <li style="clear:both;padding: 0 25px 25px 25px;">
                                    <label>Raz&oacute;n</label>
                                    <input type="text" tabindex="8" name="razon" maxlength="150" size="60" class="text-inp" value=""/>
                                    <span class="toup-ta">Si has modificado el contenido de este juego, ingresa la raz&oacute;n.</span>
                                    </li>
                        {/if}
                        <div class="clearbeta">
                        	<input type="button" onclick="juegos.agregar()" style="width: auto;margin: -20px 25px 25px 25px;" class="mBtn btnGreen" name="save" value="{if $tsAction == 'agregar'}Agregar Juego{else}Guardar cambios{/if}"/>
                        </div>
                        
            </ul>
    </form>
{/if}