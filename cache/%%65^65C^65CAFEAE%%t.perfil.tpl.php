<?php /* Smarty version 2.6.28, created on 2016-06-16 12:35:41
         compiled from t.perfil.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['tsInfo']['p_fondoper'] != ''): ?>
    <body style="background-image:url('<?php echo $this->_tpl_vars['tsInfo']['p_fondo']; ?>
');background-attachment: fixed; background-position: center; background-size:100%;">
<?php endif; ?>
             <script type="text/javascript" src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/js/perfil.js"></script>
             <?php if ($this->_tpl_vars['tsInfo']['p_fondoper'] != ''): ?>
                    <div class="cover" style="margin-top: 0px;" data-collapse="97" id="u3yiwu_4"><div class="coverImage">
                        <div id="zoom-fondo" onClick="zoom('ocultar','zoom')"></div>
                        <div id="zoom">
                            <center><b id='zoom_contenido'></b></center>
                        </div>
                        <a class="coverWrap" style="<?php if ($this->_tpl_vars['tsInfo']['p_fondoper']): ?>position: relative!important;<?php endif; ?>" rel="theater" id="fbCoverImageContainer">
                            <img class="photo img" src="<?php echo $this->_tpl_vars['tsInfo']['p_fondoper']; ?>
" id="<?php echo $this->_tpl_vars['tsInfo']['p_fondoper']; ?>
" text="Foto de <?php echo $this->_tpl_vars['tsInfo']['nick']; ?>
" style="top:-13px;height:300px;width:100%;" data-fbid="2738175107697" onclick="zoom('mostrar','zoom','<?php echo $this->_tpl_vars['tsInfo']['p_fondoper']; ?>
')">
                        </a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.perfil_headinfo.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <div class="perfil-main clearfix <?php echo $this->_tpl_vars['tsGeneral']['stats']['user_rango']['1']; ?>
">
                    <div class="perfil-content general">
                        <div id="info" pid="<?php echo $this->_tpl_vars['tsInfo']['uid']; ?>
"></div>
                        <div id="perfil_content">
                        <?php if ($this->_tpl_vars['tsPrivacidad']['m']['v'] == false): ?>
                        <div id="perfil_wall" status="activo" class="widget">
                            <div class="emptyData"><?php echo $this->_tpl_vars['tsPrivacidad']['m']['m']; ?>
</div>
                            <script type="text/javascript">
                                perfil.load_tab('info', $('#informacion'));
                            </script>
                        </div>
                        <?php elseif ($this->_tpl_vars['tsType'] == 'story'): ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.perfil_story.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php elseif ($this->_tpl_vars['tsType'] == 'news'): ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.perfil_noticias.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php else: ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.perfil_muro.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php endif; ?>
                        </div>
                        <div style="width:100%;text-align:center;display:none" id="perfil_load"><img src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/fb-loading.gif" /></div>
                    </div>
                    <div class="perfil-sidebar">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.perfil_sidebar.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                </div>
                
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>