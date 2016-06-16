
{if $tsExit == 2}

Selecciona a quien enviar el mensaje:
</br>
</br>
<select id="rangos" name="rangos">
<option value="1">Todos</option>
<option value="2">Administradores</option>
<option value="3">Moderadores</option>
</select>
</br>
</br>
Ingresa el texto del mensaje:<br /><br />
<input type="text" name="cuerpo" maxlength="150" size="85" style="display:block;height:80px;" />

{else}

El mensaje ha sido enviado a todos los usuarios de la web.

{/if}


