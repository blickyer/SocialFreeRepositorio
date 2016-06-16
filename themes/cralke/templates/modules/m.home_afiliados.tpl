					<div id="webAffs">
                        <div class="wMod clearbeta">
                            <div class="wMod-h">Afiliados</div>
                            <div class="wMod-data">
                                <ul>
                                {foreach from=$tsAfiliados item=af}
                                <li><a href="#" onclick="afiliado.detalles({$af.aid}); return false;" style="text-decoration: none;" title="{$af.a_titulo}">
                                    <img src="{$af.a_banner}" width="75" height="75"/>
                                </a></li>
                                {/foreach}
                                </ul>
                            <div class="floatR adfi"><a style="text-decoration: none;font-family: 'Lato', sans-serif;color: #676767;" onclick="afiliado.nuevo(); return false">Afiliate a {$tsConfig.titulo}</a></div>
							 </div>
                         </div>
                    </div> 