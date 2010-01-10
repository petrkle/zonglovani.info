{if is_array($tipy) and count($tipy)>0}
<p>
Tip týdne a ostatní aktualizace žonglérova slabikáře můžeš sledovat pomocí <a href="/rss.html" title="Automatické doručování informace o změnách">rss</a>.
</p>
<ul>
{foreach from=$tipy item=foo key=datum}
<li><a href="{$foo.link}" title="{$foo.nadpis|escape}">{$foo.nadpis|escape}</a> - {$foo.cas_hr}</li>
{/foreach}
</ul>
{/if}
