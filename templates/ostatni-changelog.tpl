<p>
®onglérùv slabikáø pou¾ívá <a href="http://subversion.tygris.org" title="Stránky projektu Subversion (anglicky)." class="external" onclick="pageTracker._trackPageview('/goto/svn.tygris.org');">systém správy verzí</a>. Na této stránce najde¹ výpis pøíkazu "<code>svn log</code>".
</p>

<p>
Jednotlivé revize jsou oddìlené øádkem mínusù. Na dal¹ím øádku je postupnì: èíslo revize, autor zmìny, datum a poèet øádkù popisujících zmìnu. Pak následuje prázdný øádek a vlastní popis zmìny.
</p>

{if is_array($zmeny)}
<pre>
{foreach from=$zmeny item=zmena}
<a name="{$zmena.revision}"></a>------------------------------------------------------------------------{$zmena.text}
{/foreach}
</pre>
{/if}

<h3>Zmìny ve star¹ím ulo¾i¹ti svn</h3>
<pre>{include file='ostatni-changelog-old.tpl'}</pre>

<h3>Star¹í zmìny</h3>
<p>
<ul>
<li>jaro 2005 - <a href="/proc-a-jak.html" title="Proè a jak vznikl ¾onglérùv slabikáø">první verze</a> ¾onglérova slabikáøe</li>
</ul>
</p>
