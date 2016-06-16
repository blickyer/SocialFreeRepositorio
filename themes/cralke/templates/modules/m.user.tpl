<div id="usuario-perfil">
			<a href="{$tsConfig.url}/perfil/{$tsUser->info.user_name}">
			<img class="avatar01" src="{$tsConfig.url}/files/avatar/{$tsUser->uid}_120.jpg">
			</a>
			<div id="ver_on1" style="display: block;"><a onclick="mostrar1('bloque1')" href="#"><img class="desl" src="" /></a></div> 
			<div id="ver_off1" style="display: none;"><a onclick="ocultar1('bloque1')" href="#"><img class="cesl" src="" /></a></div>			
			<div id="bloque1" style="display: none;"><div style="padding:5px;margin-right:100px;margin-top:50px">
			<li style="font-weight:bold;font-size:14px">@{$tsUser->nick}</li>
			<li style="border-bottom:1px solid #D7D7D7;padding:2px;"><a  class="opciones" title="Mis Favoritos" href="{$tsConfig.url}/favoritos.php">Favoritos </a>
			<a class="opciones" title="Mis Borradores" href="{$tsConfig.url}/borradores.php">- Borradores </a><a class="opciones" title="Mi cuenta" href="{$tsConfig.url}/cuenta/">- Editar Cuenta </li></a>
			<a class="opciones" href="{$tsConfig.url}/login-salir.php" style="vertical-align: middle" title="Salir"><li>Salir</li></a>
			</div>
</div>
</div>