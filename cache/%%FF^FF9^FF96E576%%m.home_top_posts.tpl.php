<?php /* Smarty version 2.6.28, created on 2016-06-16 07:25:58
         compiled from modules/m.home_top_posts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'modules/m.home_top_posts.tpl', 19, false),array('modifier', 'truncate', 'modules/m.home_top_posts.tpl', 19, false),)), $this); ?>
					<div id="topsPostBox">
                        <div class="box_title">
                            <div class="box_txt estadisticas">TOPs posts <a class="size9" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/top/">(Ver m&aacute;s)</a></div>
                            <div class="box_rss">
                            	<a href="/rss/top-post-semana"><span class="systemicons sRss"></span></a>
                            </div>
                        </div>
                        <div class="box_cuerpo" style="padding: 0pt; height: 330px;">
                        	<div class="filterBy">
                            	<a href="javascript:TopsTabs('topsPostBox','Ayer')" id="Ayer">Ayer</a> -
                            	<a href="javascript:TopsTabs('topsPostBox','Semana')" id="Semana"<?php if ($this->_tpl_vars['tsTopPosts']['semana']): ?> class="here"<?php endif; ?>>Semana</a> -
                                <a href="javascript:TopsTabs('topsPostBox','Mes')" id="Mes">Mes</a> -
                                <a href="javascript:TopsTabs('topsPostBox','Historico')" id="Historico"<?php if (! $this->_tpl_vars['tsTopPosts']['semana']): ?> class="here"<?php endif; ?>>Hist&oacute;rico</a>
                            </div>
                            <ol id="filterByAyer" class="filterBy cleanlist" style="display:none;">
                            <?php $_from = $this->_tpl_vars['tsTopPosts']['ayer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['p']):
?>
								<li>
                                	<?php if ($this->_tpl_vars['i']+1 < 10): ?>0<?php endif; ?><?php echo $this->_tpl_vars['i']+1; ?>
.
                                	<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['p']['c_seo']; ?>
/<?php echo $this->_tpl_vars['p']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</a>
                                    <span><?php echo $this->_tpl_vars['p']['post_puntos']; ?>
</span>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                            </ol>
                            <ol id="filterBySemana" class="filterBy cleanlist" style="display:<?php if ($this->_tpl_vars['tsTopPosts']['semana']): ?>block<?php else: ?>none<?php endif; ?>;">
                            <?php $_from = $this->_tpl_vars['tsTopPosts']['semana']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['p']):
?>
								<li>
                                	<?php if ($this->_tpl_vars['i']+1 < 10): ?>0<?php endif; ?><?php echo $this->_tpl_vars['i']+1; ?>
.
                                	<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['p']['c_seo']; ?>
/<?php echo $this->_tpl_vars['p']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</a>
                                    <span><?php echo $this->_tpl_vars['p']['post_puntos']; ?>
</span>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                            </ol>
                            <ol id="filterByMes" class="filterBy cleanlist" style="display:none;">
                            <?php $_from = $this->_tpl_vars['tsTopPosts']['mes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['p']):
?>
								<li>
                                	<?php if ($this->_tpl_vars['i']+1 < 10): ?>0<?php endif; ?><?php echo $this->_tpl_vars['i']+1; ?>
.
                                	<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['p']['c_seo']; ?>
/<?php echo $this->_tpl_vars['p']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</a>
                                    <span><?php echo $this->_tpl_vars['p']['post_puntos']; ?>
</span>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                            </ol>
                            <ol id="filterByHistorico" class="filterBy cleanlist" style="display:<?php if (! $this->_tpl_vars['tsTopPosts']['semana']): ?>block<?php else: ?>none<?php endif; ?>;">
                            <?php $_from = $this->_tpl_vars['tsTopPosts']['historico']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['p']):
?>
								<li>
	                                <?php if ($this->_tpl_vars['i']+1 < 10): ?>0<?php endif; ?><?php echo $this->_tpl_vars['i']+1; ?>
.
                                	<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['p']['c_seo']; ?>
/<?php echo $this->_tpl_vars['p']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['post_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</a>
                                    <span><?php echo $this->_tpl_vars['p']['post_puntos']; ?>
</span>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                            </ol>
                        </div>
                        <br class="space"/>
                    </div>