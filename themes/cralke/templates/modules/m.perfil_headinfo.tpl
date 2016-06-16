                <div class="perfil-user clearfix">
                    <div class="perfil-box clearfix">
                        <div class="perfil-data">
                        {if $tsInfo.p_fondoper != ''}
                        <div class="perfil-avatar2">
                        <a href="{$tsConfig.url}/perfil/{$tsInfo.nick}"><img alt="" src="{$tsConfig.url}/files/avatar/{if $tsInfo.p_avatar}{$tsInfo.uid}_120{else}avatar{/if}.jpg?{$smarty.now|date_format:"%Y%m%d%H%M%S"}"/></a>
                        </div>
                        {else}
                                                 <div class="perfil-avatar">
                        <a href="{$tsConfig.url}/perfil/{$tsInfo.nick}"><img alt="" src="{$tsConfig.url}/files/avatar/{if $tsInfo.p_avatar}{$tsInfo.uid}_120{else}avatar{/if}.jpg?{$smarty.now|date_format:"%Y%m%d%H%M%S"}"/></a>
                        </div>
                        {/if}
                            <div class="perfil-info">
                                <h1 class="nick">{$tsInfo.nick}</h1>
                                <span class="PI_rango" style="color:#{$tsInfo.stats.r_color};text-shadow:#{$tsInfo.stats.r_color} 1px 1px 10px">{$tsInfo.stats.r_name}</span>
                                <span class="frase-personal">{if $tsInfo.p_mensaje}"{$tsInfo.p_mensaje}"{/if}</span>
                                <span class="bio">{if $tsInfo.p_nombre != ''}{$tsInfo.p_nombre} es {else}Es {/if}{if $tsInfo.user_sexo == 1}un hombre{else}una mujer{/if}. Vive en <span id="info_pais">{$tsInfo.user_pais}</span> y se uni&oacute; a la familia de {$tsConfig.titulo} el {$tsInfo.user_registro|fecha:true}. {if $tsInfo.p_empresa}Trabaja en {$tsInfo.p_empresa}{/if}</span>                                
                                <div class="P_boton">                                
                                {if $tsUser->uid != $tsInfo.uid && $tsUser->is_member}
                                <a class="btn_g unfollow_user_post qtip" title="Dejar de seguir" onclick="notifica.unfollow('user', {$tsInfo.uid}, notifica.userInPostHandle, $(this).children('span'))" {if $tsInfo.follow == 0}style="display: none;"{/if}><span class="icons unfollow"></span></a>
                                <a class="btn_g follow_user_post qtip" title="Seguir Usuario" onclick="notifica.follow('user', {$tsInfo.uid}, notifica.userInPostHandle, $(this).children('span'))" {if $tsInfo.follow == 1}style="display: none;"{/if}><span class="icons follow"></span></a>
                                <a class="btn_g qtip" title="Mensaje Privado" href="#" onclick="mensaje.nuevo('{$tsInfo.nick}','','',''); return false"><span class="multiicons fotoMensaje"></span></a>
                                {/if}
                                {if $tsInfo.p_socials.f}  
                                <a target="_blank" href="http://www.facebook.com/{$tsInfo.p_socials.f}" title="Facebook" class="sharer-button facebook qtip"></a>
                                {/if}  
                                {if $tsInfo.p_socials.t}
                                <a target="_blank" href="http://www.twitter.com/{$tsInfo.p_socials.t}" title="Twitter" class="sharer-button twitter qtip"></a>
                                {/if}
                                 {if $tsInfo.p_socials.yt}
                                <a target="_blank" href="http://www.youtube.com/channel/{$tsInfo.p_socials.yt}" title="Canal de YouTube" class="sharer-button youtuber qtip"></a>
                                {/if}
                                {if $tsInfo.p_steam}
                                <a target="_blank" href="http://steamcommunity.com/id/{$tsInfo.p_steam}" title="Steam" class="sharer-button steam qtip"></a> 
                                {/if}
                                {if $tsInfo.p_skype}
                                <a target="_blank" href="skype:{$tsInfo.p_skype}?call" title="Llamar con Skype" class="sharer-button skype qtip"></a>
                                {/if}                                    
                                {if $tsUser->is_admod == 1}
                                <a href="#" class="btn_g qtip" onclick="location.href = '{$tsConfig.url}/admin/users?act=show&amp;uid={$tsInfo.uid}'" title="Editar a {$tsInfo.nick}"><span class="multiicons perfilEditar"></span></a>
                                {/if}
                               </div>
                                <br />
                            </div>
                        </div>
                        <div class="user-level">
                            <ul class="clearfix">
                                                        <li>
                                    <strong>{$tsInfo.stats.user_puntos}</strong>
                                    <span>Puntos</span>
                                </li>
                                <li>
                                    <strong>{$tsInfo.stats.user_posts}</strong>
                                    <span>Posts</span>
                                </li>
                                <li>
                                    <strong>{$tsInfo.stats.user_comentarios}</strong>
                                    <span>Comentarios</span>
                                </li>
  
                                <li>
                                    <strong>{$tsInfo.visitas_total}</strong>
                                    <span>Visitas</span>
                                </li>
                                <li>
                                    <strong>{$tsInfo.stats.user_seguidores}</strong>
                                    <span>Seguidores</span>
                                </li>
                              <li>
                                    <strong>{$tsInfo.user_referidos}</strong>
                                    <span>Referidos</span>
                                </li>
                                <li id="xdin">
<strong>${if $tsInfo.stats.x_dinero!=''}{$tsInfo.stats.x_dinero}{else}0{/if}</strong>
<span>Dinero Acumulado</span>
</li>
<li id="xdin">
<strong>${$tsInfo.stats.dinok}</strong>
<span>Dinero Pagado</span>
</li>
                
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="menu-tabs-perfil clearfix">
                        <ul id="tabs_menu">
                            <li><a style="height: 42px;padding: 0;border-left: 0;"></a></li>
                            {if $tsType == 'news' || $tsType == 'story'}
                            <li class="selected"><a href="#" onclick="perfil.load_tab('news', this); return false">{if $tsType == 'story'}Publicaci&oacute;n{else}Noticias{/if}</a></li>
                            {/if}
                            <li {if $tsType == 'wall'}class="selected"{/if}><a href="#" onclick="perfil.load_tab('wall', this); return false">Muro</a></li>
                            <li><a href="#" onclick="perfil.load_tab('actividad', this); return false" id="actividad">Actividad</a></li>
                            <li><a href="#" onclick="perfil.load_tab('info', this); return false" id="informacion">Informaci&oacute;n</a></li>
                            <li><a href="#" onclick="perfil.load_tab('posts', this); return false">Posts</a></li>
                            <li><a href="#" onclick="perfil.load_tab('seguidores', this); return false" id="seguidores">Seguidores</a></li>
                            <li><a href="#" onclick="perfil.load_tab('siguiendo', this); return false" id="siguiendo">Siguiendo</a></li>
                            <li><a href="#" onclick="perfil.load_tab('medallas', this); return false">Medallas</a></li>
                            {if $tsUser->is_member}
                            <li class="red"><a href="javascript:bloquear({$tsInfo.uid}, {if $tsInfo.block.bid}false{else}true{/if}, 'perfil')" id="bloquear_cambiar">{if $tsInfo.block.bid}Desbloquear{else}Bloquear{/if}</a></li>
                            <li class="red"><a href="#" onclick="denuncia.nueva('usuario',{$tsInfo.uid}, '', '{$tsInfo.nick}'); return false">Denunciar</a></li>
                            {if ($tsUser->is_admod || $tsUser->permisos.mosu) && !$tsInfo.user_baneado}
                            <li class="red"><a href="#" onclick="mod.users.action({$tsInfo.uid}, 'ban', true); return false;">Suspender</a></li>
                            {/if}
                            {/if}
                        </ul>
                    </div>