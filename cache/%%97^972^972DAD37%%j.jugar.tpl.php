<?php /* Smarty version 2.6.28, created on 2016-06-16 12:33:57
         compiled from juegos/j.jugar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'juegos/j.jugar.tpl', 18, false),array('modifier', 'hace', 'juegos/j.jugar.tpl', 26, false),)), $this); ?>
<?php if ($this->_tpl_vars['tsJuego']['j_status'] != 0 || $this->_tpl_vars['tsJuego']['user_activo'] == 0): ?>
	<div class="emptyData">Este juego no es visible<?php if ($this->_tpl_vars['tsJuego']['j_status'] == 1): ?> por acumulaci&oacute;n de denuncias u orden administrativa<?php elseif ($this->_tpl_vars['tsJuego']['j_status'] == 2): ?> porque est&aacute; eliminado<?php elseif ($this->_tpl_vars['tsJuego']['user_activo'] != 1): ?> porque la cuenta del due&ntilde;o se encuentra desactivada<?php endif; ?>, pero puedes verla porque eres <?php if ($this->_tpl_vars['tsUser']->is_admod == 1): ?>administrador<?php elseif ($this->_tpl_vars['tsUser']->is_admod == 2): ?>moderador<?php else: ?>autorizado<?php endif; ?>.</div><br />
<?php endif; ?>
<div class="j-box_body">
<div class="j-box">
    <div class="boxy-title"><?php echo $this->_tpl_vars['tsJuego']['j_title']; ?>
<img src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/juegos/<?php echo $this->_tpl_vars['tsJuego']['cat_img']; ?>
.png" height="24" width="24" style="margin-top: -5px;" title="<?php echo $this->_tpl_vars['tsJuego']['cat_title']; ?>
" class="floatR" /></div>
	<div class="j-box_content" id="fg_centro">	
		<div id="full-game">
			<div class="j-swf">
				<span class="loading">Cargando Juego </br><img src="<?php echo $this->_tpl_vars['tsConfig']['images']; ?>
/loading.gif"/></span>
                <object width="610" height="450" style="z-index:2;position:relative;">
                    <param name="movie" id="movie" value="<?php echo $this->_tpl_vars['tsJuego']['j_url']; ?>
">
                    <param name="quality" value="high">
                    <embed src="<?php echo $this->_tpl_vars['tsJuego']['j_url']; ?>
" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="610" height="450"></embed>
                </object>			
			</div>		
			</br>
				<p style="word-wrap: break-word;"><?php echo ((is_array($_tmp=$this->_tpl_vars['tsJuego']['j_description'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
			</br>
                        <font color="#555" size="2" style="padding: 5px;;display: block;text-align: right;">Subido <?php echo ((is_array($_tmp=$this->_tpl_vars['tsJuego']['j_date'])) ? $this->_run_mod_handler('hace', true, $_tmp) : smarty_modifier_hace($_tmp)); ?>
, Categoría <?php echo $this->_tpl_vars['tsJuego']['cat_title']; ?>
 <?php if ($this->_tpl_vars['tsUser']->is_admod): ?>, IP: <?php echo $this->_tpl_vars['tsJuego']['j_ip']; ?>
<?php endif; ?> </font>
		</div>
		
		<div class="op-post-user">
        		    
			<div class="ccb floatL">
                <a href="#" onclick="juegos.votar('pos', <?php echo $this->_tpl_vars['tsJuego']['juego_id']; ?>
); return false;" class="qtip j_btn j_like" title="Me gusta"><i></i></a>
                <a href="#" onclick="juegos.votar('neg', <?php echo $this->_tpl_vars['tsJuego']['juego_id']; ?>
); return false;" class="qtip j_btn j_dislike" title="No me gusta"><i></i></a>
                <a href="#" onclick="add_juego_fav(<?php echo $this->_tpl_vars['tsJuego']['juego_id']; ?>
); return false;" <?php if ($this->_tpl_vars['tsJuego']['myfav'] == 1): ?>style="display: none;"<?php endif; ?> title="A&ntilde;adir a mis favoritos" class="qtip j_btn j_favs btn_favorit"><i></i></a>
                <a href="#" onclick="del_juego_fav(<?php echo $this->_tpl_vars['tsJuego']['juego_id']; ?>
); return false;" <?php if ($this->_tpl_vars['tsJuego']['myfav'] == 0): ?>style="display: none;"<?php endif; ?> title="Borrar favorito" class="qtip j_btn j_desfavs btn_favorit"><i></i></a>
	        </div>
			
			<div class="cce">
                <li>
                    <b id="Favs"><?php echo $this->_tpl_vars['tsJuego']['favoritos']; ?>
</b>
                    <div>Favoritos</div>
                </li>
                <li>
                    <b class="votos_total"><?php echo $this->_tpl_vars['tsJuego']['v_total']; ?>
</b>
                    <div>Total votos</div>
                </li>
                <li class="qtip" title="<?php echo $this->_tpl_vars['tsJuego']['j_votos_neg']; ?>
 voto<?php if ($this->_tpl_vars['tsJuego']['j_votos_neg'] != 1): ?>s<?php endif; ?>" style="width: 50px;">
                    <b class="votos_total_neg"><?php echo $this->_tpl_vars['tsJuego']['v_neg']; ?>
%</b>
                    <div>Negativos</div>
                </li>
                <li class="qtip" title="<?php echo $this->_tpl_vars['tsJuego']['j_votos_pos']; ?>
 voto<?php if ($this->_tpl_vars['tsJuego']['j_votos_pos'] != 1): ?>s<?php endif; ?>" style="width: 50px;">
                    <b class="votos_total_pos"><?php echo $this->_tpl_vars['tsJuego']['v_pos']; ?>
%</b>
                    <div>Positivos</div>
                    <?php if ($this->_tpl_vars['tsJuego']['v_total']): ?>
                	<bar><span class="progress_total" style="width: <?php echo $this->_tpl_vars['tsJuego']['v_pos']; ?>
%;"></span></bar>
                    <?php endif; ?>
                </li>				
                <li>
                    <b><?php echo $this->_tpl_vars['tsJuego']['j_hits']; ?>
</b>
                    <div>Visitas</div>
                </li>
	        </div>
            
		</div>
	</div>	
</div>
</div>

			
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'juegos/j.jugar_comentarios.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>		