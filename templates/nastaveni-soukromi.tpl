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
<legend>Soukrom�</legend>
<ul>
<li><label><input type="radio" name="soukromi" value="formular" accesskey="k" tabindex="1"{if $smarty.session.uzivatel.soukromi=="formular"} checked="jo"{/if} /> Vz<u>k</u>azy p�es formul��</label> <a class="info" href="#">?<span class="tooltip">Ostatn� n�v�t�vn�ci �ongl�rova slabik��e ti budou moci poslat vzkaz p�es formul��. Neuvid� tv�j e-mail.</span></a></li>
<li><label><input type="radio" name="soukromi" value="mail" accesskey="b" tabindex="2"{if $smarty.session.uzivatel.soukromi!="formular"} checked="jo"{/if} /> Zo<u>b</u>razit e-mail</label> <a class="info" href="#">?<span class="tooltip">Tv�j e-mail bude zobrazen na webu. P�e�tou si ho ale jenom lid�. NE roboti kte�� pos�laj� spam.</span></a></li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
