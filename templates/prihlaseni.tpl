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
<legend>P�ihla�ovac� �daje</legend>
<ul>
<li><label for="login" accesskey="l" class="kratkypopis"><u>L</u>ogin:</label><input type="text" name="login" id="login" value="{$login|escape}" class="textbox" tabindex="1"/><a class="info" href="#">?<span class="tooltip">P�ihla�ovac� jm�no zadan� p�i registraci. P�i zad�v�n� Z�LE�� na velikosti p�smen.</span></a></li>
<li><label for="heslo" accesskey=h" class="kratkypopis"><u>H</u>eslo:</label><input type="password" name="heslo" id="heslo" value="" class="textbox" tabindex="2"/><a class="info" href="#">?<span class="tooltip">Heslo pro p�ihl�en�. P�i zad�v�n� Z�LE�� na velikosti p�smen.</span></a></li>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="P�ihl�sit" class="knoflik" tabindex="3" />
</p>
<input type="hidden" name="next" value="{$next|escape}" />
</form>
<h3>Dal�� mo�nosti</h3>
<ul>
<li>Obnovit <a href="zapomenute-heslo.php" title="Zapomenut� heslo.">zapomenut� heslo</a>.</li>
<li>Vytvo�it <a href="pravidla.php" title="Vytvo�it nov� ��et.">nov� ��et</a>.</li>
</ul>
