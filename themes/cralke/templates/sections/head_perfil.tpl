		<div class="perfil_nvg">
        	<div>
                <ul class="floatL">
                    <li><a href="#" onclick="perfil.load_tab('wall', this); return false">Muro</a></li>
                    <li><a href="#" onclick="perfil.load_tab('actividad', this); return false" id="actividad">Actividad</a></li>
                    <li><a href="#" onclick="perfil.load_tab('info', this); return false" id="informacion">Informaci&oacute;n</a></li>
                    <li><a href="#" onclick="perfil.load_tab('posts', this); return false">Posts</a></li>
                    <li><a href="#" onclick="perfil.load_tab('seguidores', this); return false" id="seguidores">Seguidores</a></li>
                    <li><a href="#" onclick="perfil.load_tab('siguiendo', this); return false" id="siguiendo">Siguiendo</a></li>
                    <li><a href="#" onclick="perfil.load_tab('medallas', this); return false">Medallas</a></li>
                    <div class="clearBoth"></div>
                </ul>
				{if $tsUser->uid != $tsInfo.uid && $tsUser->is_member}
				<ul class="floatR">
				 <a href="#" onclick="denuncia.nueva('usuario',{$tsInfo.uid}, '', '{$tsInfo.nick}'); return false"><img src="{$tsConfig.tema.t_url}/images/icons/warning.png" /></a>
				  {if ($tsUser->is_admod || $tsUser->permisos.mosu) && !$tsInfo.user_baneado}<a href="#" onclick="mod.users.action({$tsInfo.uid}, 'ban', true); return false;"><img src="{$tsConfig.tema.t_url}/images/icons/exclamation.png" /></a>{/if}
				  {if !$tsInfo.user_activo || $tsInfo.user_baneado}<span style="background-color:#CE152E;">Cuenta {if !$tsInfo.user_activo}desactivada{else}baneada{/if}</span>{/if}
				 <a href="javascript:bloquear({$tsInfo.uid}, {if $tsInfo.block.bid}false{else}true{/if}, 'perfil')" id="bloquear_cambiar">{if $tsInfo.block.bid}<img src="{$tsConfig.tema.t_url}/images/icons/power_on.png" />{else}<img src="{$tsConfig.tema.t_url}/images/icons/power_off.png" />{/if}</a>
				{if $tsUser->uid != $tsInfo.uid && $tsUser->is_member}
                                <div style="padding-left:8px;margin-top: -1px;display:block;float:right"><a class="btn_g_s  unfollow_user_post auxi" onclick="notifica.unfollow('user', {$tsInfo.uid}, notifica.userInPostHandle, $(this).children('span'))" {if $tsInfo.follow == 0}style="display: none;"{/if}><img style="border:none" src="http://localhost/themes/go_anime/mega-icons/ojo-d.png"> </span></a>
                                <a class="btn_g_p follow_user_post auxi" onclick="notifica.follow('user', {$tsInfo.uid}, notifica.userInPostHandle, $(this).children('span'))" {if $tsInfo.follow == 1}style="display: none;"{/if}><img style="border:none" src="http://localhost/themes/go_anime/mega-icons/ojo.png"></span></a>
                                </div>{/if}{/if}
								</ul>
            </div>
        </div>