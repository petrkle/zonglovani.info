{if is_array($animace)}
<ul>
{foreach from=$animace item=foo key=link}
<li><a href="{$link|escape}.html" title="{$link|escape}">{$foo.popis|escape}</a></li>
{/foreach}
</ul>
{/if}
