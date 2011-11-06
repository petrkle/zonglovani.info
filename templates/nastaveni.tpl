{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
<form action="" method="get"><p><input type="submit" value=" OK " class="knoflik" /></p></form>
{/if}
<ul>
<li>E-mail: <strong>{$smarty.session.uzivatel.email|escape}</strong> - <a href="{$smarty.const.LIDE_URL}nastaveni/mail" title="Změnit adresu elektronické pošty.">změnit</a></li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/heslo" title="Změnit heslo.">Změnit heslo</a></li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/jmeno" title="Změnit zobrazované jméno.">Změnit zobrazované jméno</a></li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/soukromi" title="Změnit způsob zobrazování e-mailu.">Změnit</a> způsob zobrazování e-mailu</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/dovednosti" title="Nastavit žonglérské dovednosti.">Žonglérské dovednosti</a></li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/pusobiste" title="Nastavit působiště.">Nastavit místo</a>, kde žongluješ</li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/vzkaz" title="Změnit zobrazovaný vzkaz.">Upravit vzkaz</a></li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/web" title="Zadat internetovou stránku.">Internetová stránka</a></li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/foto" title="Nastavení fotografie.">Nastavit fotografii</a></li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/tel" title="Nastavit telefonní číslo.">Telefonní číslo</a></li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/znameni" title="Nastavení znamení zvěrokruhu.">Nastavit znamení zvěrokruhu</a></li>
<li><a href="{$smarty.const.LIDE_URL}nastaveni/zruseni" title="Zrušení účtu.">Zrušit účet</a></li>
</ul>

{if $misto}
<h5>Tvoje působiště</h5>
<p>
Umíš {foreach from=$proc item=duvod name=duvody}{if $smarty.foreach.duvody.last}{if $smarty.foreach.duvody.first}{$duvod.umi}.{else}a {$duvod.umi}.{/if}{else}{if $smarty.foreach.duvody.first}{$duvod.umi}{else}, {$duvod.umi}{/if}{/if}{/foreach} Zvaž také <a href="{$smarty.const.LIDE_URL}nastaveni/pusobiste" title="Nastavit působiště.">nastavení působiště</a>.
</p>
{/if}

{if $web}
<h5>Podpoř žonglérův slabikář</h5>
<p>
Čím víc lidí bude tyto stránky používat, tím líp. Stačí <a href="/jak-odkazovat.html" title="Jak vytvořit odkaz na žonglérův slabikář.">přidat odkaz</a> na tvoje stránky.
</p>
{/if}
