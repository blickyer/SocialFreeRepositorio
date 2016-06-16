<div class="com_tema_comentarios clearfix">
<br />
    <div class="box_title">Comentarios<div class="box_rss"><span id="ncomments">{$tsTema.t_respuestas|number_format:0:',':'.'}</span></div>
    <img src="{$tsConfig.images}/gif.gif" style="border:0; margin-right:1em; display:none" class="floatR" id="com_gif"/>
                            <div class="clearfix"></div>
    </div>
    {if !$tsTema.t_respuestas && $tsTema.t_cerrado == 0}<div class="com_bigmsj_blue">No hay comentarios. ¡S&eacute; el primero!</div>{/if}
    {if $tsTema.t_cerrado == 1 && $tsUser->uid != $tsTema.t_autor && !$tsUser->is_admod && $tsCom.mi_rango < 4}<div class="com_bigmsj_yellow">El tema est&aacute; cerrado y no se permiten comentarios</div>
	{elseif $tsTema.t_cerrado == 1 && $tsUser->uid == $tsTema.t_autor}<div class="com_bigmsj_yellow">El tema est&aacute; cerrado y no se permiten comentarios tu puedes hacerlo porque eres el autor.</div>
	{elseif $tsTema.t_cerrado == 1 && $tsUser->is_admod && !$tsUser->$tsTema.t_autor}<div class="com_bigmsj_yellow">El tema est&aacute; cerrado y no se permiten comentarios tu puedes hacerlo porque eres moderador o administrador general</div>
	{elseif $tsTema.t_cerrado == 1 && $tsCom.mi_rango > 3 && !$tsUser->$tsTema.t_autor && !$tsUser->is_admod}<div class="com_bigmsj_yellow">El tema est&aacute; cerrado y no se permiten comentarios tu puedes hacerlo porque eres moderador o administrador de la Comunidad</div>
	{/if}
    <div id="result_answers">{include file='t.comus_ajax/c.pages_respuestas.tpl'}</div> <br />
        {if $tsUser->is_member && $tsCom.es_miembro && $tsTema.t_cerrado == 0 && $tsCom.mi_rango >= 2 || $tsCom.mi_rango >= 4 || $tsUser->is_admod || $tsUser->uid == $tsTema.t_autor}
    <div class="clearfix">
    	<div class="com_bigmsj_red" style="display:none;"></div>
    	<div id="procesando"></div>
    	<div class="box_title">Dejar comentario</div>
        <div class="box_cuerpo clearfix">
        <div class="answerTxt floatL clearfix" style="
    width: 619px;
">
        	<textarea id="markit_resp" class="imput_txt" tabindex="1" placeholder="Escribir un comentario..." style="width: 607px;border-radius: 0 0 4px 4px;border-top: 0;resize: vertical;"></textarea>
            <div class="floatL">
            <br />
            <input type="button" onclick="com.add_respuesta({$tsTema.t_id});" class="mBtn btnOk" value="Enviar Comentario" tabindex="3" id="btnsComment"/>
            </div>
            <div class="floatR"><br />{include file='modules/m.global_emoticons.tpl'}</div>
            </div>
        </div>
    </div>
    {elseif $tsTema.t_cerrado == 0 && !$tsCom.es_miembro || $tsTema.t_cerrado == 0 && !$tsUser->is_member}
    <div class="com_bigmsj_yellow">Tienes que ser miembro para responder en este tema</div>
    {elseif $tsTema.t_cerrado == 0 && $tsCom.mi_rango <= 2}
    <div class="com_bigmsj_yellow">Tu rango no te permite realizar comentarios en esta comunidad</div>
    {/if}
</div>
