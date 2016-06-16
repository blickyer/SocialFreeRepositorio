<?php /* Smarty version 2.6.28, created on 2016-06-16 12:47:01
         compiled from modules/m.posts_comments.tpl */ ?>
					<div id="post-comentarios">

                        <div class="box_title">Comentarios<div class="box_rss"><span id="ncomments"><?php echo $this->_tpl_vars['tsPost']['post_comments']; ?>
</span></div>
                            <img src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/gif.gif" style="border:0; margin-right:1em; display:none" class="floatR" id="com_gif"/>
                            <div class="clearfix"></div>
                        </div>
                        <?php if ($this->_tpl_vars['tsPost']['post_comments'] > $this->_tpl_vars['tsConfig']['c_max_com']): ?>
                        <div class="comentarios-title">
	                        <div class="paginadorCom"><!--HTML de las páginas--></div>
                        </div><?php endif; ?>
                        <div id="comentarios">
                            <script type="text/javascript">
                            // <?php echo '
                            $(document).ready(function(){
                                /*
                                top_cmt = $("#offset_cmts").offset().top;
                                //
                                function check_load(){
                                    if (!comentario.cargado && $(window).scrollTop() + $(window).height() > top_cmt ) {
                                        // '; ?>
 
                                        */
                                        comentario.cargar(<?php echo $this->_tpl_vars['tsPages']['post_id']; ?>
, 1, <?php echo $this->_tpl_vars['tsPages']['autor']; ?>
);
                                        /*
                                        // <?php echo '
                                        comentario.cargado = true;
                                    }
                                }
                                $(window).scroll(check_load);
                                check_load();*/
                            });
                            // '; ?>

                            </script>
                            <div id="no-comments">Cargando comentarios espera un momento...</div>
                        </div><?php if ($this->_tpl_vars['tsPost']['post_comments'] > $this->_tpl_vars['tsConfig']['c_max_com']): ?>
                        <div class="comentarios-title">
	                        <div class="paginadorCom"><!--HTML de las páginas--></div>
                        </div><?php endif; ?>
      
                        <?php if ($this->_tpl_vars['tsPost']['post_block_comments'] == 1 && ( $this->_tpl_vars['tsUser']->is_admod == 0 && $this->_tpl_vars['tsUser']->permisos['mocepc'] == false )): ?>
                            <div id="no-comments" class="emptyData">El post se encuentra cerrado y no se permiten comentarios.</div>
						<?php elseif ($this->_tpl_vars['tsUser']->is_admod == 0 && $this->_tpl_vars['tsUser']->permisos['gopcp'] == false): ?>
                            <div id="no-comments" class="emptyData">No tienes permisos para comentar.</div>
						<?php elseif ($this->_tpl_vars['tsUser']->is_member && ( $this->_tpl_vars['tsPost']['post_block_comments'] != 1 || $this->_tpl_vars['tsPost']['post_user'] == $this->_tpl_vars['tsUser']->uid || $this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['gopcp'] ) && $this->_tpl_vars['tsPost']['block'] == 0): ?>
                        <div class="miComentario">
		                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.posts_comments_form.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="clearfix"></div>