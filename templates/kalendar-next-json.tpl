{if $callback}{$callback|escape} ( {/if}
{literal}{{/literal}
{foreach from=$events item=udalost name=smycka}
"{$smarty.foreach.smycka.index}":[
{literal}{{/literal}
"start": "{$udalost.start_hr}",
"url": "http://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}udalost-{$udalost.id}.html",
"desc": "{$udalost.desc|escape}",
"title": "{$udalost.title|escape}"
{literal}}{/literal}
]{if !$smarty.foreach.smycka.last},{/if}
{/foreach}
{literal}}{/literal}
{if $callback} ) {/if}
