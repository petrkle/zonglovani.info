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
<legend>Jm�no</legend>
<ul>
<li><label for="jmeno" accesskey="m" class="kratkypopis">J<u>m</u>�no:</label><input type="text" name="jmeno" id="jmeno" value="{$smarty.session.uzivatel.jmeno|escape}" class="textbox" tabindex="1" /><a class="info" href="#">?<span class="tooltip">Tvoje jm�no. Minim�ln� d�lka 3 znaky.</span></a></li>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
