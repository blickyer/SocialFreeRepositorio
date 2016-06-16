{include file='sections/main_header.tpl'}
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
      autoPlay : true, // Reproduccion automatica
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
				<div class="page-bt">
				<a class="ant qtip" href="{$tsConfig.url}/posts/prev?id={$tsPost.post_id}" title="Post Anterior (m&aacute;s viejo)">Anterior</a>

				<a class="sig qtip" href="{$tsConfig.url}/posts/next?id={$tsPost.post_id}" title="Post Siguiente (m&aacute;s Nuevo)">Siguiente</a>
				</div>
				<a name="cielo"></a>
                {if $tsPost.post_status > 0 || $tsAutor.user_activo != 1}
                    <div class="emptyData">Este post se encuentra {if $tsPost.post_status == 2}eliminado{elseif $tsPost.post_status == 1} inactivo por acomulaci&oacute;n de denuncias{elseif $tsPost.post_status == 3} en revisi&oacute;n{elseif $tsPost.post_status == 3} en revisi&oacute;n{elseif $tsAutor.user_activo != 1} oculto porque pertenece a una cuenta desactivada{/if}, t&uacute; puedes verlo porque {if $tsUser->is_admod == 1}eres Administrador{elseif $tsUser->is_admod == 2}eres Moderador{else}tienes permiso{/if}.</div><br />
                {/if}
                    <div class="post-wrapper">                  
                        {include file='modules/m.posts_content.tpl'}
                        <a name="comentarios"></a>
                        {include file='modules/m.posts_comments.tpl'}
                        <a name="comentarios-abajo"></a>
                        <br />
                        {if !$tsUser->is_member}
                        <div class="emptyData clearfix">
                            Para poder comentar necesitas estar <a onclick="registro_load_form(); return false" href="">Registrado.</a> O.. ya tienes usuario? <a onclick="open_login_box('open')" href="#">Logueate!</a>
                        </div>
                        {elseif $tsPost.block > 0}
                        <div class="mensajes error clearfix">
                            &iquest;Te has portado mal? {$tsPost.user_name} te ha bloqueado y no podr&aacute;s comentar sus post.
                        </div>
                        {/if}  
                    </div>
                    <div style="float: left;width: 254px;margin-left: 10px;">
                    {include file='modules/m.posts_sidebar.tpl'}
                    </div>   
                <div style="clear:both"></div>
                
{include file='sections/main_footer.tpl'}