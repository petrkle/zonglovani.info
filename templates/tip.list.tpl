{if is_array($tipy)}
<p>
Tip týdne a ostatní aktualizace žonglérova slabikáře můžeš sledovat pomocí <a href="/rss.html" title="Automatické doručování informace o změnách">RSS</a> nebo <a href="/twitter.html" title="Žonglování na twitteru">Twitteru</a>.
</p>
{foreach from=$tipy item=foo key=datum}
<a name="{$foo.cas|escape}"></a><h3 class="nadpistipu"><a href="{$foo.link}" title="{$foo.nadpis|escape}">{$foo.nadpis|escape}</a></h3>
<ul class="datum"><li>{$foo.cas_hr|escape}</li></ul>
<p><a href="{$foo.link}" title="{$foo.nadpis|escape}">{obrazek soubor=$foo.obrazek}</a>
{$foo.text}
</p>
{/foreach}
{if $page_numbers.total > 1}
<p class="strankovani">
Stránkování: {$pager_links}
</p>
{/if}
{/if}
