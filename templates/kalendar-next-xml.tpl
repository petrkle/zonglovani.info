<?xml version="1.0" encoding="utf-8" ?>
<rsp stat="ok">
<events>
{foreach from=$events item=udalost name=smycka}
<event start="{$udalost.start_hr}" url="http://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}udalost-{$udalost.id}.html" desc="{$udalost.desc|truncate:240:"...":true|escape}" title="{$udalost.title|replace:':':' '|truncate:40:"...":true|escape}"{if $udalost.img} img="http://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}obrazek-{$udalost.img|escape}"{/if}/>
{/foreach}
</events>
</rsp>
