<?php /* Smarty version 2.6.28, created on 2016-06-16 12:38:52
         compiled from admin_mods/m.admin_welcome.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fecha', 'admin_mods/m.admin_welcome.tpl', 31, false),array('modifier', 'hace', 'admin_mods/m.admin_welcome.tpl', 31, false),)), $this); ?>
                                <div class="boxy-title">
                                    <h3>Centro de Administraci&oacute;n</h3>
                                </div>
                                <div id="res" class="boxy-content">
                                	<div class="admin-welcome">
									<b style="font-size: 12px;">Bienvenido(a), <?php echo $this->_tpl_vars['tsUser']->nick; ?>
!</b><br />Este es tu &quot;Centro de Administraci&oacute;n de PHPost&quot;. Aqu&iacute; puedes modificar la configuraci&oacute;n de tu web, modificar usuarios, modificar posts, y muchas otras cosas.<br />Si tienes algun problema, por favor revisa la p&aacute;gina de &quot;Soporte y Cr&eacute;ditos&quot;.  Si esa informaci&oacute;n no te sirve, puedes <a href="http://www.phpost.net/" target="_blank">visitarnos para solicitar ayuda</a> acerca de tu problema.
                                   </div>
								   <hr class="separator" />
                                    <div class="phpost">
                                        <h1>PHPost en directo</h1>
                                        <ul id="news_pp" class="pp_list">
                                            <div class="phpostAlfa">Cargando...</div>
                                        </ul>
                                    </div>
                                    <div class="phpost version">
                                        <h1>PHPost Risus</h1>
                                        <ul id="version_pp" class="pp_list">
                                            <li>
                                                <div class="title">Versi&oacute;n instalada</div>
                                                <div class="body"><b><?php echo $this->_tpl_vars['tsConfig']['version']; ?>
</b></div>
                                            </li>
                                        </ul>
                                        <h1>Administradores</h1>
                                        <ul class="pp_list">                                    
                                            <?php $_from = $this->_tpl_vars['tsAdmins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['admin']):
?>
                                            <li><div class="title"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['admin']['user_name']; ?>
" class="hovercard" uid="<?php echo $this->_tpl_vars['admin']['user_id']; ?>
"><?php echo $this->_tpl_vars['admin']['user_name']; ?>
</a></div></li>                                    
                                            <?php endforeach; endif; unset($_from); ?>
                                        </ul>
								                <h1>Instalaciones</h1>
                                                    <ul class="pp_list">
											             <li class="clearfix"><span class="floatL">&nbsp; Fundaci&oacute;n</span><span class="floatR number" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['tsInst']['0'])) ? $this->_run_mod_handler('fecha', true, $_tmp) : smarty_modifier_fecha($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['tsInst']['0'])) ? $this->_run_mod_handler('hace', true, $_tmp, true) : smarty_modifier_hace($_tmp, true)); ?>
 &nbsp;</span></li>
											             <li class="clearfix"><span class="floatL">&nbsp; Actualizado</span><span class="floatR number" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['tsInst']['1'])) ? $this->_run_mod_handler('fecha', true, $_tmp) : smarty_modifier_fecha($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['tsInst']['1'])) ? $this->_run_mod_handler('hace', true, $_tmp, true) : smarty_modifier_hace($_tmp, true)); ?>
 &nbsp;</span></li>
									               </ul>
                                    </div>
                                    <div class="clearBoth"></div>
                                </div>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: global_data.url + "/feed-support.php",
        dataType: "json",
        success: function(r) {
            $(\'#news_pp\').html(\'\');
            for(var i = 0; i < r.length; i++){
                //
                var html = \'<li>\';
                html += \'<div class="title"><a href="\' + r[i].link + \'" target="_blank">\' + r[i].title +\'</a></div>\';
                html += \'<div class="body">\' + r[i].info +\'</div>\';
                html += \'</li>\';
                //
                $(\'#news_pp\').append(html);
            }
    	}
    });
    $.ajax({
        type: "GET",
        url: global_data.url + "/feed-version.php?v=risus",
        dataType: "json",
        success: function(r) {
            for(var i = 0; i < r.length; i++){
                //
                var html = \'<li>\';
                html += \'<div class="title">\' + r[i].title +\'</div>\';
                html += \'<div class="body">\' + r[i].text +\'</div>\';
                html += \'</li>\';
                //
                $(\'#version_pp\').append(html);
            }
    	}
    });
});
</script>
'; ?>