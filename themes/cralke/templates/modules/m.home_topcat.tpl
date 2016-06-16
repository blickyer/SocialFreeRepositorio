                <!--
				                        \|||/                                            
                   .-.________          (o o)             ________.-.                    
              ----/ \_)_______)  +-oooO--(_)----------+  (_______(_/ \----               
                 (    ()___)     |      Vellenger     |    (___()     )                  
                      ()__)      |                    |     (__()                        
              ----\___()_)       |   www.phpost.net   |       (_()___/----                
                                 +------------Ooo-----+                                  
                                                                            / --> 
					<div  class="topcat-v">
                    	<div class="box_title">Top Categorías</div><img class=qtip title="Ver mas Categor&iacute;as"  id="ver-cat" onclick="$('#vellenger').slideToggle(); return false" src="{$tsConfig.tema.t_url}/images/icons/plus.png"></img>
                      <div class="box_cuerpo">
                        <ul>
						   {foreach from=$tsTopcat key=i item=c}
						   {if $i<10}
                            <a href="/posts/{$c.c_seo}/"><li {if $i==0}style="border-top:1px solid #EEE;"{/if}>
                               <img src="{$tsConfig.tema.t_url}/images/icons/cat/{$c.c_img}"></img>{$c.c_nombre} <span>{$c.total}</span>
                            </li></a>
							{/if}
                          {/foreach}
						<div style="display:none; background:transparent" id="vellenger">
						  {foreach from=$tsTopcat key=i item=c}
						  {if $i>9}
                            <a href="/posts/{$c.c_seo}/"><li>
                               <img src="{$tsConfig.tema.t_url}/images/icons/cat/{$c.c_img}"></img>{$c.c_nombre} <span>{$c.total}</span>
                            </li></a>
						  {/if}	
                          {/foreach}
						  <hr>
						  <center><img style="cursor:pointer;" class=qtip title="Ver menos" onclick="$('#vellenger').slideToggle(); return false" src="http://i.i.imgur.com/icRlES6.png"></img></center>
						  </div>
						</ul>
                    </div>
                        </div>
                           <br class="space"/>