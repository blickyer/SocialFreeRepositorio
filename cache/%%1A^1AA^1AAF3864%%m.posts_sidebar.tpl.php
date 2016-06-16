<?php /* Smarty version 2.6.28, created on 2016-06-16 12:47:01
         compiled from modules/m.posts_sidebar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'modules/m.posts_sidebar.tpl', 33, false),array('modifier', 'hace', 'modules/m.posts_sidebar.tpl', 60, false),array('modifier', 'seo', 'modules/m.posts_sidebar.tpl', 77, false),)), $this); ?>
<div class="post-autor vcard" style="margin-bottom: 10px;">
	<!------ PUBLICADO POR ------->   
    <div class="bigBox"> 
        <div class="box_title">Autor del post<div class="box_rss"><img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/flags/<?php echo $this->_tpl_vars['tsAutor']['pais']['icon']; ?>
.png" style="padding:2px" title="<?php echo $this->_tpl_vars['tsAutor']['pais']['name']; ?>
" /></div></div>
        <div class="box_cuerpo" style="padding: 0;">
            <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['tsAutor']['user_name']; ?>
" class="PA_avatar" title="Ver perfil de <?php echo $this->_tpl_vars['tsAutor']['user_name']; ?>
">
                <img alt="Ver perfil de <?php echo $this->_tpl_vars['tsAutor']['user_name']; ?>
" src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['tsAutor']['user_id']; ?>
_120.jpg"/>
                <span><?php echo $this->_tpl_vars['tsAutor']['user_name']; ?>
</span>
                <i class="qtip PA_estado <?php echo $this->_tpl_vars['tsAutor']['status']['css']; ?>
" title="<?php echo $this->_tpl_vars['tsAutor']['status']['t']; ?>
"></i>
            </a>
            <div class="PA_avatar_right">
            	<span>
                	<img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/<?php if ($this->_tpl_vars['tsAutor']['user_sexo'] == 0): ?>female<?php else: ?>male<?php endif; ?>.png" title="<?php if ($this->_tpl_vars['tsAutor']['user_sexo'] == 0): ?>Mujer<?php else: ?>Hombre<?php endif; ?>" /> <?php if ($this->_tpl_vars['tsAutor']['user_sexo'] == 0): ?>Mujer<?php else: ?>Hombre<?php endif; ?>
                </span>
				<span>
                	<img src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/icons/ran/<?php echo $this->_tpl_vars['tsAutor']['rango']['r_image']; ?>
" title="<?php echo $this->_tpl_vars['tsAutor']['rango']['r_name']; ?>
" /> <font color="#<?php echo $this->_tpl_vars['tsAutor']['rango']['r_color']; ?>
"><?php echo $this->_tpl_vars['tsAutor']['rango']['r_name']; ?>
</font>
                </span>
            	<span>
                	<?php if (! $this->_tpl_vars['tsUser']->is_member): ?>    
                    <a class="btn_g follow_user_post" href="#" onclick="registro_load_form(); return false" style="text-align: center;"><strong class="icons follow"  style="padding-left: 17px;">&nbsp;Seguir</strong></a>
                    <?php elseif ($this->_tpl_vars['tsAutor']['user_id'] != $this->_tpl_vars['tsUser']->uid): ?>                    
                    <a class=" btn_g unfollow_user_post" onclick="notifica.unfollow('user', <?php echo $this->_tpl_vars['tsAutor']['user_id']; ?>
, notifica.userInPostHandle, $(this).children('strong'))" style="text-align: center;<?php if (! $this->_tpl_vars['tsAutor']['follow']): ?>display: none;<?php endif; ?>" title="Dejar de seguir"><strong class="icons unfollow" style="padding-left: 17px;">&nbsp;No seguir</strong></a>
                    <a class="btn_g follow_user_post" onclick="notifica.follow('user', <?php echo $this->_tpl_vars['tsAutor']['user_id']; ?>
, notifica.userInPostHandle, $(this).children('strong'))" style="text-align: center;<?php if ($this->_tpl_vars['tsAutor']['follow'] > 0): ?>display: none;<?php endif; ?>" title="Seguir usuario"><strong class="icons follow" style="padding-left: 17px;">&nbsp;Seguir</strong></a>
                	<?php endif; ?>
                </span>
                <?php if ($this->_tpl_vars['tsAutor']['user_id'] != $this->_tpl_vars['tsUser']->uid): ?>
                <span>
                    <a class="btn_g" style="text-align: center;" href="#" title="Enviar mensaje privado" onclick="<?php if (! $this->_tpl_vars['tsUser']->is_member): ?>registro_load_form();<?php else: ?>mensaje.nuevo('<?php echo $this->_tpl_vars['tsAutor']['user_name']; ?>
','','','');<?php endif; ?>return false"><strong><img src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/msg.gif" />&nbsp;Mensaje</strong></a>
                </span>
                <?php endif; ?>       	
            </div>
            <div class="PA_detalles">
            	<span class="PA_estat" title="Puntos" style="width: 75px;"><i class="multiicons postPuntos"></i><?php echo ((is_array($_tmp=$this->_tpl_vars['tsAutor']['user_puntos'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</span>
                <span class="PA_estat" title="Posts" style="width: 70px;"><i class="multiicons postPosts"></i><?php echo ((is_array($_tmp=$this->_tpl_vars['tsAutor']['user_posts'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</span>
                <span class="PA_estat" title="Coentarios" style="border-right: 0;width: 75px;"><i class="multiicons postComentarios"></i><?php echo ((is_array($_tmp=$this->_tpl_vars['tsAutor']['user_comentarios'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</span>
            </div>
        </div>
    </div>
    <!------ HERRAMIENTAS ------->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/m.posts_herramientas.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <!-------- MEDALLAS --------->
    <div class="box_title">Medallas<div class="box_rss"><?php if ($this->_tpl_vars['tsPost']['m_total'] > 0): ?><?php echo $this->_tpl_vars['tsPost']['m_total']; ?>
<?php endif; ?></div></div>
    <div class="box_cuerpo">
     <?php if ($this->_tpl_vars['tsPost']['medallas']): ?>
     
     <ul>
        <?php $_from = $this->_tpl_vars['tsPost']['medallas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
<img src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/med/<?php echo $this->_tpl_vars['m']['m_image']; ?>
_32.png" style="margin-left:1px;margin-bottom:2px;" class="qtip" title="<?php echo $this->_tpl_vars['m']['m_title']; ?>
 - <?php echo $this->_tpl_vars['m']['m_description']; ?>
"/>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
    <?php else: ?>
     <div class="emptyData">No tiene medallas</div>
      <?php endif; ?>
      </div>
	<!------ VISITANTES ------->
    <?php if ($this->_tpl_vars['tsPost']['visitas']): ?>
    <div class="box_title">&Uacute;ltimos visitantes</div> 
    <div class="box_cuerpo">
        <?php $_from = $this->_tpl_vars['tsPost']['visitas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
         <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['v']['user_name']; ?>
" class="hovercard" uid="<?php echo $this->_tpl_vars['v']['user_id']; ?>
" style="display:inline-block;"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['v']['user_id']; ?>
_50.jpg" class="vctip" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['date'])) ? $this->_run_mod_handler('hace', true, $_tmp, true) : smarty_modifier_hace($_tmp, true)); ?>
" width="32" height="32"/></a> 
        <?php endforeach; endif; unset($_from); ?>
    </div>
      <?php endif; ?>
    <!------ PUNTEADORES ------->  
    <?php if ($this->_tpl_vars['tsPost']['puntos']): ?>                        
    <div class="box_title">Punteadores</div>
    <div class="box_cuerpo">
    <?php $_from = $this->_tpl_vars['tsPost']['puntos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>        			         
         <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['p']['user_name']; ?>
" style="display:inline-block;"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['p']['user_id']; ?>
_50.jpg" class="vctip" title="<?php echo $this->_tpl_vars['p']['user_name']; ?>
 ha dejado <?php echo $this->_tpl_vars['p']['cant']; ?>
 puntos" width="32" height="32"/></a>                        
    <?php endforeach; endif; unset($_from); ?>                        
    </div>                        
    <?php endif; ?>
    <!--------- TAGS ---------->
    <div class="box_title">Tags</div>
    <div class="box_cuerpo" id="PT_cont">
        <?php $_from = $this->_tpl_vars['tsPost']['post_tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['tag']):
?>
        <a rel="tag" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/buscador/?q=<?php echo ((is_array($_tmp=$this->_tpl_vars['tag'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
&e=tags"><?php echo $this->_tpl_vars['tag']; ?>
</a>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <!------ RELACIONADOS ------->
    <div class="box_title">Posts relacionados</div>
    <div class="box_cuerpo" id="P_related">
        <?php if ($this->_tpl_vars['tsRelated']): ?>
        <?php $_from = $this->_tpl_vars['tsRelated']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
        <div class="PR_cont">
            <a class="<?php if ($this->_tpl_vars['p']['post_private']): ?>categoria privado<?php endif; ?>" title="<?php echo $this->_tpl_vars['p']['post_title']; ?>
" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['p']['c_seo']; ?>
/<?php echo $this->_tpl_vars['p']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html" rel="dc:relation">
            	<img src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/cat/<?php echo $this->_tpl_vars['p']['c_img']; ?>
" height="16" width="16"/><?php echo $this->_tpl_vars['p']['post_title']; ?>

            </a>
        </div>
        <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
        <div class="emptyData">No hay posts relacionados.</li>
        <?php endif; ?>
	</div>
    
    
</div>