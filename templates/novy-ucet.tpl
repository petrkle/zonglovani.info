<p>
Vytvo�en�m u�ivatelsk�ho ��tu z�sk� mo�nost zad�vat ud�losti do <a href="{$smarty.const.CALENDAR_URL}" title="Kalend�� �ongl�rsk�ch akc�.">kalend��e</a> a ps�t do <a href="{$smarty.const.DISKUSE_URL}" title="Diskuse o �onglov�n�.">diskuse</a>.
</p>
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
<li><label for="jmeno" accesskey="m" class="kratkypopis">J<u>m</u>�no:</label><input type="text" name="jmeno" id="jmeno" value="{$jmeno|escape}" class="textbox" tabindex="1" />[<a href="napoveda.php#jmeno" title="N�pov�da">?</a>]</li>
<li><label for="email" accesskey="e" class="kratkypopis" ><u>E</u>-mail:</label><input type="text" name="email" id="email" value="{$email|escape}" class="textbox" tabindex="2" />[<a href="napoveda.php#mail" title="N�pov�da">?</a>]</li>
</ul>
</fieldset>
</p>

<p>
<fieldset>
<legend>P�ihla�ovac� �daje</legend>
<ul>
<li><label for="login" accesskey="l" class="kratkypopis"><u>L</u>ogin:</label><input type="text" name="login" id="login" value="{$login|escape}" class="textbox" tabindex="3"/>[<a href="napoveda.php#login" title="N�pov�da">?</a>]</li>
<li><label for="heslo" accesskey=h" class="kratkypopis"><u>H</u>eslo:</label><input type="password" name="heslo" id="heslo" value="" class="textbox" tabindex="4"/>[<a href="napoveda.php#heslo" title="N�pov�da">?</a>]</li>
<li><label for="heslo2" accesskey="v" class="kratkypopis">He<u>s</u>lo&nbsp;(znovu):</label><input type="password" name="heslo2" id="heslo2" value="" class="textbox" tabindex="5"/>[<a href="napoveda.php#heslo2" title="N�pov�da">?</a>]</li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Pokra�ovat ..." class="knoflik" />
</p>
</form>
