<?php /* Smarty version 2.6.28, created on 2016-06-16 12:39:16
         compiled from t.php_files/p.live.vcard.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', 't.php_files/p.live.vcard.tpl', 11, false),)), $this); ?>
<div class="hovercard-inner">
    <div class="bd">
        <?php if ($this->_tpl_vars['tsData']['p_fondoper'] != ''): ?><img src="<?php echo $this->_tpl_vars['tsData']['p_fondoper']; ?>
" style="height:75px;width:278px;"><?php endif; ?>
        <a <?php if ($this->_tpl_vars['tsData']['p_fondoper'] != ''): ?>style="margin: -20px 10px;"<?php endif; ?> href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['tsData']['user_name']; ?>
" class="profile-pic"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['tsData']['user_id']; ?>
_50.jpg" class="avatar" /></a>
        <div class="bio" <?php if ($this->_tpl_vars['tsData']['p_fondoper'] != ''): ?>style="margin-left: 70px;"<?php endif; ?>>
            <p class="fn-above" style="color:#<?php echo $this->_tpl_vars['tsData']['stats']['r_color']; ?>
"><?php if ($this->_tpl_vars['tsData']['p_nombre']): ?><?php echo $this->_tpl_vars['tsData']['p_nombre']; ?>
<?php else: ?><?php echo $this->_tpl_vars['tsData']['user_name']; ?>
<?php endif; ?></p>
            <p class="sn"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['tsData']['user_name']; ?>
">@<?php echo $this->_tpl_vars['tsData']['user_name']; ?>
</a></p>
            <p class="location">
                <img title="<?php echo $this->_tpl_vars['tsData']['status']['t']; ?>
" class="status <?php echo $this->_tpl_vars['tsData']['status']['css']; ?>
 vctip" src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/space.gif"/>
                <img title="<?php if ($this->_tpl_vars['tsData']['user_sexo'] == 1): ?>Hombre<?php else: ?>Mujer<?php endif; ?>" src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/<?php if ($this->_tpl_vars['tsData']['user_sexo'] == 0): ?>fe<?php endif; ?>male.png" class="vctip"/>
                <img title="" style="padding:2px" src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/flags/<?php echo ((is_array($_tmp=$this->_tpl_vars['tsData']['user_pais'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
.png" class="vctip"/>
                <img title="<?php echo $this->_tpl_vars['tsData']['stats']['r_name']; ?>
" src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/ran/<?php echo $this->_tpl_vars['tsData']['stats']['r_image']; ?>
" class="vctip"/>
                <?php if ($this->_tpl_vars['tsData']['p_sitio']): ?><a href="<?php echo $this->_tpl_vars['tsData']['p_sitio']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/www.png" title="Sitio web" class="vctip"/></a><?php endif; ?>
                <?php if ($this->_tpl_vars['tsUser']->uid != $this->_tpl_vars['tsData']['user_id'] && $this->_tpl_vars['tsUser']->is_member): ?><a onclick="mensaje.nuevo('<?php echo $this->_tpl_vars['tsData']['user_name']; ?>
','','','');return false" href="#"><img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icon-mensajes-recibidos.gif" title="Enviar mensaje privado" class="vctip"/></a><?php endif; ?>
				<?php if ($this->_tpl_vars['tsUser']->is_admod == 1): ?><img title="Administrar" src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/editar.png" style="width:14px;height:14px;cursor:pointer;" class="vctip" onclick="location.href = '<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/users?act=show&amp;uid=<?php echo $this->_tpl_vars['tsData']['user_id']; ?>
'"/><?php endif; ?>
			</p>
        </div>
        <div class="description">
            <div class="description-inner" style="border-top:1px dashed #DDD">
                <?php if ($this->_tpl_vars['tsData']['p_mensaje']): ?><p><strong>Mensaje:</strong> <?php echo $this->_tpl_vars['tsData']['p_mensaje']; ?>
</p><div style="border-top:1px dashed #DDD;line-height:1px">&nbsp;</div><?php endif; ?>
                <strong>Estad&iacute;sticas:</strong>
                <ul class="user_stats">
                    <li class="first">
                        <span class="stat"><?php echo $this->_tpl_vars['tsData']['stats']['user_puntos']; ?>
</span>
                        <span class="type">Puntos</span>
                    </li>
                    <li>
                        <span class="stat"><?php echo $this->_tpl_vars['tsData']['stats']['user_posts']; ?>
</span>
                        <span class="type">Posts</span>
                    </li>
                    <li>
                        <span class="stat"><?php echo $this->_tpl_vars['tsData']['stats']['user_comentarios']; ?>
</span>
                        <span class="type">Comentarios</span>
                    </li>
                    <li class="last">
                        <span class="stat mft_<?php echo $this->_tpl_vars['tsData']['user_id']; ?>
"><?php echo $this->_tpl_vars['tsData']['stats']['user_seguidores']; ?>
</span>
                        <span class="type">Seguidores</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="follow-controls">
        <?php if ($this->_tpl_vars['tsUser']->uid != $this->_tpl_vars['tsData']['user_id'] && $this->_tpl_vars['tsUser']->is_member): ?>
            <a class="btn_g mf_<?php echo $this->_tpl_vars['tsData']['user_id']; ?>
" onclick="notifica.unfollow('user', <?php echo $this->_tpl_vars['tsData']['user_id']; ?>
, notifica.userInMencionHandle, $(this).children('span'))" <?php if ($this->_tpl_vars['tsData']['follow'] == 0): ?>style="display: none;"<?php endif; ?>><span class="icons unfollow">Dejar de seguir</span></a>
            <a class="btn_g mf_<?php echo $this->_tpl_vars['tsData']['user_id']; ?>
" onclick="notifica.follow('user', <?php echo $this->_tpl_vars['tsData']['user_id']; ?>
, notifica.userInMencionHandle, $(this).children('span'))" <?php if ($this->_tpl_vars['tsData']['follow'] == 1): ?>style="display: none;"<?php endif; ?>><span class="icons follow">Seguir Usuario</span></a>
        <?php endif; ?>
        </div>
    </div>
</div>