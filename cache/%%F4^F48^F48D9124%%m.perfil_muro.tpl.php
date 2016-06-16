<?php /* Smarty version 2.6.28, created on 2016-06-16 12:48:11
         compiled from modules/m.perfil_muro.tpl */ ?>
                    <div id="perfil_wall" status="activo" >
                        <script type="text/javascript">
                            muro.stream.total = <?php echo $this->_tpl_vars['tsMuro']['total']; ?>
;
                        </script>
                        <?php if ($this->_tpl_vars['tsGeneral']['fotos_total'] > 0): ?>
                        <div id="perfil-foto-bar">
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.perfil_muro_fotos.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        </div>
                        <?php endif; ?>
                        <div id="perfil-form" class="widget">
                        <?php if ($this->_tpl_vars['tsPrivacidad']['mf']['v'] == true): ?>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.perfil_muro_form.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php else: ?>
                            <div class="emptyData" style="border-top:none"><?php echo $this->_tpl_vars['tsPrivacidad']['mf']['m']; ?>
</div>
                        <?php endif; ?>
                        </div>
						<div class="widget clearfix" id="perfil-wall">
                            
                            <div id="wall-content">
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.perfil_muro_story.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </div>
                            <!-- more -->
                            <?php if ($this->_tpl_vars['tsMuro']['total'] >= 10): ?>
                            <div class="more-pubs">
                                <div class="content">
                                <a href="#" onclick="muro.stream.loadMore('wall'); return false;" style="color:#318C4E">Publicaciones m&aacute;s antiguas</a>
                                <span><img width="16" height="11" alt="" src="http://static.ak.fbcdn.net/rsrc.php/yb/r/GsNJNwuI-UM.gif"/></span>
                                </div>
                            </div>
                            <?php elseif ($this->_tpl_vars['tsMuro']['total'] == 0 && $this->_tpl_vars['tsUser']->is_member): ?>
                            <div class="emptyData">Este usuario no tiene comentarios, se el primero.</div>
                            <?php endif; ?>
    		            </div>
                  </div>