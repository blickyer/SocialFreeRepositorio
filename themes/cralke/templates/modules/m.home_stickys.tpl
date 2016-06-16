                    {if $tsPostsStickys}
					<div class="bordes-ge" style="margin-bottom: 12px;">
					<div id="lastFotos" class="wMod clearbeta" style="margin-bottom: 0;">
                	<div class="header">
                    	<div class="wMod-h">Posts importantes en {$tsConfig.titulo}</div>
                       </div>
                    <div style="padding:0;margin-top: -5px;text-align:center;position:relative;overflow: hidden;">
                        <ul>
                        	{foreach from=$tsPostsStickys item=p}
                            <li {if $p.post_status == 3}style="background-color:#f1f1f1;"{elseif $p.post_status == 1}style="background-color:coral;"{elseif $p.post_status == 2}style="background-color:rosyBrown;"{elseif $p.user_activo == 0}style="background-color:burlyWood;"{elseif $p.user_baneado == 1}style="background-color:orange;"{/if} class="categoriaPost sticky{if $p.post_sponsored == 1} patrocinado{/if}">
                            <a {if $p.post_status == 3}class="qtip" title="El post est&aacute; en revisi&oacute;n"{elseif $p.post_status == 1}class="qtip" title="El post se encuentra en revisi&oacute;n por acumulaci&oacute;n de denuncias"{elseif $p.post_status == 2}class="qtip" title="El post est&aacute; eliminado"{elseif $p.user_activo == 0}class="qtip" title="La cuenta del usuario est&aacute; desactivada"{/if}  href="{$tsConfig.url}/posts/{$p.c_seo}/{$p.post_id}/{$p.post_title|seo}.html" style="" title="{$p.post_title}" target="_self" class="title"><img width="45" height="45" class="stycky-s" style="margin-top: -16px;float: left;position: relative;" class="Importante" title="{$p.post_title}" src="{if $p.post_portada}{$p.post_portada}{else}{$tsConfig.tema.t_url}/mega/error.png{/if}"/><span style="padding-left: 4px;">{$p.post_title|truncate:29}</span></a>
							<!-- Quitar el comentario para activar la imagen de usuario <img width="32" style="margin-top: -31px;border: 1px solid #CCC;padding: 1px;float: right;position: relative;" class="qtip" title="{$p.user_name}" src="{$tsConfig.url}/files/avatar/{$p.user_id}_120.jpg"/> -->
                            </li>
                            {/foreach}
                        </ul>
                    </div>
                    </div>
                    </div>
                    {/if}