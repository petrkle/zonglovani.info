{if is_array($prihlaseni)}
{if $page_numbers.total > 1}
<p>
Stránkování: {$pager_links}
</p>
{/if}
<table class="navstevnost" cellspacing="0" cellpadding="0">
<tr>
<th>#</th>
<th>Jméno</th>
<th>Poprvé</th>
<th>Naposled</th>
<th>Počet</th>
</tr>
{foreach from=$prihlaseni item=loginy name=poradi}
<tr>
<td>{$smarty.foreach.poradi.iteration}</td>
<td><a href="{$smarty.const.LIDE_URL}{$loginy.login}.html">{$loginy.jmeno}</a></td>
<td>{$loginy.poprve}</td>
<td><a href="detail/{$loginy.login}.html">{$loginy.naposled}</a></td>
<td>{$loginy.pocet}</td>
</tr>
{/foreach}
</table>
{if $page_numbers.total > 1}
<p>
Stránkování: {$pager_links}
</p>
{/if}
{/if}
<br />
