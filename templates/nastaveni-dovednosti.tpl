{if $dovednosti}
<form action="{$smarty.server.REQUEST_URI}" method="post">
<p>

{foreach from=$dovednosti item=dovednost key=klic}
<fieldset>
<legend>{$dovednost.nazev|escape}</legend>
{foreach from=$dovednost.hodnoty item=hodnota}
<label><input type="radio" name="{$klic|escape}" value="{$hodnota|escape}"{if $dovednost.stav==$hodnota} checked="jo"{/if}/> {if $hodnota=='n'}Nezadáno{elseif $hodnota=='a'}Ano{else}{$hodnota|escape}{/if}</label>
{/foreach}
</fieldset>
{/foreach}

</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
{/if}
