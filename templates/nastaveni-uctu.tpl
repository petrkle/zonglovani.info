{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba|escape}</li>
{/foreach}
</ul>
{/if}

<form action="{$SCRIPT_NAME}" method="post">

<p>
<fieldset class="siroke">
<legend>Soukrom�</legend>
<ul>
<li><label><input type="radio" name="soukromi" value="formular" accesskey="k" tabindex="1"{if $soukromi=="formular"} checked="jo"{/if} /> Vz<u>k</u>azy p�es formul��</label> <a class="info" href="#">?<span class="tooltip">Ostatn� n�v�t�vn�ci �ongl�rova slabik��e ti budou moci poslat vzkaz p�es formul��. Neuvid� tv�j e-mail.</span></a></li>
<li><label><input type="radio" name="soukromi" value="mail" accesskey="b" tabindex="2"{if $soukromi!="formular"} checked="jo"{/if} /> Zo<u>b</u>razit e-mail</label> <a class="info" href="#">?<span class="tooltip">Tv�j e-mail bude zobrazen na webu. P�e�tou si ho ale jenom lid�. NE roboti kte�� pos�laj� spam.</span></a></li>
</ul>
</fieldset>
</p>

<p>
<fieldset>
<legend>Vzkaz</legend>
<ul>
<li>Vzkaz <u>p</u>ro ostatn� n�v�t�vn�ky �ongl�rova slabik��e <a class="info" href="#">?<span class="tooltip">Vzkaz pro ostatn� n�v�t�vn�ky �ongl�rova slabik��e. Nepovinn� pole.</span></a></li>
</ul>
<textarea name="vzkaz" accesskey="p" tabindex="3">{$vzkaz|escape}</textarea>
</fieldset>
</p>

<p>
<fieldset>
<legend>Kon<u>t</u>rola spamu</legend>
<ul>
<li><label for="antispam" class="kratkypopis">{$antispam_otazka}:</label><input type="text" name="antispam" id="antispam" accesskey="t" tabindex="4" class="textbox" /><a class="info" href="#">?<span class="tooltip">Odpov�� na jednoduchou ot�zku slou�� k odli�en� lid� od robot� kte�� pos�laj� spam. Odpov�� napi� ��slic�.</span></a></li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Odeslat" class="knoflik" tabindex="5" />
</p>
</form>
