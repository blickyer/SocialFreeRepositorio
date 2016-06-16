<?php /* Smarty version 2.6.28, created on 2016-06-16 12:47:01
         compiled from modules/m.posts_comments_form.tpl */ ?>
                        	<div id="procesando"><div id="post"></div></div>
                            <div class="box_title">Dejar comentario</div>
							<div class="answerTxt">
                            	<div class="Container">
								<div class="error"></div>
                                <textarea id="body_comm" class="onblur_effect autogrow" tabindex="1" title="" style="height: 100px; resize: none;" onfocus="onfocus_input(this)" onblur="onblur_input(this)"></textarea>
                                <div class="buttons" style="text-align:left">
                                    <div class="floatL">
                                    	<input type="hidden" id="auser_post" value="<?php echo $this->_tpl_vars['tsPost']['post_user']; ?>
" />
                                        <input type="button" onclick="comentario.nuevo('true')" class="mBtn btnOk" value="Enviar Comentario" tabindex="3" id="btnsComment"/>
                                        &nbsp;<input type="button" onclick="comentario.preview('body_comm','new')" class="mBtn btnGreen" value="Vista Previa" tabindex="2" style="width:auto;" />
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                </div>
                            </div>