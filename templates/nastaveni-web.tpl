{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<p>
Nastavení odkazu na tvůj web.
</p>
<form action="{$smarty.server.REQUEST_URI}" method="post">
<fieldset>
<legend>Tvoje internetová stránka</legend>
<ul>
<li><label for="web" accesskey="a" class="kratkypopis"><span class="u">A</span>dresa:</label><input type="url" name="web" id="web" value="{$web|escape}" class="textbox" tabindex="1" /><div class="tooltip">Tvoje internetová stránka. Tvar http://neco.tld</div></li>
</ul>
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
