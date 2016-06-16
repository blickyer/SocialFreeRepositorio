<?php /* Smarty version 2.6.28, created on 2016-06-16 07:25:59
         compiled from sections/main_footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'sections/main_footer.tpl', 8, false),)), $this); ?>
		<!--end-cuerpo-->
		</div>
        <div id="pie">
		 						<div id="pp_copyright" style="display: block!important; opacity: 1!important;">
        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
" class=qtip title="Dise&ntilde;ado por MegaErick | Edit by Rengo"><strong><?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
</strong></a> &copy; <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 - Powered by <a href="http://www.phpost.net/" target="_blank"><strong>PHPost</strong></a>
		</div>
        </div>
        </div>
        <!--END CONTAINER-->
    </div>
</div>
</body>
</html>