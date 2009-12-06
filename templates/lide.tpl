{if is_array($uzivatele)}
<p>
<ul>
{foreach from=$uzivatele item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel|escape}.html" title="Profil uživatele {$uzivatel|escape}">{$uzivatel|escape}</a></li>
{/foreach}
</ul>
</p>
{/if}
{if $smarty.session.logged!=true}
<h3>Výhody pro registrované uživatele</h3>
<p>
<ul>
<li>Můžeš psát zprávy do <a href="{$smarty.const.DISKUSE_URL}" title="Diskuse o žonglování.">diskuse</a> o žonglování.</li>
<li>Můžeš zadávat události do <a href="{$smarty.const.CALENDAR_URL}" title="Kalendář žonglérských akcí.">kalendáře</a>.</li>
<li>V uživatelském účtu můžeš propagovat svoje žonglérské dovednosti, místo kde žongluješ, odkaz na svůj web, vzkaz a nahrát svojí fotografii.</li>
<li>Účet můžeš kdykoliv zrušit.</li>
</ul>
</p>
<p>
<a href="{$smarty.const.LIDE_URL}pravidla.php" title="Vytvořit uživatelský účet." class="add">Vytvořit nový účet</a>.
</p>
{/if}

<h3>Filtry</h3>
<p>
Ze seznamu žonglérů můžeš vybírat podle:
</p>
<p>
<ul>
<li><a href="{$smarty.const.LIDE_URL}dovednost/">Dovedností</a></li>
<li><a href="{$smarty.const.LIDE_URL}misto/">Místa působení</a></li>
</ul>
</p>
