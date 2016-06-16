<div class="com_tema_cuerpo clearfix">
    <div class="ctc_share clearfix">

    </div>
    <div class="box_title"><h1>{$tsTema.t_titulo}</h1></div>
   <div class="box_cuerpo">{$tsTema.t_cuerpo}</div>
</div>

<!-- SHARE BUTTONS LEFT START -->
<div class="P_opciones">
    <div class="box_title">Recomienda este post a tus amigos:</div>
    <div class="box_cuerpo post-acciones">
            <li><a class="sharer-button web" href="{if !$tsUser->is_member}javascript:registro_load_form(); return false{else}javascript:com.reco_tema(){/if}" title="Compartir en {$tsConfig.titulo}">Compartir</a></li>    
            <li><a class="sharer-button twitter  qtip" href="https://twitter.com/intent/tweet?via={$tsConfig.titulo}&related={$tsConfig.titulo}&text={$tsPost.post_title}.&url={$tsConfig.url}/comunidades/{$tsTema.c_nombre_corto}/{$tsTema.t_id}/{$tsTema.t_titulo|seo}.html" target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=200'); return false;" title="Compartir via Twitter"></a></li>                                  
            <li><a class="sharer-button facebook" href="https://www.facebook.com/sharer/sharer.php?u={$tsConfig.url}/comunidades/{$tsTema.c_nombre_corto}/{$tsTema.t_id}/{$tsTema.t_titulo|seo}.html" target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=200'); return false;" title="Compartir via Facebook"></a></li>
            <li><a class="sharer-button google  qtip" href="https://plus.google.com/share?hl=es_ES&url={$tsConfig.url}/comunidades/{$tsTema.c_nombre_corto}/{$tsTema.t_id}/{$tsTema.t_titulo|seo}.html&gpsrc=frameless&partnerid=frameless" target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=200'); return false;" title="Compartir via Google+"></a></li>
       </div>   
</div> 



<!-- SHARE BUTTONS LEFT END -->
    <div class="box_title">Estad&iacute;sticas</div>

    <div class="box_cuerpo" style="overflow: hidden;">
        <span class="floatL" style="font-size: 13px;">

                {if $tsUser->is_member}
    {if $tsTema.t_autor != $tsUser->uid}
    <a href="javascript:com.votar_tema('pos');" class="input_button"><i class="com_icon icon_like"></i> Me gusta</a>
    <a href="javascript:com.votar_tema('neg');" class="input_button"><i class="com_icon icon_dislike"></i></a>
    <a href="javascript:com.seguir_tema();" class="input_button" id="follow_tema" {if $tsTema.es_seguidor}style="display:none"{/if}><i class="com_icon icon_eye"></i>Seguir</a>
    <a href="javascript:com.seguir_tema();" class="input_button ibg" id="unfollow_tema" style="{if !$tsTema.es_seguidor}display:none{/if}"><i class="com_icon icon_eye"></i>Siguiendo</a>
    <a href="javascript:com.seguir_tema();" class="input_button ibr" id="unfollow_temar" style="display:none;padding: 7px 10px;">Dejar de seguir</a>
    <a href="javascript:com.add_favorito();" class="input_button add_favorito" {if $tsTema.mi_fav}style="display:none;"{/if} title="A&ntilde;adir a mis favoritos"><i class="com_icon icon_favs"></i></a>
    <a href="javascript:void(0);" class="input_button ibg add_favorito" {if !$tsTema.mi_fav}style="display:none;"{/if} title="Lo tienes en tus favoritos"><i class="com_icon icon_favs"></i></a>
    {/if}
    {else}
    <a href="#" onclick="registro_load_form(); return false" class="input_button"><i class="com_icon icon_like"></i> Reg&iacute;strate para acceder a las opciones del tema</a>
    {/if}
        </span>
    <ul class="cts_stats clearfix floatR">
        <li>
            <span id="favs_total">{$tsTema.t_favoritos|number_format:0:',':'.'}</span><i class="com_icon icon_favs"></i>
            <div>Favoritos</div>
        </li>
        <li>
            <span>{$tsTema.t_visitas|number_format:0:',':'.'}</span><i class="com_icon icon_visitas"></i>
            <div>Visitas</div>
        </li>
        <li>
            <span id="segs_total">{$tsTema.t_seguidores|number_format:0:',':'.'}</span><i class="com_icon icon_eye"></i>
            <div>Seguidores</div>
        </li>
        <li>
            <span id="votos_total" style="color:{if $tsTema.t_votos_pos-$tsTema.t_votos_neg > 0}green{elseif $tsTema.t_votos_pos-$tsTema.t_votos_neg < 0}red{else}#222{/if}">{$tsTema.t_votos_pos-$tsTema.t_votos_neg|number_format:0:',':'.'}</span><i class="com_icon icon_like"></i>
            <div>Calificaci&oacute;n</div>
        </li>
    </ul>
    </div>  


