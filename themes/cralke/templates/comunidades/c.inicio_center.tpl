<div class="com_home_center">
<div id="bigBox">
    <div class="box_title">
        <div class="box_txt estadisticas">Estad&iacute;sticas</div>
        <div class="box_rss"><span class="systemicons historyMod"></span></div>
    </div>
    <div class="box_cuerpo" id="WStats">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <th>{$tsStats.stats_online|number_format:0:',':'.'}</th>
                <th>{$tsStats.stats_comunidades|number_format:0:',':'.'}</th>
                <th>{$tsStats.stats_temas|number_format:0:',':'.'}</th>
                <th>{$tsStats.stats_respuestas|number_format:0:',':'.'}</th>
            </tr>
            <tr>
                <td><a href="{$tsConfig.url}/usuarios/?online=true">Online</a></td>
                <td>Comus</td>
                <td>Temas</td>
                <td>Comentarios</td>
            </tr>
        </table>
        </div>
</div>
    <div class="bigBox">
        <div class="box_title">Comentarios recientes</div>
        <div class="box_cuerpo" id="ult_comm" style="padding: 0pt;">
        	{if $tsRespuestas}
        	{foreach from=$tsRespuestas item=r}
            <div class="UC_cont" {if $r.t_estado == 1} title="El tema ha sido eliminado"{/if}>


                <div class="UC_avatar">

</div>
                    <div class="UC_post" style="
    width: 246px;
">                          <a class="cle_autor" href="{$tsConfig.url}/perfil/{$r.user_name}">{$r.user_name}</a><b><a style="color: #16A5DD; font-size: 12px;" class="cle_title" href="{$tsConfig.url}/comunidades/{$r.c_nombre_corto}/{$r.t_id}/{$r.t_titulo|seo}.html#coment_id_{$r.r_id}">{$r.t_titulo|limit:30}</a></b>

          
</div>

            </div>
            {/foreach}
            {else}
            <div class="com_bigmsj_blue">No hay comentarios recientes</div>
            {/if}
        </div>
    </div>

    <div class="com_new_box">
        <div class="box_title">Comunidades recientes</div>
        <div class="box_cuerpo" id="ult_comm" style="padding: 0pt;">
        	{if $tsRecientes}
            {foreach from=$tsRecientes item=c}
            <div class="UC_cont"  {if $c.c_estado == 1}style="opacity: 0.5;background: #000;" title="La comunidad ha sido eliminada"{/if}>

                 <div class="UC_avatar">

</div>

                    <div class="UC_post" style="
    width: 246px;
">
                         <a href="{$tsConfig.url}/comunidades/{$c.c_nombre_corto}/" class="size10" title="{$c.c_nombre}">{$c.c_nombre}</a>
          
</div>
               </div>
            {/foreach}
            {else}
            <div class="com_bigmsj_blue">No se han creado comunidades a&uacute;n</div>
            {/if}
        </div>
    </div>
</div>