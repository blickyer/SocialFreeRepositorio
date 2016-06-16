                <style>
                /*{literal}*/
                .fotos-detail li{
                    width:305px;
                }
				.fotos-detail li {
				margin: 0px 4px;
				}
                .paginadorCom{
                    width:100%!important;
                }
                /*{/literal}*/
                </style>
                <div id="album" style="width: 100%;">
                	<div class="title-w clearfix">
					<div class="bordes-fotos"><div class="last-picks">{if $tsFUser.0 == $tsUser->uid}Mi galer&#237;a de fotos{else}Fotos de {$tsFUser.1}{/if}</div></div>
                    </div>
                    <ul class="fotos-detail listado-content">
                        {foreach from=$tsFotos.data item=f}
                    	<li>
                        	<div class="fotos-home" style="z-index: 99;">
                            	<a href="{$tsConfig.url}/fotos/{$f.user_name}/{$f.foto_id}/{$f.f_title|seo}.html">
                            		<img height="155" width="298" src="{$f.f_url}"/>
									<div class="info-foto"><a href="#"><img class="qtip"  title="{$f.f_title}" src="{$tsConfig.tema.t_url}/mega/more.png"/></a></div>
                                </a>
                            </div>
                            <div class="notification-info">
                         	<span>
                                    
									<a href="{$tsConfig.url}/fotos/{$f.user_name}/{$f.foto_id}/{$f.f_title|seo}.html"></a>
                            		
										<span class="time">{if $f.f_description}{$f.f_description|truncate:94}{else}{$f.f_title}{/if}</span><hr />
									
									<span title="{$f.f_date|date_format:"%d.%m.%y a las %H:%M hs."}" class="time"><strong>{$f.f_date|date_format:"%d.%m.%Y"}</strong><span style="float: right;">Publicado por <a href="{$tsConfig.url}/perfil/{$f.user_name}">&#64;{$f.user_name}</a></span></span>
                                    
                                
								</span>
                            </div>
                        </li>
                        {/foreach}
                    </ul>
                </div>
                <div class="paginadorCom">
                    {if $tsFotos.pages.prev}<div style="display:block;margin: 5px 0; width: 110px;text-align:left" class="floatL before"><a href="{$tsConfig.url}/fotos/{$tsFUser.1}/{$tsFotos.pages.prev}">&laquo; Anterior</a></div>{/if}
                    {if $tsFotos.pages.next}<div style="display:block;margin: 5px 0; width: 110px;text-align:right" class="floatR next"><a href="{$tsConfig.url}/fotos/{$tsFUser.1}/{$tsFotos.pages.next}">Siguiente &raquo;</a></div>{/if}
                </div>