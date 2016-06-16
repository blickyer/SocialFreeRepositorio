<div class="com_home_right">
    
	<div class="emptyData">
        {$tsConfig.titulo} te permite crear tu comunidad para que puedas compartir gustos e intereses con los dem&aacute;s.
                {if $tsUser->is_member}
        <div class="cbi_footer clearfix"><a class="input_button" href="{$tsConfig.url}/comunidades/crear/">¡Crea la tuya!</a></div>
		{else}
		<div class="cbi_footer clearfix"><a class="input_button" onclick="javascript:open_login_box(); return false">¡Crea la tuya!</a></div></div>
        {/if}
    </div><br />
    {* Solo la primera comunidad de la semana *}
    
    {if $tsPopulares.semana}
    <div class="box_title">Comunidad destacada!</div>
    <div class="com_bigmsj_yellow">
        
        <div class="cbi_body clearfix">
            {foreach from=$tsPopulares.semana item=c key=i}
            {if $i == 0}
            <div class="com_destacada">
            	<div class="cd_left floatL">
                <a href="{$tsConfig.url}/comunidades/{$c.c_nombre_corto}/" title="{$c.c_nombre}"><img src="{$tsConfig.url}/files/uploads/c_{$c.c_id}.jpg" alt="{$c.c_nombre}" width="50" height="50" /></a>                
            	</div>
                <div class="cd_right floatL">
                	<h2 style="color: #ED7DB5;">{$c.c_nombre|truncate:19}</h2>
                	<ul><small>
                    	<li>Creada {$c.c_fecha|hace}</li>
                        <li><strong>Miembros: </strong>{$c.c_miembros}</li>
                        <li><strong>Temas: </strong>{$c.c_temas}</li>
                        <a class="input_button" href="{$tsConfig.url}/comunidades/{$c.c_nombre_corto}/">Ver comunidad</a>                      
                    </small></ul>
                </div>
            </div>
            {/if}
        	{/foreach}
    	</div>
    </div>
    {/if}
</div>