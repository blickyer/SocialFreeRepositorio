					<div id="lastCommBox">
                        <div class="box_title">
                            <div class="box_txt estadisticas">Cumplea&ntilde;os ({$tsBirthday.total})</div>
                            <div class="box_rss">
                            	
                            </div>
                        </div>
                        <div class="box_cuerpo" style="padding-bottom: 3px;">
                            {foreach from=$tsBirthday.data item=b}
                            <div style="font-weight: bold;margin-bottom: 5px;">
                            <a href="{$tsConfig.url}/perfil/{$b.user_name}" title="{$b.user_name}" style="display: inline-block;vertical-align: middle;margin-right: 5px;">
                            	<img src="{$tsConfig.url}/files/avatar/{$b.user_id}_50.jpg" alt="{$b.user_name}"/>
                            </a>
                            {$b.user_name} ({$tsBirthday.ano-$b.user_ano})
                            </div>
                            {/foreach}
                        </div>
                        <br class="space"/>
                    </div>