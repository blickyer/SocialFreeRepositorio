<?php /* Smarty version 2.6.28, created on 2016-06-16 12:33:57
         compiled from juegos/j.jugar_comentarios.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fecha', 'juegos/j.jugar_comentarios.tpl', 21, false),array('modifier', 'date_format', 'juegos/j.jugar_comentarios.tpl', 21, false),array('modifier', 'nl2br', 'juegos/j.jugar_comentarios.tpl', 26, false),)), $this); ?>
<div class="j-box_body">
<div class="j-box">
	<div class="boxy-title">Comentarios<span class="floatR" id="total_com"><?php echo $this->_tpl_vars['tsJuego']['j_comments']; ?>
</span></div>
	<div class="j-box_content">
        <div id="mensajes">
            <?php if ($this->_tpl_vars['tsJuego']['j_comments'] > 0): ?>
            <?php $_from = $this->_tpl_vars['tsJComments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
            <div class="item" id="div_cmnt_<?php echo $this->_tpl_vars['c']['cid']; ?>
">
                <a class="avatar-box" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['c']['user_name']; ?>
">
                    <img  src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['c']['c_user']; ?>
_50.jpg" width="50" height="50" class="floatL"/>
                </a>
                <div class="firma">
                    <div class="options">
                        <?php if ($this->_tpl_vars['tsJuego']['j_user'] == $this->_tpl_vars['tsUser']->info['user_id'] || $this->_tpl_vars['tsUser']->is_admod || $this->_tpl_vars['tsUser']->uid == $this->_tpl_vars['c']['c_user']): ?>
                        <a href="#" onclick="juegos.borrar(<?php echo $this->_tpl_vars['c']['cid']; ?>
, 'com'); return false" class="floatR" style="margin:8px 5px">
                          <img title="Borrar Comentario" alt="borrar" src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/borrar.png"/>
                        </a>
                        <?php endif; ?>
                    </div>
                    
                    <div class="info"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/juegos/<?php echo $this->_tpl_vars['c']['user_name']; ?>
"><strong><?php echo $this->_tpl_vars['c']['user_name']; ?>
</strong></a> Publicado el <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['c']['c_date'])) ? $this->_run_mod_handler('fecha', true, $_tmp) : smarty_modifier_fecha($_tmp)))) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 <?php if ($this->_tpl_vars['tsUser']->is_admod): ?><span style="color:red;">IP:</span> <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/moderacion/buscador/1/1/<?php echo $this->_tpl_vars['c']['c_ip']; ?>
" class="geoip" target="_blank"><?php echo $this->_tpl_vars['c']['c_ip']; ?>
</a><?php endif; ?></div>
                    
                    <?php if (! $this->_tpl_vars['c']['user_activo']): ?><div>Escondido por pertener a una cuenta desactivada <a href="#" onclick="$('#hdn_<?php echo $this->_tpl_vars['c']['cid']; ?>
').slideDown(); $(this).parent().slideUp(); return false;">Click para verlo</a>.</div>
                        <div id="hdn_<?php echo $this->_tpl_vars['c']['cid']; ?>
" style="display:none">
                    <?php endif; ?>
                    <div class="clearfix"><?php echo ((is_array($_tmp=$this->_tpl_vars['c']['c_body'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>									
                    <?php if (! $this->_tpl_vars['c']['user_activo']): ?></div><?php endif; ?>									
                </div>
                <div class="clearBoth"></div>
            </div>
            <?php endforeach; endif; unset($_from); ?>
            <?php else: ?>
            <?php if ($this->_tpl_vars['tsJuego']['j_closed'] == 0): ?>
            <div id="no-comments">Este juego no tiene comentarios, Se el primero!.</div>
            <?php endif; ?>
            <?php endif; ?>
    	</div>
        <div class="mensajes error" style="display: none;"></div>
        <?php if ($this->_tpl_vars['tsJuego']['j_closed']): ?>
        <div id="no-comments">El juego se encuentra cerrado y no se permiten comentarios.</div>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['tsUser']->is_member): ?>   
        <?php if ($this->_tpl_vars['tsJuego']['j_closed'] == 0 || $this->_tpl_vars['tsUser']->uid == $this->_tpl_vars['tsJuego']['j_user'] || $this->_tpl_vars['tsUser']->is_admod): ?>
        <div class="form" style="padding: 7px;">
            <form method="post" action="" name="firmar">
                 <img  src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['tsUser']->uid; ?>
_50.jpg" width="30" height="30" class="floatL" style="margin-right: 5px;padding: 2px; border: solid 1px #ccc; background: white; "/>
                <div style="float: left;">
                    <textarea name="mensaje" id="mensaje" rows="2" style="width: 465px; margin: 0px; display: block; border-radius: 4px;border: 1px solid #ccc; padding: 8px; height: 14px!important;line-height: 14px;" placeholder="Escribe un comentario"></textarea>
                </div>
                <input type="button" id="btnComment" class="mBtn btnOk" value="Comentar" onclick="juegos.comentar(<?php echo $this->_tpl_vars['tsJuego']['juego_id']; ?>
)" style="float: right;padding: 7px 10px"/>
            </form>
            <div class="clearBoth"></div>
        </div>
        <?php endif; ?>
        <?php else: ?>
        <div class="emptyData">Para poder comentar necesitas estar <a onclick="registro_load_form(); return false" href="">Registrado.</a> O.. ya eres usuario? <a onclick="open_login_box('open')" href="#">Logueate!</a></div>
        <?php endif; ?>
    </div>
</div>
</div>