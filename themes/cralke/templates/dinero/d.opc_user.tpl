

 <div class="panelud">
     <span>
	 <p>El Dinero m&iacute;nimo para solicitar el pago es de:<br/><br/><br/><b>$ {$tsConfig.dinerp}</b></p>
	 </span>
 
 <input type="button" tabindex="9" title="Posts Rechazados" value="&laquo; Posts Rechazados &raquo;"  onclick="window.location='/dinero/rec' " class="mBtn btnYellow" style="width: 290px;margin:55px 5px 0 5px;" id="borrador-save">
 <input type="button" tabindex="9" title="Posts Rechazados" value="&laquo; Posts en Revision &raquo;"  onclick="window.location='/dinero/rev' " class="mBtn btnOk" style="width: 290px;margin:5px 5px 0 5px;" id="borrador-save">
 {if $tsDiner.dinero.x_dinero >= $tsConfig.dinerp}<input type="button" tabindex="8" title="Solicitar Pago" value="&laquo; Solicitar Pago &raquo;"  onclick="window.location='/dinero/pagos' "   class="mBtn btnGreen" style="width: 290px;margin:5px;">{/if}
 </div>
 