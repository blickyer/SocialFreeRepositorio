
<div id="bigBox" style="margin-bottom: 10px;">
	<div class="box_title">&Uacute;ltimos temas
            <div class="floatR"><select class="com_select_home" onchange="com.ir_a_categoria(this.value)">
            	<option value="{if $tsAct}-1{/if}">{if $tsAct}Ver todas{else}Seleccionar categor&iacute;a{/if}</option>
                {foreach from=$tsCats item=c}
                <option value="{$c.c_seo}" {if $tsAct == $c.c_seo}selected="selected"{/if}>{$c.c_nombre}</option>
                {/foreach}
            	</select>
            </div>
	</div>
    {if $tsLastTemas.data}
    <div class="box_cuerpo" id="ult_comm" style="padding: 0pt;">
        {foreach from=$tsLastTemas.data item=t}
         <div id="postList" {if $c.c_estado == 1 || $t.t_estado == 1}style="opacity: 0.5;background: #000;" title="La tema ha sido eliminado"{/if}>
                            <div class="LP_avatar"><a href="{$tsConfig.url}/comunidades/{$t.c_nombre_corto}/{$t.t_id}/{$t.t_titulo|seo}.html">
                               </a></div>
           <div class="LP_titulo"><a alt="{$t.t_titulo}" title="{$t.t_titulo}" target="_self" href="{$tsConfig.url}/comunidades/{$t.c_nombre_corto}/{$t.t_id}/{$t.t_titulo|seo}.html" style="width: 356px;overflow: hidden;display: inline-block;height: 15px;">{$t.t_titulo|truncate:45}</a><a style="float: right;" ><i class="com_icon {$t.sub_cat.c_seo}"></i></a></div>
                            <div id="LP_hr"></div>
                            <div class="LP_info">                                

                                Autor <a href="{$tsConfig.url}/perfil/{$t.user_name}/" ><strong>{$t.user_name}</strong></a> | En
                                <a href="{$tsConfig.url}/comunidades/{$t.c_nombre_corto}/"><strong>{$t.c_nombre|truncate:45}</strong></a>

                            </div>                            
                            </div>


        	
   
        {/foreach}
    </div>
    <div class="com_temas_footer">
    	{if $tsPages.next <= $tsPages.pages || $tsPages.prev > 0}
    	<div class="com_msj_blue clearfix">
        	{if $tsPages.prev > 0 && $tsPages.max == false}<a href="pagina.{$tsPages.prev}" class="floatL">&laquo; Anterior</a>{/if}
            {if $tsPages.next <= $tsPages.pages}<a href="pagina.{$tsPages.next}" class="floatR">Siguiente &raquo;</a>
            {elseif $tsPages.max == true}<a href="pagina.2">Siguiente &raquo;</a>{/if}
        </div>
        {/if}
    </div>
    {else}
    	<div class="com_bigmsj_blue" style="margin-top: 5px;">No se han creado temas {if $tsAct}para esta categor&iacute;a{else}a&uacute;n{/if}</div>
    {/if}
</div>