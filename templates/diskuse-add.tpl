{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba|escape}</li>
{/foreach}
</ul>
{/if}

{if $nahled}
<h3>N�hled zpr�vy</h3>
<table class="diskuse" cellspacing="0" cellpadding="0">
<tr>
<th>U�ivatel</th>
<td><a href="{$smarty.const.LIDE_URL}{$smarty.session.uzivatel.login|escape}.html" title="Podrobnosti o u�ivateli {$smarty.session.uzivatel.login|escape}.">{$smarty.session.uzivatel.login|escape}</a></td>
<th>Datum</th>
<td>{$datum_hr|escape}</td>
<th>�as</th>
<td>{$cas_hr|escape}</td>
</tr>
<tr><td colspan="6">{$vzkaz|wordwrap:50:"\n":true|escape|nl2br}</td></tr>
</table>
{/if}

<form action="{$SCRIPT_NAME}" method="post">

<p>
<fieldset class="siroke">
<legend>Zpr�va</legend>
<textarea name="vzkaz" accesskey="k" tabindex="3">{$vzkaz|escape}</textarea>
</fieldset>
</p>

{if $nahled}
<p>
<fieldset>
<legend>Kon<u>t</u>rola spamu</legend>
<ul>
<li><label for="antispam" class="kratkypopis">{$antispam_otazka}:</label><input type="text" name="antispam" id="antispam" accesskey="t" tabindex="4" class="textbox" /><a class="info" href="#">?<span class="tooltip">Odpov�� na jednoduchou ot�zku slou�� k odli�en� lid� od robot� kte�� pos�laj� spam. Odpov�� napi� ��slic�.</span></a></li>
</ul>
</fieldset>
</p>
{/if}

<p class="vpravo">
{if $nahled}
<input type="submit" name="nahled" value="Zobrazit n�hled" class="knoflik" tabindex="5" />
<input type="submit" name="odeslat" value="Odeslat" class="knoflik" tabindex="5" />
{else}
<input type="submit" name="nahled" value="Zobrazit n�hled" class="knoflik" tabindex="5" />
{/if}
</p>

</form>

<h3>Ne� nap�e� do diskuse</h3>
<p>
<ul>
<li>Pi� s h��ky a ��rkami. Del�� text rozd�l do odstavc�. Pou��vej ve v�t�ch interpunkci.</li>
<li>Pi� slu�n�.</li>
<li>Pro nalezen� odpov�d� zkus nejprve <a href="{$smarty.const.SEARCH_URL}" title="Prohled�v�n� �ongl�rova slabik��e.">vyhled�v�n�</a>.</li>
<li>Zad�vej ka�d� dotaz pouze jednou.</li>
<li>Odpov�dej jenom na to, na co se tazatel ptal. Dr� se t�matu.</li>
<li>Pi� jen kdy� m� co ��ct. Tato diskuse nen� chat ani z�bavn� server.</li>
</ul>

</p>
