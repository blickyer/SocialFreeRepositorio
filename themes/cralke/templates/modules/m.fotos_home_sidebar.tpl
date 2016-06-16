                <div style="font-family: sans-serif;width: 300px; float: right;" id="post-izquierda">
                   <div style="margin-bottom: 10px;" class="bordes-ge">
				 <div class="titulos-fotos">&Uacute;ltimos comentarios</div>
                    <div style="border-top: none;margin-bottom: 0;" class="categoriaList">
                        <ul>
                            {foreach from=$tsLastComments item=c}
                            <li class="fotos-coments"><img style="" src="{$tsConfig.url}/files/avatar/{$c.c_user}_50.jpg" class="avatar-coments" /><strong style="margin-left:5px;vertical-align: middle;">{if $tsUser->is_admod && $tsConfig.c_see_mod == 1 && $tsFoto.f_status != 0 || $tsFoto.user_activo == 0}<span style="color: #1F9494;" class="qtip" title="{if $c.user_activo == 0}El autor del comentario tiene la cuenta desactivada {elseif $c.f_status == 1} La foto se encuentra oculta {elseif $c.f_status == 2} La foto se encuentra eliminada{/if}">{/if}{$tsUser->getUsername($c.c_user)}{if $c.user_activo == 0 || $c.f_status != 0 && $tsUser->is_admod}</span>{/if}</strong> <a style="font-size:11px;" href="{$tsConfig.url}/fotos/{$c.user_name}/{$c.foto_id}/{$c.f_title|seo}.html#div_cmnt_{$c.cid}">{$c.f_title|truncate:34}</a></li>
                            {/foreach}
                        </ul>
                    </div>
                   </div>
                    <center>{$tsConfig.ads_300}</center>
                    <br />
			<div style="margin-bottom: 10px;" class="bordes-ge">
				 <div class="titulos-fotos">Estad&iacute;sticas</div>
                    <div style="margin-bottom: 0;border-top: none;" class="categoriaList estadisticasList">
                        <ul>
                            <li class="clearfix"><a href="#"><span class="floatL">Miembros</span><span class="floatR number">{$tsStats.stats_miembros}</span></a></li>
                            <li class="clearfix"><a href="#"><span class="floatL">Fotos</span><span class="floatR number">{$tsStats.stats_fotos}</span></a></li>
                            <li class="clearfix"><a href="#"><span class="floatL">Comentarios</span><span class="floatR number">{$tsStats.stats_foto_comments}</span></a></li>
                        </ul>
                    </div>
                </div>
                </div>