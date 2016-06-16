              <div class="bordes">
                		<div class="post-relacionados">
    	                	<li class="rlt-title">Otros posts que te van a interesar:</li>
                            <ul>
                            	{if $tsRelated}
                                {foreach from=$tsRelated item=p}
                            <li title="{$p.post_title|truncate:30}" class="vctip" style="display:inline;overflow:hidden;" >
								<a style="margin-top:5px;display:inline;" href="{$tsConfig.url}/posts/{$p.c_seo}/{$p.post_id}/{$p.post_title|seo}.html"><img style="margin-top:5px;padding:3px;background:#FFF;display:inline;border:1px solid #BEBEBE;" src="{$p.post_portada}" width="130" height="175"  /></a>
							</li>
                                {/foreach}
                                {else}
                                <li class="empty-post">No se encontraron posts relacionados.</li>
                                {/if}
                            </ul>
	                    </div>
	                  </div>