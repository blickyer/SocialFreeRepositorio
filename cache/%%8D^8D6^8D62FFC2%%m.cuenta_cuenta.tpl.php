<?php /* Smarty version 2.6.28, created on 2016-06-16 12:37:36
         compiled from modules/m.cuenta_cuenta.tpl */ ?>
							<div class="content-tabs cuenta">
                            	<div class="alert-cuenta cuenta-1"></div>
                                <fieldset>
                                    <div class="field">
                                        <label for="email">E-Mail:</label>
                                        <div class="input-fake input-hide-email">
                                            <?php echo $this->_tpl_vars['tsUser']->info['user_email']; ?>
 (<a onclick="input_fake('email')">Cambiar</a>)
                                        </div>
                                        <input type="text" style="display: none" value="<?php echo $this->_tpl_vars['tsUser']->info['user_email']; ?>
" maxlength="35" name="email" id="email" class="text cuenta-save-1 input-hidden-email">
                                    </div>
                                    <div class="field">
                                        <label for="pais">Pa&iacute;s:</label>
                                        <select onchange="cuenta.chgpais()" class="cuenta-save-1" name="pais" id="pais">
                                            <option value="">Pa&iacute;s</option>
                                            <?php $_from = $this->_tpl_vars['tsPaises']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['code'] => $this->_tpl_vars['pais']):
?>
                                            	<option value="<?php echo $this->_tpl_vars['code']; ?>
" <?php if ($this->_tpl_vars['code'] == $this->_tpl_vars['tsPerfil']['user_pais']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['pais']; ?>
</option>
                                            <?php endforeach; endif; unset($_from); ?>
										</select>
									</div>
                                    <div class="field">
                                        <label for="estado">Estado/Provincia:</label>
                                        <select name="estado" id="estado" class="cuenta-save-1">
                                        <?php $_from = $this->_tpl_vars['tsEstados']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['code'] => $this->_tpl_vars['estado']):
?>
                                            <option value="<?php echo $this->_tpl_vars['code']+1; ?>
" <?php if ($this->_tpl_vars['code']+1 == $this->_tpl_vars['tsPerfil']['user_estado']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['estado']; ?>
</option>
                                        <?php endforeach; endif; unset($_from); ?>
                                        </select>
                                    </div>
                                    <div class="field">
                                        <label>Sexo</label>
                                        <ul class="fields">
                                            <li>
                                                <label><input type="radio" value="m" name="sexo" class="radio cuenta-save-1" <?php if ($this->_tpl_vars['tsPerfil']['user_sexo'] == '1'): ?>checked="checked"<?php endif; ?>/>Masculino</label>
                                            </li>
                                            <li>
                                                <label><input type="radio" value="f" name="sexo" class="radio cuenta-save-1" <?php if ($this->_tpl_vars['tsPerfil']['user_sexo'] == '0'): ?>checked="checked"<?php endif; ?>/>Femenino</label>
                                            </li>
                                        </ul>
                                    </div>
                                </fieldset>
                                <div class="field">
									<label>Nacimiento:</label>
									<select class="cuenta-save-1" name="dia">
                                        <?php unset($this->_sections['dias']);
$this->_sections['dias']['name'] = 'dias';
$this->_sections['dias']['start'] = (int)1;
$this->_sections['dias']['loop'] = is_array($_loop=32) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dias']['show'] = true;
$this->_sections['dias']['max'] = $this->_sections['dias']['loop'];
$this->_sections['dias']['step'] = 1;
if ($this->_sections['dias']['start'] < 0)
    $this->_sections['dias']['start'] = max($this->_sections['dias']['step'] > 0 ? 0 : -1, $this->_sections['dias']['loop'] + $this->_sections['dias']['start']);
else
    $this->_sections['dias']['start'] = min($this->_sections['dias']['start'], $this->_sections['dias']['step'] > 0 ? $this->_sections['dias']['loop'] : $this->_sections['dias']['loop']-1);
if ($this->_sections['dias']['show']) {
    $this->_sections['dias']['total'] = min(ceil(($this->_sections['dias']['step'] > 0 ? $this->_sections['dias']['loop'] - $this->_sections['dias']['start'] : $this->_sections['dias']['start']+1)/abs($this->_sections['dias']['step'])), $this->_sections['dias']['max']);
    if ($this->_sections['dias']['total'] == 0)
        $this->_sections['dias']['show'] = false;
} else
    $this->_sections['dias']['total'] = 0;
if ($this->_sections['dias']['show']):

            for ($this->_sections['dias']['index'] = $this->_sections['dias']['start'], $this->_sections['dias']['iteration'] = 1;
                 $this->_sections['dias']['iteration'] <= $this->_sections['dias']['total'];
                 $this->_sections['dias']['index'] += $this->_sections['dias']['step'], $this->_sections['dias']['iteration']++):
$this->_sections['dias']['rownum'] = $this->_sections['dias']['iteration'];
$this->_sections['dias']['index_prev'] = $this->_sections['dias']['index'] - $this->_sections['dias']['step'];
$this->_sections['dias']['index_next'] = $this->_sections['dias']['index'] + $this->_sections['dias']['step'];
$this->_sections['dias']['first']      = ($this->_sections['dias']['iteration'] == 1);
$this->_sections['dias']['last']       = ($this->_sections['dias']['iteration'] == $this->_sections['dias']['total']);
?>
                                        <option value="<?php echo $this->_sections['dias']['index']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['user_dia'] == $this->_sections['dias']['index']): ?>selected="selected"<?php endif; ?>><?php echo $this->_sections['dias']['index']; ?>
</option>
                                        <?php endfor; endif; ?>                            
									</select>
									<select class="cuenta-save-1" name="mes">
                                    	<?php $_from = $this->_tpl_vars['tsMeces']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mid'] => $this->_tpl_vars['mes']):
?>
                                        	<option value="<?php echo $this->_tpl_vars['mid']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['user_mes'] == $this->_tpl_vars['mid']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['mes']; ?>
</option>
                                        <?php endforeach; endif; unset($_from); ?>
									</select>
									<select class="cuenta-save-1" name="ano">
                                    	<?php unset($this->_sections['year']);
$this->_sections['year']['name'] = 'year';
$this->_sections['year']['start'] = (int)$this->_tpl_vars['tsEndY'];
$this->_sections['year']['loop'] = is_array($_loop=$this->_tpl_vars['tsEndY']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['year']['step'] = ((int)-1) == 0 ? 1 : (int)-1;
$this->_sections['year']['max'] = (int)$this->_tpl_vars['tsMax'];
$this->_sections['year']['show'] = true;
if ($this->_sections['year']['max'] < 0)
    $this->_sections['year']['max'] = $this->_sections['year']['loop'];
if ($this->_sections['year']['start'] < 0)
    $this->_sections['year']['start'] = max($this->_sections['year']['step'] > 0 ? 0 : -1, $this->_sections['year']['loop'] + $this->_sections['year']['start']);
else
    $this->_sections['year']['start'] = min($this->_sections['year']['start'], $this->_sections['year']['step'] > 0 ? $this->_sections['year']['loop'] : $this->_sections['year']['loop']-1);
if ($this->_sections['year']['show']) {
    $this->_sections['year']['total'] = min(ceil(($this->_sections['year']['step'] > 0 ? $this->_sections['year']['loop'] - $this->_sections['year']['start'] : $this->_sections['year']['start']+1)/abs($this->_sections['year']['step'])), $this->_sections['year']['max']);
    if ($this->_sections['year']['total'] == 0)
        $this->_sections['year']['show'] = false;
} else
    $this->_sections['year']['total'] = 0;
if ($this->_sections['year']['show']):

            for ($this->_sections['year']['index'] = $this->_sections['year']['start'], $this->_sections['year']['iteration'] = 1;
                 $this->_sections['year']['iteration'] <= $this->_sections['year']['total'];
                 $this->_sections['year']['index'] += $this->_sections['year']['step'], $this->_sections['year']['iteration']++):
$this->_sections['year']['rownum'] = $this->_sections['year']['iteration'];
$this->_sections['year']['index_prev'] = $this->_sections['year']['index'] - $this->_sections['year']['step'];
$this->_sections['year']['index_next'] = $this->_sections['year']['index'] + $this->_sections['year']['step'];
$this->_sections['year']['first']      = ($this->_sections['year']['iteration'] == 1);
$this->_sections['year']['last']       = ($this->_sections['year']['iteration'] == $this->_sections['year']['total']);
?>
                                        	 <option value="<?php echo $this->_sections['year']['index']; ?>
" <?php if ($this->_tpl_vars['tsPerfil']['user_ano'] == $this->_sections['year']['index']): ?>selected="selected"<?php endif; ?>><?php echo $this->_sections['year']['index']; ?>
</option>
                                        <?php endfor; endif; ?>
									</select>
								</div>
                                <?php if ($this->_tpl_vars['tsConfig']['c_allow_firma']): ?>
                                <div class="field">
                                    <label for="firma">Firma:<br /> <small style="font-weight:normal">(Acepta BBCode) Max. 300 car.</small></label>
                                    <textarea name="firma" id="firma" class="cuenta-save-1"><?php echo $this->_tpl_vars['tsPerfil']['user_firma']; ?>
</textarea>
                                </div>
                                <?php endif; ?>
                                <div class="buttons">
                                    <input type="button" value="Guardar" onclick="cuenta.save(1)" class="mBtn btnOk">
                                    <input type="button" value="Siguiente" onclick="cuenta.save(1, true)" class="mBtn btnOk">
                                </div>
                                <div class="clearfix"></div>
                            </div>