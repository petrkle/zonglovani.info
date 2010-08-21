{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<form action="{$smarty.server.REQUEST_URI}" method="post">

<fieldset>
<legend>Místo(a) kde žongluješ</legend>

{if is_array($pusobiste)}
<a name="oblasti"></a><h3>Velké oblasti</h3>
{foreach from=$pusobiste item=misto key=klic}
<label><input type="checkbox" name="misto[]" value="{$klic|escape}"{if $misto.stav=='y'} checked="checked"{/if}/>{$misto.nazev|escape}</label><br/>
{/foreach}
{/if}

{if is_array($pusobiste_cz)}
<a name="cz"></a><h3>Česká republika</h3>
{foreach from=$pusobiste_cz item=misto key=klic}
<label><input type="checkbox" name="misto[]" value="{$klic|escape}"{if $misto.stav=='y'} checked="checked"{/if}/>{$misto.nazev|escape}</label><br/>
{/foreach}
{/if}

{if is_array($pusobiste_sk)}
<a name="sk"></a><h3>Slovenská republika</h3>
{foreach from=$pusobiste_sk item=misto key=klic}
<label><input type="checkbox" name="misto[]" value="{$klic|escape}"{if $misto.stav=='y'} checked="checked"{/if}/>{$misto.nazev|escape}</label><br/>
{/foreach}
{/if}

</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
