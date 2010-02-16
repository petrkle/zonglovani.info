{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<form action="{$smarty.server.REQUEST_URI}" method="post">
<fieldset>
<legend>Tvoje internetová stránka</legend>
<ul>
<li><label for="web" accesskey="a" class="kratkypopis"><span class="u">A</span>dresa:</label><input type="text" name="web" id="web" value="{$web|escape}" class="textbox" tabindex="1" /><a class="info" href="#">?<span class="tooltip">Tvoje internetová stránka. Tvar http://neco.tld</span></a></li>
</ul>
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
