{include file='sections/main_header.tpl'}
                <div id="panel-userD">
				{include file='dinero/d.opc_user.tpl'}
                {if $tsAction == 'dinero'}
				{include file='dinero/d.user_data.tpl'}
                {elseif $tsAction == 'rev'}
                {include file='dinero/d.posts_rev.tpl'}
				{elseif $tsAction == 'rec'}
                {include file='dinero/d.posts_rec.tpl'}
				{elseif $tsAction == 'pagos'}
                {include file='dinero/d.solicitus_pagos.tpl'}
				{elseif $tsAction == 'confirma'}
                {include file='dinero/d.confirmar_pagos.tpl'}
                {/if}
                <div style="clear: both;"></div>
                </div>
{include file='sections/main_footer.tpl'}