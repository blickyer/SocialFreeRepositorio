{include file='sections/main_header.tpl'}
				<script>$('#cuerpocontainer').addClass('clearfix');</script>
            	<link href="{$tsConfig.default}/css/fotos.css" rel="stylesheet" type="text/css" />
				<div style="width: 630px; float: left;" id="centroDerecha" class="clearfix">
                	<div>
                        <h2 style="font-size: 15px;">Finalizar registro</h2>
                    </div>
                    <form autocomplete="off" class="form-add-post" id="foto_form" action="" method="post" name="steam_login">
	                    <div class="fade_out">
	                        <ul class="clearbeta">
	                            <li>
		                            <label for="email">Email</label>
		                            <span class="errormsg" style="display: none;"></span>
		                            <input type="email" value="" class="text-inp required" maxlength="200" id="email" name="email" tabindex="2">
	                            </li>
	                            <li>
		                            <label for="password">Contrase&ntilde;a</label>
		                            <span class="errormsg" style="display: none;"></span>
		                            <input type="password" value="" class="text-inp required" maxlength="200" id="password" name="password" tabindex="2">
		                        </li>                        
	                            <li>
									<label for="sexo">Sexo</label>
									<input type="radio" title="Selecciona tu género" autocomplete="off" onfocus="registro.focus(this)" onblur="registro.blur(this)" value="1" name="sexo" tabindex="8" id="sexo_m" class="radio"> <label for="sexo_m" class="list-label" style="display:inline;">Masculino</label>
									<input type="radio" title="Selecciona tu género" autocomplete="off" onfocus="registro.focus(this)" onblur="registro.blur(this)" value="0" name="sexo" tabindex="8" id="sexo_f" class="radio"> <label for="sexo_f" class="list-label" style="display:inline;">Femenino</label>
								</li>
	                            <li>
			                        <label for="gender">Fecha de nacimiento</label>
			                        <select title="Ingrese dÃ­a de nacimiento" autocomplete="off" onfocus="registro.focus(this)" onblur="registro.blur(this)" tabindex="5" name="day" id="day">
			             				<option value="">Día</option>
							            {section name=dias start=1 loop=32}
							                <option value="{$smarty.section.dias.index}">{$smarty.section.dias.index}</option>
							            {/section}
			            			</select>
			                        <select title="Ingrese mes de nacimiento" autocomplete="off" onfocus="registro.focus(this)" onblur="registro.blur(this)" tabindex="6" name="month" id="month">
										<option value="">Mes</option>
						            {foreach from=$tsMeces key=mid item=mes}
						                <option value="{$mid}">{$mes}</option>
						            {/foreach}	
						            </select>
							       	<select title="Ingrese año de nacimiento" autocomplete="off" onfocus="registro.focus(this)" onblur="registro.blur(this)" tabindex="7" name="year" id="year">
										<option value="">Año</option>
							        {section name=year start=$tsEndY loop=$tsEndY step=-1 max=$tsMax}
							               <option value="{$smarty.section.year.index}">{$smarty.section.year.index}</option>
							        {/section}
							        </select>
	                            </li>
	                        </ul>
							 <div class="end-form clearbeta">
	                        	<input type="submit" value="Registrarme" name="new" class="mBtn btnGreen" style="width: auto; margin-left: 5px;">
	                        </div>
	                    </div>
                    </form>
                </div>
                <div style="width: 300px; float: right; margin-top:37px" id="post-izquierda">
                    <div class="categoriaList">
                        <h6>Sugerencias</h6>
                        <ul>
                            <li>Utliza una contrase&ntilde;a segura</li>
                            <li>Utiliza un nombre de usuario f&aacute;cil de recordar</li>
                        </ul>
                    </div>
                    <center>{$tsConfig.ads_300}</center>
                </div>
{include file='sections/main_footer.tpl'}