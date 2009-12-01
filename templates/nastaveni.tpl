{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
<form action="{$smarty.server.SCRIPT_NAME}" method="get"><p><input type="submit" value=" OK " class="knoflik" /></p></form>
{/if}
<ul>
<li>Login: <strong>{$smarty.session.uzivatel.login|escape}</strong></li>
<li>E-mail: <strong>{$smarty.session.uzivatel.email|escape}</strong></li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=heslo" title="Změnit heslo.">Změnit heslo</a>.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=jmeno" title="Změnit zobrazované jméno.">Změnit jméno</a>.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=soukromi" title="Změnit způsob zobrazování e-mailu.">Změnit</a> způsob zobrazování e-mailu.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=dovednosti" title="Nastavit žonglérské dovednosti.">Žonglérské dovednosti</a>.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=pusobiste" title="Nastavit působiště.">Nastavit místo</a> kde žongluješ.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=vzkaz" title="Změnit zobrazovaný vzkaz.">Upravit vzkaz</a>.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=web" title="Zadat internetovou stránku.">Internetová stránka</a>.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=foto" title="Nastavení fotografie.">Nastavit fotografii</a>.</li>
</ul>
