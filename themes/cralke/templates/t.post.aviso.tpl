{include file='sections/main_header.tpl'}
				
				<div class="post-{$tsAviso.0}">
                    <h3>{$tsAviso.1}</h3>
                    <div style="padding: 10px 0px;">Pero no pierdas las esperanzas, no todo est&aacute; perdido, la soluci&oacute;n est&aacute; en:</div>
                    <h4>Post Relacionados</h4>
                    <ul>
                        {if $tsRelated}
                        {foreach from=$tsRelated item=p}
                        <li style="display: inline;clear: both;color: #FFF;padding: 45px 0;" class=" {$p.c_seo}">
						<a class="{if $p.post_private}categoria privado{/if}"title="{$p.post_title}" href="{$tsConfig.url}/posts/{$p.c_seo}/{$p.post_id}/{$p.post_title|seo}.html" rel="dc:relation">
							<img class="qtip" title="{$p.post_title|truncate:40}" src="{if $p.post_portada}{$p.post_portada}{else}{$tsConfig.tema.t_url}/mega/error.png{/if}" width="150" height="200" style="padding:5px;background:#FFF;border:1px solid #DBDBDB;" />
                            </a>
                        </li>
                        {/foreach}
                        {else}
                        <li>No se encontraron posts relacionados.</li>
                        {/if}
                    </ul>
                </div>
                
{include file='sections/main_footer.tpl'}