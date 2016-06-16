<div class="post-autor vcard" style="margin-bottom: 10px;">
	<!------ PUBLICADO POR ------->   
    <div class="bigBox"> 
        <div class="box_title">Autor del post<div class="box_rss"><img src="{$tsConfig.default}/images/flags/{$tsAutor.pais.icon}.png" style="padding:2px" title="{$tsAutor.pais.name}" /></div></div>
        <div class="box_cuerpo" style="padding: 0;">
            <a href="{$tsConfig.url}/perfil/{$tsAutor.user_name}" class="PA_avatar" title="Ver perfil de {$tsAutor.user_name}">
                <img alt="Ver perfil de {$tsAutor.user_name}" src="{$tsConfig.url}/files/avatar/{$tsAutor.user_id}_120.jpg"/>
                <span>{$tsAutor.user_name}</span>
                <i class="qtip PA_estado {$tsAutor.status.css}" title="{$tsAutor.status.t}"></i>
            </a>
            <div class="PA_avatar_right">
            	<span>
                	<img src="{$tsConfig.default}/images/icons/{if $tsAutor.user_sexo == 0}female{else}male{/if}.png" title="{if $tsAutor.user_sexo == 0}Mujer{else}Hombre{/if}" /> {if $tsAutor.user_sexo == 0}Mujer{else}Hombre{/if}
                </span>
				<span>
                	<img src="{$tsConfig.default}/images/icons/ran/{$tsAutor.rango.r_image}" title="{$tsAutor.rango.r_name}" /> <font color="#{$tsAutor.rango.r_color}">{$tsAutor.rango.r_name}</font>
                </span>
            	<span>
                	{if !$tsUser->is_member}    
                    <a class="btn_g follow_user_post" href="#" onclick="registro_load_form(); return false" style="text-align: center;"><strong class="icons follow"  style="padding-left: 17px;">&nbsp;Seguir</strong></a>
                    {elseif $tsAutor.user_id != $tsUser->uid}                    
                    <a class=" btn_g unfollow_user_post" onclick="notifica.unfollow('user', {$tsAutor.user_id}, notifica.userInPostHandle, $(this).children('strong'))" style="text-align: center;{if !$tsAutor.follow}display: none;{/if}" title="Dejar de seguir"><strong class="icons unfollow" style="padding-left: 17px;">&nbsp;No seguir</strong></a>
                    <a class="btn_g follow_user_post" onclick="notifica.follow('user', {$tsAutor.user_id}, notifica.userInPostHandle, $(this).children('strong'))" style="text-align: center;{if $tsAutor.follow > 0}display: none;{/if}" title="Seguir usuario"><strong class="icons follow" style="padding-left: 17px;">&nbsp;Seguir</strong></a>
                	{/if}
                </span>
                {if $tsAutor.user_id != $tsUser->uid}
                <span>
                    <a class="btn_g" style="text-align: center;" href="#" title="Enviar mensaje privado" onclick="{if !$tsUser->is_member}registro_load_form();{else}mensaje.nuevo('{$tsAutor.user_name}','','','');{/if}return false"><strong><img src="{$tsConfig.images}/msg.gif" />&nbsp;Mensaje</strong></a>
                </span>
                {/if}       	
            </div>
            <div class="PA_detalles">
            	<span class="PA_estat" title="Puntos" style="width: 75px;"><i class="multiicons postPuntos"></i>{$tsAutor.user_puntos|number_format}</span>
                <span class="PA_estat" title="Posts" style="width: 70px;"><i class="multiicons postPosts"></i>{$tsAutor.user_posts|number_format}</span>
                <span class="PA_estat" title="Coentarios" style="border-right: 0;width: 75px;"><i class="multiicons postComentarios"></i>{$tsAutor.user_comentarios|number_format}</span>
            </div>
        </div>
    </div>
    <!------ HERRAMIENTAS ------->
    {include file='modules/m.posts_herramientas.tpl'}
    <!-------- MEDALLAS --------->
    <div class="box_title">Medallas<div class="box_rss">{if $tsPost.m_total > 0}{$tsPost.m_total}{/if}</div></div>
    <div class="box_cuerpo">
     {if $tsPost.medallas}
     
     <ul>
        {foreach from=$tsPost.medallas item=m}
<img src="{$tsConfig.tema.t_url}/images/icons/med/{$m.m_image}_32.png" style="margin-left:1px;margin-bottom:2px;" class="qtip" title="{$m.m_title} - {$m.m_description}"/>
        {/foreach}
    </ul>
    {else}
     <div class="emptyData">No tiene medallas</div>
      {/if}
      </div>
	<!------ VISITANTES ------->
    {if $tsPost.visitas}
    <div class="box_title">&Uacute;ltimos visitantes</div> 
    <div class="box_cuerpo">
        {foreach from=$tsPost.visitas item=v}
         <a href="{$tsConfig.url}/perfil/{$v.user_name}" class="hovercard" uid="{$v.user_id}" style="display:inline-block;"><img src="{$tsConfig.url}/files/avatar/{$v.user_id}_50.jpg" class="vctip" title="{$v.date|hace:true}" width="32" height="32"/></a> 
        {/foreach}
    </div>
      {/if}
    <!------ PUNTEADORES ------->  
    {if $tsPost.puntos}                        
    <div class="box_title">Punteadores</div>
    <div class="box_cuerpo">
    {foreach from=$tsPost.puntos item=p}        			         
         <a href="{$tsConfig.url}/perfil/{$p.user_name}" style="display:inline-block;"><img src="{$tsConfig.url}/files/avatar/{$p.user_id}_50.jpg" class="vctip" title="{$p.user_name} ha dejado {$p.cant} puntos" width="32" height="32"/></a>                        
    {/foreach}                        
    </div>                        
    {/if}
    <!--------- TAGS ---------->
    <div class="box_title">Tags</div>
    <div class="box_cuerpo" id="PT_cont">
        {foreach from=$tsPost.post_tags key=i item=tag}
        <a rel="tag" href="{$tsConfig.url}/buscador/?q={$tag|seo}&e=tags">{$tag}</a>
        {/foreach}
    </div>
    <!------ RELACIONADOS ------->
    <div class="box_title">Posts relacionados</div>
    <div class="box_cuerpo" id="P_related">
        {if $tsRelated}
        {foreach from=$tsRelated item=p}
        <div class="PR_cont">
            <a class="{if $p.post_private}categoria privado{/if}" title="{$p.post_title}" href="{$tsConfig.url}/posts/{$p.c_seo}/{$p.post_id}/{$p.post_title|seo}.html" rel="dc:relation">
            	<img src="{$tsConfig.tema.t_url}/images/icons/cat/{$p.c_img}" height="16" width="16"/>{$p.post_title}
            </a>
        </div>
        {/foreach}
        {else}
        <div class="emptyData">No hay posts relacionados.</li>
        {/if}
	</div>
    
    
</div>