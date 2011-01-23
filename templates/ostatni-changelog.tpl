{if $page_numbers.total > 1}
<p>
Stránkování: {$pager_links}
</p>
{/if}
{if is_array($zmeny)}
{foreach from=$zmeny item=zmena}
<h3><a name="{$zmena.cislo}"></a>Revize č. {$zmena.cislo}</h3>
<ul>
<li>Datum: {$zmena.datum_hr}</li>
<li>Popis: {$zmena.popis|escape}</li>
</ul>
{/foreach}
{/if}
{if $page_numbers.total == $page_numbers.current}
<h3>Změny ve starším uložišti svn</h3>
<pre>{include file='ostatni-changelog-old.tpl'}</pre>
<h3>Starší změny</h3>
<ul>
<li>jaro 2005 - <a href="/proc-a-jak.html" title="Proč a jak vznikl žonglérův slabikář">první verze</a> žonglérova slabikáře</li>
</ul>
{/if}
{if $page_numbers.total > 1}
<p>
Stránkování: {$pager_links}
</p>
{/if}
