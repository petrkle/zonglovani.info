{if is_array($detail)}
<div style="text-align: left;">
<li>Jméno: {$uzivatel.jmeno|escape}</li>
<li>E-mail: {$uzivatel.email|escape}</li>
<li>Soukromi: {$uzivatel.soukromi|escape}</li>
<li>Status: {$uzivatel.status}</li>
</ul>
<table border="1">
<tr>
<th>#</th>
<th>čas</th>
<th>ip</th>
<th>prohlizec</th>
</tr>
{foreach from=$detail item=login name=poradi}
<tr>
<td>{$smarty.foreach.poradi.iteration}</td>
<td>{$login.cas_hr}</td>
<td>{$login.ip}</td>
<td><abbr title="{$login.prohlizec|escape}">{$login.prohlizec|truncate:60:"...":false|escape}</abbr></td>
</tr>
{/foreach}
</table>
</div>
{/if}
<br />
