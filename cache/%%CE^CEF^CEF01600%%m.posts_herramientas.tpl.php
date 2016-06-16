<?php /* Smarty version 2.6.28, created on 2016-06-16 12:47:01
         compiled from modules/m.posts_herramientas.tpl */ ?>
<?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['moep'] || $this->_tpl_vars['tsAutor']['user_id'] == $this->_tpl_vars['tsUser']->uid || $this->_tpl_vars['tsUser']->permisos['moedpo'] || $this->_tpl_vars['tsUser']->permisos['moayca'] || $this->_tpl_vars['tsUser']->permisos['most'] || $this->_tpl_vars['tsUser']->permisos['moayca'] || $this->_tpl_vars['tsUser']->permisos['moop'] || $this->_tpl_vars['tsUser']->permisos['mosu'] || $this->_tpl_vars['tsUser']->permisos['modu']): ?>
<div class="mod-actions">
    <div class="box_title">Herramientas</div>
    <div class="box_cuerpo" style="padding: 0;text-align: center;">
    	<?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['modu'] || $this->_tpl_vars['tsUser']->permisos['mosu']): ?>
        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/moderacion/buscador/1/1/<?php echo $this->_tpl_vars['tsPost']['post_ip']; ?>
" target="_blank"><i class="multiicons modIp"></i><?php echo $this->_tpl_vars['tsPost']['post_ip']; ?>

        </a>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['tsUser']->is_admod == 1): ?>
        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/admin/users?act=show&amp;uid=<?php echo $this->_tpl_vars['tsAutor']['user_id']; ?>
"><i class="multiicons modEditar"></i>Editar Usuario</a><?php endif; ?>
        <?php if ($this->_tpl_vars['tsAutor']['user_id'] != $this->_tpl_vars['tsUser']->uid): ?>
        <a href="#" onclick="mod.users.action(<?php echo $this->_tpl_vars['tsAutor']['user_id']; ?>
, 'aviso', false); return false;"><i class="multiicons modAviso"></i>Enviar Aviso</a>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['tsAutor']['user_id'] != $this->_tpl_vars['tsUser']->uid && $this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['modu'] || $this->_tpl_vars['tsUser']->permisos['mosu']): ?>
        <?php if ($this->_tpl_vars['tsAutor']['user_baneado']): ?>
        <?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['modu']): ?>
        <a href="#" onclick="mod.reboot(<?php echo $this->_tpl_vars['tsAutor']['user_id']; ?>
, 'users', 'unban', false); $(this).remove(); return false;"><i class="multiicons modUban"></i>Desuspender Usuario</a>
        <?php endif; ?>
        <?php else: ?>
        <?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['mosu']): ?>
        <a href="#" onclick="mod.users.action(<?php echo $this->_tpl_vars['tsAutor']['user_id']; ?>
, 'ban', false); $(this).remove(); return false;"><i class="multiicons modBan"></i>Suspender Usuario</a>
        <?php endif; ?>
        <?php endif; ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['tsPost']['post_user'] == $this->_tpl_vars['tsUser']->uid && $this->_tpl_vars['tsUser']->is_admod == 0 && $this->_tpl_vars['tsUser']->permisos['most'] == false && $this->_tpl_vars['tsUser']->permisos['moayca'] == false && $this->_tpl_vars['tsUser']->permisos['moo'] == false && $this->_tpl_vars['tsUser']->permisos['moep'] == false && $this->_tpl_vars['tsUser']->permisos['moedpo'] == false): ?>
        <a title="Borrar Post" onclick="borrar_post(); return false;" href="#"><i class="multiicons modBorrar"></i>Borrar Post</a>
        <a title="Editar Post" onclick="location.href='<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/editar/<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
'; return false" href="#"><i class="multiicons modEditar"></i>Editar Post</a>
    <?php elseif (( $this->_tpl_vars['tsUser']->is_admod && $this->_tpl_vars['tsPost']['post_status'] == 0 ) || $this->_tpl_vars['tsUser']->permisos['most'] || $this->_tpl_vars['tsUser']->permisos['moayca'] || $this->_tpl_vars['tsUser']->permisos['moop'] || $this->_tpl_vars['tsUser']->permisos['moep'] || $this->_tpl_vars['tsUser']->permisos['moedpo']): ?>
        <?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['most']): ?>
        <a href="#" onclick="mod.reboot(<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
, 'posts', 'sticky', false); if($(this).text() == 'Poner Sticky') $(this).text('Quitar Sticky'); else $(this).text('Poner Sticky'); return false;"><i class="multiicons modSticky"></i><?php if ($this->_tpl_vars['tsPost']['post_sticky'] == 1): ?>Quitar<?php else: ?>Poner<?php endif; ?> Sticky</a>
        <?php endif; ?>                                
        <?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['moayca']): ?>
        <a href="#" onclick="mod.reboot(<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
, 'posts', 'openclosed', false); if($(this).text() == 'Cerrar Post') $(this).html('Abrir Comentarios'); else $(this).html('Cerrar Comentarios'); return false;"><?php if ($this->_tpl_vars['tsPost']['post_block_comments'] == 1): ?><i class="multiicons modAbrir"></i>Abrir<?php else: ?><i class="multiicons modCerrar"></i>Cerrar<?php endif; ?> Comentarios</a>
        <?php endif; ?>								
        <?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['moop']): ?>
        <a id="desaprobar" href="#" onclick="$('#desapprove').slideToggle(); return false;"><i class="multiicons modOcultar"></i>Ocultar Post</a>
        <?php endif; ?>								
        <?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['moedpo'] || $this->_tpl_vars['tsAutor']['user_id'] == $this->_tpl_vars['tsUser']->uid): ?>
        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/editar/<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
"><i class="multiicons modEditar"></i>Editar Post</a>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->permisos['moep'] || $this->_tpl_vars['tsAutor']['user_id'] == $this->_tpl_vars['tsUser']->uid): ?>
        <a href="#" onclick="<?php if ($this->_tpl_vars['tsAutor']['user_id'] != $this->_tpl_vars['tsUser']->uid): ?>mod.posts.borrar(<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
, 'posts', null);<?php else: ?>borrar_post();<?php endif; ?> return false;"><i class="multiicons modBorrar"></i>Borrar Post</a>
        <?php endif; ?>							
        <div id="desapprove" style="display:none;">
            <span style="display: none;" class="errormsg"></span>
            <input type="text" id="d_razon" name="d_razon" maxlength="150" size="60" class="text-inp" placeholder="Raz&oacute;n de la revisi&oacute;n" style="width: 217px;margin: 5px;"/ required>
            <input type="button" class="mBtn btnOk" name="desapprove" value="Continuar" href="#" onclick="mod.posts.ocultar('<?php echo $this->_tpl_vars['tsPost']['post_id']; ?>
'); return false;" style="margin-bottom: 8px;" />
        </div>                           
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>