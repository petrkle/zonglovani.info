{include file="mail/html-hlavicka.tpl"}

<p>
Ahoj,
</p>

<p>
pro zrušení účtu v žonglérově slabikáři klikni na tento odkaz:
</p>

<p>
<a href="https://www.{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}e/{$splmail[1]}/{$splmail[0]}/{$key}.html">https://www.{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}e/{$splmail[1]}/{$splmail[0]}/{$key}.html</a>
</p>

{include file="mail/html-paticka.tpl"}
