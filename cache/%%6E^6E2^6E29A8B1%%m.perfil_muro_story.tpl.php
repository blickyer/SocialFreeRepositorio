<?php /* Smarty version 2.6.28, created on 2016-06-16 12:48:12
         compiled from modules/m.perfil_muro_story.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'quot', 'modules/m.perfil_muro_story.tpl', 9, false),array('modifier', 'fecha', 'modules/m.perfil_muro_story.tpl', 38, false),)), $this); ?>
                                <?php $_from = $this->_tpl_vars['tsMuro']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
                                <div class="Story" id="pub_<?php echo $this->_tpl_vars['p']['pub_id']; ?>
">
                                    <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['p']['user_name']; ?>
" class="Story_Pic"><img alt="<?php echo $this->_tpl_vars['p']['user_name']; ?>
" src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['p']['p_user_pub']; ?>
_50.jpg"/></a>
                                    <div class="Story_Content">
                                        <div class="Story_Head">
                                            <?php if ($this->_tpl_vars['p']['p_user'] == $this->_tpl_vars['tsUser']->uid || $this->_tpl_vars['p']['p_user_pub'] == $this->_tpl_vars['tsUser']->uid || $this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['moepm']): ?><div class="Story_Hide"><a href="#" onclick="muro.del_pub(<?php echo $this->_tpl_vars['p']['pub_id']; ?>
,1); return false;" title="Eliminar la publicaci&oacute;n" class="qtip uiClose"></a></div><?php endif; ?>
                                            <div class="Story_Message">
                                                <div class="autor"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['p']['user_name']; ?>
" class="a_blue"><?php if ($this->_tpl_vars['p']['user_name'] == $this->_tpl_vars['tsUser']->nick): ?>Yo<?php else: ?><?php echo $this->_tpl_vars['p']['user_name']; ?>
<?php endif; ?></a></div>
                                                <span><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['p_body'])) ? $this->_run_mod_handler('quot', true, $_tmp) : smarty_modifier_quot($_tmp)); ?>
</span>
                                                <?php if ($this->_tpl_vars['p']['p_type'] != 1): ?>
                                                <div class="mvm clearfix">
                                                    <?php if ($this->_tpl_vars['p']['p_type'] == 2): ?>
                                                    <a class="uiPhoto"><img src="<?php echo $this->_tpl_vars['p']['a_img']; ?>
"/></a>
                                                    <?php elseif ($this->_tpl_vars['p']['p_type'] == 3): ?>
                                                    <div class="uiLink">
                                                        <div><a href="<?php echo $this->_tpl_vars['p']['a_url']; ?>
" target="_blank" class="a_blue"><strong><?php echo $this->_tpl_vars['p']['a_title']; ?>
</strong></a></div>
                                                        <a href="<?php echo $this->_tpl_vars['p']['a_url']; ?>
" target="_blank" class="a_blue"><?php echo $this->_tpl_vars['p']['a_url']; ?>
</a>
                                                    </div>
                                                    <?php elseif ($this->_tpl_vars['p']['p_type'] == 4): ?>
                                                    <a href="#" onclick="muro.load_atta('video','<?php echo $this->_tpl_vars['p']['a_url']; ?>
', this); return false;"class="uiVideoThumb">
                                                        <img src="http://img.youtube.com/vi/<?php echo $this->_tpl_vars['p']['a_url']; ?>
/0.jpg" width="235" height="135"/>
                                                        <i></i>
                                                    </a>
                                                    <div class="videoDesc">
                                                        <strong><a href="http://www.youtube.com/watch?v=<?php echo $this->_tpl_vars['p']['a_url']; ?>
" target="_blank" class="a_blue"><?php echo $this->_tpl_vars['p']['a_title']; ?>
</a></strong>
                                                        <div style="margin-top:5px;text-align: justify;">
                                                        <?php echo $this->_tpl_vars['p']['a_desc']; ?>

                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="Story_Foot">
                                            <div class="Story_Info">
                                                <i class="stream w_<?php if ($this->_tpl_vars['p']['p_type'] == 1 && $this->_tpl_vars['p']['p_user'] == $this->_tpl_vars['p']['p_user_pub']): ?>0<?php else: ?><?php echo $this->_tpl_vars['p']['p_type']; ?>
<?php endif; ?>"></i>
                                                <span class="text"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['p_date'])) ? $this->_run_mod_handler('fecha', true, $_tmp) : smarty_modifier_fecha($_tmp)); ?>
</span>
                                                <a onclick="muro.like_this(<?php echo $this->_tpl_vars['p']['pub_id']; ?>
, 'pub', this); return false;" class="a_blue text"><?php echo $this->_tpl_vars['p']['likes']['link']; ?>
</a>
                                                <a onclick="muro.show_comment_box(<?php echo $this->_tpl_vars['p']['pub_id']; ?>
); return false" class="a_blue text">Comentar</a>
                                                <?php if ($this->_tpl_vars['tsUser']->is_admod): ?>
                                                <span class="text"><?php echo $this->_tpl_vars['p']['p_ip']; ?>
</span>
                                                <?php endif; ?>
                                            </div>
                                            <ul id="cb_<?php echo $this->_tpl_vars['p']['pub_id']; ?>
" class="Story_Comments" <?php if ($this->_tpl_vars['p']['p_comments'] == 0 && $this->_tpl_vars['p']['p_likes'] == 0): ?>style="display:none"<?php endif; ?>>
                                                <li class="lifi"><i></i></li>
                                                <li class="ufiItem" <?php if ($this->_tpl_vars['p']['p_likes'] == 0): ?>style="display:none"<?php endif; ?>>
                                                    <div class="likes clearfix">
                                                        <i></i>
                                                        <span class="floatL" id="lk_<?php echo $this->_tpl_vars['p']['pub_id']; ?>
"><?php echo $this->_tpl_vars['p']['likes']['text']; ?>
</span>
                                                    </div>
                                                </li>
                                                <li>
                                                   <ul id="cl_<?php echo $this->_tpl_vars['p']['pub_id']; ?>
" class="commentList">
                                                        <?php if ($this->_tpl_vars['p']['p_comments'] > 2 && ! $this->_tpl_vars['p']['hide_more_cm']): ?>
                                                        <li class="ufiItem">
                                                            <div class="more_comments clearfix">
                                                                <i></i>
                                                                <a href="#" class="a_blue floatL" onclick="muro.more_comments(<?php echo $this->_tpl_vars['p']['pub_id']; ?>
, this); return false">Ver los <?php echo $this->_tpl_vars['p']['p_comments']; ?>
 comentarios</a>
                                                                <img width="16" height="11" src="http://static.ak.fbcdn.net/rsrc.php/yb/r/GsNJNwuI-UM.gif"/>
                                                            </div>
                                                        </li>
                                                        <?php endif; ?>
                                                        <?php $_from = $this->_tpl_vars['p']['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
                                                        <li class="ufiItem" id="cmt_<?php echo $this->_tpl_vars['c']['cid']; ?>
">
                                                            <div class="clearfix">
                                                                <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['c']['user_name']; ?>
" class="autorPic"><img alt="<?php echo $this->_tpl_vars['c']['user_name']; ?>
" src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['c']['c_user']; ?>
_50.jpg" width="32" height="32"/></a>
                                                                <?php if ($this->_tpl_vars['p']['p_user'] == $this->_tpl_vars['tsUser']->uid || $this->_tpl_vars['c']['c_user'] == $this->_tpl_vars['tsUser']->uid || $this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['moecm']): ?><span class="close"><a href="#" onclick="muro.del_pub(<?php echo $this->_tpl_vars['c']['cid']; ?>
, 2); return false" class="uiClose" title="Eliminar"></a></span><?php endif; ?>
                                                                <div class="mensaje">
                                                                    <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['c']['user_name']; ?>
" class="autorName a_blue"><?php echo $this->_tpl_vars['c']['user_name']; ?>
</a>
                                                                    <span><?php echo ((is_array($_tmp=$this->_tpl_vars['c']['c_body'])) ? $this->_run_mod_handler('quot', true, $_tmp) : smarty_modifier_quot($_tmp)); ?>
</span>
                                                                    <div class="cmInfo"><?php echo ((is_array($_tmp=$this->_tpl_vars['c']['c_date'])) ? $this->_run_mod_handler('fecha', true, $_tmp) : smarty_modifier_fecha($_tmp)); ?>
 &middot; <a onclick="muro.like_this(<?php echo $this->_tpl_vars['c']['cid']; ?>
, 'com', this); return false;" class="a_blue"><?php echo $this->_tpl_vars['c']['like']; ?>
</a> <span class="cm_like"<?php if ($this->_tpl_vars['c']['c_likes'] == 0): ?> style="display:none"<?php endif; ?>>&middot; <i></i> <a onclick="muro.show_likes(<?php echo $this->_tpl_vars['c']['cid']; ?>
, 'com'); return false;" id="lk_cm_<?php echo $this->_tpl_vars['c']['cid']; ?>
" class="a_blue"><?php echo $this->_tpl_vars['c']['c_likes']; ?>
 persona<?php if ($this->_tpl_vars['c']['c_likes'] > 1): ?>s<?php endif; ?></a></span><?php if ($this->_tpl_vars['tsUser']->is_admod): ?> &middot;<span class="cmInfo"><?php echo $this->_tpl_vars['c']['c_ip']; ?>
</span><?php endif; ?></div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php endforeach; endif; unset($_from); ?>
                                                   </ul> 
                                                </li><?php if ($this->_tpl_vars['tsPrivacidad']['mf']['v'] == true && $this->_tpl_vars['tsUser']->is_member || $this->_tpl_vars['tsType'] == 'news'): ?>
                                                <li class="ufiItem">
                                                    <div class="newComment">
                                                        <input type="text" title="Escribe un comentario...." name="hack" value="Escribe un comentario..." pid="<?php echo $this->_tpl_vars['p']['pub_id']; ?>
" />
                                                        <div class="formulario" style="display:none">
                                                            <img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['tsUser']->uid; ?>
_50.jpg" width="32" height="32"/>
                                                            <textarea class="comentar" title="Escribe un comentario..." id="cf_<?php echo $this->_tpl_vars['p']['pub_id']; ?>
" pid="<?php echo $this->_tpl_vars['p']['pub_id']; ?>
" name="add_wall_comment" onfocus="onfocus_input(this)" onblur="onblur_input(this)"></textarea>
                                                            <div class="clearBoth"></div>
                                                        </div>
                                                    </div>
                                                </li><?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="clearBoth"></div>
                                </div>
                                <?php endforeach; endif; unset($_from); ?>