<?php /* Smarty version 2.6.28, created on 2016-06-16 12:38:08
         compiled from t.php_files/p.live.stream.tpl */ ?>
    <div id="live-stream" ntotal="<?php if (! $this->_tpl_vars['tsStream']['total']): ?>0<?php else: ?><?php echo $this->_tpl_vars['tsStream']['total']; ?>
<?php endif; ?>" mtotal="<?php echo $this->_tpl_vars['tsMensajes']['total']; ?>
">
	<?php $_from = $this->_tpl_vars['tsStream']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['noti']):
?>
    <div class="UIBeeper_Full" id="beep_<?php echo $this->_tpl_vars['id']; ?>
">
        <div class="Beeps">
            <div class="UIBeep">
                <a href="<?php echo $this->_tpl_vars['noti']['link']; ?>
" class="UIBeep_NonIntentional">
                    <div class="UIBeep_Icon action">
                        <span class="monac_icons ma_<?php echo $this->_tpl_vars['noti']['style']; ?>
"></span>
                    </div>
                    <span class="beeper_x" bid="<?php echo $this->_tpl_vars['id']; ?>
">&nbsp;</span>
                    <div class="UIBeep_Title">
                        <span class="blueName"><?php if ($this->_tpl_vars['noti']['total'] == 1): ?><?php echo $this->_tpl_vars['noti']['user']; ?>
<?php endif; ?></span> <?php echo $this->_tpl_vars['noti']['text']; ?>
 <span class="blueName"><?php echo $this->_tpl_vars['noti']['ltext']; ?>
</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; endif; unset($_from); ?>
    <?php $_from = $this->_tpl_vars['tsMensajes']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['mp']):
?>
    <div class="UIBeeper_Full" id="beep_m<?php echo $this->_tpl_vars['id']; ?>
">
        <div class="Beeps">
            <div class="UIBeep">
                <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/mensajes/leer/<?php echo $this->_tpl_vars['mp']['mp_id']; ?>
" class="UIBeep_NonIntentional">
                    <div class="UIBeep_Icon">
                        <span class="systemicons mps"></span>
                        <img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['mp']['mp_from']; ?>
_50.jpg" width="16" height="16"/>
                    </div>
                    <span class="beeper_x" bid="m<?php echo $this->_tpl_vars['id']; ?>
">&nbsp;</span>
                    <div class="UIBeep_Title">
                        <b>Nuevo mensaje</b><br />                    
                        <span class="blueName"><?php echo $this->_tpl_vars['mp']['user_name']; ?>
</span> <?php echo $this->_tpl_vars['mp']['mp_preview']; ?>

                    </div>
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; endif; unset($_from); ?>
    </div>