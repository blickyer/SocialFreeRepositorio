<div id="preview" class="box_cuerpo" style="margin: -15px 0 0; font-size:13px; line-height: 1.4em; width: 750px; padding: 12px 60px; overflow-y: auto; text-align: left">
	{$tsPreview.cuerpo}
</div>
{literal}
<script type="text/javascript">
$(window).bind(
	'resize',
	function(){
		$('#preview').height((document.documentElement.clientHeight - 140) + 'px');
		mydialog.center();
	}
);
$(window).trigger('resize');
</script>
{/literal}

<!--Slider en post by Basdower-->
<link rel="stylesheet" href="{$tsConfig.tema.t_url}/css/slider-post.css">
<script src="{$tsConfig.js}/slider-post.js"></script>


<script type="text/javascript">
// {literal}
$(document).ready(function() {


  $("#slider-by-basdower").owlCarousel({
      // Edita a tu preferencia
      singleItem : true, // Mostrar solo un elemento (No cambiar)
      autoHeight : true, // Altura automatica
      autoPlay : false, // Reproduccion automatica
      slideSpeed : 300, // Velocidad de diapositivas en milisegundos
      paginationSpeed : 400, // Velocidad de la paginacion en milisegundos
      navigation : true, // Mostrar botones "anterior", "siguiente"
      pagination : true, // Mostrar paginacion ._.
      navigationText : ["Anterior", "Siguiente"] // Texto de los botones de navigation, acepta HTML


  });


});
//  {/literal}
</script>
<!--FIN Slider en post by Basdower-->