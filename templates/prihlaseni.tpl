{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<form action="{$SCRIPT_NAME}?action=submit" method="post">
{if isset($smarty.get.notice)}
<p>
Pro zobrazení požadované stránky je nutné přihlášení.
</p>
{/if}
<fieldset>
<legend>Přihlašovací údaje</legend>
<ul>
<li><label for="login" accesskey="l" class="kratkypopis"><span class="u">L</span>ogin:</label><input type="text" name="login" id="login" value="{$login|escape}" class="textbox" tabindex="1"/><a class="info" href="#">?<span class="tooltip">Přihlašovací jméno zadané při registraci. Při zadávání ZÁLEŽÍ na velikosti písmen.</span></a></li>
<li><label for="heslo" accesskey="h" class="kratkypopis"><span class="u">H</span>eslo:</label><input type="password" name="heslo" id="heslo" value="" class="textbox" tabindex="2"/><a class="info" href="#">?<span class="tooltip">Heslo pro přihlášení. Při zadávání ZÁLEŽÍ na velikosti písmen.</span></a></li>
</ul>
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Přihlásit" class="knoflik" tabindex="3" />
<input type="hidden" name="next" value="{$next|escape}" />
</p>
</form>
<h3>Další možnosti</h3>
<ul>
<li>Obnovit <a href="zapomenute-heslo.php" title="Zapomenuté heslo.">zapomenuté heslo</a>.</li>
<li><a href="{$smarty.const.LIDE_URL}pravidla.php" title="Vytvořit uživatelský účet." class="add">Vytvořit nový účet</a>.</li>
</ul>
