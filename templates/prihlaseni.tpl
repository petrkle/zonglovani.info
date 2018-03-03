{if isset($chyby)}
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
<li><label for="login" accesskey="l" class="kratkypopis"><span class="u">E</span>-mail:</label><input type="email" autocomplete="email" required name="login" id="login" value="{if isset($login)}{$login|escape}{/if}" class="textbox" tabindex="1"/><div class="tooltip">Emailová adresa zadaná při registraci.</div></li>
<li><label for="heslo" accesskey="h" class="kratkypopis"><span class="u">H</span>eslo:</label><input type="password" name="heslo" id="heslo" required value="" class="textbox" tabindex="2"/><div class="tooltip">Heslo pro přihlášení. Při zadávání ZÁLEŽÍ na velikosti písmen.</div></li>
</ul>
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Přihlásit" class="knoflik" tabindex="3" />
<input type="hidden" name="next" value="{$next|escape}" />
</p>
</form>
<h3>Další možnosti</h3>
<ul>
<li>{include file='ukladani-hesel.tpl'}</li>
<li>Obnovit <a href="zapomenute-heslo.php" title="Zapomenuté heslo.">zapomenuté heslo</a>.</li>
<li><a href="{$smarty.const.LIDE_URL}novy-ucet.php" title="Vytvořit uživatelský účet." class="add">Založit nový účet</a>.</li>
</ul>
