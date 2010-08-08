{if is_array($animace)}
<ul>
{foreach from=$animace item=foo key=link}
<li><a href="{$link|escape}.html" title="{$link|escape}">{$foo.popis|escape}</a></li>
{/foreach}
</ul>
{if $nameless}
<p><a href="/animace/" title="Animace pojmenované česky">Česky pojmenované animace</a>.</p>
{else}
<p><a href="/animace/en/" title="Animace pojmenované anglicky">Další animace</a> - pouze s anglickými názvy.</p>
{/if}
{/if}
