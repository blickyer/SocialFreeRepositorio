                	<div class="post-contenedor">	

                            {if !$tsUser->is_member}
                            <div style="overflow: hidden;margin-bottom: 10px;">
                            
                            </div>
                            {/if}				
                    	<div class="box_title">							
							<h1>{$tsPost.post_title}</h1>                                         
                        </div>                        
						<div class="post-contenido">														                            
							<span>                            	
								{$tsPost.post_body}                            
							</span>                            
							{if $tsPost.user_firma && $tsConfig.c_allow_firma}                            
							<hr class="divider" />                            
							<span>                            	
								{$tsPost.user_firma}                            
							</span>                            
							{/if}
                        </div> 
                        	{if !$tsUser->is_member}                          
							<div style="overflow: hidden;margin-top: 10px;">
                            
                            </div>  
                            {/if}                  
						</div>	                    
						{include file='modules/m.posts_metadata.tpl'}