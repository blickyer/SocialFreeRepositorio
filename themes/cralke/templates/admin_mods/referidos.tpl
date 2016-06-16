
<div class="boxy-title">
									<h3>Hola <font color="red">{$tsUser->nick}</font></h3>
								</div>
								<div id="res" class="boxy-content">
								{if $tsSave}<div style="display: block;" class="mensajes ok">Tus cambios han sido guardados.</div>{/if}																{if $tsDelete == 'true'}<div style="display: block;" class="mensajes ok">Noticia eliminada.</div>{/if}
									{if $tsAct == ''}


<label> <b> Que puedes hacer? </b></label><hr>
<label> * Puedes ver y borrar los referidos de los usuarios.<br>
* Rapido y facil uso de este sistema. <br>
 <br>
</label>

<hr class="separator" />

<legend> A continuacion encontraras los referidos:</legend>
<hr>
     <table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="99%" align="center">
<thead>
                                        <th>ID</th>
	<th>Usuario referido</th>
                                        <th>De</th>
<th>Fecha</th>
   <th>Acciones</th>
                                    </thead>
                                    <tbody>
{foreach from=$tsReferidos item=r}

  <tr>
                                 
   <td>{$r.id}</td>
   <td><a href="{$tsconfig.url}/perfil/{$r.user_name}" class="hovercard" uid="{$tsUser->getUserId($r.user_name)}">{$r.user_name}</a></td>
   <td><a href="{$tsconfig.url}/perfil/{$r.user_referido}" class="hovercard" uid="{$r.user_id}">{$r.user_referido}</a></td>
	<td>{$r.fecha|hace}</a></td>
                                            <td class="admin_actions">
                                            
                                                
       <a href="{$tsConfig.url}/admin/referidos?act=borrar&id={$r.id}"><img src="{$tsConfig.default}/images/icons/close.png" title="Borrar" /></a>
                                            </td>
                                        </tr>
{/foreach}
   </tbody>
                                    <tfoot>
                                  
                                    </tfoot>
                                </table>




									{elseif $tsAct == 'borrar'}                                   
									<form action="" method="post" id="admin_form" autocomplete="off">									                                    
									<center><font color="red">Referido eliminado</font>																		
									<hr />									                                    
									<input type="button" name="confirm" style="cursor:pointer;" onclick="location.href = '/admin/referidos?borrar=true'" value="Volver &#187;" class="btn_g">									
									{/if}									
								</div>

