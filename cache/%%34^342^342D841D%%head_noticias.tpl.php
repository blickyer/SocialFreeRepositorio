<?php /* Smarty version 2.6.28, created on 2016-06-16 07:25:58
         compiled from sections/head_noticias.tpl */ ?>
            <?php if (( $this->_tpl_vars['tsPage'] == 'home' || $this->_tpl_vars['tsPage'] == 'portal' ) && $this->_tpl_vars['tsConfig']['news']): ?>
            <div id="mensaje-top">
                <ul id="top_news" class="msgtxt">
                    <?php $_from = $this->_tpl_vars['tsConfig']['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['n']):
?>
                    <li id="new_<?php echo $this->_tpl_vars['i']+1; ?>
"><?php echo $this->_tpl_vars['n']['not_body']; ?>
</li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
            </div>
            <?php endif; ?>