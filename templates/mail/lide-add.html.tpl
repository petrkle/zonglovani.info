{include file="mail/html-hlavicka.tpl"}
<p>
Ahoj,
</p>

<p>
tvůj účet v žonglérově slabikáři je aktivní. Na adrese:
</p>

<p>
<a href="https://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}nastaveni">https://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}nastaveni</a><br />
</p>

<p>
můžeš doladit nastavení účtu.
</p>

<p>
Tvoje přihlašovací údaje jsou:
</p>

<p>
Přihlašovací jméno: <b>{$uzivatel.email}</b><br />
Heslo: <b>{$uzivatel.heslo}</b>
</p>

{include file="mail/html-paticka.tpl"}
