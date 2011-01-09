{if is_array($prihlaseni)}
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
{/if}
<br />
