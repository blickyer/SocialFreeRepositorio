				{if $tsFoto.f_status != 0 || $tsFoto.user_activo == 0}
                    <div class="emptyData">Esta foto no es visible{if $tsFoto.f_status == 1} por acumulaci&oacute;n de denuncias u orden administrativa{elseif $tsFoto.f_status == 2} porque est&aacute; eliminada{elseif $tsFoto.user_activo != 1} porque la cuenta del due&ntilde;o se encuentra desactivada{/if}, pero puedes verla porque eres {if $tsUser->is_admod == 1}administrador{elseif $tsUser->is_admod == 2}moderador{else}autorizado{/if}.</div><br />
				{/if}
                <div id="fg_centro" style="width: 600px; float: left; margin:0 7px">
				<div style="margin-bottom:5px" class="fotoAutor">
				 <div class="v_user">
                        <div class="avatar-box">
                            <a href="{$tsConfig.url}/perfil/{$tsFoto.user_name}"><img width="75px" src="{$tsConfig.url}/files/avatar/{$tsFoto.f_user}_120.jpg"/></a>
                        </div>
                        <div class="v_info">
                            <a href="{$tsConfig.url}/perfil/{$tsFoto.user_name}" class="user">{$tsFoto.user_name}<span class="icon-sex qtip" title="{if $tsFoto.user_sexo == 1}Hombre{else}Mujer{/if}"><img src="{$tsConfig.tema.t_url}/images/icons/{if $tsFoto.user_sexo == 0}fe{/if}male.png"/></a>
							</br><span style="color: #B5B5B5;font-size: 12px;"> {$tsFoto.r_name} </span>
                            <div class="links">
                                <li class="div-stats"><span style="background-image:url({$tsConfig.tema.t_url}/images/icons/ran/{$tsFoto.r_image});color:#{$tsFoto.r_color}"></span></li>
                                <li class="div-stats"><span style="background-image:url({$tsConfig.tema.t_url}/images/flags/{$tsFoto.user_pais.0|lower}.png);">{$tsFoto.user_pais.1}</span></li>
                                <li class="div-stats"><span style="background-image:url({$tsConfig.tema.t_url}/images/icons/photo.png);">{$tsFoto.user_fotos} Fotos</span></li>
                                <li class="div-stats"><span style="background-image:url({$tsConfig.tema.t_url}/images/icons/comment.png);">{$tsFoto.user_foto_comments} Comentarios</span></li>
                            </div>
                            {if $tsUser->uid != $tsFoto.f_user && $tsUser->is_member}
                            <div class="v_follow">
                                <a class="btn_g_s unfollow_user_post" onclick="notifica.unfollow('user', {$tsFoto.f_user}, notifica.userInPostHandle, $(this).children('span'))" {if $tsFoto.follow == 0}style="display: none;"{/if}><img src="{$tsConfig.tema.t_url}/mega/ojo-d.png" /> Dejar de seguir</a>
                                <a class="btn_g_p follow_user_post" onclick="notifica.follow('user', {$tsFoto.f_user}, notifica.userInPostHandle, $(this).children('span'))" {if $tsFoto.follow == 1}style="display: none;"{/if}><img src="{$tsConfig.tema.t_url}/mega/ojo.png" /> Seguir Usurio</a>
						        {if $tsUser->is_member && $tsUser->uid != $tsFoto.f_user}
								<a class="btn_g_m" style="color:#FFF;padding: 9px 8px 8px 8px;" href="#" onclick="mensaje.nuevo('{$tsFoto.user_name}','','',''); return false;">Enviar Mensaje</a>
								{/if}
							</div>
                            {/if}
                        </div>
                        <div class="clearBoth"></div>
                    </div>
				</div>
                <div class="foto">
                  <div id="imagen">
				  		<div class="foto-title">
						<span class="">{$tsFoto.f_title}</h2></span><strong style="float: right;font-size: 11px;">{$tsFoto.f_date|date_format:"%d/%m/%Y"}</strong> </div>
                        {if $tsFoto.f_user == $tsUser->uid || $tsUser->is_admod || $tsUser->permisos.moef || $tsUser->permisos.moedfo}
                        <div class="tools" style="margin-left:12px">
                        {if $tsFoto.f_status != 2 && ($tsUser->is_admod || $tsUser->permisos.moef || $tsFoto.f_user == $tsUser->uid)}<a href="#" onclick="{if $tsUser->uid == $tsFoto.f_user}fotos.borrar({$tsFoto.foto_id}, 'foto'); {else}mod.fotos.borrar({$tsFoto.foto_id}, 'foto');  {/if}return false;">
						  <img alt="Borrar" style="vertical-align: middle;" src="{$tsConfig.tema.t_url}/mega/close.png"/> Borrar</a>{/if}
                        {if $tsUser->is_admod || $tsUser->permisos.moedfo || $tsFoto.f_user == $tsUser->uid}<a href="#" onclick="location.href='{$tsConfig.url}/fotos/editar.php?id={$tsFoto.foto_id}'; return false">
						  <img alt="Editar" style="vertical-align: middle;" src="{$tsConfig.tema.t_url}/mega/edit.png"/> Editar</a>{/if}
                        </div>
                        {/if}
                        <img class="img" src="{$tsFoto.f_url}" />
                    </div>
                    <div class="clearBoth"></div>
                    <div class="fotos-descrp" style="word-wrap: break-word;">{$tsFoto.f_description|nl2br}</div>
                    <div style="border-top: 1px solid #E5E5E5;" class="infoPost">
						<!-- END RateBox -->
                        <div style="width:12%" class="rateBox foto_stats">
                  			<strong class="title">Positivos</strong>
                            <span class="color_green" id="votos_total_pos">{$tsFoto.f_votos_pos}</span>
                  		</div><!-- END RateBox -->
                        <div style="width:12%" class="rateBox foto_stats">
                  			<strong class="title">Negativos</strong>
                            <span class="color_red" id="votos_total_neg">{$tsFoto.f_votos_neg}</span>
                  		</div><!-- END RateBox -->
                  		<div style="width: 10%" class="metaBox foto_stats">
            	    		<strong class="title">Visitas</strong>
                  			<span style="background: #FFF;padding: 5px;display: block;font-size:11px">{$tsFoto.f_hits}</span>
                 		</div><!-- END Visitas -->												
						{if $tsUser->is_admod}						
						<div style="width: 14%;" class="metaBox foto_stats" >                 			
						<strong style="" class="title">IP</strong>                 			
						<span style="background: #FFF;padding: 5px;display: block;font-size:11px"><a href="{$tsConfig.url}/moderacion/buscador/1/1/{$tsFoto.f_ip}" class="geoip" target="_blank">{$tsFoto.f_ip}</a></span>                       
						</div>
						<!-- END Visitas -->						
						{/if}					
					<div style="width:12%" class="fo-actions floatR">
                            <div class="" style="display:block;padding: 5px;">
                    			<a title="Votar positivo" class="fotos-plus" href="#" style="color:#FFF" onclick="fotos.votar('pos'); return false;">&#43;1</a>
                    			<a title="Votar negativo" class="fotos-minus" href="#" style="color:#FFF" onclick="fotos.votar('neg'); return false;">&#45;1</a>
                    		</div>
                  		</div>

                  		<div class="clearBoth"></div>
 	                </div>
                </div>
                <div class="bajo" style="margin-top:5px">
                    <div class="comments">
                        <div class="comentarios-title">
                            <h4 class="titulorespuestas floatL"><span id="ncomments">{$tsFoto.f_comments}</span> Comentarios</h4>
				           <div class="clearfix"></div>
                        </div>
                        <div id="mensajes">
                            {if $tsFComments}
                            {foreach from=$tsFComments item=c}
                            <div class="item" id="div_cmnt_{$c.cid}">
							  <div class="avatar-box">
                                <a href="{$tsConfig.url}/perfil/{$c.user_name}">
                                    <img src="{$tsConfig.url}/files/avatar/{$c.c_user}_50.jpg" style="position: relative; z-index: 1; display: inline;" width="50" height="50" class="floatL"/>
                                </a>
								    </div>
                                <div class="firma">
                                    <div style="display: block;z-index:1;" class="options">
                                        {if $tsFoto.f_user == $tsUser->info.user_id || $tsUser->is_admod || $tsUser->permisos.moecf}
                                        <a href="#" onclick="fotos.borrar({$c.cid}, 'com'); return false" class="floatR icon-delete">
                            			  <img title="Borrar Comentario" alt="borrar" src="{$tsConfig.tema.t_url}/mega/closes.png"/>
                                        </a>
                                        {/if}
                                    </div>
                                    
									<div class="bordes-ge" style="float: left;margin-left: -5px;">
									<div class="comment-box" id="pp_{$c.cid}" style="width: 532px;" >
										<div class="comment-info clearbeta">
									<a href="{$tsConfig.url}/fotos/{$c.user_name}" style="font-size: 14px;color: #4AAAD0;">@{$c.user_name}</a> <span style="color: #228DB8;"> {$c.c_date|date_format:"%d/%m/%Y"} {if $tsUser->is_admod}(<span style="color:red;">IP:</span> <a href="{$tsConfig.url}/moderacion/buscador/1/1/{$c.c_ip}" class="geoip" target="_blank">{$c.c_ip}</a>){/if} dijo:</span>
									</div>
                                    
									{if !$c.user_activo}<div>Escondido por pertener a una cuenta desactivada
									
									<a href="#" onclick="$('#hdn_{$c.cid}').slideDown(); $(this).parent().slideUp(); return false;">Click para verlo</a>.</div>
                                            
											<div id="hdn_{$c.cid}" style="display:none">{/if} 
                                            
											<div class="comment-content">{$c.c_body|nl2br}</div>
                                            
											{if !$c.user_activo}</div>{/if}
											
                                </div></div></div>
                                <div class="clearBoth"></div>
                            </div>
                            {/foreach}
                            {elseif $tsFoto.f_closed == 0 && ($tsUser->is_admod || $tsUser->permisos.gopcf)}
                            <div id="no-comments">Esta foto no tiene comentarios, Se el primero!.</div>
                            {/if}
                        </div>
						{if $tsUser->is_admod == 0 && $tsUser->permisos.gopcf == false}
						<div id="no-comments">No tienes permiso para comentar.</div>
                        {elseif $tsFoto.f_closed == 1}
                        <div id="no-comments">La foto se encuentra cerrada y no se permiten comentarios.</div>
                        {elseif $tsUser->is_member}
                        <div class="form">
                            <div class="avatar-box">
								<img width="50" height="50" title="Avatar de {$c.user_name} en {$tsConfig.titulo}" src="{$tsConfig.url}/files/avatar/{$tsUser->uid}_50.jpg" class="" style="position: relative; z-index: 1; display: inline;">
                            </div>
                            <form method="post" action="" name="firmar">
                                <label for="mensaje" style="font-size: 12px;background: whiteSmoke;padding: 8px;font-family: sans-serif;color: #8B8B8B;border: 1px solid #ddd;display: block;"><b>Mensaje</b></label>
                                <div class="error"></div>
                                <textarea name="mensaje" id="mensaje" rows="2" class="onblur_effect autorow" style="padding: 8px 5px;width:498px;border-top: none;margin: 0px 0 5px 0px; min-height:36px; max-height:160px" title="Escribe un mensaje." onblur="onblur_input(this)" onfocus="onfocus_input(this)">Escribe un mensaje.</textarea>
                                <input type="hidden" name="auser_post" value="{$tsFoto.f_user}" />
                                <input type="button" id="btnComment" class="mBtn btnOk" value="Comentar" onclick="fotos.comentar()" />
                            </form>
                            <div class="clearBoth"></div>
                        </div>
                        {else}
                        <div class="emptyData">Para poder comentar necesitas estar <a onclick="registro_load_form(); return false" href="">Registrado.</a> O.. ya tienes usuario? <a onclick="open_login_box('open')" href="#">Logueate!</a></div>
                        {/if}
                    </div>
                </div>
                </div>
