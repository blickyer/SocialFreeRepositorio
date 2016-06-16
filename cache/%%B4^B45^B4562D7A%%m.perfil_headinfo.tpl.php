<?php /* Smarty version 2.6.28, created on 2016-06-16 12:35:41
         compiled from modules/m.perfil_headinfo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'modules/m.perfil_headinfo.tpl', 6, false),array('modifier', 'fecha', 'modules/m.perfil_headinfo.tpl', 17, false),)), $this); ?>
                <div class="perfil-user clearfix">
                    <div class="perfil-box clearfix">
                        <div class="perfil-data">
                        <?php if ($this->_tpl_vars['tsInfo']['p_fondoper'] != ''): ?>
                        <div class="perfil-avatar2">
                        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['tsInfo']['nick']; ?>
"><img alt="" src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php if ($this->_tpl_vars['tsInfo']['p_avatar']): ?><?php echo $this->_tpl_vars['tsInfo']['uid']; ?>
_120<?php else: ?>avatar<?php endif; ?>.jpg?<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y%m%d%H%M%S") : smarty_modifier_date_format($_tmp, "%Y%m%d%H%M%S")); ?>
"/></a>
                        </div>
                        <?php else: ?>
                                                 <div class="perfil-avatar">
                        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['tsInfo']['nick']; ?>
"><img alt="" src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php if ($this->_tpl_vars['tsInfo']['p_avatar']): ?><?php echo $this->_tpl_vars['tsInfo']['uid']; ?>
_120<?php else: ?>avatar<?php endif; ?>.jpg?<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y%m%d%H%M%S") : smarty_modifier_date_format($_tmp, "%Y%m%d%H%M%S")); ?>
"/></a>
                        </div>
                        <?php endif; ?>
                            <div class="perfil-info">
                                <h1 class="nick"><?php echo $this->_tpl_vars['tsInfo']['nick']; ?>
</h1>
                                <span class="PI_rango" style="color:#<?php echo $this->_tpl_vars['tsInfo']['stats']['r_color']; ?>
;text-shadow:#<?php echo $this->_tpl_vars['tsInfo']['stats']['r_color']; ?>
 1px 1px 10px"><?php echo $this->_tpl_vars['tsInfo']['stats']['r_name']; ?>
</span>
                                <span class="frase-personal"><?php if ($this->_tpl_vars['tsInfo']['p_mensaje']): ?>"<?php echo $this->_tpl_vars['tsInfo']['p_mensaje']; ?>
"<?php endif; ?></span>
                                <span class="bio"><?php if ($this->_tpl_vars['tsInfo']['p_nombre'] != ''): ?><?php echo $this->_tpl_vars['tsInfo']['p_nombre']; ?>
 es <?php else: ?>Es <?php endif; ?><?php if ($this->_tpl_vars['tsInfo']['user_sexo'] == 1): ?>un hombre<?php else: ?>una mujer<?php endif; ?>. Vive en <span id="info_pais"><?php echo $this->_tpl_vars['tsInfo']['user_pais']; ?>
</span> y se uni&oacute; a la familia de <?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
 el <?php echo ((is_array($_tmp=$this->_tpl_vars['tsInfo']['user_registro'])) ? $this->_run_mod_handler('fecha', true, $_tmp, true) : smarty_modifier_fecha($_tmp, true)); ?>
. <?php if ($this->_tpl_vars['tsInfo']['p_empresa']): ?>Trabaja en <?php echo $this->_tpl_vars['tsInfo']['p_empresa']; ?>
<?php endif; ?></span>                                
                                <div class="P_boton">                                
                                <?php if ($this->_tpl_vars['tsUser']->uid != $this->_tpl_vars['tsInfo']['uid'] && $this->_tpl_vars['tsUser']->is_member): ?>
                                <a class="btn_g unfollow_user_post qtip" title="Dejar de seguir" onclick="notifica.unfollow('user', <?php echo $this->_tpl_vars['tsInfo']['uid']; ?>
, notifica.userInPostHandle, $(this).children('span'))" <?php if ($this->_tpl_vars['tsInfo']['follow'] == 0): ?>style="display: none;"<?php endif; ?>><span class="icons unfollow"></span></a>
                                <a class="btn_g follow_user_post qtip" title="Seguir Usuario" onclick="notifica.follow('user', <?php echo $this->_tpl_vars['tsInfo']['uid']; ?>
, notifica.userInPostHandle, $(this).children('span'))" <?php if ($this->_tpl_vars['tsInfo']['follow'] == 1): ?>style="display: none;"<?php endif; ?>><span class="icons follow"></span></a>
                                <a class="btn_g qtip" title="Mensaje Privado" href="#" onclick="mensaje.nuevo('<?php echo $this->_tpl_vars['tsInfo']['nick']; ?>
','','',''); return false"><span class="multiicons fotoMensaje"></span></a>
                                <?php endif; ?>
                                <?php if ($this->_tpl_vars['tsInfo']['p_socials']['f']): ?>  
                                <a target="_blank" href="http://www.facebook.com/<?php echo $this->_tpl_vars['tsInfo']['p_socials']['f']; ?>
" title="Facebook" class="sharer-button facebook qtip"></a>
                                <?php endif; ?>  
                                <?php if ($this->_tpl_vars['tsInfo']['p_socials']['t']): ?>
                                <a target="_blank" href="http://www.twitter.com/<?php echo $this->_tpl_vars['tsInfo']['p_socials']['t']; ?>
" title="Twitter" class="sharer-button twitter qtip"></a>
                                <?php endif; ?>
                                 <?php if ($this->_tpl_vars['tsInfo']['p_socials']['yt']): ?>
                                <a target="_blank" href="http://www.youtube.com/channel/<?php echo $this->_tpl_vars['tsInfo']['p_socials']['yt']; ?>
" title="Canal de YouTube" class="sharer-button youtuber qtip"></a>
                                <?php endif; ?>
                                <?php if ($this->_tpl_vars['tsInfo']['p_steam']): ?>
                                <a target="_blank" href="http://steamcommunity.com/id/<?php echo $this->_tpl_vars['tsInfo']['p_steam']; ?>
" title="Steam" class="sharer-button steam qtip"></a> 
                                <?php endif; ?>
                                <?php if ($this->_tpl_vars['tsInfo']['p_skype']): ?>
                                <a target="_blank" href="skype:<?php echo $this->_tpl_vars['tsInfo']['p_skype']; ?>
?call" title="Llamar con Skype" class="sharer-button skype qtip"></a>
                                <?php endif; ?>                                    
                                <?php if ($this->_tpl_vars['tsUser']->is_admod == 1): ?>
                                <a href="#" class="btn_g qtip" onclick="location.href = '<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/users?act=show&amp;uid=<?php echo $this->_tpl_vars['tsInfo']['uid']; ?>
'" title="Editar a <?php echo $this->_tpl_vars['tsInfo']['nick']; ?>
"><span class="multiicons perfilEditar"></span></a>
                                <?php endif; ?>
                               </div>
                                <br />
                            </div>
                        </div>
                        <div class="user-level">
                            <ul class="clearfix">
                                                        <li>
                                    <strong><?php echo $this->_tpl_vars['tsInfo']['stats']['user_puntos']; ?>
</strong>
                                    <span>Puntos</span>
                                </li>
                                <li>
                                    <strong><?php echo $this->_tpl_vars['tsInfo']['stats']['user_posts']; ?>
</strong>
                                    <span>Posts</span>
                                </li>
                                <li>
                                    <strong><?php echo $this->_tpl_vars['tsInfo']['stats']['user_comentarios']; ?>
</strong>
                                    <span>Comentarios</span>
                                </li>
  
                                <li>
                                    <strong><?php echo $this->_tpl_vars['tsInfo']['visitas_total']; ?>
</strong>
                                    <span>Visitas</span>
                                </li>
                                <li>
                                    <strong><?php echo $this->_tpl_vars['tsInfo']['stats']['user_seguidores']; ?>
</strong>
                                    <span>Seguidores</span>
                                </li>
                              <li>
                                    <strong><?php echo $this->_tpl_vars['tsInfo']['user_referidos']; ?>
</strong>
                                    <span>Referidos</span>
                                </li>
                                <li id="xdin">
<strong>$<?php if ($this->_tpl_vars['tsInfo']['stats']['x_dinero'] != ''): ?><?php echo $this->_tpl_vars['tsInfo']['stats']['x_dinero']; ?>
<?php else: ?>0<?php endif; ?></strong>
<span>Dinero Acumulado</span>
</li>
<li id="xdin">
<strong>$<?php echo $this->_tpl_vars['tsInfo']['stats']['dinok']; ?>
</strong>
<span>Dinero Pagado</span>
</li>
                
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="menu-tabs-perfil clearfix">
                        <ul id="tabs_menu">
                            <li><a style="height: 42px;padding: 0;border-left: 0;"></a></li>
                            <?php if ($this->_tpl_vars['tsType'] == 'news' || $this->_tpl_vars['tsType'] == 'story'): ?>
                            <li class="selected"><a href="#" onclick="perfil.load_tab('news', this); return false"><?php if ($this->_tpl_vars['tsType'] == 'story'): ?>Publicaci&oacute;n<?php else: ?>Noticias<?php endif; ?></a></li>
                            <?php endif; ?>
                            <li <?php if ($this->_tpl_vars['tsType'] == 'wall'): ?>class="selected"<?php endif; ?>><a href="#" onclick="perfil.load_tab('wall', this); return false">Muro</a></li>
                            <li><a href="#" onclick="perfil.load_tab('actividad', this); return false" id="actividad">Actividad</a></li>
                            <li><a href="#" onclick="perfil.load_tab('info', this); return false" id="informacion">Informaci&oacute;n</a></li>
                            <li><a href="#" onclick="perfil.load_tab('posts', this); return false">Posts</a></li>
                            <li><a href="#" onclick="perfil.load_tab('seguidores', this); return false" id="seguidores">Seguidores</a></li>
                            <li><a href="#" onclick="perfil.load_tab('siguiendo', this); return false" id="siguiendo">Siguiendo</a></li>
                            <li><a href="#" onclick="perfil.load_tab('medallas', this); return false">Medallas</a></li>
                            <?php if ($this->_tpl_vars['tsUser']->is_member): ?>
                            <li class="red"><a href="javascript:bloquear(<?php echo $this->_tpl_vars['tsInfo']['uid']; ?>
, <?php if ($this->_tpl_vars['tsInfo']['block']['bid']): ?>false<?php else: ?>true<?php endif; ?>, 'perfil')" id="bloquear_cambiar"><?php if ($this->_tpl_vars['tsInfo']['block']['bid']): ?>Desbloquear<?php else: ?>Bloquear<?php endif; ?></a></li>
                            <li class="red"><a href="#" onclick="denuncia.nueva('usuario',<?php echo $this->_tpl_vars['tsInfo']['uid']; ?>
, '', '<?php echo $this->_tpl_vars['tsInfo']['nick']; ?>
'); return false">Denunciar</a></li>
                            <?php if (( $this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['mosu'] ) && ! $this->_tpl_vars['tsInfo']['user_baneado']): ?>
                            <li class="red"><a href="#" onclick="mod.users.action(<?php echo $this->_tpl_vars['tsInfo']['uid']; ?>
, 'ban', true); return false;">Suspender</a></li>
                            <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>