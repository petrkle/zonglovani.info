<p>
Poslední <a href="/changelog.html" title="Seznam změn">aktualizace</a>: {$stat.aktualizace|escape}
</p>
<p>
Aktualizace databáze pro <a href="/vyhledavani/" title="Fulltextové vyhledávání">vyhledávání</a>: {$stat.fupdate|escape}
</p>
<p>
Počet registrovaných <a href="{$smarty.const.LIDE_URL}" title="Žongléři a žonglérky">uživatelů</a>: {$stat.pocet_lide|escape}
</p>
<p>
Příspěvků v <a href="/diskuse/" title="O žonglování">diskusi</a>: {$stat.pocet_diskuse|escape}
</p>
<p>
Záznamů v <a href="/kalendar/" title="Kalendář žonglérských akcí">kalendáři</a>: {$stat.pocet_kalendar|escape}
</p>
<h3>Návštěvnost</h3>
{if is_array($stat.navstevnost)}
<table class="navstevnost" cellspacing="0" cellpadding="0">
<tr>
<th>Datum</th>
<th>Počet návštěvníků</th>
<th>Zobrazené stránky</th>
</tr>
{foreach from=$stat.navstevnost item=den}
<tr{cycle values=', class="suda"'}><td>{$den.datum|escape}</td><td>{$den.vis|escape}</td><td>{$den.pag|escape}</td></tr>
{/foreach}
</table>
{/if}
