{if is_array($items)}
<ul>
{foreach from=$items item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel|escape}.html" title="Profil uživatele {$uzivatel|escape}">{$uzivatel|escape}</a></li>
{/foreach}
</ul>
{if $page_numbers.total > 1}
<p>
Stránkování: {$pager_links}
</p>
{/if}
{/if}
{if $smarty.session.logged!=true}
<h3>Výhody pro registrované uživatele</h3>
<ul>
<li>Můžeš psát zprávy do <a href="{$smarty.const.DISKUSE_URL}" title="Diskuse o žonglování.">diskuse</a> o žonglování.</li>
<li>Můžeš zadávat události do <a href="{$smarty.const.CALENDAR_URL}" title="Kalendář žonglérských akcí.">kalendáře</a>.</li>
<li>V uživatelském účtu můžeš propagovat svoje žonglérské dovednosti, místo kde žongluješ, odkaz na svůj web, vzkaz a nahrát svojí fotografii.</li>
<li>Účet můžeš kdykoliv zrušit.</li>
</ul>
<p>
<a href="{$smarty.const.LIDE_URL}pravidla.php" title="Vytvořit uživatelský účet." class="add">Vytvořit nový účet</a>.
</p>
{/if}

<h3><a name="filtry">Filtry</a></h3>
<p>
Ze seznamu žonglérů můžeš vybírat podle:
</p>
<ul>
<li><a href="{$smarty.const.LIDE_URL}dovednost/">Dovedností</a></li>
<li><a href="{$smarty.const.LIDE_URL}misto/">Místa působení</a></li>
</ul>
