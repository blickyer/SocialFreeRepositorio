<?php /* Smarty version 2.6.28, created on 2016-06-16 07:25:58
         compiled from modules/m.home_last_posts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'modules/m.home_last_posts.tpl', 6, false),array('modifier', 'truncate', 'modules/m.home_last_posts.tpl', 8, false),array('modifier', 'hace', 'modules/m.home_last_posts.tpl', 13, false),)), $this); ?>
                    	<ul>
                            <?php if ($this->_tpl_vars['tsPosts']): ?>
                            <?php $_from = $this->_tpl_vars['tsPosts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
                            <div class="rbox">
                            <li class="categoriaPost" style="width: 200px;height: 206px;padding-left: 3px !important;" >
                                <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['p']['c_seo']; ?>
/<?php echo $this->_tpl_vars['p']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html" style="width:200px; height:206px;">
								<img src="<?php if ($this->_tpl_vars['p']['post_portada']): ?><?php echo $this->_tpl_vars['p']['post_portada']; ?>
<?php else: ?><?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/mega/error.png<?php endif; ?>" width="215" height="205" style="padding:5px;background:#FFF;border:1px solid #DBDBDB;border-bottom:none;" />
								<div class="p_titulo"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</span></div> </a>
								<div class="u_titulo" style="display:inline">
                                     <?php if ($this->_tpl_vars['p']['post_private']): ?><span class="multiicons postPrivado qtip" title="Solo usuarios registrados" style="margin: 4px 15px;"></span><?php endif; ?>
									<img width="16" style="margin-left: 194px;position: absolute;bottom: 10px;" class="qtip" title="<?php echo $this->_tpl_vars['p']['c_nombre']; ?>
" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/cat/<?php echo $this->_tpl_vars['p']['c_img']; ?>
"/>
									<span style="display: block;margin-top: 5px;margin-left: 10px;"> <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['p']['user_name']; ?>
" class="hovercard" uid="<?php echo $this->_tpl_vars['p']['post_user']; ?>
"><img style="margin-top: -1px;position: absolute;" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/mega/autor.png"/><span style="margin-left: 19px;color:#4D4D4D;font-weight:bold;"> @<?php echo $this->_tpl_vars['p']['user_name']; ?>
</span></a> </span>
									<span style="padding: 10px;color:#000;font-size:11px;"><img style="margin-top: -1px;position: absolute;" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/mega/time.png"/> <span style="margin-left: 20px;color:#000;"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_date'])) ? $this->_run_mod_handler('hace', true, $_tmp) : smarty_modifier_hace($_tmp)); ?>
 </span></span>
                                </div>
                               
							</li>
                            </div>
                            <?php endforeach; endif; unset($_from); ?>
                            <?php else: ?>
                            <li class="emptyData">No hay posts aqu&iacute;</li>
                            <?php endif; ?>
                        </ul>
                        <br clear="left"/>
                    <div class="footer size13">
                        <?php if ($this->_tpl_vars['tsPages']['prev'] > 0 && $this->_tpl_vars['tsPages']['max'] == false): ?><a href="pagina<?php echo $this->_tpl_vars['tsPages']['prev']; ?>
" class="floatL ls-post" style="padding: 6px;border: 1px solid #2673AB;font-family: sans-serif;background: #2F91D8;color: #FFFFFF;">&laquo; Anterior</a><?php endif; ?>
                        <?php if ($this->_tpl_vars['tsPages']['next'] <= $this->_tpl_vars['tsPages']['pages']): ?><a href="pagina<?php echo $this->_tpl_vars['tsPages']['next']; ?>
" style="padding: 6px;border: 1px solid #2673AB;font-family: sans-serif;background: #2F91D8;color: #FFFFFF;" class="ls-post floatR">Siguiente &raquo;</a>
                        <?php elseif ($this->_tpl_vars['tsPages']['max'] == true): ?><a class="ls-post floatL" style="padding: 6px;border: 1px solid #2673AB;font-family: sans-serif;background: #2F91D8;color: #FFFFFF;" href="pagina2">Siguiente &raquo;</a><?php endif; ?>
                    </div>