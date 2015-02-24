{include file="mail/html-hlavicka.tpl"}

<p>
Ahoj,
</p>

<p>
pro obnovení hesla v žonglérově slabikáři klikni na tento odkaz:
</p>

<p>
<a href="https://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}z/{$splmail[1]}/{$splmail[0]}/{$key}.html">https://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}z/{$splmail[1]}/{$splmail[0]}/{$key}.html</a>
</p>

{include file="mail/html-paticka.tpl"}
