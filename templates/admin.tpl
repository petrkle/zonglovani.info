{if is_array($prihlaseni)}
<table border="1">
<tr>
<th>#</th>
<th>login</th>
<th>poprve</th>
<th>naposled</th>
<th>počet</th>
</tr>
{foreach from=$prihlaseni item=loginy name=poradi}
<tr>
<td>{$smarty.foreach.poradi.iteration}</td>
<td><a href="{$smarty.const.LIDE_URL}{$loginy.login}.html">{$loginy.login}</a></td>
<td>{$loginy.poprve}</td>
<td><a href="?detail={$loginy.login}">{$loginy.naposled}</a></td>
<td>{$loginy.pocet}</td>
</tr>
{/foreach}
</table>
{/if}
<br />
