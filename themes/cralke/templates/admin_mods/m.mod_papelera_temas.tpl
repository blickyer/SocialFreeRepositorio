                                <div class="boxy-title">
								   <h3>Temas en la papelera</h3>
								</div>
								<div id="res" class="boxy-content" style="position:relative">
								{if !$tsTempelera.datos}
								<div class="phpostAlfa">No hay temas eliminados</div>
								{else}
								<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
									<thead>
										<th>T&iacute;tulo</th>
										<th>Autor</th>
										<th>Moderador</th>
										<th>Raz&oacute;n</th>
										<th>Fecha</th>
									</thead>
									<tbody>
										{foreach from=$tsTempelera.datos item=t}
										<tr id="report_{$t.t_id}">
											<td><a href="{$tsConfig.url}/comunidades/{$t.c_nombre_corto}/{$t.t_id}/{$t.t_titulo|seo}.html" target="_blank">{$t.t_titulo|truncate:30}</a></td>
											<td><a href="{$tsConfig.url}/perfil/{$t.user_name}" class="hovercard" uid="{$t.user_id}">{$t.user_name}</a></td>
											<td><a href="{$tsConfig.url}/perfil/{$t.mod_name}" class="hovercard" uid="{$t.h_mod}">{$t.mod_name}</a></td>
											<td>{if !$t.h_razon}Indefinida{else}{$t.h_razon}{/if}</td>
											<td>{$t.h_date|hace:true}</td>
										</tr>
										{/foreach}
									</tbody>
									<tfoot>
										<td colspan="7">P&aacute;ginas: {$tsTempelera.pages}</td>
									</tfoot>
								</table>
								{/if}
                                </div>