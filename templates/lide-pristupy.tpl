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
<tr{cycle values=', class="suda"'}>
<td>{$smarty.foreach.poradi.total-$smarty.foreach.poradi.index}</td>
<td class="wrap">{$login.cas_hr|escape}</td>
<td class="wrap">{$login.ip|escape}</td>
<td><abbr title="{$login.prohlizec|escape}" class="wrap">{$login.prohlizec|truncate:80:"...":false|escape}</abbr></td>
</tr>
{/foreach}
</table>
