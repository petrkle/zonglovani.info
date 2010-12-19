<p>Od tvého <a href="{$smarty.const.LIDE_URL}pristupy.php" title="Seznam přihlášení do žonglérova slabikáře.">posledního přihlášení</a>.</p>
{if is_array($zmeny)}
{foreach from=$zmeny item=zmena}
{if $zmena.typ=='change'}
<h3></a>Revize č. {$zmena.cislo}</h3>
<ul>
<li>Datum: {$zmena.datum_hr}</li>
<li>{$zmena.popis|escape}</li>
</ul>
{/if}

{if $zmena.typ=='diskuse'}
<h3>Diskuse</h3>
<ul>
<li>Datum: {$zmena.datum_hr|escape} {$zmena.cas_hr|escape}</li>
<li><a href="{$smarty.const.LIDE_URL}{$zmena.autor|escape}.html" title="Podrobnosti o {$zmena.autor_hr|escape}">{$zmena.autor_hr|escape}</a> - nový příspěvek v <a href="{$smarty.const.DISKUSE_URL}stranka{$zmena.stranka|escape}.html#{$zmena.cas|escape}" title="Zobrazit příspěvek">diskusi</a></li>
</ul>
{/if}

{if $zmena.typ=='tip'}
<h3>Tip týdne</h3>
<ul>
<li>Datum: {$zmena.cas_hr|escape} 5.00</li>
<li><a href="/tip/#{$zmena.cas|escape}">{$zmena.nadpis|escape}</a></li>
</ul>
<p><a href="/tip/#{$zmena.cas|escape}">{obrazek soubor=$zmena.obrazek popisek=$zmena.nadpis|escape}</a></p>
{/if}

{if $zmena.typ=='rss'}
<h3>RSS</h3>
<ul>
<li>Datum: {$zmena.time_hr|escape}, Zdroj: {$rss_zdroje[$zmena.rssid].popis|escape}</li>
<li><a href="/rss/#{$zmena.cas|escape}">{$zmena.titulek|truncate:60:"...":false|escape|default:'Bez titulku'}</a></li>
</ul>
{/if}
{/foreach}
{/if}
