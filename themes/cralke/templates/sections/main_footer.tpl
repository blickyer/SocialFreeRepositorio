		<!--end-cuerpo-->
		</div>
        <div id="pie">
		 {* El siguiente contenedor sirve para validar el Copyright *}
		{* El ID del div NO debe ser alterado de lo contrario nuestro validador *}
		{* tomará al sitio como una web sin copyright *}
		<div id="pp_copyright" style="display: block!important; opacity: 1!important;">
        <a href="{$tsConfig.url}" class=qtip title="Dise&ntilde;ado por MegaErick | Edit by Rengo"><strong>{$tsConfig.titulo}</strong></a> &copy; {$smarty.now|date_format:"%Y"} - Powered by <a href="http://www.phpost.net/" target="_blank"><strong>PHPost</strong></a>
		</div>
        </div>
        </div>
        <!--END CONTAINER-->
    </div>
</div>
</body>
</html>