                <div id="centroDerecha" style="width: 630px; float: left;">
                	
					<div class="bordes-fotos"><div class="last-picks">&Uacute;ltimas fotos</div></div>
                    
					<ul class="fotos-detail listado-content">
                        
						{foreach from=$tsLastFotos.data item=f}
                    	
						<li>
                        	
							<div class="fotos-home " style="z-index: 99;">
                            	
								<a href="{$tsConfig.url}/fotos/{$f.user_name}/{$f.foto_id}/{$f.f_title|seo}.html">
                            		
									<img height="155" width="298" {if $f.f_status != 0 || $f.user_activo == 0 || $f.user_baneado == 1}class="qtip" title="{if $f.f_status == 2}Imagen eliminada{elseif $f.f_status == 1}Imagen oculta por acumulaci&oacute;n de denuncias{elseif $f.user_activo == 0}La cuenta del usuario est&aacute; desactivada{elseif $f.user_baneado == 1}La cuenta del usuario est&aacute; suspendida{/if}" style="border: 1px solid {if $f.f_status == 2}rosyBrown{elseif $f.f_status == 1}coral{elseif $f.user_activo == 0}brown{elseif $f.user_baneado == 1}orange{/if};opacity: 0.5;filter: alpha(opacity=50);"{/if} src="{$f.f_url}"/>
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
					
				<div style="float: left;padding: 5px;border: 1px solid #E5E5E5;margin: 5px 4px;font-family: sans-serif;background: #FFFFFF;color: #9B9B9B;">{if $tsLastFotos.data > 10}P&aacute;ginas: {$tsLastFotos.pages}{/if}</div>
					
                </div>
