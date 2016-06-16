<div class="submenu">
	<a {if $tsPage == 'home'}class="active"{/if} href="{$tsConfig.url}/posts/">Recientes</a>
    <a {if $tsPage == 'tops'}class="active"{/if} href="{$tsConfig.url}/top/posts/">Tops</a>
    {if $tsUser->is_member}<a {if $tsPage == 'favoritos'}class="active"{/if} href="{$tsConfig.url}/favoritos/">Favoritos</a>{/if}
</div>