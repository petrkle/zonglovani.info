{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<form action="{$smarty.server.REQUEST_URI}" method="post">
<fieldset>
<legend>Změna hesla</legend>
<ul>
<li><label for="stareheslo" accesskey="s" class="kratkypopis"><span class="u">S</span>oučasné heslo:</label><input type="password" name="stareheslo" id="stareheslo" value="" class="textbox" tabindex="4"/><a class="info" href="#">?<span class="tooltip">Heslo použité pro přihlášení.</span></a></li>
<li><label for="heslo" accesskey="h" class="kratkypopis">Nové&nbsp;<span class="u">h</span>eslo:</label><input type="password" name="heslo" id="heslo" value="" class="textbox" tabindex="4"/><a class="info" href="#">?<span class="tooltip">Nové heslo pro přihlášení. Doporučuje se nepoužívat háčky a čárky. Při zadávání hesla záleží na velikosti písmen. Minimální délka hesla 5 znaků.</span></a></li>
<li><label for="heslo2" accesskey="v" class="kratkypopis">Nové&nbsp;hes<span class="u">l</span>o (znovu):</label><input type="password" name="heslo2" id="heslo2" value="" class="textbox" tabindex="5"/><a class="info" href="#">?<span class="tooltip">Heslo je potřeba zadat dvakrát. Kvůli vyloučení překlepů.</span></a></li>
</ul>
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
