                <div id="post-info">
                    <div>
							<div class="post-list-post" style="width:200px;height:125px"><div style="width:200px;height:125px;overflow:hidden;"> <img src="{if $tsPost.post_portada}{$tsPost.post_portada}{else}{$tsConfig.tema.t_url}/mega/error.png{/if}" class="portd" width="200" height="250" /></div></div>
								<div class="post-descripcion">
									<li class="titulo_post">{$tsPost.post_title}</li>
									<li class="descr" style="font-style: italic;"> Creado {$tsPost.post_date}  </li>
									<li class="descr"> <span>Seguidores:</span> {$tsPost.post_seguidores} </li>
									<li class="descr"> <span>Favoritos:</span> {$tsPost.post_favoritos}</li>
									<li class="descr"> <span>Puntos:</span> {$tsPost.post_puntos}</li>
									<li class="descr"> <span>Medallas:</span> {$tsPost.m_total} </li>
									<li class="descr"> <span>Categor&iacute;a: </span> <a href="{$tsConfig.url}/posts/{$tsPost.categoria.c_seo}/">{$tsPost.categoria.c_nombre}</a></li>
							
								</div>
						<div class="floatR" style="width: 440px;">
						<div class="tagsplus">
						<div class="tags-block">
                                {foreach from=$tsPost.post_tags key=i item=tag}
                                <a rel="tag" href="{$tsConfig.url}/buscador/?q={$tag|seo}&e=tags">{$tag}</a> {if $i < $tsPost.n_tags}{/if}
                                {/foreach}
                            </div>
                            </div>

						    </div>
                     </div>
				</div>