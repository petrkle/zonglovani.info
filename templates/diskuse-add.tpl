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
<th>U¾ivatel</th>
<td><a href="{$smarty.const.LIDE_URL}{$smarty.session.uzivatel.login|escape}.html" title="Podrobnosti o u¾ivateli {$smarty.session.uzivatel.login|escape}.">{$smarty.session.uzivatel.login|escape}</a></td>
<th>Datum</th>
<td>{$datum_hr|escape}</td>
<th>Èas</th>
<td>{$cas_hr|escape}</td>
</tr>
<tr><td colspan="6">{$vzkaz|wordwrap:50:"\n":true|escape|nl2br}</td></tr>
</table>
{/if}

<form action="{$SCRIPT_NAME}" method="post">

<p>
<fieldset class="siroke">
<legend>Zpráva</legend>
<textarea name="vzkaz" accesskey="k" tabindex="3">{$vzkaz|escape}</textarea>
</fieldset>
</p>

{if $nahled}
<p>
<fieldset>
<legend>Kon<u>t</u>rola spamu</legend>
<ul>
<li><label for="antispam" class="kratkypopis">{$antispam_otazka}:</label><input type="text" name="antispam" id="antispam" accesskey="t" tabindex="4" class="textbox" /><a class="info" href="#">?<span class="tooltip">Odpovìï na jednoduchou otázku slou¾í k odli¹ení lidí od robotù kteøí posílají spam. Odpovìï napi¹ èíslicí.</span></a></li>
</ul>
</fieldset>
</p>
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

<h3>Ne¾ napí¹e¹ do diskuse</h3>
<p>
<ul>
<li>Pi¹ s háèky a èárkami. Del¹í text rozdìl do odstavcù. Pou¾ívej ve vìtách interpunkci.</li>
<li>Pi¹ slu¹nì.</li>
<li>Pro nalezení odpovìdí zkus nejprve <a href="{$smarty.const.SEARCH_URL}" title="Prohledávání ¾onglérova slabikáøe.">vyhledávání</a>.</li>
<li>Zadávej ka¾dý dotaz pouze jednou.</li>
<li>Odpovídej jenom na to, na co se tazatel ptal. Dr¾ se tématu.</li>
<li>Pi¹ jen kdy¾ má¹ co øíct. Tato diskuse není chat ani zábavní server.</li>
</ul>

</p>
