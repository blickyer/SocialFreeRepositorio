					<div id="post-comentarios">

                        <div class="box_title">Comentarios<div class="box_rss"><span id="ncomments">{$tsPost.post_comments}</span></div>
                            <img src="{$tsConfig.images}/gif.gif" style="border:0; margin-right:1em; display:none" class="floatR" id="com_gif"/>
                            <div class="clearfix"></div>
                        </div>
                        {if $tsPost.post_comments > $tsConfig.c_max_com}
                        <div class="comentarios-title">
	                        <div class="paginadorCom"><!--HTML de las páginas--></div>
                        </div>{/if}
                        <div id="comentarios">
                            <script type="text/javascript">
                            // {literal}
                            $(document).ready(function(){
                                /*
                                top_cmt = $("#offset_cmts").offset().top;
                                //
                                function check_load(){
                                    if (!comentario.cargado && $(window).scrollTop() + $(window).height() > top_cmt ) {
                                        // {/literal} 
                                        */
                                        comentario.cargar({$tsPages.post_id}, 1, {$tsPages.autor});
                                        /*
                                        // {literal}
                                        comentario.cargado = true;
                                    }
                                }
                                $(window).scroll(check_load);
                                check_load();*/
                            });
                            // {/literal}
                            </script>
                            <div id="no-comments">Cargando comentarios espera un momento...</div>
                        </div>{if $tsPost.post_comments > $tsConfig.c_max_com}
                        <div class="comentarios-title">
	                        <div class="paginadorCom"><!--HTML de las páginas--></div>
                        </div>{/if}
      
                        {if $tsPost.post_block_comments == 1 && ($tsUser->is_admod == 0 && $tsUser->permisos.mocepc == false)}
                            <div id="no-comments" class="emptyData">El post se encuentra cerrado y no se permiten comentarios.</div>
						{elseif $tsUser->is_admod == 0 && $tsUser->permisos.gopcp == false}
                            <div id="no-comments" class="emptyData">No tienes permisos para comentar.</div>
						{elseif $tsUser->is_member && ($tsPost.post_block_comments != 1 || $tsPost.post_user == $tsUser->uid || $tsUser->is_admod || $tsUser->permisos.gopcp) && $tsPost.block == 0}
                        <div class="miComentario">
		                    {include file='modules/m.posts_comments_form.tpl'}
                        </div>
                        {/if}
                    </div>
                    <div class="clearfix"></div>