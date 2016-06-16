<?php /* Smarty version 2.6.28, created on 2016-06-16 12:43:05
         compiled from comunidades/c.directorio_right.tpl */ ?>
<div class="com_new_box">
    <div class="box_title">Comunidades por pa&iacute;s</div>
    <div class="box_cuerpo" id="ult_comm" style="padding: 0pt;">
    	<div class="com_list_element"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/dir/Internacional/">Todos los pa&iacute;ses</a></div>
        <?php $_from = $this->_tpl_vars['tsPaises']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
        <div class="com_list_element">
            <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/comunidades/dir/<?php echo $this->_tpl_vars['p']['c_pais']; ?>
/"><?php echo $this->_tpl_vars['p']['pais']; ?>
</a>
            <span class="cle_number"><?php echo $this->_tpl_vars['p']['total']; ?>
</span>
        </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
</div>