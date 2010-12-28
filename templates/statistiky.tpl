<table class="navstevnost nastranku" cellspacing="0" cellpadding="0">
<tr>
<th>Akce</th>
<th>Datum</th>
</tr>

<tr>
<td>Poslední <a href="/changelog.html" title="Seznam změn">aktualizace</a></td>
<td>{$stat.last_update_hr|escape}</td>
</tr>

<tr class="suda">
<td>Aktualizace databáze pro <a href="/vyhledavani/" title="Fulltextové vyhledávání">vyhledávání</a></td>
<td>{$stat.fulltext_update_hr|escape}</td>
</tr>
</table>

<p>
Podrobný <a href="/changelog.html" title="Historie změn">seznam změn</a>.
</p>

<table class="navstevnost nastranku" cellspacing="0" cellpadding="0">
<tr>
<th>Vlastnost</th>
<th>Počet</th>
</tr>
<tr>
<td><a href="{$smarty.const.LIDE_URL}" title="Žongléři a žonglérky">Registrovaní uživatelé</a></td>
<td>{$stat.pocet_lide|escape}</td>
</tr>

<tr class="suda">
<td><a href="/diskuse/" title="O žonglování">Příspěvky v diskusi</a></td>
<td>{$stat.pocet_diskuse|escape}</td>
</tr>

<tr>
<td><a href="/kalendar/" title="Kalendář žonglérských akcí">Akce v kalendáři</a></td>
<td>{$stat.pocet_kalendar|escape}</td>
</tr>

<tr class="suda">
<td><a href="/video/" title="Žonglérská videa">Žonglérská videa</a></td>
<td>{$stat.video|escape}</td>
</tr>

<tr>
<td><a href="/animace/" title="Animace žonglování">Animované triky</a></td>
<td>{$stat.animated_gif|escape}</td>
</tr>

<tr class="suda">
<td><a href="/animace/siteswap/" title="Animace žonglérských siteswapů">Animované siteswapy</a></td>
<td>{$stat.animated_siteswaps|escape}</td>
</tr>

<tr>
<td>Obrázky u triků</td>
<td>{$stat.img|escape}</td>
</tr>

<tr class="suda">
<td><a href="/obrazky/" title="Obrázky žonglování">Obrázky žonglování</a></td>
<td>{$stat.obrazky|escape}</td>
</tr>

<tr>
<td><a href="/testovani.html" title="Automatické testy pomocí perlu">Automatizované testy</a></td>
<td>{$stat.testy|escape}</td>
</tr>
</table>

{if is_array($stat.navstevnost)}
<a name="navst"><h3>Návštěvnost</h3></a>
<p>Návštěvnost žonglérova slabikáře za posledních {$stat.navstevnost_dni|escape} dní.</p>
<table class="navstevnost nastranku" cellspacing="0" cellpadding="0">
<tr>
<th>Datum</th>
<th>Počet návštěvníků</th>
<th>Zobrazené stránky</th>
</tr>
{foreach from=$stat.navstevnost item=den}
<tr{cycle values=', class="suda"'}><td><a name="{$den.datum_unix|escape}"></a>{$den.datum_hr|escape}</td><td>{$den.vis|escape}</td><td>{$den.pag|escape}</td></tr>
{/foreach}
</table>
{/if}
