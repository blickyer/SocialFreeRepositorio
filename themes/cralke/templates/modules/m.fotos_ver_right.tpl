                <div style="width: 160px; float: left;">
				<div class="titulos-fotos" style="text-align:center;border-top: 1px solid #3C9DBE;margin-bottom:3px;">Seguidores</div>
                    <div class="categoriaList">
                        <ul id="v_album">
                            {if $tsFFotos}
                            {foreach from=$tsFFotos item=f}
                            <li><a href="{$tsConfig.url}/fotos/{$f.user_name}/{$f.foto_id}/{$f.f_title|seo}.html"><img src="{$f.f_url}" title="{$f.f_title}" width="150" height="90" /></a><br /><div class="seguidores-f"><a href="{$tsConfig.url}/perfil/{$f.user_name}"><strong>{$f.user_name}</strong></a></div></li>
                            {/foreach}
                            {else}
                            <li style="margin:2px" class="emptyData">{$tsFoto.user_name} no sigue usuarios o no han subido fotos.</li>
                            {/if}
                        </ul>
                        {if $tsFFotos}<a href="{$tsConfig.url}/fotos/{$tsFoto.user_name}" class="fb_foot">Ver todas</a>{/if}
                    </div>
					{if $tsFVisitas}
					<div class="titulos-fotos" style="text-align:center;border-top: 1px solid #3C9DBE;margin-bottom:3px;">Visitas recientes</div>
					<div class="categoriaList">
                        <ul id="v_album" style="margin-left:11px;">
                            {foreach from=$tsFVisitas item=v}
        			          <a href="{$tsConfig.url}/perfil/{$v.user_name}" class="hovercard" uid="{$v.user_id}" style="display:inline-block;"><img src="{$tsConfig.url}/files/avatar/{$v.user_id}_50.jpg" class="vctip" title="{$v.date|hace:true}" width="32" height="32"/></a>
                            {/foreach}
                        </ul>
                    </div>
					{/if}
					<div class="titulos-fotos" style="text-align:center;border-top: 1px solid #3C9DBE;margin-bottom:3px;">Medallas</div>
					<!-- <span class=""><b>{$tsFoto.f_date|date_format:"%d/%m/%Y"}</b></span> -->
					<div class="categoriaList">
                        <ul id="v_album" style="padding: 8px;"> 
                            {if $tsFMedallas}
                            {foreach from=$tsFMedallas item=m}
                            <img src="{$tsConfig.tema.t_url}/images/icons/med/{$m.m_image}_16.png"  style="margin-left:1px;margin-bottom:2px;" class="qtip" title="{$m.m_title} - {$m.m_description}"/>
                            {/foreach}
                            {else}
                            <li class="emptyData">Esta foto no tiene medallas</li>
                            {/if}
                        </ul>
                    </div>
					
                </div>