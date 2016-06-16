<?php /* Smarty version 2.6.28, created on 2016-06-16 07:33:05
         compiled from t.calendario.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<style>
<?php echo '
.calendar {
width: 100%;
background: #FFF;	
}
.calendar thead {
background: #b6c7db;
color: #1d3652;	
}
.calendar thead th {
padding: 7px;
font-size: 15px;
text-align: center;
}
.calendar tbody tr {
background: #FFF;	
}
.calendar tbody tr td:hover {
background: #EDF1F5;
}
.calendar tbody tr:nth-child(2n+0) {
background: #f1f6f9;	
}
.calendar tbody tr td{
font-size: 0.9em;
vertical-align: top;
border: 1px solid #F1F4F7;
padding: 5px;
height: 95px;
width: 14%;
}
.calendar tbody tr .c_day {
display: block;
font-size: 15px;
margin-bottom: 4px;
font-weight: bold;
color: #225985;	
}
.calendar tbody tr td.hoy {
border: 1px solid #6f8f52;
background-color: #f1f6ec;	
}
.calendar tbody tr td.vacio {
background: #dbe2e8;
border-color: #dbe2e8;	
}
.calendar tbody tr td div a {
width: 100%;
font-size: 12px;
color: #1C74AF;	
}
.cont_left {
width: 70%;
float: left;	
}
.cont_right {
width: 30%;
float: left;	
}
.cont_right .cr_body  {
background: #FFF;
border-radius: 4px;
padding: 10px;	
}
.cont_right .cr_body.cr_cumple {
margin-top: 10px;
}
.cont_right .cr_body.cr_cumple .user_cumple {
margin-bottom: 3px;
font-size: 13px;
color: #A5A5A5;
}
.cont_right .cr_body.cr_cumple .user_cumple a {
color: #1C74AF;	
}
.cont_right .cr_body.cr_cumple .cr_avatar img {
padding: 1px;
border: 1px solid #d5d5d5;
background: #fff;
-webkit-box-shadow: 0px 2px 2px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 2px 2px rgba(0,0,0,0.1);
box-shadow: 0px 2px 2px rgba(0,0,0,0.1);
vertical-align: middle;
}
.cont_right .cr_body.cr_fecha div {
font: 300 84px/58px \'Helvetica Neue\',helvetica,arial,sans-serif;
margin-bottom: 8px;	
}
.cont_right .cr_body.cr_fecha span {
text-transform: uppercase;
font-size: 16px;		
}
.e_item {
padding: 10px;
}
.e_item label {
font-weight: bold;
font-size: 15px;
display: block;
margin-bottom: 5px;	
}
.e_item input{
width: 890px;
padding: 10px 5px;	
}
.e_item textarea {
width: 926px;	
}
.markItUpHeader {
-moz-border-radius: 5px;
background: #eee;
border: 1px solid #ccc;
width: 936px;
border-bottom: 0;
height: 32px;
border-radius: 5px 5px 0 0;
}
.markItUpHeader ul li {
position: relative;
}
.et_titulo {
background: #D8DDE8;
margin-right: 10px;	
}
.et_titulo .et_avatar img {
padding: 2px;
border: 1px solid #d5d5d5;
background: #fff;
-webkit-box-shadow: 0px 2px 2px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 2px 2px rgba(0,0,0,0.1);
box-shadow: 0px 2px 2px rgba(0,0,0,0.1);
margin: 5px;
float: left;
}
.et_titulo b {
font-size: 16px;
padding-top: 13px;
margin-bottom: 3px;
display: block;	
}
.et_cuerpo {
background: #FFF;
padding: 10px;
margin-right: 10px;
font-size: 13px;
margin-bottom: 10px;
border-bottom: 1px solid #D6E2EB;	
word-wrap: break-word;
line-height: 1.5em;
}
.et_cuerpo img {
max-width: 100%;	
}
'; ?>

</style>
<?php if ($this->_tpl_vars['Dia'] > 0): ?>
<?php if ($this->_tpl_vars['tsAct'] == 'nuevo' || $this->_tpl_vars['tsAct'] == 'editar'): ?>
<div class="boxy-title"><?php if ($this->_tpl_vars['tsAct'] == 'nuevo'): ?>Crear nuevo evento <?php echo $this->_tpl_vars['Dia']; ?>
/<?php echo $this->_tpl_vars['Mes']; ?>
/<?php echo $this->_tpl_vars['Year']; ?>
<?php else: ?>Editar evento<?php endif; ?></div>
<div class="box_cuerpo clearfix">
<form action="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/calendario/?dia=<?php echo $this->_tpl_vars['Dia']; ?>
&mes=<?php echo $this->_tpl_vars['Month']; ?>
&year=<?php echo $this->_tpl_vars['Year']; ?>
&act=<?php if ($this->_tpl_vars['tsAct'] == 'nuevo'): ?>nuevo<?php else: ?>editar&eid=<?php echo $this->_tpl_vars['tsDato']['eid']; ?>
<?php endif; ?>" method="post">
    <div class="e_item">
        <label for="titulo">Titulo del evento</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo $this->_tpl_vars['tsDato']['e_titulo']; ?>
" maxlength="160" required="required" />
    </div>
    <?php if ($this->_tpl_vars['tsAct'] == 'editar'): ?>
    <div class="e_item">
    	<label>Fecha del evento</label>
        <input type="text" name="dia" value="<?php echo $this->_tpl_vars['tsDato']['e_dia']; ?>
" maxlength="2" style="width: 21px;text-align: center;display: inline-block;" required="required" />&nbsp;/&nbsp;
        <input type="text" name="mes" value="<?php echo $this->_tpl_vars['tsDato']['e_mes']; ?>
" maxlength="2" style="width: 21px;text-align: center;display: inline-block;" required="required" />&nbsp;/&nbsp;
        <input type="text" name="year" value="<?php echo $this->_tpl_vars['tsDato']['e_year']; ?>
" maxlength="4" style="width: 35px;text-align: center;" required="required" />
    </div>
    <?php endif; ?>
    <div class="e_item">
        <label for="cuerpo">Descripci&oacute;n del evento</label>
        <textarea name="cuerpo" id="markItUp" placeholder="Detalla aqu&iacute; tu evento" style="min-height: 200px;border-radius: 0 0 5px 5px;" required="required"><?php echo $this->_tpl_vars['tsDato']['e_cuerpo']; ?>
</textarea>
    </div>
    <div class="e_item floatL">
        <select name="privado" id="privado" style="padding: 8px 5px;font-size: 12px;">
            <option value="1"<?php if ($this->_tpl_vars['tsDato']['e_privado'] == 1): ?> selected="selected"<?php endif; ?>>Evento p&uacute;blico (Visible para todos)</option>
            <option value="2"<?php if ($this->_tpl_vars['tsDato']['e_privado'] == 2): ?> selected="selected"<?php endif; ?>>Evento privado (Solo yo puedo verlo)</option>
        </select>
    </div>
    <div class="e_item floatR">
    	<input type="submit" value="<?php if ($this->_tpl_vars['tsAct'] == 'nuevo'): ?>Agregar evento<?php else: ?>Guardar cambios<?php endif; ?>" class="mBtn btnOk" />
    </div>
</form>
</div>
<?php else: ?>
<div class="boxy-title">Eventos</div>
<div class="box_cuerpo clearfix">
	<div class="cont_left">
    	<?php if ($this->_tpl_vars['tsEventos']['data']): ?>
        <?php $_from = $this->_tpl_vars['tsEventos']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['e']):
?>
        <?php if ($this->_tpl_vars['e']['e_privado'] == 1 || $this->_tpl_vars['e']['e_user'] == $this->_tpl_vars['tsUser']->uid): ?>
        <div class="et_titulo clearfix">
            <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['e']['user_name']; ?>
" class="et_avatar"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['e']['e_user']; ?>
_50.jpg" width="40" height="40" /></a>
            <b id="title_<?php echo $this->_tpl_vars['e']['eid']; ?>
"><?php echo $this->_tpl_vars['e']['e_titulo']; ?>
</b>
            <span>Por <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['e']['user_name']; ?>
"><?php echo $this->_tpl_vars['e']['user_name']; ?>
</a></span>
            <?php if ($this->_tpl_vars['tsUser']->uid == $this->_tpl_vars['e']['e_user'] || $this->_tpl_vars['tsUser']->is_admod): ?><div class="floatR"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/calendario/?dia=<?php echo $this->_tpl_vars['e']['e_dia']; ?>
&mes=<?php echo $this->_tpl_vars['e']['e_mes']; ?>
&year=<?php echo $this->_tpl_vars['e']['e_year']; ?>
&eid=<?php echo $this->_tpl_vars['e']['eid']; ?>
&act=editar">Editar</a> <a href="javascript:borrar_evento(<?php echo $this->_tpl_vars['e']['eid']; ?>
)">Eliminar</a></div><?php endif; ?>
        </div>
        <div class="et_cuerpo"><?php echo $this->_tpl_vars['e']['e_cuerpo']; ?>
</div>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
    	<div style="margin-right: 10px;"><div class="emptyData">No hay eventos programados para este d&iacute;a.</div></div>
        <?php endif; ?>
        <div style="margin-top: 15px;margin-right: 10px;overflow: hidden;">
        <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/calendario/?mes=<?php echo $this->_tpl_vars['Month']; ?>
&year=<?php echo $this->_tpl_vars['Year']; ?>
" class="mBtn btnOk floatL">Volver</a>
        <?php if ($this->_tpl_vars['tsUser']->is_member): ?><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/calendario/?dia=<?php echo $this->_tpl_vars['Dia']; ?>
&mes=<?php echo $this->_tpl_vars['Month']; ?>
&year=<?php echo $this->_tpl_vars['Year']; ?>
&act=nuevo" class="mBtn btnOk floatR">Agregar nuevo evento</a><?php endif; ?>
        </div>
    </div>
    <div class="cont_right">
    	<div class="cr_body cr_fecha" align="center">
        	<div><?php echo $this->_tpl_vars['Dia']; ?>
</div>
            <span><?php echo $this->_tpl_vars['Mes']; ?>
 <?php echo $this->_tpl_vars['Year']; ?>
</span>
        </div>
        <div class="cr_body cr_cumple">
            <h2 style="margin-top: 0;">Cumplea&ntilde;os de este d&iacute;a</h2>
            <?php if ($this->_tpl_vars['tsCumple']): ?>
            <?php $_from = $this->_tpl_vars['tsCumple']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
            <div class="user_cumple">
                <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['c']['user_name']; ?>
" class="cr_avatar"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['c']['user_id']; ?>
_50.jpg" width="20" height="20" /></a>
                (<?php echo $this->_tpl_vars['c']['user_ano']; ?>
)
                <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['c']['user_name']; ?>
"><?php echo $this->_tpl_vars['c']['user_name']; ?>
</a>
            </div>
            <?php endforeach; endif; unset($_from); ?>
            <?php else: ?>
            <div class="emptyData">No hay celebraciones este d&iacute;a.</div>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
//<?php echo '
function borrar_evento(id) {
	mydialog.show();
	mydialog.title(\'Borrar evento\');
	mydialog.body(\'&#191;Desea eliminar este evento:<b>\' + $("#title_" + id).html() + \'</b>?\');
	mydialog.buttons(true, true, \'S&iacute;\', \'location.href=\\\'\' + global_data.url + \'/calendario/?dia=1&act=borrar&eid=\' + id + \'\\\'\' , true, false, true, \'No\', \'close\', true, true);
	mydialog.center();
}
//'; ?>

</script>
<?php endif; ?>
<?php else: ?>
<div class="boxy-title">Eventos <?php echo $this->_tpl_vars['Mes']; ?>
 del <?php echo $this->_tpl_vars['Year']; ?>
</div>
<div class="box_cuerpo" style="padding: 0;">
    <table class="calendar" cellspacing="0" cellpadding="0">
    	<thead>
        <tr class="c_header"> 
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sabado</th>
            <th>Domingo</th>
        </tr>
        </thead>
        <tbody>
            <?php echo $this->_tpl_vars['html']; ?>

        </tbody>
    </table>
</div>
<div class="clearfix" align="center">
    <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/calendario/?mes=<?php if ($this->_tpl_vars['Month']-1 == 0): ?><?php echo $this->_tpl_vars['Month']+11; ?>
&year=<?php echo $this->_tpl_vars['Year']-1; ?>
<?php else: ?><?php echo $this->_tpl_vars['Month']-1; ?>
&year=<?php echo $this->_tpl_vars['Year']; ?>
<?php endif; ?>" class="mBtn btnOk floatL">Mes anterior</a>
    <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/calendario/?mes=<?php if ($this->_tpl_vars['Month']+1 == 13): ?><?php echo $this->_tpl_vars['Month']-11; ?>
&year=<?php echo $this->_tpl_vars['Year']+1; ?>
<?php else: ?><?php echo $this->_tpl_vars['Month']+1; ?>
&year=<?php echo $this->_tpl_vars['Year']; ?>
<?php endif; ?>" class="mBtn btnOk floatR">Mes siguiente</a>
    <form action="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/calendario/" method="get" style="float: right;margin-right: 27%;">
    	<a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/calendario/" class="mBtn btnOk" style="padding: 6px 15px;">Hoy</a>
        <select name="mes" style="padding: 5px;font-size: 12px;">
            <?php $_from = $this->_tpl_vars['Meses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['m']):
?>
            <option value="<?php echo $this->_tpl_vars['i']; ?>
"<?php if ($this->_tpl_vars['Mes'] == $this->_tpl_vars['m']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['m']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
        <select name="year" style="padding: 5px;font-size: 12px;">
            <option value="<?php echo $this->_tpl_vars['Year_a']-2; ?>
"<?php if ($this->_tpl_vars['Year'] == $this->_tpl_vars['Year_a']-2): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['Year_a']-2; ?>
</option>
            <option value="<?php echo $this->_tpl_vars['Year_a']-1; ?>
"<?php if ($this->_tpl_vars['Year'] == $this->_tpl_vars['Year_a']-1): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['Year_a']-1; ?>
</option>
            <option value="<?php echo $this->_tpl_vars['Year_a']; ?>
"<?php if ($this->_tpl_vars['Year'] == $this->_tpl_vars['Year_a']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['Year_a']; ?>
</option>
            <option value="<?php echo $this->_tpl_vars['Year_a']+1; ?>
"<?php if ($this->_tpl_vars['Year'] == $this->_tpl_vars['Year_a']+1): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['Year_a']+1; ?>
</option>
            <option value="<?php echo $this->_tpl_vars['Year_a']+2; ?>
"<?php if ($this->_tpl_vars['Year'] == $this->_tpl_vars['Year_a']+2): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['Year_a']+2; ?>
</option>
            <option value="<?php echo $this->_tpl_vars['Year_a']+3; ?>
"<?php if ($this->_tpl_vars['Year'] == $this->_tpl_vars['Year_a']+3): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['Year_a']+3; ?>
</option>
            <option value="<?php echo $this->_tpl_vars['Year_a']+4; ?>
"<?php if ($this->_tpl_vars['Year'] == $this->_tpl_vars['Year_a']+4): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['Year_a']+4; ?>
</option>
            <option value="<?php echo $this->_tpl_vars['Year_a']+5; ?>
"<?php if ($this->_tpl_vars['Year'] == $this->_tpl_vars['Year_a']+5): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['Year_a']+5; ?>
</option>
            <option value="<?php echo $this->_tpl_vars['Year_a']+6; ?>
"<?php if ($this->_tpl_vars['Year'] == $this->_tpl_vars['Year_a']+6): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['Year_a']+6; ?>
</option>
        </select>
        <input type="submit" value="Ir" class="mBtn btnOk" style="padding: 6px 15px;">
    </form>
</div>
<div class="boxy-title" style="margin-top: 20px;">Pr&oacute;ximos eventos</div>
<div class="box_cuerpo clearfix">
    <div class="floatL" style="width: 48%;margin-right: 4%;">
        <?php if ($this->_tpl_vars['tsProximos']['todos']): ?>
        <?php $_from = $this->_tpl_vars['tsProximos']['todos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['e']):
?>
        <div class="et_titulo clearfix" style="margin: 0;margin-bottom: 1px;">
            <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['e']['user_name']; ?>
" class="et_avatar"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['e']['e_user']; ?>
_50.jpg" width="30" height="30" /></a>
            <b style="padding-top: 9px;font-size: 15px;"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/calendario/?dia=<?php echo $this->_tpl_vars['e']['e_dia']; ?>
&mes=<?php echo $this->_tpl_vars['e']['e_mes']; ?>
&year=<?php echo $this->_tpl_vars['e']['e_year']; ?>
" style="color: #225985;"><?php echo $this->_tpl_vars['e']['e_titulo']; ?>
</a></b>
            <span>Por <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['e']['user_name']; ?>
"><?php echo $this->_tpl_vars['e']['user_name']; ?>
</a> El <?php echo $this->_tpl_vars['e']['e_dia']; ?>
/<?php echo $this->_tpl_vars['e']['e_mes']; ?>
/<?php echo $this->_tpl_vars['e']['e_year']; ?>
</span>
        </div>
        <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
        <div class="emptyData">No hay eventos programados</div>
        <?php endif; ?>
    </div>
    <div class="floatL" style="width: 48%">
        <?php if ($this->_tpl_vars['tsProximos']['mios']): ?>
        <?php $_from = $this->_tpl_vars['tsProximos']['mios']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['e']):
?>
        <div class="et_titulo clearfix" style="margin: 0;margin-bottom: 1px;">
            <a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/perfil/<?php echo $this->_tpl_vars['e']['user_name']; ?>
" class="et_avatar"><img src="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/files/avatar/<?php echo $this->_tpl_vars['e']['e_user']; ?>
_50.jpg" width="30" height="30" /></a>
            <b style="padding-top: 9px;font-size: 15px;"><a href="<?php echo $this->_tpl_vars['tsConfig']['url']; ?>
/calendario/?dia=<?php echo $this->_tpl_vars['e']['e_dia']; ?>
&mes=<?php echo $this->_tpl_vars['e']['e_mes']; ?>
&year=<?php echo $this->_tpl_vars['e']['e_year']; ?>
" style="color: #225985;"><?php echo $this->_tpl_vars['e']['e_titulo']; ?>
</a></b>
            <span>El <?php echo $this->_tpl_vars['e']['e_dia']; ?>
/<?php echo $this->_tpl_vars['e']['e_mes']; ?>
/<?php echo $this->_tpl_vars['e']['e_year']; ?>
</span>
        </div>
        <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
        <div class="emptyData">No tienes eventos programados</div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/main_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>