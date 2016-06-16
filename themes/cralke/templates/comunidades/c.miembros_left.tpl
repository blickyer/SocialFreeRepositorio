<div class="com_loc_global">
	<ul class="clearfix">
    	<li><a href="{$tsConfig.url}/comunidades/">Comunidades</a></li>
        <li><a href="{$tsConfig.url}/comunidades/home/{$tsCom.cat.c_seo}/">{$tsCom.cat.c_nombre}</a></li>
        <li><a href="{$tsConfig.url}/comunidades/{$tsCom.c_nombre_corto}/">{$tsCom.c_nombre}</a></li>
        <li>Miembros</li>
    </ul>
</div>
<div class="com_members_filter clearfix">
    <div class="box_title">
        <div class="box_txt ultimos_posts">Buscar</div>
        <div class="box_rss"><span class="systemicons monitor"></span></div>
    </div>
	<div class="box_cuerpo clearfix">
	<input type="text" class="clearfix" style="margin-right: 5px;width: 500px;" id="search_member" /><input type="button" value="Buscar" class="input_button ibg" style="margin: 0;" onclick="com.search_member();"/>
        <ul class="cmf_select">
    	<li id="miembros" class="active"><a href="javascript:com.load_members('miembros');">Miembros</a></li>
        <li id="suspendidos"><a href="javascript:com.load_members('suspendidos');">Suspendidos</a></li>
    </ul>
    </div>

</div>
<div id="com_members_result">{include file=t.comus_ajax/c.com_members.tpl}</div>
