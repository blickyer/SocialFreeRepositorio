<?php /* Smarty version 2.6.28, created on 2016-06-16 12:47:00
         compiled from t.posts.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--Slider en post by Basdower-->
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/css/slider-post.css">
<script src="<?php echo $this->_tpl_vars['tsConfig']['js']; ?>
/slider-post.js"></script>


<script type="text/javascript">
// <?php echo '
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
//  '; ?>

</script>
<!--FIN Slider en post by Basdower-->
				<div class="page-bt">
				<a class="ant qtip" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/prev?id=<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
" title="Post Anterior (m&aacute;s viejo)">Anterior</a>

				<a class="sig qtip" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/next?id=<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
" title="Post Siguiente (m&aacute;s Nuevo)">Siguiente</a>
				</div>
				<a name="cielo"></a>
                <?php if ($this->_tpl_vars['tsPost']['post_status'] > 0 || $this->_tpl_vars['tsAutor']['user_activo'] != 1): ?>
                    <div class="emptyData">Este post se encuentra <?php if ($this->_tpl_vars['tsPost']['post_status'] == 2): ?>eliminado<?php elseif ($this->_tpl_vars['tsPost']['post_status'] == 1): ?> inactivo por acomulaci&oacute;n de denuncias<?php elseif ($this->_tpl_vars['tsPost']['post_status'] == 3): ?> en revisi&oacute;n<?php elseif ($this->_tpl_vars['tsPost']['post_status'] == 3): ?> en revisi&oacute;n<?php elseif ($this->_tpl_vars['tsAutor']['user_activo'] != 1): ?> oculto porque pertenece a una cuenta desactivada<?php endif; ?>, t&uacute; puedes verlo porque <?php if ($this->_tpl_vars['tsUser']->is_admod == 1): ?>eres Administrador<?php elseif ($this->_tpl_vars['tsUser']->is_admod == 2): ?>eres Moderador<?php else: ?>tienes permiso<?php endif; ?>.</div><br />
                <?php endif; ?>
                    <div class="post-wrapper">                  
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.posts_content.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <a name="comentarios"></a>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.posts_comments.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <a name="comentarios-abajo"></a>
                        <br />
                        <?php if (! $this->_tpl_vars['tsUser']->is_member): ?>
                        <div class="emptyData clearfix">
                            Para poder comentar necesitas estar <a onclick="registro_load_form(); return false" href="">Registrado.</a> O.. ya tienes usuario? <a onclick="open_login_box('open')" href="#">Logueate!</a>
                        </div>
                        <?php elseif ($this->_tpl_vars['tsPost']['block'] > 0): ?>
                        <div class="mensajes error clearfix">
                            &iquest;Te has portado mal? <?php echo $this->_tpl_vars['tsPost']['user_name']; ?>
 te ha bloqueado y no podr&aacute;s comentar sus post.
                        </div>
                        <?php endif; ?>  
                    </div>
                    <div style="float: left;width: 254px;margin-left: 10px;">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.posts_sidebar.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>   
                <div style="clear:both"></div>
                
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>