{include file="mail/html-hlavicka.tpl"}
<p>
Ahoj,
</p>

<p>
pro odeslání vzkazu pro <b>{$komu.jmeno}</b> klikni na tento odkaz:
</p>

<p>
<a href="https://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}sendmail/{$messageid}.html">https://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}sendmail/{$messageid}.html</a>
</p>
{include file="mail/html-paticka.tpl"}
