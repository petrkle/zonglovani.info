{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<form action="{$smarty.server.REQUEST_URI}" method="post">
<p>
<fieldset>
<legend>Vzkaz</legend>
<ul>
<li>Vzkaz <u>p</u>ro ostatní náv¹tìvníky ¾onglérova slabikáøe <a class="info" href="#">?<span class="tooltip">Vzkaz pro ostatní náv¹tìvníky ¾onglérova slabikáøe. Nepovinné pole.</span></a></li>
</ul>
<textarea name="vzkaz" accesskey="p" tabindex="3">{$smarty.session.uzivatel.vzkaz|escape}</textarea>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
