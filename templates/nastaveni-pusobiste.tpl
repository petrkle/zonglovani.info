{if $pusobiste}
<form action="{$smarty.server.REQUEST_URI}" method="post">
<p>

<fieldset>
<legend>Místo(a) kde žongluješ</legend>
{foreach from=$pusobiste item=misto key=klic}
<label><input type="checkbox" name="misto[]" value="{$klic|escape}"{if $misto.stav=='y'} checked="jo"{/if}/>{$misto.nazev|escape}</label><br/>
{/foreach}
</fieldset>

</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
{/if}
