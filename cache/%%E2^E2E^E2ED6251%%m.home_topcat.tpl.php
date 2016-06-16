<?php /* Smarty version 2.6.28, created on 2016-06-16 07:25:58
         compiled from modules/m.home_topcat.tpl */ ?>
                <!--
				                        \|||/                                            
                   .-.________          (o o)             ________.-.                    
              ----/ \_)_______)  +-oooO--(_)----------+  (_______(_/ \----               
                 (    ()___)     |      Vellenger     |    (___()     )                  
                      ()__)      |                    |     (__()                        
              ----\___()_)       |   www.phpost.net   |       (_()___/----                
                                 +------------Ooo-----+                                  
                                                                            / --> 
					<div  class="topcat-v">
                    	<div class="box_title">Top Categorías</div><img class=qtip title="Ver mas Categor&iacute;as"  id="ver-cat" onclick="$('#vellenger').slideToggle(); return false" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/plus.png"></img>
                      <div class="box_cuerpo">
                        <ul>
						   <?php $_from = $this->_tpl_vars['tsTopcat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['c']):
?>
						   <?php if ($this->_tpl_vars['i'] < 10): ?>
                            <a href="/posts/<?php echo $this->_tpl_vars['c']['c_seo']; ?>
/"><li <?php if ($this->_tpl_vars['i'] == 0): ?>style="border-top:1px solid #EEE;"<?php endif; ?>>
                               <img src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/cat/<?php echo $this->_tpl_vars['c']['c_img']; ?>
"></img><?php echo $this->_tpl_vars['c']['c_nombre']; ?>
 <span><?php echo $this->_tpl_vars['c']['total']; ?>
</span>
                            </li></a>
							<?php endif; ?>
                          <?php endforeach; endif; unset($_from); ?>
						<div style="display:none; background:transparent" id="vellenger">
						  <?php $_from = $this->_tpl_vars['tsTopcat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['c']):
?>
						  <?php if ($this->_tpl_vars['i'] > 9): ?>
                            <a href="/posts/<?php echo $this->_tpl_vars['c']['c_seo']; ?>
/"><li>
                               <img src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/cat/<?php echo $this->_tpl_vars['c']['c_img']; ?>
"></img><?php echo $this->_tpl_vars['c']['c_nombre']; ?>
 <span><?php echo $this->_tpl_vars['c']['total']; ?>
</span>
                            </li></a>
						  <?php endif; ?>	
                          <?php endforeach; endif; unset($_from); ?>
						  <hr>
						  <center><img style="cursor:pointer;" class=qtip title="Ver menos" onclick="$('#vellenger').slideToggle(); return false" src="http://i.i.imgur.com/icRlES6.png"></img></center>
						  </div>
						</ul>
                    </div>
                        </div>
                           <br class="space"/>