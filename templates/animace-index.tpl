{if is_array($nazvy)}
{foreach from=$nazvy item=nazev key=odkaz}
<a name="{$odkaz|escape}"></a>{if $odkaz!='jeden'}<h3>{$nazev|escape}</h3>{/if}
{if is_array($animace)}
<ul>
{foreach from=$animace item=foo key=link}
{if $foo.pocet==$odkaz}
<li><a href="{$link|escape:'url'}.html" title="{$link|escape}">{$foo.popis|escape}</a></li>
{/if}
{/foreach}
</ul>
{/if}
{/foreach}
{/if}
