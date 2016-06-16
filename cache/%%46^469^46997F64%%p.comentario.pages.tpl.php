<?php /* Smarty version 2.6.28, created on 2016-06-16 12:47:04
         compiled from t.php_files/p.comentario.pages.tpl */ ?>
                                <div class="before floatL">
                                    <a href="#ver-comentarios" <?php if ($this->_tpl_vars['tsPages']['prev'] > 0): ?>onclick="comentario.cargar(<?php echo $this->_tpl_vars['tsPages']['post_id']; ?>
, <?php echo $this->_tpl_vars['tsPages']['prev']; ?>
, <?php echo $this->_tpl_vars['tsPages']['autor']; ?>
);"<?php else: ?>class="desactivado"<?php endif; ?>><b>Anterior</b></a>
                                </div>
                                <div style="float:left;width: 540px">
                                    <ul>
						                <?php unset($this->_sections['page']);
$this->_sections['page']['name'] = 'page';
$this->_sections['page']['start'] = (int)1;
$this->_sections['page']['loop'] = is_array($_loop=$this->_tpl_vars['tsPages']['section']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['page']['show'] = true;
$this->_sections['page']['max'] = $this->_sections['page']['loop'];
$this->_sections['page']['step'] = 1;
if ($this->_sections['page']['start'] < 0)
    $this->_sections['page']['start'] = max($this->_sections['page']['step'] > 0 ? 0 : -1, $this->_sections['page']['loop'] + $this->_sections['page']['start']);
else
    $this->_sections['page']['start'] = min($this->_sections['page']['start'], $this->_sections['page']['step'] > 0 ? $this->_sections['page']['loop'] : $this->_sections['page']['loop']-1);
if ($this->_sections['page']['show']) {
    $this->_sections['page']['total'] = min(ceil(($this->_sections['page']['step'] > 0 ? $this->_sections['page']['loop'] - $this->_sections['page']['start'] : $this->_sections['page']['start']+1)/abs($this->_sections['page']['step'])), $this->_sections['page']['max']);
    if ($this->_sections['page']['total'] == 0)
        $this->_sections['page']['show'] = false;
} else
    $this->_sections['page']['total'] = 0;
if ($this->_sections['page']['show']):

            for ($this->_sections['page']['index'] = $this->_sections['page']['start'], $this->_sections['page']['iteration'] = 1;
                 $this->_sections['page']['iteration'] <= $this->_sections['page']['total'];
                 $this->_sections['page']['index'] += $this->_sections['page']['step'], $this->_sections['page']['iteration']++):
$this->_sections['page']['rownum'] = $this->_sections['page']['iteration'];
$this->_sections['page']['index_prev'] = $this->_sections['page']['index'] - $this->_sections['page']['step'];
$this->_sections['page']['index_next'] = $this->_sections['page']['index'] + $this->_sections['page']['step'];
$this->_sections['page']['first']      = ($this->_sections['page']['iteration'] == 1);
$this->_sections['page']['last']       = ($this->_sections['page']['iteration'] == $this->_sections['page']['total']);
?>
                                        <li class="numbers"><a href="#ver-comentarios" <?php if ($this->_tpl_vars['tsPages']['current'] == $this->_sections['page']['index']): ?>class="here"<?php else: ?>onclick="comentario.cargar(<?php echo $this->_tpl_vars['tsPages']['post_id']; ?>
, <?php echo $this->_sections['page']['index']; ?>
, <?php echo $this->_tpl_vars['tsPages']['autor']; ?>
);"<?php endif; ?>><?php echo $this->_sections['page']['index']; ?>
</a></li>
                                        <?php endfor; endif; ?>
                                    </ul>
                                  </div>
                                <div class="floatR next">
                                    <a href="#ver-comentarios" <?php if ($this->_tpl_vars['tsPages']['next'] <= $this->_tpl_vars['tsPages']['pages']): ?>onclick="comentario.cargar(<?php echo $this->_tpl_vars['tsPages']['post_id']; ?>
, <?php echo $this->_tpl_vars['tsPages']['next']; ?>
, <?php echo $this->_tpl_vars['tsPages']['autor']; ?>
);"<?php else: ?>class="desactivado"<?php endif; ?>><b>Siguiente</b></a>
                                </div>
                                <div class="clearBoth"></div>