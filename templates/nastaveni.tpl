{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
<form action="" method="get"><p><input type="submit" value=" OK " class="knoflik" /></p></form>
{/if}
<ul>
<li>Login: <strong>{$smarty.session.uzivatel.login|escape}</strong></li>
<li>E-mail: <strong>{$smarty.session.uzivatel.email|escape}</strong> - <a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=mail" title="Změnit adresu elektronické pošty.">změnit</a></li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/heslo" title="Změnit heslo.">Změnit heslo</a>.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/jmeno" title="Změnit zobrazované jméno.">Změnit zobrazované jméno</a>.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/soukromi" title="Změnit způsob zobrazování e-mailu.">Změnit</a> způsob zobrazování e-mailu.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/dovednosti" title="Nastavit žonglérské dovednosti.">Žonglérské dovednosti</a>.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/pusobiste" title="Nastavit působiště.">Nastavit místo</a> kde žongluješ.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/vzkaz" title="Změnit zobrazovaný vzkaz.">Upravit vzkaz</a>.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/web" title="Zadat internetovou stránku.">Internetová stránka</a>.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/foto" title="Nastavení fotografie.">Nastavit fotografii</a>.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/znameni" title="Nastavení znamení zvěrokruhu.">Nastavit znamení zvěrokruhu</a>.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/zruseni" title="Zrušení účtu.">Zrušit účet</a>.</li>
</ul>

{if $web}
<h5>Podpoř žonglérův slabikář</h5>
<p>
Čím víc lidí bude tyto stránky používat, tím líp. Stačí <a href="/jak-odkazovat.html" title="Jak vytvořit odkaz na žonglérův slabikář.">přidat odkaz</a> na tvoje stránky.
</p>
{/if}
