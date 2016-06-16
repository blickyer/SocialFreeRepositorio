<?php /* Smarty version 2.6.26, created on 2016-02-28 11:54:50
         compiled from modules/m.fotos_last_fotos.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 'modules/m.fotos_last_fotos.tpl', 3, false),array('modifier', 'fecha', 'modules/m.fotos_last_fotos.tpl', 6, false),array('modifier', 'truncate', 'modules/m.fotos_last_fotos.tpl', 7, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['tsLastFotos']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f']):
?>                    	
<li>
    <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/fotos/<?php echo $this->_tpl_vars['f']['user_name']; ?>
/<?php echo $this->_tpl_vars['f']['foto_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['f_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html" class="f_foto flazyload" data-original="<?php echo $this->_tpl_vars['f']['f_url']; ?>
"></a>    
    <div class="f_info">
        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/fotos/<?php echo $this->_tpl_vars['f']['user_name']; ?>
/<?php echo $this->_tpl_vars['f']['foto_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['f']['f_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html" class="f_titulo"><?php echo $this->_tpl_vars['f']['f_title']; ?>
</a>           
        <span class="f_autor">Por <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['f']['user_name']; ?>
"><?php echo $this->_tpl_vars['f']['user_name']; ?>
</a> el <?php echo ((is_array($_tmp=$this->_tpl_vars['f']['f_date'])) ? $this->_run_mod_handler('fecha', true, $_tmp, true) : smarty_modifier_fecha($_tmp, true)); ?>
</span>            
        <span class="f_desc"><?php echo ((is_array($_tmp=$this->_tpl_vars['f']['f_description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 94) : smarty_modifier_truncate($_tmp, 94)); ?>
</span>    
    </div>
</li>                
<?php endforeach; endif; unset($_from); ?>