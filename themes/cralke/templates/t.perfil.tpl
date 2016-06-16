{include file='sections/main_header.tpl'}
{if $tsInfo.p_fondoper != ''}
    <body style="background-image:url('{$tsInfo.p_fondo}');background-attachment: fixed; background-position: center; background-size:100%;">
{/if}
             <script type="text/javascript" src="{$tsConfig.default}/js/perfil.js"></script>
             {if $tsInfo.p_fondoper != ''}
                    <div class="cover" style="margin-top: 0px;" data-collapse="97" id="u3yiwu_4"><div class="coverImage">
                        <div id="zoom-fondo" onClick="zoom('ocultar','zoom')"></div>
                        <div id="zoom">
                            <center><b id='zoom_contenido'></b></center>
                        </div>
                        <a class="coverWrap" style="{if $tsInfo.p_fondoper}position: relative!important;{/if}" rel="theater" id="fbCoverImageContainer">
                            <img class="photo img" src="{$tsInfo.p_fondoper}" id="{$tsInfo.p_fondoper}" text="Foto de {$tsInfo.nick}" style="top:-13px;height:300px;width:100%;" data-fbid="2738175107697" onclick="zoom('mostrar','zoom','{$tsInfo.p_fondoper}')">
                        </a>
                        </div>
                    </div>
                {/if}

                {include file='modules/m.perfil_headinfo.tpl'}
                <div class="perfil-main clearfix {$tsGeneral.stats.user_rango.1}">
                    <div class="perfil-content general">
                        <div id="info" pid="{$tsInfo.uid}"></div>
                        <div id="perfil_content">
                        {if $tsPrivacidad.m.v == false}
                        <div id="perfil_wall" status="activo" class="widget">
                            <div class="emptyData">{$tsPrivacidad.m.m}</div>
                            <script type="text/javascript">
                                perfil.load_tab('info', $('#informacion'));
                            </script>
                        </div>
                        {elseif $tsType == 'story'}
                        {include file='modules/m.perfil_story.tpl'}
                        {elseif $tsType == 'news'}
                        {include file='modules/m.perfil_noticias.tpl'}
                        {else}
                        {include file='modules/m.perfil_muro.tpl'}
                        {/if}
                        </div>
                        <div style="width:100%;text-align:center;display:none" id="perfil_load"><img src="{$tsConfig.images}/fb-loading.gif" /></div>
                    </div>
                    <div class="perfil-sidebar">
                        {include file='modules/m.perfil_sidebar.tpl'}
                    </div>
                </div>
                
{include file='sections/main_footer.tpl'}