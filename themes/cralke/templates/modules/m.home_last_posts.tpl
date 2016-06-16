                    	<ul>
                            {if $tsPosts}
                            {foreach from=$tsPosts item=p}
                            <div class="rbox">
                            <li class="categoriaPost" style="width: 200px;height: 206px;padding-left: 3px !important;" >
                                <a href="{$tsConfig.url}/posts/{$p.c_seo}/{$p.post_id}/{$p.post_title|seo}.html" style="width:200px; height:206px;">
								<img src="{if $p.post_portada}{$p.post_portada}{else}{$tsConfig.tema.t_url}/mega/error.png{/if}" width="215" height="205" style="padding:5px;background:#FFF;border:1px solid #DBDBDB;border-bottom:none;" />
								<div class="p_titulo"><span>{$p.post_title|truncate:40}</span></div> </a>
								<div class="u_titulo" style="display:inline">
                                     {if $p.post_private}<span class="multiicons postPrivado qtip" title="Solo usuarios registrados" style="margin: 4px 15px;"></span>{/if}
									<img width="16" style="margin-left: 194px;position: absolute;bottom: 10px;" class="qtip" title="{$p.c_nombre}" src="{$tsConfig.tema.t_url}/images/icons/cat/{$p.c_img}"/>
									<span style="display: block;margin-top: 5px;margin-left: 10px;"> <a href="{$tsConfig.url}/perfil/{$p.user_name}" class="hovercard" uid="{$p.post_user}"><img style="margin-top: -1px;position: absolute;" src="{$tsConfig.tema.t_url}/mega/autor.png"/><span style="margin-left: 19px;color:#4D4D4D;font-weight:bold;"> @{$p.user_name}</span></a> </span>
									<span style="padding: 10px;color:#000;font-size:11px;"><img style="margin-top: -1px;position: absolute;" src="{$tsConfig.tema.t_url}/mega/time.png"/> <span style="margin-left: 20px;color:#000;">{$p.post_date|hace} </span></span>
                                </div>
                               
							</li>
                            </div>
                            {/foreach}
                            {else}
                            <li class="emptyData">No hay posts aqu&iacute;</li>
                            {/if}
                        </ul>
                        <br clear="left"/>
                    <div class="footer size13">
                        {if $tsPages.prev > 0 && $tsPages.max == false}<a href="pagina{$tsPages.prev}" class="floatL ls-post" style="padding: 6px;border: 1px solid #2673AB;font-family: sans-serif;background: #2F91D8;color: #FFFFFF;">&laquo; Anterior</a>{/if}
                        {if $tsPages.next <= $tsPages.pages}<a href="pagina{$tsPages.next}" style="padding: 6px;border: 1px solid #2673AB;font-family: sans-serif;background: #2F91D8;color: #FFFFFF;" class="ls-post floatR">Siguiente &raquo;</a>
                        {elseif $tsPages.max == true}<a class="ls-post floatL" style="padding: 6px;border: 1px solid #2673AB;font-family: sans-serif;background: #2F91D8;color: #FFFFFF;" href="pagina2">Siguiente &raquo;</a>{/if}
                    </div>
