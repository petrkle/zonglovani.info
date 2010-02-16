{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<form action="{$smarty.server.REQUEST_URI}" method="post">
<fieldset>
<legend>Jméno</legend>
<ul>
<li><label for="jmeno" accesskey="m" class="kratkypopis">J<span class="u">m</span>éno:</label><input type="text" name="jmeno" id="jmeno" value="{$smarty.session.uzivatel.jmeno|escape}" class="textbox" tabindex="1" /><a class="info" href="#">?<span class="tooltip">Tvoje jméno. Minimální délka 3 znaky.</span></a></li>
</ul>
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
