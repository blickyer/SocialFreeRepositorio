<?php /* Smarty version 2.6.28, created on 2016-06-16 12:43:21
         compiled from modules/m.fotos_add_sidebar.tpl */ ?>
                <div style="width: 300px; float: right; margin-top:37px" id="post-izquierda">
                    <div class="categoriaList">
                        <h6>Protocolo para fotos</h6>
                        <ul>
                            <li>Tus fotograf&iacute;as no pueden contener material pornogr&aacute;fico, escatol&oacute;gico, violento, ni nada que pueda ser considerado ofensivo por otros usuarios. Realizar este tipo de actividades puede causar el cierre definitivo de tu cuenta.</li>
                            <?php if ($this->_tpl_vars['tsConfig']['c_allow_upload'] == 1): ?><li>&bull; Puedes agregar una foto desde tu PC.</li>
                            <?php else: ?><li>&bull; Puedes agregar una foto desde una URL.</li><?php endif; ?>
                        </ul>
                    </div>
                    <center><?php echo $this->_tpl_vars['tsConfig']['ads_300']; ?>
</center>
                </div>