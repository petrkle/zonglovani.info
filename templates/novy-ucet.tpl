<p>
Vytvoøením u¾ivatelského úètu získá¹ mo¾nost zadávat události do <a href="{$smarty.const.CALENDAR_URL}" title="Kalendáø ¾onglérských akcí.">kalendáøe</a> a psát do <a href="{$smarty.const.DISKUSE_URL}" title="Diskuse o ¾onglování.">diskuse</a>.
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
<li><label for="jmeno" accesskey="m" class="kratkypopis">J<u>m</u>éno:</label><input type="text" name="jmeno" id="jmeno" value="{$jmeno|escape}" class="textbox" tabindex="1" />[<a href="napoveda.php#jmeno" title="Nápovìda">?</a>]</li>
<li><label for="email" accesskey="e" class="kratkypopis" ><u>E</u>-mail:</label><input type="text" name="email" id="email" value="{$email|escape}" class="textbox" tabindex="2" />[<a href="napoveda.php#mail" title="Nápovìda">?</a>]</li>
</ul>
</fieldset>
</p>

<p>
<fieldset>
<legend>Pøihla¹ovací údaje</legend>
<ul>
<li><label for="login" accesskey="l" class="kratkypopis"><u>L</u>ogin:</label><input type="text" name="login" id="login" value="{$login|escape}" class="textbox" tabindex="3"/>[<a href="napoveda.php#login" title="Nápovìda">?</a>]</li>
<li><label for="heslo" accesskey=h" class="kratkypopis"><u>H</u>eslo:</label><input type="password" name="heslo" id="heslo" value="" class="textbox" tabindex="4"/>[<a href="napoveda.php#heslo" title="Nápovìda">?</a>]</li>
<li><label for="heslo2" accesskey="v" class="kratkypopis">He<u>s</u>lo&nbsp;(znovu):</label><input type="password" name="heslo2" id="heslo2" value="" class="textbox" tabindex="5"/>[<a href="napoveda.php#heslo2" title="Nápovìda">?</a>]</li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Pokraèovat ..." class="knoflik" />
</p>
</form>
