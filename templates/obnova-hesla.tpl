{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<form action="{$SCRIPT_NAME}?m={$email|escape}&k={$key|escape}&action=submit" method="post">
<p>
<fieldset>
<legend>Obnova hesla</legend>
<ul>
<li><label for="heslo" accesskey=h" class="kratkypopis">Login:</label><strong class="readonlyform">{$uzivatel.login}</strong><a class="info" href="#">?<span class="tooltip">Tvoje přihlašovací jméno.</span></a></li>
<li><label for="heslo" accesskey=h" class="kratkypopis"><u>N</u>ové&nbsp;heslo:</label><input type="password" name="heslo" id="heslo" value="" class="textbox" tabindex="1"/><a class="info" href="#">?<span class="tooltip">Nové heslo pro přihlášení. Doporučuje se nepoužívat háčky a čárky. Při zadávání hesla záleží na velikosti písmen. Minimální délka hesla 5 znaků.</span></a></li>
<li><label for="heslo2" accesskey="v" class="kratkypopis">N<u>o</u>vé&nbsp;heslo (znovu):</label><input type="password" name="heslo2" id="heslo2" value="" class="textbox" tabindex="2"/><a class="info" href="#">?<span class="tooltip">Heslo je potřeba zadat dvakrát. Kvůli vyloučení překlepů.</span></a></li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Pokračovat ..." class="knoflik" tabindex="3" />
</p>
</form>
