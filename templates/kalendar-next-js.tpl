{foreach from=$events item=udalost name=smycka}
{if $smarty.foreach.smycka.index < 3}
document.write('<li>{$udalost.start_hr} - <a href="http://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}udalost-{$udalost.id}.html" title="{$udalost.desc|escape}" target="_blank">{$udalost.title|escape}</a></li>');
{/if}
{/foreach}
