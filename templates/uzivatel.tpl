{if $uzivatel_props}

{if $uzivatel_props.login==$smarty.session.uzivatel.login}
<h3>Moje domovsk� str�nka</h3>

<p>
Nach�z� se na sv� ve�ejn� domovsk� str�nce, kter� slou�� pro tvoj� prezentaci. Tento text je zobrazen pouze tob�.
</p>

<p>
<a href="{$smarty.const.LIDE_URL}nastaveni.php" title="Nastaven� tv�ho ��tu.">Nastaven� ��tu</a>
</p>
<hr />
{/if}
<h1>{$titulek}</h1>
{if strlen($uzivatel_props.vzkaz)>0}
<pre>
{$uzivatel_props.vzkaz|wordwrap:45:"\n":true|escape}
</pre>
{/if}
<ul>
<li>Jm�no: {$uzivatel_props.jmeno|escape}</li>
<li>Login: {$uzivatel_props.login|escape}</li>
<li>��et vytvo�en: {$uzivatel_props.registrace_hr|escape}</li>
{if $uzivatel_props.soukromi=="mail"}
<li>E-mail: {$uzivatel_props.email|escape|mailobfuscate}</li>
{else}
<li>
<form action="{$smarty.const.LIDE_URL}vzkaz.php" method="post">
<input type="hidden" name="login" value="{$uzivatel_props.login|escape}" />
<input type="submit" name="vzkaz" value="Poslat vzkaz" />
</form>
</li>
{/if}
</ul>
{/if}
<p>
<a href="{$smarty.const.LIDE_URL}" title="Seznam u�ivatel� �ongl�rova slabik��e.">Seznam v�ech u�ivatel�</a>.
</p>
