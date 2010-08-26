<p>
Siteswap je zápis žonglování pomocí čísel.<br /><a href="/siteswap.html" title="Jak funguje siteswap">Podrobný popis &raquo;</a>
</p>
{if is_array($nazvy)}
{foreach from=$nazvy item=nazev key=odkaz}
<a name="{$odkaz|escape}"><h2>{$nazev|escape}</h2></a>
{if is_array($animace)}
<ul>
{foreach from=$animace item=foo key=link}
{if $foo.pocet==$odkaz}
<li><a href="{$link|escape}.html" title="{$link|escape}">{$foo.siteswap|escape}</a></li>
{/if}
{/foreach}
</ul>
{/if}
{/foreach}
{/if}
