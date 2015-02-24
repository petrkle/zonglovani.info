{include file="mail/html-hlavicka.tpl"}

<p>
Ahoj,
</p>

<p>
tvůj účet v žonglérově slabikáři nebyl použit už skoro rok.
</p>

<p>
Přihlašovací jméno: <b>{$user.email}</b><br />
Adresa pro obnovení hesla:<br />
<a href="https://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}zapomenute-heslo.php" title="Obnovení hesla">https://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}zapomenute-heslo.php</a>
</p>

<p>
Na adrese:
</p>

<p>
<a href="https://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}nastaveni" title="Nastavení účtu">https://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}nastaveni</a><br />
</p>

<p>
můžeš aktualizovat údaje v profilu a tím prodloužit platnost účtu<br />
o další rok. Nebo počkat dalších 30 dní a účet bude zrušen úplně.
</p>

{include file="mail/html-paticka.tpl"}
