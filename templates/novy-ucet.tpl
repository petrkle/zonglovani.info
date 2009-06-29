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
<li><label for="jmeno" accesskey="m" class="kratkypopis">J<u>m</u>�no:</label><input type="text" name="jmeno" id="jmeno" value="{$jmeno|escape}" class="textbox" tabindex="1" /><a class="info" href="#">?<span class="tooltip">Tvoje jm�no. Minim�ln� d�lka 3 znaky.</span></a></li>
<li><label for="email" accesskey="e" class="kratkypopis" ><u>E</u>-mail:</label><input type="text" name="email" id="email" value="{$email|escape}" class="textbox" tabindex="2" /><a class="info" href="#">?<span class="tooltip">Tvoje adresa elektronick� po�ty. Nap�.: kdosi@kdesi.cz</span></a></li>
</ul>
</fieldset>
</p>

<p>
<fieldset>
<legend>P�ihla�ovac� �daje</legend>
<ul>
<li><label for="login" accesskey="l" class="kratkypopis"><u>L</u>ogin:</label><input type="text" name="login" id="login" value="{$login|escape}" class="textbox" tabindex="3"/><a class="info" href="#">?<span class="tooltip">P�ihla�ovac� jm�no. Povolen� jsou mal� p�smena bez h��k� a ��rek, ��slice a poml�ka. Minim�ln� d�lka 3 znaky.</span></a></li>
<li><label for="heslo" accesskey=h" class="kratkypopis"><u>H</u>eslo:</label><input type="password" name="heslo" id="heslo" value="" class="textbox" tabindex="4"/><a class="info" href="#">?<span class="tooltip">Heslo pro p�ihl�en�. Doporu�uje se nepou��vat h��ky a ��rky. P�i zad�v�n� hesla z�le�� na velikosti p�smen. Minim�ln� d�lka hesla 5 znak�.</span></a></li>
<li><label for="heslo2" accesskey="v" class="kratkypopis">He<u>s</u>lo&nbsp;(znovu):</label><input type="password" name="heslo2" id="heslo2" value="" class="textbox" tabindex="5"/><a class="info" href="#">?<span class="tooltip">Heslo je pot�eba zadat dvakr�t. Kv�li vylou�en� p�eklep�.</span></a></li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Pokra�ovat ..." class="knoflik" tabindex="6" />
</p>
</form>
