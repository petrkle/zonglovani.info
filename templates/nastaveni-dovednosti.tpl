{if $dovednosti}
<form action="{$smarty.server.REQUEST_URI}" method="post">

{foreach from=$dovednosti item=dovednost key=klic}
<fieldset>
<legend>{$dovednost.nazev|escape}</legend>
{foreach from=$dovednost.hodnoty item=hodnota}
<label><input type="radio" name="{$klic|escape}" value="{$hodnota|escape}"{if $dovednost.stav==$hodnota} checked="checked"{/if}/> {if $hodnota=='n'}Nezadáno{elseif $hodnota=='a'}Ano{else}{$hodnota|escape}{/if}</label>
{/foreach}
</fieldset>
{/foreach}

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
{/if}
