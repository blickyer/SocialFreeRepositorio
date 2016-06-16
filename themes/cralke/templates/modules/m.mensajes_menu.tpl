            	<div style="float:left;width:200px">
           			<div class="boxy">
                        <div class="boxy-title">
                            <h3>Men&uacute;</h3>
                            <span></span>
                        </div><!-- boxy-title -->
                        <div class="boxy-content" id="admin_menu" style="padding: 6px;">
                            <ul id="mp-menu" class="cat-list">
                                <li class="mp_inbox{if $tsAction == ''} active{/if}"><span class="cat-title"><a href="{$tsConfig.url}/mensajes/">Mensajes Recibidos</a></span></li>
                                <li class="mp_send{if $tsAction == 'enviados'} active{/if}"><a href="{$tsConfig.url}/mensajes/enviados/">Mensajes Enviados</a></li>
                                <li class="mp_return{if $tsAction == 'respondidos'} active{/if}"><a href="{$tsConfig.url}/mensajes/respondidos/">Mensajes Respondidos</a></li>
                                {if $tsAction == 'search'}<li class="mp_search active"><span class="cat-title"><a href="#">Resultados de b&uacute;squeda</a></span></li>{/if}                         
                                <li class="mp_new"><a href="#" onclick="mensaje.nuevo('','','',''); return false;">Escribir Nuevo Mensaje</a></li>
                                <li class="mp_avisos{if $tsAction == 'avisos'} active{/if}"><span class="cat-title"><a href="{$tsConfig.url}/mensajes/avisos/">Avisos/Alertas</a></span></li>
                            </ul>
                        </div><!-- boxy-content -->
                    </div>
					{if $tsAction == '' || $tsAction == 'enviados' || $tsAction == 'respondidos' || $tsAction == 'search'}
					 {elseif $tsAction == 'leer'}
					<div class="boxy" style="margin-top:5px;">
                             <div class="boxy-title">
                            <h3>Acciones</h3></div>
							 <div class="boxy-content" id="admin_menu">
                            <ul class="actions-list m-op" style="">
                                <li><a href="#" onclick="mensaje.marcar('{$tsMensajes.msg.mp_id}:{$tsMensajes.msg.mp_type}', 1, 2, this); return false;">Marcar como no le&iacute;do</a></li>
                                <li class="div"></li>
                                <li><a href="#" onclick="mensaje.eliminar('{$tsMensajes.msg.mp_id}:{$tsMensajes.msg.mp_type}',2); return false;">Eliminar</a></li>
                                <li><a href="#" onclick="denuncia.nueva('mensaje',{$tsMensajes.msg.mp_id}, '', ''); return false;">Marcar como correo no deseado...</a></li>
                                <li class="div"></li>
                                <li><a href="#" onclick="denuncia.nueva('usuario',{if $tsMensajes.msg.mp_from != $tsUser->uid}{$tsMensajes.msg.mp_from}{else}{$tsMensajes.msg.mp_to}{/if}, '', '{if $tsMensajes.msg.mp_from != $tsUser->uid}{$tsMensajes.msg.user_name}{else}{$tsUser->getUsername($tsMensajes.msg.mp_to)}{/if}'); return false">Denunciar a este usuario...</a></li>
                                <li><a href="javascript:bloquear({$tsMensajes.ext.uid}, {if $tsMensajes.ext.block}false{else}true{/if}, 'mensajes')" id="bloquear_cambiar">{if $tsMensajes.ext.block}Desbloquear{else}Bloquear{/if} a {$tsMensajes.ext.user} ...</a></li>
                                <li class="div"></li>
                                <li><a href="{$tsConfig.url}/mensajes/">&laquo; Volver a mensajes</a></li>
                            </ul>
                        </div>
                        </div>
						  {/if}
						  
						  {if $tsAction == '' || $tsAction == 'enviados' || $tsAction == 'respondidos' || $tsAction == 'search'}
					 {elseif $tsAction == 'avisos'}
					<div class="boxy" style="margin-top:5px;">
                             <div class="boxy-title">
                            <h3>Acciones</h3></div>
							 <div class="boxy-content" id="admin_menu">
                            <ul class="actions-list" id="mp-menu">
                                    <li style="padding-left: 6px;"><a href="{$tsConfig.url}/mensajes/avisos/?did={$tsMensaje.av_id}">Eliminar</a></li>
                                    <li style="padding-left: 6px;"><a href="{$tsConfig.url}/mensajes/avisos/">&laquo; Volver a avisos</a></li>
                                </ul>
                        </div>
                        </div>
						  {/if}
                    {if $tsMensajes}
                    <br />
                    <center>
                    {$tsConfig.ads_160}
                    </center>
                    {/if}
					
                </div>
