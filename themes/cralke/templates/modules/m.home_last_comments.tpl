					<div id="lastCommBox">
                        <div class="box_title">
                            <div class="box_txt estadisticas">&Uacute;ltimos comentarios</div>
                            <div class="box_rss">
                            	<a onclick="actualizar_comentarios('-1','0'); return false;" class="size9" href="#"><span class="systemicons actualizar"></span></a>
                            </div>
                        </div>
                        <div class="box_cuerpo" id="ult_comm" style="padding: 0pt; height: 404px;">
                            <ol id="filterByTodos" class="filterBy cleanlist" style="display:block;">
                            	{foreach from=$tsComments key=i item=c}
								<li>
									{if $c.post_status != 0 || $c.user_activo == 0 || $c.user_baneado || $c.c_status != 0}<a href="{$tsConfig.url}/perfil/{$c.user_name}/"><strong style="color: {if $c.post_status == 3} #BBB {elseif $c.post_status == 1} purple {elseif $c.post_status == 2} rosyBrown {elseif $c.c_status == 1} coral{elseif $c.user_activo == 0} brown {elseif $c.user_baneado == 1} orange {/if};" class="qtip" title="{if $c.post_status == 3} El post se encuentra en revisi&oacute;n{elseif $c.post_status == 1} El post se encuentra oculto por acumulaci&oacute;n de denuncias {elseif $c.post_status == 2} El post se encuentra eliminado {elseif $c.c_status == 1} El comentario est&aacute; oculto{elseif $c.user_activo == 0}El autor del comentario tiene la cuenta desactivada{elseif $c.user_baneado == 1}El autor del comentario tiene la cuenta suspendida{/if}">{$c.user_name}</strong></a>{else}<a href="{$tsConfig.url}/perfil/{$c.user_name}/"><strong style="font-family: sans-serif;color: #424242;"> <img style="" src="{$tsConfig.url}/files/avatar/{$c.user_id}_50.jpg?{$smarty.now|date_format:"%Y%m%d%H%M%S"}" class="avatar-coments" /><strong style="color: #16A5DD;margin-left:5px;">{$c.user_name}</strong></strong></a> {/if}
                                    <a href="{$tsConfig.url}/posts/{$c.c_seo}/{$c.post_id}/{$c.post_title|seo}.html#comentarios-abajo" class="size10">
                                    {$c.post_title|truncate:45}</a>
                                </li>
                                {/foreach}
                            </ol>
                        </div>
                        <br class="space"/>
                    </div>