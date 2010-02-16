{if is_array($zmeny)}
{foreach from=$zmeny item=zmena}
{if strlen($zmena.link)>0}
<h3><a name="{$zmena.cislo}"></a><a href="{$zmena.link}" title="Revize {$zmena.cislo}">{$zmena.popis|truncate:30:'':false}</a></h3>
{else}
<h3><a name="{$zmena.cislo}"></a>Revize č. {$zmena.cislo}</h3>
{/if}
<ul>
<li>Datum: {$zmena.datum_hr}</li>
<li>Popis: {$zmena.popis|escape}</li>
</ul>
{/foreach}
{/if}

<h3>Změny ve starším uložišti svn</h3>
<pre>{include file='ostatni-changelog-old.tpl'}</pre>
<h3>Starší změny</h3>
<ul>
<li>jaro 2005 - <a href="/proc-a-jak.html" title="Proč a jak vznikl žonglérův slabikář">první verze</a> žonglérova slabikáře</li>
</ul>
