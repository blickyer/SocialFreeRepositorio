<?php /* Smarty version 2.6.28, created on 2016-06-16 12:35:41
         compiled from modules/m.perfil_sidebar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'modules/m.perfil_sidebar.tpl', 14, false),array('modifier', 'truncate', 'modules/m.perfil_sidebar.tpl', 14, false),array('modifier', 'hace', 'modules/m.perfil_sidebar.tpl', 33, false),)), $this); ?>
<div style="margin-bottom: 10px">
                            <?php echo $this->_tpl_vars['tsConfig']['ads_300']; ?>

                        </div>
                         <?php if ($this->_tpl_vars['tsInfo']['can_pvis'] || $this->_tpl_vars['tsInfo']['user_id'] == $this->_tpl_vars['tsUser']->uid): ?>
                        <div class="widget w-medallas clearfix">
                            <div class="title-w clearfix">
                                <h3>&Uacute;ltimos posts visitados por <?php echo $this->_tpl_vars['tsInfo']['user_name']; ?>
</h3>
                            </div>
                            <?php if ($this->_tpl_vars['tsInfo']['p_visitados']): ?>
                            <ul class="clearfix">
                            <?php $_from = $this->_tpl_vars['tsInfo']['p_visitados']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['v']):
?>
                                <li2>
                                    <strong style="color: #16A5DD;"><?php if ($this->_tpl_vars['i'] <= 8): ?>0<?php endif; ?><?php echo $this->_tpl_vars['i']+1; ?>
. </strong>
                                    <a style="" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['v']['c_seo']; ?>
/<?php echo $this->_tpl_vars['v']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html" class="size13" title="<?php echo $this->_tpl_vars['v']['post_title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['post_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 45) : smarty_modifier_truncate($_tmp, 45)); ?>
</a>
                                </li2>
                            <?php endforeach; endif; unset($_from); ?>
                            </ul>
                            <?php else: ?>
                            <div class="emptyData"><?php if ($this->_tpl_vars['tsInfo']['user_id'] == $this->_tpl_vars['tsUser']->uid): ?>No has<?php else: ?><?php echo $this->_tpl_vars['tsInfo']['user_name']; ?>
 no ha<?php endif; ?> visitado ning&uacute;n post.</div>
                            <?php endif; ?>
                        </div>
                       <?php endif; ?> 
                        <div class="widget w-seguidores clearfix">
                     <div class="title-w clearfix">
                     <h3>&Uacute;ltimos comentarios</h3>
                                <span><?php echo $this->_tpl_vars['tsInfo']['stats']['user_comentarios']; ?>
</span>
                     </div>
                            <?php if ($this->_tpl_vars['tsInfo']['stats']['user_comentarios'] > 0): ?>
             <ul class="clearfix">
                            <?php $_from = $this->_tpl_vars['tsGeneral']['com']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['c']):
?>
                                <li2>
                                 <strong style="color: #16A5DD;"><?php if ($this->_tpl_vars['i'] <= 8): ?>0<?php endif; ?><?php echo $this->_tpl_vars['i']+1; ?>
. </strong>
                                 <a style="" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['c']['c_seo']; ?>
/<?php echo $this->_tpl_vars['c']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['c']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html#pp_<?php echo $this->_tpl_vars['c']['cid']; ?>
" class="qtip size13" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['c']['c_date'])) ? $this->_run_mod_handler('hace', true, $_tmp) : smarty_modifier_hace($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['c']['post_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 45) : smarty_modifier_truncate($_tmp, 45)); ?>
</a>
                                </li2>
                            <?php endforeach; endif; unset($_from); ?>
             </ul>
                            <?php else: ?>
                            <div class="emptyData">No tiene comentarios.</div>
                            <?php endif; ?>
              </div>

                        <div class="widget w-medallas clearfix">
                            <div class="title-w clearfix">
                                <h3>Medallas</h3>
                                <span><?php echo $this->_tpl_vars['tsGeneral']['m_total']; ?>
</span>
                            </div>
                            <?php if ($this->_tpl_vars['tsGeneral']['m_total']): ?>
                            <ul class="clearfix">
                                <?php $_from = $this->_tpl_vars['tsGeneral']['medallas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
                            <img src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/med/<?php echo $this->_tpl_vars['m']['m_image']; ?>
_32.png" class="qtip" title="<?php echo $this->_tpl_vars['m']['m_title']; ?>
 - <?php echo $this->_tpl_vars['m']['m_description']; ?>
"/>
                                <?php endforeach; endif; unset($_from); ?>
                            </ul>
                            <?php if ($this->_tpl_vars['tsGeneral']['m_total'] >= 21): ?><a href="#medallas" onclick="perfil.load_tab('medallas', $('#medallas'));" class="see-more">Ver m&aacute;s &raquo;</a><?php endif; ?>
                            <?php else: ?>
                            <div class="emptyData">No tiene medallas</div>
                            <?php endif; ?>
                        </div>
                        <div class="widget w-seguidores clearfix">
                            <div class="title-w clearfix">
                                <h3>Seguidores</h3>
                                <span><?php echo $this->_tpl_vars['tsInfo']['stats']['user_seguidores']; ?>
</span>
                            </div>
                            <?php if ($this->_tpl_vars['tsGeneral']['segs']['data']): ?>
                            <ul class="clearfix">
                                <?php $_from = $this->_tpl_vars['tsGeneral']['segs']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['s']):
?>
                                <li><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['s']['user_name']; ?>
" class="hovercard" uid="<?php echo $this->_tpl_vars['s']['user_id']; ?>
" style="display:inline-block;"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['s']['user_id']; ?>
_50.jpg" width="32" height="32"/></a></li>
                                <?php endforeach; endif; unset($_from); ?>
                            </ul>
                            <?php if ($this->_tpl_vars['tsGeneral']['segs']['total'] >= 21): ?><a href="#seguidores" onclick="perfil.load_tab('seguidores', $('#seguidores'));" class="see-more">Ver m&aacute;s &raquo;</a><?php endif; ?>
                            <?php else: ?>
                            <div class="emptyData">No tiene seguidores</div>
                            <?php endif; ?>
                        </div>
                        <div class="widget w-siguiendo clearfix">
                            <div class="title-w clearfix">
                              <h3>Siguiendo</h3>
                              <span><?php echo $this->_tpl_vars['tsGeneral']['sigd']['total']; ?>
</span>
                            </div>
                            <?php if ($this->_tpl_vars['tsGeneral']['sigd']['data']): ?>
                            <ul class="clearfix">
                                <?php $_from = $this->_tpl_vars['tsGeneral']['sigd']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['s']):
?>
                                <li><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['s']['user_name']; ?>
" class="hovercard" uid="<?php echo $this->_tpl_vars['s']['user_id']; ?>
" style="display:inline-block;"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['s']['user_id']; ?>
_50.jpg" width="32" height="32"/></a></li>
                                <?php endforeach; endif; unset($_from); ?>
                            </ul>
                            <?php if ($this->_tpl_vars['tsGeneral']['sigd']['total'] >= 21): ?><a href="#siguiendo" onclick="perfil.load_tab('siguiendo', $('#siguiendo'));" class="see-more">Ver m&aacute;s &raquo;</a><?php endif; ?>
                            <?php else: ?>
                            <div class="emptyData">No sigue usuarios</div>
                            <?php endif; ?>
                        </div>
                        <div class="widget w-visitas clearfix">
                            <div class="title-w clearfix">
                              <h3>&Uacute;ltimas visitas</h3>
                              <span><?php echo $this->_tpl_vars['tsInfo']['visitas_total']; ?>
</span>
                            </div>
                            <?php if ($this->_tpl_vars['tsInfo']['visitas']): ?>
                            <ul class="clearfix">
                                <?php $_from = $this->_tpl_vars['tsInfo']['visitas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                                <li><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['v']['user_name']; ?>
" class="hovercard" uid="<?php echo $this->_tpl_vars['v']['user_id']; ?>
" style="display:inline-block;"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['v']['user_id']; ?>
_50.jpg" class="vctip" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['date'])) ? $this->_run_mod_handler('hace', true, $_tmp, true) : smarty_modifier_hace($_tmp, true)); ?>
" width="32" height="32"/></a></li>
                                <?php endforeach; endif; unset($_from); ?>
                            </ul>
                            <?php else: ?>
                            <div class="emptyData">No tiene visitas</div>
                            <?php endif; ?>
                        </div>
                                                <div class="widget w-comunidades clearfix">
                            <div class="title-w clearfix">
                              <h3>Comunidades</h3>
                              <span><?php echo $this->_tpl_vars['tsGeneral']['comus_total']; ?>
</span>
                            </div>
                            <?php if ($this->_tpl_vars['tsGeneral']['comus']): ?>
                            <ul class="clearfix">
                                <?php $_from = $this->_tpl_vars['tsGeneral']['comus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
                                <li style="width: 100%;margin-bottom: 5px;">
                                <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['c']['c_nombre_corto']; ?>
/" class="floatL" style="margin-right: 3px;"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/uploads/c_<?php echo $this->_tpl_vars['c']['c_id']; ?>
.jpg" width="32" height="32"/></a>
                                <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/<?php echo $this->_tpl_vars['c']['c_nombre_corto']; ?>
/" style="color:#006595;font-weight:bold;font-size:12px;"><?php echo $this->_tpl_vars['c']['c_nombre']; ?>
</a>
                                <span style="display: block;font-size: 11px;color: #999;"><?php echo $this->_tpl_vars['c']['c_miembros']; ?>
 Miembros</span>
                                </li>
                                <?php endforeach; endif; unset($_from); ?>
                            </ul>
                            <a href="#comunidades" onclick="perfil.load_tab('comunidades', $('#comunidades'));" class="see-more">Ver todas &raquo;</a>
                            <?php else: ?>
                            <div class="emptyData">No participa en ninguna comunidad</div>
                            <?php endif; ?>
                        </div>