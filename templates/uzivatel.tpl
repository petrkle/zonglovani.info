{if $uzivatel_props}

{if $uzivatel_props.login==$smarty.session.uzivatel.login}
<h3>Moje domovská stránka</h3>

<p>
Nacházíš se na své veřejné domovské stránce, která slouží pro tvojí prezentaci. Tento text je zobrazen pouze tobě.
</p>

<p>
<a href="{$smarty.const.LIDE_URL}nastaveni.php" title="Nastavení tvého účtu.">Nastavení účtu</a>
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
<li>Jméno: {$uzivatel_props.jmeno|escape}</li>
<li>Login: {$uzivatel_props.login|escape}</li>
<li>Účet vytvořen: {$uzivatel_props.registrace_hr|escape}</li>
{if $uzivatel_props.soukromi=="mail"}
<li>E-mail: {$uzivatel_props.email|escape|mailobfuscate}</li>
{else}
<li>
<form action="{$smarty.const.LIDE_URL}vzkaz.php" method="post">
<input type="hidden" name="komu" value="{$uzivatel_props.login|escape}" />
<input type="submit" name="vzkaz" value="Poslat vzkaz" />
</form>
</li>
{/if}
</ul>
{/if}
<p>
<a href="{$smarty.const.LIDE_URL}" title="Seznam uživatelů žonglérova slabikáře.">Seznam všech uživatelů</a>.
</p>
