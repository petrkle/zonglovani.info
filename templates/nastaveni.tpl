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
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=heslo" title="Zmìnit heslo.">Zmìnit</a> heslo.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=jmeno" title="Zmìnit zobrazované jméno.">Zmìnit</a> jméno.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=soukromi" title="Zmìnit zpùsob zobrazování e-mailu.">Zmìnit</a> zpùsob zobrazování e-mailu.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=vzkaz" title="Zmìnit zobrazovaný vzkaz.">Upravit</a> vzkaz.</li>
</ul>
