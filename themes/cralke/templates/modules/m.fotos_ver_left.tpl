                <div style="width: 165px; float: left;">
				<div class="titulos-fotos" style="text-align:center;border-top: 1px solid #3C9DBE;margin-bottom:3px;">Fotos de {$tsFoto.user_name}</div>
                    <div class="categoriaList" style="border:none;">
                        <ul id="v_album">
                            {foreach from=$tsUFotos item=f}
                            <li style="padding: 0;"><a href="{$tsConfig.url}/fotos/{$f.user_name}/{$f.foto_id}/{$f.f_title|seo}.html"><img src="{$f.f_url}" class="" title="{$f.f_title}" width="165" height="90" /><span class="time-f">{$f.f_date|date_format:"%d/%m/%Y"}</span></a></li>
                            {/foreach}
                        </ul>
                        <a style="margin-top:5px;color: #FFF;text-shadow: 1px 1px #42A9B2;" href="{$tsConfig.url}/fotos/{$tsFoto.user_name}" class="ver-todas">Ver todas</a>
					</div>
                    <center>{$tsConfig.ads_160}</center>
                </div>
                