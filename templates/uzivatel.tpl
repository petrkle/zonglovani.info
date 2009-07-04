{if $uzivatel}
{if strlen($uzivatel.vzkaz)>0}
<pre>
{$uzivatel.vzkaz|wordwrap:45:"\n":true|escape}
</pre>
<ul>
<li>Jméno: {$uzivatel.jmeno|escape}</li>
<li>Login: {$uzivatel.login|escape}</li>
<li>Úèet vytvoøen: {$uzivatel.registrace_hr|escape}</li>
{if $uzivatel.soukromi=="mail"}
<li>E-mail: {$uzivatel.email|escape|mailobfuscate}</li>
{else}
<li>
<form action="{$smarty.const.LIDE_URL}vzkaz.php" method="post">
<input type="hidden" name="login" value="{$uzivatel.login|escape}" />
<input type="submit" name="vzkaz" value="Poslat vzkaz" />
</form>
</li>
{/if}
</ul>
{/if}
{/if}
<p>
<a href="{$smarty.const.LIDE_URL}" title="Seznam u¾ivatelù ¾onglérova slabikáøe.">Seznam v¹ech u¾ivatelù</a>.
</p>
