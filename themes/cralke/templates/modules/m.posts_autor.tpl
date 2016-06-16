                	<div class="post-autor vcard">
					<div class="">
					<div class="post-avatar">
                                <a href="{$tsConfig.url}/perfil/{$tsAutor.user_name}">
                                    <img title="Ver perfil de {$tsAutor.user_name}" alt="Ver perfil de {$tsAutor.user_name}" class="autor-op" src="{$tsConfig.url}/files/avatar/{$tsAutor.user_id}_120.jpg?{$smarty.now|date_format:"%Y%m%d%H%M%S"}"/>
                                </a>
								<img class="div-r" src="{$tsConfig.tema.t_url}/mega/g-right.png" />
								<li class="rango-post">{$tsAutor.rango.r_name}</li>
								<div style="display: block;margin-left: -4px;margin-top: -115px;">
                            <p><img src="{$tsConfig.default}/images/space.gif" class="qtip status-post {$tsAutor.status.css}s" title="{$tsAutor.status.t}"/></p>
                            <p><img src="{$tsConfig.default}/images/icons/ran/{$tsAutor.rango.r_image}" class="qtip" title="{$tsAutor.rango.r_name}" /></p>
                            <p><img src="{$tsConfig.default}/images/icons/{if $tsAutor.user_sexo == 0}female{else}male{/if}.png" class="qtip" title="{if $tsAutor.user_sexo == 0}Mujer{else}Hombre{/if}" /></p>
							<p> <img src="{$tsConfig.default}/images/flags/{$tsAutor.pais.icon}.png" class="qtip" style="padding:2px" title="{$tsAutor.pais.name}" /></p>
					</div>
							</div>
					</div>
                    	<div class="box_nicks">
                            	<a href="{$tsConfig.url}/perfil/{$tsAutor.user_name}" style="text-decoration:none">
								<span class="given-name" style="color: #4D4D4D;font-weight: bold;font-family: sans-serif;font-size: 13px;">{$tsAutor.user_name}</span>
							</a>
                        </div>
                        <div class="box_cuerpo">
                        	
                            {if !$tsUser->is_member}
                            <a class="btn_g_p follow_user_post" style="color:#FFF"  href="#" onclick="registro_load_form(); return false"><img src="{$tsConfig.tema.t_url}/mega/ojo.png" /> Seguir</a>
                            {elseif $tsAutor.user_id != $tsUser->uid}
                            <a class="btn_g_s unfollow_user_post" onclick="notifica.unfollow('user', {$tsAutor.user_id}, notifica.userInPostHandle, $(this).children('span'))" {if !$tsAutor.follow}style="display: none;"{/if}><img src="{$tsConfig.tema.t_url}/mega/ojo-d.png" />  Dejarlo</a>  
                            <a class="btn_g_p follow_user_post" onclick="notifica.follow('user', {$tsAutor.user_id}, notifica.userInPostHandle, $(this).children('span'))" {if $tsAutor.follow > 0}style="display: none;"{/if}><img src="{$tsConfig.tema.t_url}/mega/ojo.png" /> Seguir</a>
							<a class="btn_g_m msg" style="color:#FFF"  href="#" onclick="{if !$tsUser->is_member}registro_load_form();{else}mensaje.nuevo('{$tsAutor.user_name}','','','');{/if}return false"><img style="margin-top: 7px;position: absolute;" src="{$tsConfig.tema.t_url}/mega/mail.png" /> <span style="margin-left: 21px;">MP</span></a>
                             {/if}
                            <div style="margin: 8px -9px;" class="metadata-usuario">
                            	<li class="list-autor"><span class="list-num">{$tsAutor.user_seguidores}</span>
                                <span class="">Seguidores</span></li>
                                <li class="list-autor" style=""><span class="list-num">{$tsAutor.user_puntos}</span>
                                <span class="">Puntos</span></li>
                                <li class="list-autor"><span class="list-num">{$tsAutor.user_posts}</span>
                                <span class="">Posts</span></li>
                                <li style="border-bottom:1px solid #DEDEDE" class="list-autor" class=""><span class="list-num">{$tsAutor.user_comentarios}</span>
                                <span class="">Comentarios</span></li>
                            </div>
                            {if $tsUser->is_admod || $tsUser->permisos.modu || $tsUser->permisos.mosu}
                            <div class="metadata-usuario-post">
                                <a href="{$tsConfig.url}/moderacion/buscador/1/1/{$tsPost.post_ip}" class="" target="_blank"><img title="{$tsPost.post_ip}" class="her-post ips qtip" src="{$tsConfig.tema.t_url}/mega/ip.png" /</a>
                                {if $tsUser->is_admod == 1}<a href="{$tsConfig.url}/admin/users?act=show&amp;uid={$tsAutor.user_id}"><img class="her-post edits qtip" title="Editar Usuario" src="{$tsConfig.tema.t_url}/mega/edit.png" /></a>{/if}
                                {if $tsAutor.user_id != $tsUser->uid} <a class="" href="#" onclick="mod.users.action({$tsAutor.user_id}, 'aviso', false); return false;"><img title="Alertar Usuario" class="her-post alerts qtip" src="{$tsConfig.tema.t_url}/mega/alert.png" /></a>{/if}
                                {if $tsAutor.user_id != $tsUser->uid && $tsUser->is_admod || $tsUser->permisos.modu || $tsUser->permisos.mosu}
								{if $tsAutor.user_baneado}
                                {if $tsUser->is_admod || $tsUser->permisos.modu}<a href="#" onclick="mod.reboot({$tsAutor.user_id}, 'users', 'unban', false); $(this).remove(); return false;" class="her-post unbans"><img  title="Desbanear Usuario" class="her-post qtip" src="{$tsConfig.tema.t_url}/mega/off.png" /></a>{/if}
                                {else}
                                {if $tsUser->is_admod || $tsUser->permisos.mosu}<a href="#"  class="" onclick="mod.users.action({$tsAutor.user_id}, 'ban', false); $(this).remove(); return false;" style=""><img title="Banear Usuario" class="her-post bans qtip" src="{$tsConfig.tema.t_url}/mega/off.png" /></a>{/if}
                                {/if}
								{/if}
                            </div>
                            {/if}
                        </div>
						
						<br />
						<div class="categoriaList estadisticasList" {if $tsPost.m_total == 0} style="display:none;"{/if}>
                        <h6>Medallas</h6>
                         {if $tsPost.medallas}
						<ul style="margin-left:11px;">
							{foreach from=$tsPost.medallas item=m}
        			<img src="{$tsConfig.tema.t_url}/images/icons/med/{$m.m_image}_16.png" style="margin-left:1px;margin-bottom:2px;" class="qtip" title="{$m.m_title} - {$m.m_description}"/>
                            {/foreach}
                        </ul>
						{else}
						 <div class="emptyData">No tiene medallas</div>
                          {/if}
                    </div>

						{if $tsPost.visitas}
						<br />
						<div class="categoriaList estadisticasList">
                        <h6>&Uacute;ltimos visitantes</h6> 
						<ul style="margin-left:11px;">
							{foreach from=$tsPost.visitas item=v}
        			         <a href="{$tsConfig.url}/perfil/{$v.user_name}" class="hovercard" uid="{$v.user_id}" style="display:inline-block;"><img src="{$tsConfig.url}/files/avatar/{$v.user_id}_50.jpg" class="vctip" title="{$v.date|hace:true}" width="32" height="32"/></a> 
                            {/foreach}
                        </ul>
						</div>
                          {/if}

                    </div>