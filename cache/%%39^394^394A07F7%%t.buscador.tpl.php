<?php /* Smarty version 2.6.28, created on 2016-06-16 12:33:16
         compiled from t.buscador.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'seo', 't.buscador.tpl', 121, false),array('modifier', 'hace', 't.buscador.tpl', 123, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php echo '
        <script type="text/javascript">
        var buscador = {
            // '; ?>

        	tipo: '<?php if (! $this->_tpl_vars['tsEngine']): ?>web<?php echo $this->_tpl_vars['tsEngine']; ?>
<?php endif; ?>',
            // <?php echo '
        	select: function(tipo){
        		if(this.tipo==tipo)
        			return;
        
        		//Cambio de action form
        		//$(\'form[name="buscador"]\').attr(\'action\', \'?e=\'+tipo+\'\');
                $(\'input[name="e"]\').val(tipo);
        
        		//Solo hago los cambios visuales si no envia consulta
        		if(!this.buscadorLite){
        			//Cambio here en <a />
        			$(\'a#select_\' + this.tipo).removeClass(\'here\');
        			$(\'a#select_\' + tipo).addClass(\'here\');
        
        			//Cambio de logo
        			$(\'img#buscador-logo-\'+this.tipo).css(\'display\', \'none\');
        			$(\'img#buscador-logo-\'+tipo).css(\'display\', \'inline\');
        
        		}
        
        		//Muestro/oculto los input google
        		if(tipo==\'google\'){ 
                    //Ahora es google '; ?>

        			$('form[name="buscador"]').append('<input type="hidden" name="cx" value="<?php echo $this->_tpl_vars['tsConfig']['ads_search']; ?>
" /><input type="hidden" name="cof" value="FORID:10" /><input type="hidden" name="ie" value="ISO-8859-1" />');
                    // <?php echo '
        		}else if(this.tipo==\'google\'){ //El anterior fue google
        			$(\'input[name="cx"]\').remove();
        			$(\'input[name="cof"]\').remove();
        			$(\'input[name="ie"]\').remove();
        		}
        
        		this.tipo = tipo;
        	}
        }
        </script>
        '; ?>

        <?php if ($this->_tpl_vars['tsQuery'] || $this->_tpl_vars['tsAutor']): ?>
        <div id="buscadorLite">
        	<ul class="searchTabs">
        		<li class="here"><a href="">Posts</a></li>
        		<div class="clearBoth"></div>
        	</ul>
        	<div class="clearBoth"></div>
        	<div class="searchCont">
        		<form action="" method="GET" name="buscador">
        			<div class="searchFil">
        				<div style="">
        					<img<?php if ($this->_tpl_vars['tsEngine'] != 'google'): ?>style="display: none;margin-top: 5px;"<?php endif; ?> alt="google-search-engine" src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" id="buscador-logo-google"/>
        					<img<?php if ($this->_tpl_vars['tsEngine'] != 'web'): ?>style="display: none;margin-top: 5px;"<?php endif; ?> alt="web-search-engine" style="margin-top: 5px;" src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/phpostmin.gif" id="buscador-logo-web"/>
        					<img<?php if ($this->_tpl_vars['tsEngine'] != 'tags'): ?> style="display: none;margin-top: 5px;"<?php endif; ?> alt="tags-search-engine" src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/phpostmin.gif" id="buscador-logo-tags"/>
        					<label style="float: right;float: right;padding: 10px;font-size: 12px;border: 1px solid #E8E8E8;border-bottom: none;" class="searchWith">
                            <a href="javascript:buscador.select('google')" id="select_google"<?php if ($this->_tpl_vars['tsEngine'] == 'google'): ?> class="here"<?php endif; ?>>Google</a><span class="sep">|</span>
        					<a href="javascript:buscador.select('web')" id="select_web"<?php if (! $this->_tpl_vars['tsEngine'] || $this->_tpl_vars['tsEngine'] == 'web'): ?> class="here"<?php endif; ?>><?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
</a><span class="sep">|</span>
        					<a href="javascript:buscador.select('tags')" id="select_tags"<?php if ($this->_tpl_vars['tsEngine'] == 'tags'): ?> class="here"<?php endif; ?>>Tags</a></label>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearBoth"></div>
                        <div class="boxBox">
                            <div class="searchEngine">
                                <input type="text" value="<?php echo $this->_tpl_vars['tsQuery']; ?>
" class="searchBar" size="25" name="q"/>
        						<input type="submit" title="Buscar" value="Buscar" class="mBtn btnOk"/>
                                <input type="hidden" name="e" value="<?php echo $this->_tpl_vars['tsEngine']; ?>
" />
                                <?php if ($this->_tpl_vars['tsEngine'] == 'google'): ?>
                                <input type="hidden" name="cx" value="<?php echo $this->_tpl_vars['tsConfig']['ads_search']; ?>
" /><input type="hidden" name="cof" value="FORID:10" /><input type="hidden" name="ie" value="ISO-8859-1" />
                                <?php endif; ?>
        					</div><!-- End Filter -->
                            <div class="filterSearch">
                                <div class="floatL" style="margin-top: 5px;">
                                    <label>Categoria</label>
        							<select style="width: 150px;overflow: visible;" name="cat">
        								<option value="-1">Todas</option>
                                        <?php $_from = $this->_tpl_vars['tsConfig']['categorias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
                                        <option value="<?php echo $this->_tpl_vars['c']['cid']; ?>
"<?php if ($this->_tpl_vars['tsCategory'] == $this->_tpl_vars['c']['cid']): ?> selected="true"<?php endif; ?>><?php echo $this->_tpl_vars['c']['c_nombre']; ?>
</option>
                                        <?php endforeach; endif; unset($_from); ?>
        							</select>
        							<span id="filtro_autor" style="margin-left: 5px;">
        								<label>Usuario</label>
        								<input type="text" name="autor" value="<?php echo $this->_tpl_vars['tsAutor']; ?>
"/>
        							</span>
        						</div>
                                <div class="clearfix"></div>
                            </div><!-- End SearchFill -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- End SearchFill -->
              </form>
              </div>
        </div>
            <?php if ($this->_tpl_vars['tsEngine'] == 'google'): ?>
        <div id="cse-search-results"></div>
        <script type="text/javascript">
          var googleSearchIframeName = "cse-search-results";
          var googleSearchFormName = "cse-search-box";
          var googleSearchFrameWidth = '940';
          var googleSearchDomain = "www.google.com.mx";
          var googleSearchPath = "/cse";
        </script>
        <script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
            <?php else: ?>
        <div id="resultados" style="width:770px" class="floatL">
            <div id="showResult">
                <table class="linksList">
                    <thead>
        				<tr>
        					<div class="resultados-busqueda" style="text-align: left;">Mostrando <strong><?php echo $this->_tpl_vars['tsResults']['total']; ?>
</strong> de <strong><?php echo $this->_tpl_vars['tsResults']['pages']['total']; ?>
</strong> resultados totales</div>
        				</tr>
        			</thead>
                    <tbody>
                    <?php $_from = $this->_tpl_vars['tsResults']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['r']):
?>
                    <tr id="div_<?php echo $this->_tpl_vars['r']['post_id']; ?>
">
                        <td style="text-align: left;">
						 <img class="cat-imgs" title="<?php echo $this->_tpl_vars['r']['c_nombre']; ?>
" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/cat/<?php echo $this->_tpl_vars['r']['c_img']; ?>
"/>
                           <div style="display: inline-block;margin: 12px 8px;position: absolute;"> <a class="titlePost" href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/posts/<?php echo $this->_tpl_vars['r']['c_seo']; ?>
/<?php echo $this->_tpl_vars['r']['post_id']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['r']['post_title'])) ? $this->_run_mod_handler('seo', true, $_tmp) : smarty_modifier_seo($_tmp)); ?>
.html"><?php echo $this->_tpl_vars['r']['post_title']; ?>
</a>
                            <div class="info" style="background-color:#FFF">
                                <img alt="Creado hace" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/clock.png"/> <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['r']['post_date'])) ? $this->_run_mod_handler('hace', true, $_tmp, true) : smarty_modifier_hace($_tmp, true)); ?>
</strong> -
                                <img alt="Posts relacionados" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/relacionados.png"/> <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/buscador/?q=<?php echo $this->_tpl_vars['r']['post_title']; ?>
&e=<?php echo $this->_tpl_vars['tsEngine']; ?>
&cat=<?php echo $this->_tpl_vars['tsCategory']; ?>
&autor=<?php echo $this->_tpl_vars['tsAutor']; ?>
">Post Relacionados</a> -
                                <img alt="Creado por" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/autor.png"/> <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['r']['user_name']; ?>
"><?php echo $this->_tpl_vars['r']['user_name']; ?>
</a> |
                                <img alt="0 puntos" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/puntos.png"/> Puntos <strong><?php echo $this->_tpl_vars['r']['post_puntos']; ?>
</strong> -
                                <img alt="0 puntos" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/favoritos.gif"/> <strong><?php echo $this->_tpl_vars['r']['post_favoritos']; ?>
</strong> Favoritos -
                                <img alt="0 puntos" src="<?php echo $this->_tpl_vars['tsConfig']['tema']['t_url']; ?>
/images/icons/comentarios.gif"/> <strong><?php echo $this->_tpl_vars['r']['post_comments']; ?>
</strong> Comentarios
                            </div> </div>
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                    </tbody>
                </table>
            </div>
            <div class="paginadorCom">
                <?php if ($this->_tpl_vars['tsResults']['pages']['prev'] != 0): ?><div style="display: block; margin: 5px 0pt; width: 110px;text-align:left" class="floatL before"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/buscador/?page=<?php echo $this->_tpl_vars['tsResults']['pages']['prev']; ?>
<?php if ($this->_tpl_vars['tsQuery']): ?>&q=<?php echo $this->_tpl_vars['tsQuery']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['tsEngine']): ?>&e=<?php echo $this->_tpl_vars['tsEngine']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['tsCategory']): ?>&cat=<?php echo $this->_tpl_vars['tsCategory']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['tsAutor']): ?>&autor=<?php echo $this->_tpl_vars['tsAutor']; ?>
<?php endif; ?>">&laquo; Anterior</a></div><?php endif; ?>
          		<?php if ($this->_tpl_vars['tsResults']['pages']['next'] != 0): ?><div style="display: block; margin: 5px 0pt; width: 110px;text-align:right" class="floatR next"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/buscador/?page=<?php echo $this->_tpl_vars['tsResults']['pages']['next']; ?>
<?php if ($this->_tpl_vars['tsQuery']): ?>&q=<?php echo $this->_tpl_vars['tsQuery']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['tsEngine']): ?>&e=<?php echo $this->_tpl_vars['tsEngine']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['tsCategory']): ?>&cat=<?php echo $this->_tpl_vars['tsCategory']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['tsAutor']): ?>&autor=<?php echo $this->_tpl_vars['tsAutor']; ?>
<?php endif; ?>">Siguiente &raquo;</a></div><?php endif; ?>
            </div>
        </div>
        <div class="container170 floatR">
            <center><?php echo $this->_tpl_vars['tsConfig']['ads_160']; ?>
</center>
        </div>
        <div class="clearBoth"></div>
            <?php endif; ?>

        <?php else: ?>
        <div id="buscadorBig">
        	<ul class="searchTabs">
        		<li class="here"><a href="">Posts</a></li>
        		<li class="clearfix"></li>
        	</ul>
        	<div class="clearBoth"></div>
        	<div class="searchCont">
        		<form action="" method="GET" name="buscador" style="padding: 0pt; margin: 0pt;">
        			<div class="searchFil">
        				<div style="margin-bottom: 5px;">
        					<div class="logoMotorSearch">
        						<img style="height: 16px; display: none;" alt="google-search-engine" src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" id="buscador-logo-google"/>
        						<img alt="web-search-engine" src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/phpostmin.gif" id="buscador-logo-web"/>
        						<img style="display: none;" alt="tags-search-engine" src="<?php echo $this->_tpl_vars['tsConfig']['default']; ?>
/images/phpostmin.gif" id="buscador-logo-tags"/>
        					</div>
        
        					<label class="searchWith">
								<a href="javascript:buscador.select('google')" id="select_google">Google</a><span class="sep">|</span>
        						<a href="javascript:buscador.select('web')" id="select_web" class="here"><?php echo $this->_tpl_vars['tsConfig']['titulo']; ?>
</a><span class="sep">|</span>
        						<a href="javascript:buscador.select('tags')" id="select_tags">Tags</a>
        					</label>
        					<div class="clearfix"></div>
        				</div>
        				<div class="clearfix"></div>
        			
        				<div class="boxBox">
        					<div class="searchEngine">
        						<input type="text" value="" class="searchBar" size="25" name="q"/>
        						<input type="submit" title="Buscar" value="Buscar" class="mBtn btnOk"/>
                                <input type="hidden" name="e" value="web" />
          					<div class="clearfix"></div>
        					</div>
        					<!-- End Filter -->
        					<div class="filterSearch">
        					  <strong>Filtrar:</strong>
        						<div class="floatL">
        							<label>Categor&iacute;a</label>
        							<select style="width: 200px;" name="cat">
        								<option value="-1">Todas</option>
                                        <?php $_from = $this->_tpl_vars['tsConfig']['categorias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
                                        <option value="<?php echo $this->_tpl_vars['c']['cid']; ?>
"><?php echo $this->_tpl_vars['c']['c_nombre']; ?>
</option>
                                        <?php endforeach; endif; unset($_from); ?>
        							</select>
        							<span id="filtro_autor">
        								<label>Usuario</label>
        								<input type="text" name="autor" value="<?php echo $this->_tpl_vars['tsAutor']; ?>
"/>
        							</span>
        						</div>
        						<div class="clearfix"></div>
        					</div>
        					<!-- End SearchFill -->
        					<div class="clearfix"></div>
        					
        				</div>
        			  <div class="clearfix"></div>
        			</div>
        			<!-- End SearchFill -->
        		</form>
        	</div>
        </div>
        <?php endif; ?>
        <div style="clear:both;"></div>                
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>