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
{if $uzivatel_props.foto}
<p><img src="{$smarty.const.LIDE_URL}foto/{$uzivatel_props.login|escape}.jpg" alt="{$uzivatel_props.jmeno|escape}" width="{$uzivatel_props.foto_sirka}" height="{$uzivatel_props.foto_vyska}"/></p>
{/if}
{if strlen($uzivatel_props.vzkaz)>0}
<pre>
{$uzivatel_props.vzkaz|wordwrap:45:"\n":true|escape}
</pre>
{/if}
<ul>
<li>Jméno: {$uzivatel_props.jmeno|escape}</li>
<li>Login: {$uzivatel_props.login|escape}</li>
{if strlen($uzivatel_props.web)>0}
<li>Web: <a href="{$uzivatel_props.web|escape}" title="Internetová stránka uživatele {$uzivatel_props.jmeno|escape}"{if !preg_match('/^http:\/\/zonglovani.info.*/',$uzivatel_props.web)} class="external" rel="nofollow"{/if}>{$uzivatel_props.web|replace:'http://':''|regex_replace:'/^www\./':''|regex_replace:'/\/$/':''|truncate:40:'...':false|escape}</a></li>
{/if}
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
{if is_array($uzivatel_props.dovednosti)}
<h3>Žonglérské dovednosti</h3>
<p>
<ul>
{foreach from=$uzivatel_props.dovednosti item=dovednost}
<li>{$dovednost.nazev|escape}{if $dovednost.hodnota!='a'} - {$dovednost.hodnota|escape}{/if}</li>
{/foreach}
</ul>
</p>
{/if}
<p>
<a href="{$smarty.const.LIDE_URL}" title="Seznam uživatelů žonglérova slabikáře.">Další žongléři a žonglérky &raquo;</a>
</p>
