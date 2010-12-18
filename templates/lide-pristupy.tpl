<h1>{$nadpis|escape}</h1>
<p class="vlevo">Seznam tvých přihlášení do žonglérova slabikáře.</p>
<table class="navstevnost" cellspacing="0" cellpadding="0">
<tr>
<th>#</th>
<th>Čas</th>
<th>IP adresa</th>
<th>Prohlížeč</th>
</tr>
{foreach from=$prihlaseni item=login name=poradi}
<tr>
<td>{$smarty.foreach.poradi.total-$smarty.foreach.poradi.index}</td>
<td>{$login.cas_hr|escape}</td>
<td>{$login.ip|escape}</td>
<td><abbr title="{$login.prohlizec|escape}">{$login.prohlizec|truncate:80:"...":false|escape}</abbr></td>
</tr>
{/foreach}
</table>
