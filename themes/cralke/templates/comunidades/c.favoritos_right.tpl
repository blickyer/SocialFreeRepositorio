<div class="box_title clearfix">Categor&iacute;as</div>
<div class="box_cuerpo" id="ult_comm" style="padding: 0pt;">
	<div class="com_list_element">
        <a href="javascript:com.fav_filter('all')">Todas</a>
        <span class="cle_number">{$tsFavoritos.total}</span>
    </div>
	{foreach from=$tsFavoritos.cat item=c}
    <div class="com_list_element">
        <a href="javascript:com.fav_filter('{$c.c_seo}')">{$c.c_nombre}</a>
        <span class="cle_number">{$c.total}</span>
    </div>
    {/foreach}
</div>