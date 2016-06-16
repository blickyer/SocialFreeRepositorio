                                <div class="boxy-title">
								   <h3>Control de Dinero</h3>
								</div>
								<div id="res" class="boxy-content" style="position:relative">
								{if !$tsDinero.datos}
								<div class="phpostAlfa">No hay posts con Dinero</div>
								{else}
								<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
									<thead>
										<th>T&iacute;tulo</th>
										<th>Autor</th>
										<th>Puntos</th>
										<th>Dinero</th>
										<th>Fecha</th>
										<th>IP</th>
										<th>Acciones</th>
									</thead>
									<tbody>
										{foreach from=$tsDinero.datos item=p}
										<tr>
											<td><a href="{$tsConfig.url}/posts/{$p.c_seo}/{$p.post_id}/{$p.post_title|seo}.html" target="_blank">{$p.post_title|truncate:30}</a></td>
											<td><a href="{$tsConfig.url}/perfil/{$p.user_name}" class="hovercard" uid="{$p.user_id}">{$p.user_name}</a></td>
											<td>{$p.post_puntos}</td>
											<td>$ {$p.x_dinero}</td>
											<td>{$p.post_date|hace}</td>
   										    <td>{$p.post_ip}</td>
											<td >
                                            <a href="{$tsConfig.url}/moderacion/dinero?uid={$p.user_id}&link={$p.post_id}"><img src="{$tsConfig.tema.t_url}/images/icons/yes.png" class=qtip title="Aprobar Dinero del Posts" /></a>&nbsp;
											&nbsp;<a href="{$tsConfig.url}/moderacion/dinero?uid={$p.user_id}&reac={$p.post_id}"><img src="{$tsConfig.tema.t_url}/images/icons/flag_black.png" class=qtip title="Rechazar dinero del Posts"/></a>
											</td>
										</tr>
										{/foreach}
									</tbody>
									<tfoot>
										<td colspan="7">P&aacute;ginas: {$tsDinero.pages}</td>
									</tfoot>
								</table>
								{/if}
                                </div>