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
<li>Vzkaz <u>p</u>ro ostatn� n�v�t�vn�ky �ongl�rova slabik��e <a class="info" href="#">?<span class="tooltip">Vzkaz pro ostatn� n�v�t�vn�ky �ongl�rova slabik��e. Nepovinn� pole.</span></a></li>
</ul>
<textarea name="vzkaz" accesskey="p" tabindex="3">{$smarty.session.uzivatel.vzkaz|escape}</textarea>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
