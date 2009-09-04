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
<legend>Soukromí</legend>
<ul>
<li><label><input type="radio" name="soukromi" value="formular" accesskey="k" tabindex="1"{if $soukromi=="formular"} checked="jo"{/if} /> Vz<u>k</u>azy pøes formuláø</label> <a class="info" href="#">?<span class="tooltip">Ostatní náv¹tìvníci ¾onglérova slabikáøe ti budou moci poslat vzkaz pøes formuláø. Neuvidí tvùj e-mail.</span></a></li>
<li><label><input type="radio" name="soukromi" value="mail" accesskey="b" tabindex="2"{if $soukromi!="formular"} checked="jo"{/if} /> Zo<u>b</u>razit e-mail</label> <a class="info" href="#">?<span class="tooltip">Tvùj e-mail bude zobrazen na webu. Pøeètou si ho ale jenom lidé. NE roboti kteøí posílají spam.</span></a></li>
</ul>
</fieldset>
</p>

<p>
<fieldset>
<legend>Vzkaz</legend>
<ul>
<li>Vzkaz <u>p</u>ro ostatní náv¹tìvníky ¾onglérova slabikáøe <a class="info" href="#">?<span class="tooltip">Vzkaz pro ostatní náv¹tìvníky ¾onglérova slabikáøe. Nepovinné pole.</span></a></li>
</ul>
<textarea name="vzkaz" accesskey="p" tabindex="3">{$vzkaz|escape}</textarea>
</fieldset>
</p>

<p>
<fieldset>
<legend>Kon<u>t</u>rola spamu</legend>
<ul>
<li><label for="antispam" class="kratkypopis">{$antispam_otazka}:</label><input type="text" name="antispam" id="antispam" accesskey="t" tabindex="4" class="textbox" /><a class="info" href="#">?<span class="tooltip">Odpovìï na jednoduchou otázku slou¾í k odli¹ení lidí od robotù kteøí posílají spam. Odpovìï napi¹ èíslicí.</span></a></li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Odeslat" class="knoflik" tabindex="5" />
</p>
</form>
