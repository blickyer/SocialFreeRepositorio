	{if $tsFavs.total > 0}
	<div class="j-box_body" style="margin-top: 5px;">
	<div class="j-box">
    <div class="j-box_title">Mis favoritos<div class="floatR" style="color: #006595;">{$tsFavs.total}</div></div>
    </div>
    </div>
		
		<div class="ccontenido">
		{foreach from=$tsFavs.data item=j}
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
			
			<center>
				{if $tsFavs.pages.prev}<div style="display:block;margin: 5px 0; width: 110px;text-align:left"><a class="mBtn btnGreen" href="{$tsConfig.url}/juegos/favoritos/{$tsFavs.pages.prev}">Anterior</a></div>{/if}
				{if $tsFavs.pages.next}<div style="display:block;margin: 5px 0; width: 110px;text-align:right"><a class="mBtn btnGreen" href="{$tsConfig.url}/juegos/favoritos/{$tsFavs.pages.next}">Siguiente</a></div>{/if}
			</center>
			
		</div>
		
	{else}

		<div class="nada" style="margin-right: 10px;">No has agregado juegos a tus favoritos.</div>

	{/if}