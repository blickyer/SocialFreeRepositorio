{if $tsJuego.j_status != 0 || $tsJuego.user_activo == 0}
	<div class="emptyData">Este juego no es visible{if $tsJuego.j_status == 1} por acumulaci&oacute;n de denuncias u orden administrativa{elseif $tsJuego.j_status == 2} porque est&aacute; eliminado{elseif $tsJuego.user_activo != 1} porque la cuenta del due&ntilde;o se encuentra desactivada{/if}, pero puedes verla porque eres {if $tsUser->is_admod == 1}administrador{elseif $tsUser->is_admod == 2}moderador{else}autorizado{/if}.</div><br />
{/if}
<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title">{$tsJuego.j_title}<img src="{$tsConfig.images}/juegos/{$tsJuego.cat_img}.png" height="24" width="24" style="margin-top: -5px;" title="{$tsJuego.cat_title}" class="floatR" /></div>
	<div class="j-box_content" id="fg_centro">	
		<div id="full-game">
			<div class="j-swf">
				<span class="loading">Cargando Juego </br><img src="{$tsConfig.images}/loading.gif"/></span>
                <object width="610" height="450" style="z-index:2;position:relative;">
                    <param name="movie" id="movie" value="{$tsJuego.j_url}">
                    <param name="quality" value="high">
                    <embed src="{$tsJuego.j_url}" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="610" height="450"></embed>
                </object>			
			</div>		
			</br>
				<p style="word-wrap: break-word;">{$tsJuego.j_description|nl2br}</p>
			</br>
            {*
			<center>
				<a style="width: 100px;margin-bottom: 10px;" class="mBtn btnOk" title="Jugar {$tsJuego.j_title} en pantalla grande" target="_blank" href="{$tsJuego.j_url}">Mas grande</a>
			</center>
			</br>
            *}
            <font color="#555" size="2" style="padding: 5px;;display: block;text-align: right;">Subido {$tsJuego.j_date|hace}, Categoría {$tsJuego.cat_title} {if $tsUser->is_admod}, IP: {$tsJuego.j_ip}{/if} </font>
		</div>
		
		<div class="op-post-user">
        		    
			<div class="ccb floatL">
                <a href="#" onclick="juegos.votar('pos', {$tsJuego.juego_id}); return false;" class="qtip j_btn j_like" title="Me gusta"><i></i></a>
                <a href="#" onclick="juegos.votar('neg', {$tsJuego.juego_id}); return false;" class="qtip j_btn j_dislike" title="No me gusta"><i></i></a>
                <a href="#" onclick="add_juego_fav({$tsJuego.juego_id}); return false;" {if $tsJuego.myfav == 1}style="display: none;"{/if} title="A&ntilde;adir a mis favoritos" class="qtip j_btn j_favs btn_favorit"><i></i></a>
                <a href="#" onclick="del_juego_fav({$tsJuego.juego_id}); return false;" {if $tsJuego.myfav == 0}style="display: none;"{/if} title="Borrar favorito" class="qtip j_btn j_desfavs btn_favorit"><i></i></a>
	        </div>
			
			<div class="cce">
                <li>
                    <b id="Favs">{$tsJuego.favoritos}</b>
                    <div>Favoritos</div>
                </li>
                <li>
                    <b class="votos_total">{$tsJuego.v_total}</b>
                    <div>Total votos</div>
                </li>
                <li class="qtip" title="{$tsJuego.j_votos_neg} voto{if $tsJuego.j_votos_neg != 1}s{/if}" style="width: 50px;">
                    <b class="votos_total_neg">{$tsJuego.v_neg}%</b>
                    <div>Negativos</div>
                </li>
                <li class="qtip" title="{$tsJuego.j_votos_pos} voto{if $tsJuego.j_votos_pos != 1}s{/if}" style="width: 50px;">
                    <b class="votos_total_pos">{$tsJuego.v_pos}%</b>
                    <div>Positivos</div>
                    {if $tsJuego.v_total}
                	<bar><span class="progress_total" style="width: {$tsJuego.v_pos}%;"></span></bar>
                    {/if}
                </li>				
                <li>
                    <b>{$tsJuego.j_hits}</b>
                    <div>Visitas</div>
                </li>
	        </div>
            
		</div>
	</div>	
</div>
</div>

{* COMENTARIOS *}			
{include file='juegos/j.jugar_comentarios.tpl'}		