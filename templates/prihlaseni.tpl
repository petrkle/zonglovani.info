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
<legend>Pøihla¹ovací údaje</legend>
<ul>
<li><label for="login" accesskey="l" class="kratkypopis"><u>L</u>ogin:</label><input type="text" name="login" id="login" value="{$login|escape}" class="textbox" tabindex="1"/><a class="info" href="#">?<span class="tooltip">Pøihla¹ovací jméno zadané pøi registraci. Pøi zadávání ZÁLE®Í na velikosti písmen.</span></a></li>
<li><label for="heslo" accesskey=h" class="kratkypopis"><u>H</u>eslo:</label><input type="password" name="heslo" id="heslo" value="" class="textbox" tabindex="2"/><a class="info" href="#">?<span class="tooltip">Heslo pro pøihlá¹ení. Pøi zadávání ZÁLE®Í na velikosti písmen.</span></a></li>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Pøihlásit" class="knoflik" tabindex="3" />
</p>
<input type="hidden" name="next" value="{$next|escape}" />
</form>
<h3>Dal¹í mo¾nosti</h3>
<ul>
<li>Obnovit <a href="zapomenute-heslo.php" title="Zapomenuté heslo.">zapomenuté heslo</a>.</li>
<li>Vytvoøit <a href="pravidla.php" title="Vytvoøit nový úèet.">nový úèet</a>.</li>
</ul>
