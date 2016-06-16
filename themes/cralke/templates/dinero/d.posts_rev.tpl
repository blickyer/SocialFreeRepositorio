
 <div class="postsrev">
  <div class="box_title" style="border:none;border-bottom:1px solid #CCC;border-right:1px solid #CCC;">
        <div class="box_txt">Posts en espera de revisi&oacute;n</div>
    </div>
	{if $tsDinerR.data}
	<ul>
	 {foreach from=$tsDinerR.data key=i item=d}
	 <li><a alt="{$d.post_title}" title="{$d.post_title}" target="_self"  href="{$tsConfig.url}/posts/{$d.c_seo}/{$d.post_id}/{$d.post_title|seo}.html">{$d.post_title}</a>
	 <span class="floatR">{$d.post_date|hace}</span>
	 </li>
	 {/foreach}
	</ul>
	<div class="pag-din">
		{if $tsDinerR.data > 10}{$tsDinerR.rev}{/if}
		</div>
	{else}
	<li class="emptyData">No hay posts en revisi&oacute;n.</li>
{/if}	
 </div>