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
<legend>Zmìna hesla</legend>
<ul>
<li><label for="heslo" accesskey=s" class="kratkypopis"><u>S</u>ouèasné heslo:</label><input type="password" name="stareheslo" id="heslo" value="" class="textbox" tabindex="4"/><a class="info" href="#">?<span class="tooltip">Heslo pou¾ité pro pøihlá¹ení.</span></a></li>
<li><label for="heslo" accesskey=h" class="kratkypopis">Nové&nbsp;<u>h</u>eslo:</label><input type="password" name="heslo" id="heslo" value="" class="textbox" tabindex="4"/><a class="info" href="#">?<span class="tooltip">Nové heslo pro pøihlá¹ení. Doporuèuje se nepou¾ívat háèky a èárky. Pøi zadávání hesla zále¾í na velikosti písmen. Minimální délka hesla 5 znakù.</span></a></li>
<li><label for="heslo2" accesskey="v" class="kratkypopis">Nové&nbsp;hes<u>l</u>o (znovu):</label><input type="password" name="heslo2" id="heslo2" value="" class="textbox" tabindex="5"/><a class="info" href="#">?<span class="tooltip">Heslo je potøeba zadat dvakrát. Kvùli vylouèení pøeklepù.</span></a></li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
