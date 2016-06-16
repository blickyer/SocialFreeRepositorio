<?php /* Smarty version 2.6.28, created on 2016-06-16 07:25:58
         compiled from modules/m.home_top_users.tpl */ ?>
					<div id="topsUserBox">
                        <div class="box_title">
                            <div class="box_txt ultimos_comentarios">TOPs usuarios  <a class="size9" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/top/usuarios/">(Ver m&aacute;s)</a></div>
                            <div class="box_rss">
                            	<a href="/rss/usuarios-top-mes"><span class="systemicons sRss"></span></a>
                            </div>
                        </div>
                        <div class="box_cuerpo" style="padding: 0pt; height: 330px;">
                        	<div class="filterBy">
                            	<a href="javascript:TopsTabs('topsUserBox','AyerUser')" id="AyerUser">Ayer</a> -
                                <a href="javascript:TopsTabs('topsUserBox','SemanaUser')" id="SemanaUser">Semana</a> -
                                <a href="javascript:TopsTabs('topsUserBox','MesUser')" id="MesUser"<?php if ($this->_tpl_vars['tsTopUsers']['mes']): ?> class="here"<?php endif; ?>>Mes</a> -
                                <a href="javascript:TopsTabs('topsUserBox','HistoricoUser')" id="HistoricoUser" <?php if (! $this->_tpl_vars['tsTopUsers']['mes']): ?>class="here"<?php endif; ?>>Hist&oacute;rico</a>
                            </div>
                            <ol id="filterByAyerUser" class="filterBy cleanlist" style="display:none;">
                            <?php $_from = $this->_tpl_vars['tsTopUsers']['ayer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['u']):
?>
								<li>
                                	<?php if ($this->_tpl_vars['i']+1 < 10): ?>0<?php endif; ?><?php echo $this->_tpl_vars['i']+1; ?>
.
                                	<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['u']['user_name']; ?>
" class="hovercard" uid="<?php echo $this->_tpl_vars['u']['user_id']; ?>
"><?php echo $this->_tpl_vars['u']['user_name']; ?>
</a>
                                    <span><?php echo $this->_tpl_vars['u']['total']; ?>
</span>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                            </ol>
                            <ol id="filterBySemanaUser" class="filterBy cleanlist" style="display:none;">
                            <?php $_from = $this->_tpl_vars['tsTopUsers']['semana']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['u']):
?>
								<li>
                                	<?php if ($this->_tpl_vars['i']+1 < 10): ?>0<?php endif; ?><?php echo $this->_tpl_vars['i']+1; ?>
.
                                	<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['u']['user_name']; ?>
" class="hovercard" uid="<?php echo $this->_tpl_vars['u']['user_id']; ?>
"><?php echo $this->_tpl_vars['u']['user_name']; ?>
</a>
                                    <span><?php echo $this->_tpl_vars['u']['total']; ?>
</span>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                            </ol>
                            <ol id="filterByMesUser" class="filterBy cleanlist" style="display:<?php if ($this->_tpl_vars['tsTopUsers']['mes']): ?>block<?php else: ?>none<?php endif; ?>;">
                            <?php $_from = $this->_tpl_vars['tsTopUsers']['mes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['u']):
?>
								<li>
                                	<?php if ($this->_tpl_vars['i']+1 < 10): ?>0<?php endif; ?><?php echo $this->_tpl_vars['i']+1; ?>
.
                                	<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['u']['user_name']; ?>
" class="hovercard" uid="<?php echo $this->_tpl_vars['u']['user_id']; ?>
"><?php echo $this->_tpl_vars['u']['user_name']; ?>
</a>
                                    <span><?php echo $this->_tpl_vars['u']['total']; ?>
</span>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                            </ol>
                            <ol id="filterByHistoricoUser" class="filterBy cleanlist" style="display:<?php if (! $this->_tpl_vars['tsTopUsers']['mes']): ?>block<?php else: ?>none<?php endif; ?>;">
                            <?php $_from = $this->_tpl_vars['tsTopUsers']['historico']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['u']):
?>
								<li>
                                	<?php if ($this->_tpl_vars['i']+1 < 10): ?>0<?php endif; ?><?php echo $this->_tpl_vars['i']+1; ?>
.
                                	<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['u']['user_name']; ?>
" class="hovercard" uid="<?php echo $this->_tpl_vars['u']['user_id']; ?>
"><?php echo $this->_tpl_vars['u']['user_name']; ?>
</a>
                                    <span><?php echo $this->_tpl_vars['u']['total']; ?>
</span>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                            </ol>
                        </div>
                        <br class="space"/>
                    </div>