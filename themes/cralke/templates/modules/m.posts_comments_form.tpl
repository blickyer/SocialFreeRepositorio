                        	<div id="procesando"><div id="post"></div></div>
                            <div class="box_title">Dejar comentario</div>
							<div class="answerTxt">
                            	<div class="Container">
								<div class="error"></div>
                                <textarea id="body_comm" class="onblur_effect autogrow" tabindex="1" title="" style="height: 100px; resize: none;" onfocus="onfocus_input(this)" onblur="onblur_input(this)"></textarea>
                                <div class="buttons" style="text-align:left">
                                    <div class="floatL">
                                    	<input type="hidden" id="auser_post" value="{$tsPost.post_user}" />
                                        <input type="button" onclick="comentario.nuevo('true')" class="mBtn btnOk" value="Enviar Comentario" tabindex="3" id="btnsComment"/>
                                        &nbsp;<input type="button" onclick="comentario.preview('body_comm','new')" class="mBtn btnGreen" value="Vista Previa" tabindex="2" style="width:auto;" />
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                </div>
                            </div>