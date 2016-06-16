<?php /* Smarty version 2.6.28, created on 2016-06-16 12:37:36
         compiled from modules/m.cuenta_block.tpl */ ?>
							<div class="content-tabs bloqueados" style="display:none">
                            	<fieldset>
                                    <div class="field">
                                        <?php if ($this->_tpl_vars['tsBlocks']): ?>
                                        <ul class="bloqueadosList">
                                            <?php $_from = $this->_tpl_vars['tsBlocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['b']):
?>
                                        	<li><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['b']['user_name']; ?>
"><?php echo $this->_tpl_vars['b']['user_name']; ?>
</a><span><a title="Desbloquear Usuario" href="javascript:bloquear('<?php echo $this->_tpl_vars['b']['b_auser']; ?>
', false, 'mis_bloqueados')" class="desbloqueadosU bloquear_usuario_<?php echo $this->_tpl_vars['b']['b_auser']; ?>
">Desbloquear</a></span></li>
                                            <?php endforeach; endif; unset($_from); ?>
                                         </ul>
                                        <?php else: ?>
                                        <div class="emptyData">No hay usuarios bloqueados</div>
                                        <?php endif; ?>
                                     </div>
                                </fieldset>
                                <div class="clearfix"></div>
                            </div>