					<div style="margin-top:10px" id="webStats">
                        <div class="wMod clearbeta">
                            <div class="box_cuerpo">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                	<td style="text-align:center;color:#cf671c;"><span class="qtip" title="R&eacute;cord conectados: {$tsStats.stats_max_online} {$tsStats.stats_max_time|fecha}"><span style="padding: 3px 9px;background:#F9F9F9;color: #cf671c;border-radius:5px;border:1px solid #BDBDBD;"><a class="usuarios_online" href="{$tsConfig.url}/usuarios/?online=true" style="color: #16a5dd">{$tsStats.stats_online}</span> </span></a>Online
        	                        <span class="stats-mega"><a style="color:#16a5dd" href="{$tsConfig.url}/usuarios/">{$tsStats.stats_miembros}</span> </a>Miembros
                                    {foreach from=$tsUlt  item=m}
                                    <span class="stats-mega"><a class="hovercard" uid="{$m.user_id}" style="color:#16a5dd" href="{$tsConfig.url}/perfil/{$m.user_name}">@{$m.user_name}</span> {/foreach}</a>Ultimo Registrado
        	                        <span class="stats-mega">{$tsStats.stats_posts}</span> Posts
            	                    <span class="stats-mega">{$tsStats.stats_comments}</span> Comentarios
        	                        <span class="stats-mega">{$tsStats.stats_fotos}</span> Fotos
            	                    <span class="stats-mega">{$tsStats.stats_foto_comments}</span> Comentarios en fotos
								</td></tr>
                            </table>
                            </div>
                        </div>
                    </div>