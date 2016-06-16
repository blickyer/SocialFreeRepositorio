<?php /* Smarty version 2.6.28, created on 2016-06-16 12:46:00
         compiled from dinero/d.opc_user.tpl */ ?>


 <div class="panelud">
     <span>
	 <p>El Dinero m&iacute;nimo para solicitar el pago es de:<br/><br/><br/><b>$ <?php echo $this->_tpl_vars['tsConfig']['dinerp']; ?>
</b></p>
	 </span>
 
 <input type="button" tabindex="9" title="Posts Rechazados" value="&laquo; Posts Rechazados &raquo;"  onclick="window.location='/dinero/rec' " class="mBtn btnYellow" style="width: 290px;margin:55px 5px 0 5px;" id="borrador-save">
 <input type="button" tabindex="9" title="Posts Rechazados" value="&laquo; Posts en Revision &raquo;"  onclick="window.location='/dinero/rev' " class="mBtn btnOk" style="width: 290px;margin:5px 5px 0 5px;" id="borrador-save">
 <?php if ($this->_tpl_vars['tsDiner']['dinero']['x_dinero'] >= $this->_tpl_vars['tsConfig']['dinerp']): ?><input type="button" tabindex="8" title="Solicitar Pago" value="&laquo; Solicitar Pago &raquo;"  onclick="window.location='/dinero/pagos' "   class="mBtn btnGreen" style="width: 290px;margin:5px;"><?php endif; ?>
 </div>
 