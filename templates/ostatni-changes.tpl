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
<h3><a href="{$smarty.const.DISKUSE_URL}stranka{$zmena.stranka|escape}.html#{$zmena.cas|escape}" title="Zobrazit příspěvek">{$zmena.autor_hr|escape}</a></h3>
<ul>
<li>Datum: {$zmena.datum_hr|escape} {$zmena.cas_hr|escape}</li>
<li><strong>Diskuse:</strong> {$zmena.text|strip_tags|escape}</a></li>
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
<h3><a href="{$zmena.url|escape}" title="Stránka {$zmena.popis|escape}"{if !preg_match('/^http:\/\/zonglovani.info/',$zmena.url)} class="external" rel="nofollow" onclick="_gaq.push(['_trackPageview','/goto/{$zmena.url|replace:'http://':''|regex_replace:'/^www\./':''|escape}']);"{/if}>{$zmena.titulek|strip_tags|truncate:60:"...":false|escape|default:'Bez titulku'}</a></h3>
<ul>
<li>Datum: {$zmena.time_hr|escape}, Zdroj: <a href="{$rss_zdroje[$zmena.rssid].url|escape}" title="{$rss_zdroje[$zmena.rssid].popis|escape}"{if !preg_match('/^http:\/\/zonglovani.info/',$rss_zdroje[$novinka.rssid].url)} class="external" rel="nofollow" onclick="_gaq.push(['_trackPageview','/goto/{$rss_zdroje[$novinka.rssid].url|replace:'http://':''|regex_replace:'/^www\./':''|escape}']);"{/if}>{$rss_zdroje[$zmena.rssid].popis|escape}</a></li>
{if strlen($zmena.description_plain)>0}
<li>{$zmena.description_plain|escape}</li>
{/if}
</ul>
{/if}
{/foreach}
{/if}
