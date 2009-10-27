{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<form action="{$SCRIPT_NAME}?action=submit" method="post">

<p>
<fieldset>
<legend>Kontakt</legend>
<ul>
<li><label for="jmeno" accesskey="m" class="kratkypopis">J<u>m</u>éno:</label><input type="text" name="jmeno" id="jmeno" value="{$jmeno|escape}" class="textbox" tabindex="1" /><a class="info" href="#">?<span class="tooltip">Tvoje jméno. Minimální délka 3 znaky.</span></a></li>
<li><label for="email" accesskey="e" class="kratkypopis" ><u>E</u>-mail:</label><input type="text" name="email" id="email" value="{$email|escape}" class="textbox" tabindex="2" /><a class="info" href="#">?<span class="tooltip">Tvoje adresa elektronické pošty. Např.: kdosi@kdesi.cz</span></a></li>
</ul>
</fieldset>
</p>

<p>
<fieldset>
<legend>Přihlašovací údaje</legend>
<ul>
<li><label for="login" accesskey="l" class="kratkypopis"><u>L</u>ogin:</label><input type="text" name="login" id="login" value="{$login|escape}" class="textbox" tabindex="3"/><a class="info" href="#">?<span class="tooltip">Přihlašovací jméno. Povolená jsou malá písmena bez háčků a čárek, číslice a pomlčka. Minimální délka 3 znaky.</span></a></li>
<li><label for="heslo" accesskey=h" class="kratkypopis"><u>H</u>eslo:</label><input type="password" name="heslo" id="heslo" value="" class="textbox" tabindex="4"/><a class="info" href="#">?<span class="tooltip">Heslo pro přihlášení. Doporučuje se nepoužívat háčky a čárky. Při zadávání hesla záleží na velikosti písmen. Minimální délka hesla 5 znaků.</span></a></li>
<li><label for="heslo2" accesskey="v" class="kratkypopis">He<u>s</u>lo&nbsp;(znovu):</label><input type="password" name="heslo2" id="heslo2" value="" class="textbox" tabindex="5"/><a class="info" href="#">?<span class="tooltip">Heslo je potřeba zadat dvakrát. Kvůli vyloučení překlepů.</span></a></li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Pokračovat ..." class="knoflik" tabindex="6" />
</p>
</form>
