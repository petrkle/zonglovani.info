{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba|escape}</li>
{/foreach}
</ul>
{/if}

{if $nahled}
<h3>Náhled zprávy</h3>
<table class="diskuse" cellspacing="0" cellpadding="0">
<tr>
<th>Uživatel</th>
<td><a href="{$smarty.const.LIDE_URL}{$smarty.session.uzivatel.login|escape}.html" title="Podrobnosti o uživateli {$smarty.session.uzivatel.login|escape}.">{$smarty.session.uzivatel.login|escape}</a></td>
<th>Datum</th>
<td>{$datum_hr|escape}</td>
<th>Čas</th>
<td>{$cas_hr|escape}</td>
</tr>
<tr><td colspan="6">{$vzkaz|wordwrap:50:"\n":true|escape|nl2br}</td></tr>
</table>
{/if}

<form action="{$SCRIPT_NAME}" method="post">

<fieldset class="siroke">
<legend>Zpráva</legend>
<textarea name="vzkaz" accesskey="k" tabindex="3" rows="5" cols="50">{$vzkaz|escape}</textarea>
</fieldset>

{if $nahled}
<fieldset>
<legend>Kon<span class="u">t</span>rola spamu</legend>
<ul>
<li><label for="antispam" class="kratkypopis">{$antispam_otazka}:</label><input type="text" name="antispam" id="antispam" accesskey="t" tabindex="4" class="textbox" /><a class="info" href="#">?<span class="tooltip">Odpověď na jednoduchou otázku slouží k odlišení lidí od robotů kteří posílají spam. Odpověď napiš číslicí.</span></a></li>
</ul>
</fieldset>
{/if}

<p class="vpravo">
{if $nahled}
<input type="submit" name="nahled" value="Zobrazit náhled" class="knoflik" tabindex="5" />
<input type="submit" name="odeslat" value="Odeslat" class="knoflik" tabindex="5" />
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
