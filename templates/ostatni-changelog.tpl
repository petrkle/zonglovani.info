<p>
Žonglérův slabikář používá <a href="http://subversion.tygris.org" title="Stránky projektu Subversion (anglicky)." class="external" onclick="pageTracker._trackPageview('/goto/svn.tygris.org');">systém správy verzí</a>. Na této stránce najdeš výpis příkazu "<code>svn log</code>".
</p>

<p>
Jednotlivé revize jsou oddělené řádkem mínusů. Na dalším řádku je postupně: číslo revize, autor změny, datum a počet řádků popisujících změnu. Pak následuje prázdný řádek a vlastní popis změny.
</p>

{if is_array($zmeny)}
<pre>
{foreach from=$zmeny item=zmena}
<a name="{$zmena.revision}"></a>------------------------------------------------------------------------{$zmena.text}
{/foreach}
</pre>
{/if}

<h3>Změny ve starším uložišti svn</h3>
<pre>{include file='ostatni-changelog-old.tpl'}</pre>

<h3>Starší změny</h3>
<p>
<ul>
<li>jaro 2005 - <a href="/proc-a-jak.html" title="Proč a jak vznikl žonglérův slabikář">první verze</a> žonglérova slabikáře</li>
</ul>
</p>
