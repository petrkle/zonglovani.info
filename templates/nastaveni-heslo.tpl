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
<legend>Zm�na hesla</legend>
<ul>
<li><label for="heslo" accesskey=s" class="kratkypopis"><u>S</u>ou�asn� heslo:</label><input type="password" name="stareheslo" id="heslo" value="" class="textbox" tabindex="4"/><a class="info" href="#">?<span class="tooltip">Heslo pou�it� pro p�ihl�en�.</span></a></li>
<li><label for="heslo" accesskey=h" class="kratkypopis">Nov�&nbsp;<u>h</u>eslo:</label><input type="password" name="heslo" id="heslo" value="" class="textbox" tabindex="4"/><a class="info" href="#">?<span class="tooltip">Nov� heslo pro p�ihl�en�. Doporu�uje se nepou��vat h��ky a ��rky. P�i zad�v�n� hesla z�le�� na velikosti p�smen. Minim�ln� d�lka hesla 5 znak�.</span></a></li>
<li><label for="heslo2" accesskey="v" class="kratkypopis">Nov�&nbsp;hes<u>l</u>o (znovu):</label><input type="password" name="heslo2" id="heslo2" value="" class="textbox" tabindex="5"/><a class="info" href="#">?<span class="tooltip">Heslo je pot�eba zadat dvakr�t. Kv�li vylou�en� p�eklep�.</span></a></li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
