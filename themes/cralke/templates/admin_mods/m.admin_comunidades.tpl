                                <div class="boxy-title">
									<h3>Administrar {if $tsAct == ''}Comunidades{elseif $tsAct == 'temas'}temas de {$tsAdminTemas.c_nombre}{/if}</h3>
								</div>
								<div id="res" class="boxy-content" style="position:relative">
                                {if $tsAct == ''}
                                    {if $tsAdminComus.data}
                                    <table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
                                        <thead>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Corto</th>
                                            <th>Autor</th>
                                            <th>Fecha</th>
                                            <th>Temas</th>
                                            <th>Miembros</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </thead>
                                        <tbody>
                                            {foreach from=$tsAdminComus.data item=c}
                                            <tr>
                                                <td>{$c.c_id}</td>
                                                <td align="left"><a href="{$tsConfig.url}/comunidades/{$c.c_nombre_corto}/" title="{$c.c_nombre}" target="_blank">{$c.c_nombre|truncate:20}</a></td>
                                                <td>{$c.c_nombre_corto}</td>
                                                <td><a href="{$tsConfig.url}/perfil/{$c.user_name}/" class="hovercard" uid="{$c.c_autor}">{$c.user_name}</a></td>
                                                <td>{$c.c_fecha|hace}</td>
                                                <td>{$c.c_temas}</td>
                                                <td>{$c.c_miembros}</td>
                                                <td>{if $c.c_estado == 0}<font color="green">Activada</font>{else}<font color="red">Oculta</font>{/if}</td>
                                                <td class="admin_actions">
                                                    <a href="{$tsConfig.url}/admin/comunidades?act=temas&comid={$c.c_id}"><img src="{$tsConfig.default}/images/icons/details.png" width="14px" height="14px" title="Ver temas" /></a>
                                                    <a href="{$tsConfig.url}/comunidades/{$c.c_nombre_corto}/editar/"><img src="{$tsConfig.default}/images/icons/editar.png" title="Editar Comunidad" /></a>
                                                </td>
                                            </tr>
                                            {/foreach}
                                        </tbody>
                                        <tfoot>
                                            <td colspan="9">P&aacute;ginas: {$tsAdminComus.pages}</td>
                                        </tfoot>
                                    </table>
                                    {else}
                                    <div class="phpostAlfa">No hay comunidades</div>								
                                    {/if}
                                {elseif $tsAct == 'temas'}
                                	{if $tsAdminTemas.data}
                                    <table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
                                        <thead>
                                            <th>ID</th>
                                            <th>Titulo</th>
                                            <th>Autor</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                            <th>IP</th>
                                            <th>Acciones</th>
                                        </thead>
                                        <tbody>
                                            {foreach from=$tsAdminTemas.data item=t}
                                            <tr id="comid_{$c.c_id}">
                                                <td>{$t.t_id}</td>
                                                <td align="left"><a href="{$tsConfig.url}/comunidades/{$t.c_nombre_corto}/{$t.t_id}/{$t.t_titulo|seo}.html" title="{$t.t_titulo}" target="_blank">{$t.t_titulo|truncate:20}</a></td>
                                                <td><a href="{$tsConfig.url}/perfil/{$t.user_name}/" class="hovercard" uid="{$t.t_autor}">{$t.user_name}</a></td>
                                                <td>{$t.t_fecha|hace}</td>
                                                <td>{if $t.t_estado == 0}<font color="green">Activado</font>{else}<font color="red">Oculto</font>{/if}</td>
                                                <td><a href="{$tsConfig.url}/moderacion/buscador/1/1/{$t.t_ip}" class="geoip" target="_blank">{$t.t_ip}</a></td>
                                                <td class="admin_actions">
                                                    <a href="{$tsConfig.url}/comunidades/{$t.c_nombre_corto}/editar-tema/{$t.t_id}/" target="_blank"><img src="{$tsConfig.default}/images/icons/editar.png" title="Editar Tema" /></a>
                                                </td>
                                            </tr>
                                            {/foreach}
                                        </tbody>
                                        <tfoot>
                                            <td colspan="8">P&aacute;ginas: {$tsAdminTemas.pages}</td>
                                        </tfoot>
                                    </table>
                                    {else}
                                    <div class="phpostAlfa">No hay temas en esta comunidad</div>								
                                    {/if}
                                {/if}
								</div>