<?php /* Smarty version 2.6.28, created on 2016-06-16 12:48:11
         compiled from modules/m.perfil_muro_form.tpl */ ?>
                        <div class="frameForm">
                             <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.global_emoticons.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            <ul class="options clearfix">
                                <li><span class="share">Compartir:</span></li>
                                <li>
                                    <ul class="atta">
                                        <li><span class="uiComposer">
                                            <i class="stream <?php if ($this->_tpl_vars['tsInfo']['uid'] == $this->_tpl_vars['tsUser']->uid): ?>status<?php else: ?>mpub<?php endif; ?>"></i>
                                            <a href="#" class="a_blue hidden" onclick="muro.stream.load('status', this); return false;" id="stMain"><?php if ($this->_tpl_vars['tsInfo']['uid'] == $this->_tpl_vars['tsUser']->uid): ?>Estado<?php else: ?>Publicaci&oacute;n<?php endif; ?></a>
                                            <span><?php if ($this->_tpl_vars['tsInfo']['uid'] == $this->_tpl_vars['tsUser']->uid): ?>Estado<?php else: ?>Publicaci&oacute;n<?php endif; ?></span>
                                            <i class="nub"></i>
                                        </span></li>
                                        <li><span class="uiComposer">
                                            <i class="stream mfoto"></i>
                                            <a href="#" class="a_blue" onclick="muro.stream.load('foto', this); return false;">Foto</a>
                                            <span class="hidden">Foto</span>
                                            <i class="nub hidden"></i>
                                        </span></li>
                                        <li><span class="uiComposer">
                                            <i class="stream mlink"></i>
                                            <a href="#" class="a_blue" onclick="muro.stream.load('enlace', this); return false;">Enlace</a>
                                            <span class="hidden">Enlace</span>
                                            <i class="nub hidden"></i>
                                        </span></li>
                                        <li><span class="uiComposer">
                                            <i class="stream mvideo"></i>
                                            <a href="#" class="a_blue" onclick="muro.stream.load('video', this); return false;">Video</a>
                                            <span class="hidden">Video</span>
                                            <i class="nub hidden"></i>
                                        </span></li>
                                        <li class="streamLoader" style="border: none;"><img width="16" height="11" alt="" src="http://static.ak.fbcdn.net/rsrc.php/yb/r/GsNJNwuI-UM.gif" class="img"/></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="attaFrame">
                                <div id="attaContent">
                                    <div id="statusFrame" style="display:block">
                                        <textarea class="status autogrow" id="wall" onfocus="onfocus_input(this)" onblur="onblur_input(this)" title="<?php if ($this->_tpl_vars['tsInfo']['uid'] == $this->_tpl_vars['tsUser']->uid): ?>&iquest;Qu&eacute; est&aacute;s pensando?<?php else: ?>Escribe algo....<?php endif; ?>"></textarea>
                                    </div>
                                    <div id="fotoFrame">
                                        <input type="text" class="itext" name="ifoto" placeholder="http://GenerationCS.com/images/ejemplo.jpg" title="http://GenerationCS.com/images/ejemplo.jpg" onfocus="onfocus_input(this)" onblur="onblur_input(this)"/>
                                        <a href="#" class="btn_g adj" onclick="muro.stream.adjuntar(); return false;">Adjuntar</a>
                                    </div>
                                    <div id="enlaceFrame">
                                        <input type="text" class="itext" name="ienlace" placeholder="http://GenerationCS.com/blog/ejemplo.html" title="http://GenerationCS.com/blog/ejemplo.html" onfocus="onfocus_input(this)" onblur="onblur_input(this)"/>
                                        <a href="#" class="btn_g adj" onclick="muro.stream.adjuntar(); return false;">Adjuntar</a>
                                    </div>
                                    <div id="videoFrame">
                                        <input type="text" class="itext" name="ivideo" placeholder="https://www.youtube.com/watch?v=v79FpdMoJ9o" title="https://www.youtube.com/watch?v=v79FpdMoJ9o" onfocus="onfocus_input(this)" onblur="onblur_input(this)"/>
                                        <a href="#" class="btn_g adj" onclick="muro.stream.adjuntar(); return false;">Adjuntar</a>
                                    </div>
                                </div>
                                <div class="attaDesc">
                                    <div class="wrap"><textarea class="status autogrow" id="attaDesc" onfocus="onfocus_input(this)" onblur="onblur_input(this)" title="Haz un comentario sobre esta foto..."></textarea></div>
                                    <input type="button" class="mBtn btnOk shareBtn" value="Compartir" onclick="muro.stream.compartir();" />
                                    <div class="clearBoth"></div>
                                </div>
                            </div>
                            <div class="btnStatus">
                              
                                                                     <div class="floatL">
                                        <a href="#" onclick="moreEmoticons(true); return false;" class="floatR" id="moreemofn"> M&aacute;s emoticones</a>
                                    </div>
                                <input type="button" class="mBtn btnOk shareBtn" value="Compartir" onclick="muro.stream.compartir();" />
                                <div class="clearBoth"></div>
                            </div>
                        </div>
                  