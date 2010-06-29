{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
{if $pusobiste}
<form action="{$smarty.server.REQUEST_URI}" method="post">

<fieldset>
<legend>Místo(a) kde žongluješ</legend>
{foreach from=$pusobiste item=misto key=klic}
<label><input type="checkbox" name="misto[]" value="{$klic|escape}"{if $misto.stav=='y'} checked="checked"{/if}/>{$misto.nazev|escape}</label><br/>
{/foreach}
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
{/if}
