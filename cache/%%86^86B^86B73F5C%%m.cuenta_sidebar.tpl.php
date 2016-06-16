<?php /* Smarty version 2.6.28, created on 2016-06-16 12:37:37
         compiled from modules/m.cuenta_sidebar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'modules/m.cuenta_sidebar.tpl', 6, false),)), $this); ?>
					<div class="" style="float:right;padding:2px;border:1px solid #D7D7D7;background-color:#FFF;">
					<div class="sidebar-tabs clearbeta">
                    	<h3>Mi Avatar</h3>
                        <div class="avatar-big-cont"> 
                        	<div style="display: none" class="avatar-loading"></div>
                            <img width="120" height="120" alt="" src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php if ($this->_tpl_vars['tsPerfil']['p_avatar']): ?><?php echo $this->_tpl_vars['tsPerfil']['user_id']; ?>
_120<?php else: ?>avatar<?php endif; ?>.jpg?<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y%m%d%H%M%S") : smarty_modifier_date_format($_tmp, "%Y%m%d%H%M%S")); ?>
" class="avatar-big" id="avatar-img"/>
                        </div>
                        <ul class="change-avatar" style="display: none;">
                        	<li class="local-file">
                            	<span><a onclick="avatar.chgtab(this)" id="avatar-local">Local</a></span>
                                <div class="mini-modal" style="display: none;">
									<div class="dialog-m"></div>
									<span>Subir Archivo</span>
									<input type="file" name="file-avatar" id="file-avatar" size="15" class="browse"/><br/>
                                    <button onclick="avatar.upload(this)" class="avatar-next local">Subir</button>
								</div>
                            </li>
                        	<li class="url-file">
                            	<span><a onclick="avatar.chgtab(this)" id="avatar-url">Url</a></span>
                                <div class="mini-modal" style="display: none;">
                                    <div class="dialog-m"></div>
                                <?php if ($this->_tpl_vars['tsConfig']['c_allow_upload']): ?>
									<span>Direcc&oacute;n de la imagen</span>
									<input type="text" name="url-avatar" id="url-avatar" size="45"/><br/>
                                    <button onclick="avatar.upload(this);" class="avatar-next url">Subir</button>
                                <?php else: ?>
                                    Lo sentimos por el momento solo puedes subir avatares desde tu PC.
                                <?php endif; ?>
                                </div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <a onclick="avatar.edit(this)" class="edit" id="avatar-edit">Editar</a>
                    </div>
                    <div class="clearfix"></div>
                    <h3 style="margin: 12px 5px 0px 5px;padding: 0;text-align: center;font-size: 12px;color: #494949;font-family: sans-serif;" id="porc-completado-label">Perfil completo al <?php echo $this->_tpl_vars['tsPerfil']['porcentaje']; ?>
%</h3>
                    <div style="margin-top:5px;text-align:center;font-size:13px;margin-bottom:10px;color:#FFF;text-shadow: 0 1px 0px #000" id="porc-completado">
                        <div style="background: #F0F0F0;padding: 6px;margin: 5px;line-height: 17px;">
                            <div style="width: <?php echo $this->_tpl_vars['tsPerfil']['porcentaje']; ?>
%; height:17px;border-right:1px solid #004b8d; border-left: 1px solid #004b8d;background: url('<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/barra.gif') top left repeat-x;" id="porc-completado-barra">
                            </div>
                        </div>
                    </div>
                    </div>
                    <div id="prueba"></div>