{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<form action="{$smarty.server.REQUEST_URI}" method="post">
<fieldset>
<legend>Vzkaz</legend>
<ul>
<li>Vzkaz <span class="u">p</span>ro ostatní návštěvníky žonglérova slabikáře <div class="tooltip">Vzkaz pro ostatní návštěvníky žonglérova slabikáře. Nepovinné pole.</div></li>
</ul>
<textarea name="vzkaz" accesskey="p" tabindex="3" rows="5" cols="50">{$smarty.session.uzivatel.vzkaz|escape}</textarea>
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
