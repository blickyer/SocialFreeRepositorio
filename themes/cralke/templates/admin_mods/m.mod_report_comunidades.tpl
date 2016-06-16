                                <div class="boxy-title">
                                    <h3>Moderaci&oacute;n de comunidades</h3>
                                </div>
                                <div id="res" class="boxy-content">
                                {if $tsSave}<div style="display: block;" class="mensajes ok">Tus cambios han sido guardados.</div>{/if}
                                	{if $tsAct == ''}
                                    <b>Solo los administradores</b> podr&aacute; editar o borrar una comunidad.
                                    <hr class="separator" />
                                    <table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
                                    	<thead>
                                        	<th>Denuncias</th>
                                            <th>Comunidad</th>
                                            <th>Fecha</th>
                                            <th>Raz&oacute;n</th>
                                            <th>Acciones</th>
                                        </thead>
                                        <tbody>
                                        	{if $tsReports}{foreach from=$tsReports item=r}
                                            <tr id="report_{$r.c_id}">
                                            	<td>{$r.total}</td>
                                                <td><a href="{$tsConfig.url}/comunidades/{$r.c_nombre_corto}/" target="_blank">{$r.c_nombre|truncate:30}</a></td>
                                                <td>{$r.d_date|hace:true}</td>
                                                <td>{$tsDenuncias[$r.d_razon]}</td>
                                                <td class="admin_actions">
                                                    <a href="{$tsConfig.url}/moderacion/comunidades?act=info&obj={$r.c_id}"><img src="{$tsConfig.default}/images/icons/details.png" title="Ver Detalles" /></a>
                                                    {if $tsUser->is_admod}<a href="#" onclick="mod.reboot({$r.c_id}, 'comunidades', 'reboot', false); return false;"><img src="{$tsConfig.default}/images/icons/reboot.png" title="{if $r.c_estado == 1}Reactivar Comunidad{else}Desechar denuncias{/if}" /></a>{/if}
                                                    {if $tsUser->is_admod == 1}<a href="{$tsConfig.url}/comunidades/{$r.c_nombre_corto}/editar/" target="_blank"><img src="{$tsConfig.default}/images/icons/edit.png" title="Editar Comunidad" /></a>{/if}
                                                    {if $tsUser->is_admod == 1}<a href="#" onclick="mod.comunidades.borrar({$r.c_id}); return false"><img src="{$tsConfig.default}/images/icons/close.png" title="Borrar Comunidad" /></a>{/if}
                                                </td>
                                            </tr>
                                            {/foreach}{else}
                                            <tr>
                                                <td colspan="5"><div class="emptyData">No hay comunidades denunciadas hasta el momento.</div></td>
                                            </tr>
                                            {/if}
                                        </tbody>
                                        <tfoot>
                                            <th colspan="5">&nbsp;</th>
                                        </tfoot>
                                    </table>
                                    {elseif $tsAct == 'info'}
                                    <h2 style="border-bottom:1px dashed #CCC; padding-bottom:5px;">
                                        <a href="{$tsConfig.url}/comunidades/{$tsDenuncia.c_nombre_corto}/" target="_blank">{$tsDenuncia.data.c_nombre}</a> de <a href="{$tsConfig.url}/perfil/{$tsDenuncia.data.user_name}">{$tsDenuncia.data.user_name}</a> 
                                        <span class="floatR admin_actions">
                                            {if $tsUser->is_admod}<a href="#" onclick="mod.reboot({$tsDenuncia.data.c_id}, 'comunidades', 'reboot', true); return false"><img src="{$tsConfig.default}/images/icons/reboot.png" title="{if $tsDenuncia.data.c_estado == 1}Reactivar Comunidad{else}Desechar denuncias{/if}" /></a>{/if}
                                            {if $tsUser->is_admod == 1}<a href="{$tsConfig.url}/comunidades/{$tsDenuncia.data.c_nombre_corto}/editar/" target="_blank"><img src="{$tsConfig.default}/images/icons/edit.png" title="Editar Comunidad" /></a>{/if}
                                            {if $tsUser->is_admod == 1}<a href="#" onclick="mod.comunidades.borrar({$tsDenuncia.data.c_id}); return false"><img src="{$tsConfig.default}/images/icons/close.png" title="Borrar Comunidad" /></a>{/if}
                                        </span>
                                    </h2>
                                    <table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
                                    	<thead>
                                        	<th>Denunciante</th>
                                            <th>Raz&oacute;n</th>
                                            <th>Informaci&oacute;n extra</th>
                                            <th>Fecha</th>
                                        </thead>
                                        <tbody>
                                        	{foreach from=$tsDenuncia.denun item=d}
                                            <tr>
                                            	<td><a href="{$tsConfig.url}/perfil/{$d.user_name}">{$d.user_name}</a></td>
                                                <td>{$tsDenuncias[$d.d_razon]}</td>
                                                <td>{$d.d_extra}</td>
                                                <td>{$d.d_date|hace:true}</td>
                                            </tr>
                                            {/foreach}
                                        </tbody>
                                        <tfoot>
                                            <th colspan="5">&nbsp;</th>
                                        </tfoot>
                                    </table>
                                    {/if}
                                </div>