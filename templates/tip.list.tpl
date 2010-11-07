{if is_array($tipy)}
<p>
Tip týdne a ostatní aktualizace žonglérova slabikáře můžeš sledovat pomocí <a href="/rss.html" title="Automatické doručování informace o změnách">rss</a> a na <a href="http://www.facebook.com/zongleruv.slabikar" class="external" onclick="pageTracker._trackPageview('/goto/facebook.com/zongleruv.slabikar');">Facebooku</a>.
</p>
{foreach from=$tipy item=foo key=datum}
<h3 class="nadpistipu"><a href="{$foo.link}" title="{$foo.nadpis|escape}">{$foo.nadpis|escape}</a></h3>
<ul class="datum"><li>{$foo.cas_hr|escape}</li></ul>
<p><a href="{$foo.link}" title="{$foo.nadpis|escape}">{obrazek soubor=$foo.obrazek}</a>
{$foo.text}
</p>
{/foreach}
{if $page_numbers.total > 1}
<p>
Stránkování: {$pager_links}
</p>
{/if}
{/if}
