<?php /* Smarty version 2.6.26, created on 2016-02-28 11:38:09
         compiled from sections/main_footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'sections/main_footer.tpl', 10, false),)), $this); ?>
		</div>
        <!--end-cuerpo-->
        </div>
        <!--END CONTAINER-->
    <div id="footer">
        <footer>
            <a href="<?php echo $this->_tpl_vars['tsConfig']['web']; ?>
<?php echo $this->_tpl_vars['tsUrlPatch']; ?>
?mobile=desktop">Versi&oacute;n de escritorio</a>
        </footer>
        <div id="pp_copyright" style="text-align: center;">
            <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
"><strong><?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
</strong></a> &copy; <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 - Powered by <a href="http://www.phpost.net/" target="_blank"><strong>PHPost</strong></a>
        </div>
    </div>
</div>
</body>
</html>