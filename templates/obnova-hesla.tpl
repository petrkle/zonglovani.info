{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<form action="{$SCRIPT_NAME}?m={$email|escape}&k={$key|escape}&action=submit" method="post">
<p>
<fieldset>
<legend>Obnova hesla</legend>
<ul>
<li><label for="heslo" accesskey=h" class="kratkypopis">Login:</label><strong class="readonlyform">{$uzivatel.login}</strong><a class="info" href="#">?<span class="tooltip">Tvoje p�ihla�ovac� jm�no.</span></a></li>
<li><label for="heslo" accesskey=h" class="kratkypopis"><u>N</u>ov�&nbsp;heslo:</label><input type="password" name="heslo" id="heslo" value="" class="textbox" tabindex="1"/><a class="info" href="#">?<span class="tooltip">Nov� heslo pro p�ihl�en�. Doporu�uje se nepou��vat h��ky a ��rky. P�i zad�v�n� hesla z�le�� na velikosti p�smen. Minim�ln� d�lka hesla 5 znak�.</span></a></li>
<li><label for="heslo2" accesskey="v" class="kratkypopis">N<u>o</u>v�&nbsp;heslo (znovu):</label><input type="password" name="heslo2" id="heslo2" value="" class="textbox" tabindex="2"/><a class="info" href="#">?<span class="tooltip">Heslo je pot�eba zadat dvakr�t. Kv�li vylou�en� p�eklep�.</span></a></li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Pokra�ovat ..." class="knoflik" tabindex="3" />
</p>
</form>
