{foreach from=$tsLastFotos.data item=f}                    	
<li>
    <a href="{$tsConfig.url}/fotos/{$f.user_name}/{$f.foto_id}/{$f.f_title|seo}.html" class="f_foto flazyload" data-original="{$f.f_url}"></a>    
    <div class="f_info">
        <a href="{$tsConfig.url}/fotos/{$f.user_name}/{$f.foto_id}/{$f.f_title|seo}.html" class="f_titulo">{$f.f_title}</a>           
        <span class="f_autor">Por <a href="{$tsConfig.url}/perfil/{$f.user_name}">{$f.user_name}</a> el {$f.f_date|fecha:true}</span>            
        <span class="f_desc">{$f.f_description|truncate:94}</span>    
    </div>
</li>                
{/foreach}