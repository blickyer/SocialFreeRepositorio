<?php /* Smarty version 2.6.28, created on 2016-06-16 12:46:57
         compiled from t.aviso.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div style="margin: 10px auto 0 auto;" class="container400">
                <div class="box_title">
                    <div class="box_txt show_error"><?php echo $this->_tpl_vars['tsAviso']['titulo']; ?>
</div>
                    <div class="box_rrs"><div class="box_rss"></div></div>
                </div>
				<div align="center" class="box_cuerpo">
				<br />
				<?php echo $this->_tpl_vars['tsAviso']['mensaje']; ?>

                <br />
                <br />
                <?php if ($this->_tpl_vars['tsAviso']['but']): ?>
                <input type="button" onclick="location.href='<?php if ($this->_tpl_vars['tsAviso']['link']): ?><?php echo $this->_tpl_vars['tsAviso']['link']; ?>
<?php else: ?><?php echo $this->_tpl_vars['tsConfig']['url']; ?>
<?php endif; ?>'" value="<?php echo $this->_tpl_vars['tsAviso']['but']; ?>
" style="font-size:13px" class="mBtn btnOk">
				<?php endif; ?>
                <?php if ($this->_tpl_vars['tsAviso']['return']): ?>
                <input type="button" onclick="history.go(-<?php echo $this->_tpl_vars['tsAviso']['return']; ?>
)" title="Volver" value="Volver" style="font-size:13px" class="mBtn btnOk">
                <?php endif; ?>
                <br /><br />
				</div>	
			</div>
            <br /><br /><br /><br />
            <div style="clear:both"></div>
                
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>