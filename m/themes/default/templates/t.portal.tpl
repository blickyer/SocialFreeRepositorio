{include file='sections/main_header.tpl'}
<script type="text/javascript" src="{$tsConfig.js}/perfil.js"></script>
<script type="text/javascript">
muro.stream.total = {$tsMuro.total};
//{literal}
$(function(){
	$(window).scroll(function(){
		var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
		var scrolltrigger = 0.95;
		if ((wintop / (docheight - winheight)) > scrolltrigger) {
			if(scrollContinue) {$('.load-more').click()} else {return false}
		}
	 });
});
//{/literal}
</script>
<h1 class="Titulo">Miembros<span class="floatR">{$tsMuro.stats_miembros}</span></h1>
<input type="hidden" id="info" value="{$tsUser->uid}" />			
<div class="box_comentario">
    <div class="caja_text" style="padding-left: 0;">
        <textarea placeholder="&iquest;Qu&eacute; est&aacute;s pensando?" id="body_comment"></textarea>
    </div>
    <div class="caja_boton">
        <img id="comment_loading" src="{$tsConfig.images}/loading.gif">
        <input type="button" id="add_comment" value="Comentar" class="btn_blue" onclick="muro.stream.compartir()" />
    </div>
    <div id="error"></div>
</div>
<ul class="shouts">
{include file='modules/m.perfil_muro_story.tpl'}                         
</ul>
{if $tsMuro.total >= 10}
<div class="load-more" onclick="muro.stream.loadMore('portal'); return false;">Publicaciones m&aacute;s antiguas</div>
{elseif $tsMuro.total == 0}
<div class="emptyData">No hay publicaciones</div>
{/if}
{include file='sections/main_footer.tpl'}