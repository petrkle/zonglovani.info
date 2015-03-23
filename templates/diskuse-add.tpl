{if isset($chyby)}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba|escape}</li>
{/foreach}
</ul>
{/if}

{if isset($nahled)}
<h3>Náhled nové zprávy</h3>
<table class="diskuse" cellspacing="0" cellpadding="0">
<tr>
<th>Uživatel</th>
<td><a href="{$smarty.const.LIDE_URL}{$smarty.session.uzivatel.login|escape}.html" title="Podrobnosti o uživateli {$smarty.session.uzivatel.jmeno|escape}.">{$smarty.session.uzivatel.jmeno|escape}</a></td>
<th>Datum</th>
<td>{$datum_hr|escape}</td>
<th>Čas</th>
<td>{$cas_hr|escape}</td>
</tr>
<tr><td colspan="6">{$vzkaz_html}</td></tr>
</table>
{else}
<h3>Přidání nové zprávy</h3>
{/if}

<form action="{$smarty.server.SCRIPT_NAME}" method="post">

<fieldset class="siroke">
<legend>Zpráva</legend>
<script type="text/javascript" src="/ed-{$smarty.const.JS_CHKSUM}.js"></script>  
<textarea name="vzkaz" id="vzkaz" accesskey="k" tabindex="3" rows="5" cols="50" required>{if isset($vzkaz)}{$vzkaz|escape}{/if}</textarea>
<script type="text/javascript">edToolbar('vzkaz');</script>
<noscript><p>Možnosti: [b]tučné písmo[/b], [i]šikmé písmo[/i], [url=http://neco.cz]odkaz[/url], [email]tvoje@adresa.cz[/email]</p></noscript>
</fieldset>

{if isset($nahled)}
<fieldset id="robotprotection">
<legend>Kon<span class="u">t</span>rola spamu</legend>
<ul>
<li><label for="antispam" class="kratkypopis">{$antispam_otazka}:</label><input type="text" name="antispam" id="antispam" accesskey="t" tabindex="4" class="textbox" /><div class="tooltip">Odpověď na jednoduchou otázku slouží k odlišení lidí od robotů, kteří posílají spam. Odpověď napiš číslicí.</div></li>
</ul>
</fieldset>
<script type="text/javascript">
	document.getElementById('robotprotection').style.display='none';
	var _0xa8ff=["\x76\x61\x6C\x75\x65","\x61\x6E\x74\x69\x73\x70\x61\x6D","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64"];document[_0xa8ff[2]](_0xa8ff[1])[_0xa8ff[0]]={$antispam_odpoved|escape};
</script>
{/if}

<p class="vpravo">
{if isset($nahled)}
<input type="submit" name="nahled" value="Zobrazit náhled" class="knoflik" tabindex="5" />
<input type="submit" name="odeslat" value="Přidat do diskuse" class="knoflik" tabindex="5" />
{else}
<input type="submit" name="nahled" value="Zobrazit náhled" class="knoflik" tabindex="5" />
{/if}
</p>

</form>

<h3>Než napíšeš do diskuse</h3>
<ul>
<li>Piš s háčky a čárkami. Delší text rozděl do odstavců. Používej ve větách interpunkci.</li>
<li>Piš slušně.</li>
<li>Pro nalezení odpovědí zkus nejprve <a href="{$smarty.const.SEARCH_URL}" title="Prohledávání žonglérova slabikáře.">vyhledávání</a>.</li>
<li>Zadávej každý dotaz pouze jednou.</li>
</ul>

{if isset($smarty.session.diskuse_latest) and count($smarty.session.diskuse_latest) > 0}
<h3>Poslední zprávy</h3>
{foreach from=$smarty.session.diskuse_latest item=zprava}
<a name="{$zprava.cas|escape}"></a>
<table class="diskuse" cellspacing="0" cellpadding="0">
<tr>
<th>Uživatel</th>
<td><a href="{$smarty.const.LIDE_URL}{$zprava.autor|escape}.html" title="Podrobnosti o uživateli {$zprava.autor|escape}.">{$zprava.autor_hr|escape}</a></td>
<th>Datum</th>
<td>{$zprava.datum_hr|escape}</td>
<th>Čas</th>
<td>{$zprava.cas_hr|escape}</td>
</tr>
<tr><td colspan="6">{$zprava.text}</td></tr>
</table>
{/foreach}
<p class="vpravo"><a href="/diskuse/" title="Zobrazit celou diskusi">Zobrazit celou diskusi &raquo;</a></p>
{/if}
