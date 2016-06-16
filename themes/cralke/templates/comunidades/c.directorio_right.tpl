<div class="com_new_box">
    <div class="box_title">Comunidades por pa&iacute;s</div>
    <div class="box_cuerpo" id="ult_comm" style="padding: 0pt;">
    	<div class="com_list_element"><a href="{$tsConfig.url}/comunidades/dir/Internacional/">Todos los pa&iacute;ses</a></div>
        {foreach from=$tsPaises.data item=p}
        <div class="com_list_element">
            <a href="{$tsConfig.url}/comunidades/dir/{$p.c_pais}/">{$p.pais}</a>
            <span class="cle_number">{$p.total}</span>
        </div>
        {/foreach}
    </div>
</div>