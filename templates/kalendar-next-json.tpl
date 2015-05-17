{if isset($callback)}{$callback|escape} ( {/if}
{literal}{{/literal}
{foreach $events as $udalost}
"{$udalost@iteration}":[
{literal}{{/literal}
"start": "{$udalost.start_hr}",
"url": "https://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}udalost-{$udalost.id}.html",
"desc": "{$udalost.desc|truncate:240:"...":true|escape}",
{if isset($udalost.img) and isset($udalost.img_ts)}
"img": "https://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}obrazek-{$udalost.img_ts|escape}-ts-{$udalost.img|escape}",
{/if}
"title": "{$udalost.title|replace:':':' '|truncate:40:"...":true|escape}"
{literal}}{/literal}
]{if !$udalost@last},{/if}
{/foreach}
{literal}}{/literal}
{if isset($callback)} ) {/if}
