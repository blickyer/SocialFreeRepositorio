	{if $tsJuegos.data > 0}
	<div class="j-box_body" style="margin-top: 5px;">
	<div class="j-box">
    <div class="j-box_title">{if $tsJUser.0 == $tsUser->uid}Mis Juegos{else}Juegos de {$tsJUser.1}{/if}<div class="floatR" style="color: #006595;">{$tsJuegos.total}</div></div>
    </div>
    </div>
		
		<div class="ccontenido">
		{foreach from=$tsJuegos.data item=j}
			<div id="listjuegos" style="width:233px;height:170px"> 
				<a href="{$tsConfig.url}/juegos/{$j.juego_id}/{$j.j_title|seo}.html">
					<span class="jtitle" style="font-size: 11px;">{$j.j_title|truncate:30}</span> 
					<div class="jimagen" style="width:233px;height:170px">
						<img src="{$j.j_imagen}" style="width:233px;height:170px" title="{$j.j_title}">
					</div>
					{if $tsJUser.0 != $tsUser->uid}
					<div class="javatar">
						<a href="{$tsConfig.url}/perfil/{$j.user_name}"><img src="{$tsConfig.url}/files/avatar/{$j.user_id}_50.jpg" title="Ver perfil de {$j.user_name}"></a>
					</div>
					{/if}
					{if $j.j_hits > 5}
						<span class="jstar qtip" style="left: 210px;" title="Popular"></span>
					{/if}
					<div class="jinfo" style="top: 146px;">			
						<span class="visitas" title="Visitas"></span> {$j.j_hits}
						<span class="v_pos" title="Votos positivos"></span> {$j.j_votos_pos}
					</div> 
				</a> 
			</div>
		{/foreach}
			
			<div align="center" style="padding: 10px 0;">
				{if $tsJuegos.pages.prev}<a class="mBtn btnGreen" href="{$tsConfig.url}/juegos/{$tsJUser.1}/album/{$tsJuegos.pages.prev}">Anterior</a>{/if}
				{if $tsJuegos.pages.next}<a class="mBtn btnGreen" href="{$tsConfig.url}/juegos/{$tsJUser.1}/{$tsJuegos.pages.next}">Siguiente</a>{/if}
			</div>
			
		</div>
		
	{else}

		<div class="emptyData">A&uacute;n {if $tsJUser.0 == $tsUser->uid}no has{else}{$tsJUser.1} no ha{/if} agregado ning&uacute;n juego. {if $tsJUser.0 == $tsUser->uid}&iquest;Qu&eacute; esperas para hacerlo?{/if}</div>

	{/if}