<div style="margin-bottom: 10px">
                            {$tsConfig.ads_300}
                        </div>
                         {if $tsInfo.can_pvis || $tsInfo.user_id == $tsUser->uid}
                        <div class="widget w-medallas clearfix">
                            <div class="title-w clearfix">
                                <h3>&Uacute;ltimos posts visitados por {$tsInfo.user_name}</h3>
                            </div>
                            {if $tsInfo.p_visitados}
                            <ul class="clearfix">
                            {foreach from=$tsInfo.p_visitados item=v key=i}
                                <li2>
                                    <strong style="color: #16A5DD;">{if $i <= 8}0{/if}{$i+1}. </strong>
                                    <a style="" href="{$tsConfig.url}/posts/{$v.c_seo}/{$v.post_id}/{$v.post_title|seo}.html" class="size13" title="{$v.post_title}">{$v.post_title|truncate:45}</a>
                                </li2>
                            {/foreach}
                            </ul>
                            {else}
                            <div class="emptyData">{if $tsInfo.user_id == $tsUser->uid}No has{else}{$tsInfo.user_name} no ha{/if} visitado ning&uacute;n post.</div>
                            {/if}
                        </div>
                       {/if} 
                        <div class="widget w-seguidores clearfix">
                     <div class="title-w clearfix">
                     <h3>&Uacute;ltimos comentarios</h3>
                                <span>{$tsInfo.stats.user_comentarios}</span>
                     </div>
                            {if $tsInfo.stats.user_comentarios > 0}
             <ul class="clearfix">
                            {foreach from=$tsGeneral.com item=c key=i}
                                <li2>
                                 <strong style="color: #16A5DD;">{if $i <= 8}0{/if}{$i+1}. </strong>
                                 <a style="" href="{$tsConfig.url}/posts/{$c.c_seo}/{$c.post_id}/{$c.post_title|seo}.html#pp_{$c.cid}" class="qtip size13" title="{$c.c_date|hace}">{$c.post_title|truncate:45}</a>
                                </li2>
                            {/foreach}
             </ul>
                            {else}
                            <div class="emptyData">No tiene comentarios.</div>
                            {/if}
              </div>

                        <div class="widget w-medallas clearfix">
                            <div class="title-w clearfix">
                                <h3>Medallas</h3>
                                <span>{$tsGeneral.m_total}</span>
                            </div>
                            {if $tsGeneral.m_total}
                            <ul class="clearfix">
                                {foreach from=$tsGeneral.medallas item=m}
                            <img src="{$tsConfig.tema.t_url}/images/icons/med/{$m.m_image}_32.png" class="qtip" title="{$m.m_title} - {$m.m_description}"/>
                                {/foreach}
                            </ul>
                            {if $tsGeneral.m_total >= 21}<a href="#medallas" onclick="perfil.load_tab('medallas', $('#medallas'));" class="see-more">Ver m&aacute;s &raquo;</a>{/if}
                            {else}
                            <div class="emptyData">No tiene medallas</div>
                            {/if}
                        </div>
                        <div class="widget w-seguidores clearfix">
                            <div class="title-w clearfix">
                                <h3>Seguidores</h3>
                                <span>{$tsInfo.stats.user_seguidores}</span>
                            </div>
                            {if $tsGeneral.segs.data}
                            <ul class="clearfix">
                                {foreach from=$tsGeneral.segs.data item=s}
                                <li><a href="{$tsConfig.url}/perfil/{$s.user_name}" class="hovercard" uid="{$s.user_id}" style="display:inline-block;"><img src="{$tsConfig.url}/files/avatar/{$s.user_id}_50.jpg" width="32" height="32"/></a></li>
                                {/foreach}
                            </ul>
                            {if $tsGeneral.segs.total >= 21}<a href="#seguidores" onclick="perfil.load_tab('seguidores', $('#seguidores'));" class="see-more">Ver m&aacute;s &raquo;</a>{/if}
                            {else}
                            <div class="emptyData">No tiene seguidores</div>
                            {/if}
                        </div>
                        <div class="widget w-siguiendo clearfix">
                            <div class="title-w clearfix">
                              <h3>Siguiendo</h3>
                              <span>{$tsGeneral.sigd.total}</span>
                            </div>
                            {if $tsGeneral.sigd.data}
                            <ul class="clearfix">
                                {foreach from=$tsGeneral.sigd.data item=s}
                                <li><a href="{$tsConfig.url}/perfil/{$s.user_name}" class="hovercard" uid="{$s.user_id}" style="display:inline-block;"><img src="{$tsConfig.url}/files/avatar/{$s.user_id}_50.jpg" width="32" height="32"/></a></li>
                                {/foreach}
                            </ul>
                            {if $tsGeneral.sigd.total >= 21}<a href="#siguiendo" onclick="perfil.load_tab('siguiendo', $('#siguiendo'));" class="see-more">Ver m&aacute;s &raquo;</a>{/if}
                            {else}
                            <div class="emptyData">No sigue usuarios</div>
                            {/if}
                        </div>
                        <div class="widget w-visitas clearfix">
                            <div class="title-w clearfix">
                              <h3>&Uacute;ltimas visitas</h3>
                              <span>{$tsInfo.visitas_total}</span>
                            </div>
                            {if $tsInfo.visitas}
                            <ul class="clearfix">
                                {foreach from=$tsInfo.visitas item=v}
                                <li><a href="{$tsConfig.url}/perfil/{$v.user_name}" class="hovercard" uid="{$v.user_id}" style="display:inline-block;"><img src="{$tsConfig.url}/files/avatar/{$v.user_id}_50.jpg" class="vctip" title="{$v.date|hace:true}" width="32" height="32"/></a></li>
                                {/foreach}
                            </ul>
                            {else}
                            <div class="emptyData">No tiene visitas</div>
                            {/if}
                        </div>
                                                <div class="widget w-comunidades clearfix">
                            <div class="title-w clearfix">
                              <h3>Comunidades</h3>
                              <span>{$tsGeneral.comus_total}</span>
                            </div>
                            {if $tsGeneral.comus}
                            <ul class="clearfix">
                                {foreach from=$tsGeneral.comus item=c}
                                <li style="width: 100%;margin-bottom: 5px;">
                                <a href="{$tsConfig.url}/comunidades/{$c.c_nombre_corto}/" class="floatL" style="margin-right: 3px;"><img src="{$tsConfig.url}/files/uploads/c_{$c.c_id}.jpg" width="32" height="32"/></a>
                                <a href="{$tsConfig.url}/comunidades/{$c.c_nombre_corto}/" style="color:#006595;font-weight:bold;font-size:12px;">{$c.c_nombre}</a>
                                <span style="display: block;font-size: 11px;color: #999;">{$c.c_miembros} Miembros</span>
                                </li>
                                {/foreach}
                            </ul>
                            <a href="#comunidades" onclick="perfil.load_tab('comunidades', $('#comunidades'));" class="see-more">Ver todas &raquo;</a>
                            {else}
                            <div class="emptyData">No participa en ninguna comunidad</div>
                            {/if}
                        </div>