<div id="bigBox">
    <div class="box_title qtip" title="Actualizado: {$tsStats.stats_time|hace}">
        <div class="box_txt estadisticas">Estad&iacute;sticas</div>
        <div class="box_rss"><span class="systemicons historyMod"></span></div>
    </div>
    <div class="box_cuerpo" id="WStats">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <th class="qtip" title="R&eacute;cord conectados: {$tsStats.stats_max_online} {$tsStats.stats_max_time|fecha}">{$tsStats.stats_online}</th>
                <th>{$tsStats.stats_miembros}</th>
                <th>{$tsStats.stats_posts}</th>
                <th>{$tsStats.stats_comments}</th>
            </tr>
            <tr>
                <td><a href="{$tsConfig.url}/usuarios/?online=true">Online</a></td>
                <td><a href="{$tsConfig.url}/usuarios/">Miembros</a></td>
                <td>Posts</td>
                <td>Comentarios</td>
            </tr>
        </table>
        </div>
</div>

