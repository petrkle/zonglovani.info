{if is_array($zmeny)}
{foreach from=$zmeny item=zmena}
{if strlen($zmena.link)>0}
<a name="{$zmena.cislo}"><h3><a href="{$zmena.link}" title="Revize {$zmena.cislo}">{$zmena.popis|truncate:30:'':false}</a></h3></a>
{else}
<a name="{$zmena.cislo}"><h3>Revize č. {$zmena.cislo}</h3></a>
{/if}
<p>
<ul>
<li>Datum: {$zmena.datum_hr}</li>
<li>Popis: {$zmena.popis}</li>
</ul>
</p>
{/foreach}
{/if}

<h3>Změny ve starším uložišti svn</h3>
<pre>{include file='ostatni-changelog-old.tpl'}</pre>
<h3>Starší změny</h3>
<p>
<ul>
<li>jaro 2005 - <a href="/proc-a-jak.html" title="Proč a jak vznikl žonglérův slabikář">první verze</a> žonglérova slabikáře</li>
</ul>
</p>
