{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<form action="{$smarty.server.REQUEST_URI}" method="post">
<fieldset>
<legend>Tvoje telefonní číslo</legend>
<ul>
<li><label for="web" accesskey="t" class="kratkypopis"><span class="u">T</span>elefon:</label><input type="text" name="tel" id="tel" value="{$tel|escape}" class="textbox" tabindex="1" /><a class="info" href="#">?<span class="tooltip">Tvoje telefonní číslo. Tvar "+420 aaa bbb ccc" nebo "+421 aaa bbb ccc".</span></a></li>
</ul>
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
