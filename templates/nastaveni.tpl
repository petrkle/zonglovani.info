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
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=heslo" title="Zm�nit heslo.">Zm�nit</a> heslo.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=jmeno" title="Zm�nit zobrazovan� jm�no.">Zm�nit</a> jm�no.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=soukromi" title="Zm�nit zp�sob zobrazov�n� e-mailu.">Zm�nit</a> zp�sob zobrazov�n� e-mailu.</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni.php?uprav=vzkaz" title="Zm�nit zobrazovan� vzkaz.">Upravit</a> vzkaz.</li>
</ul>
