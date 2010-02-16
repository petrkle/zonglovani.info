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
<li><label><input type="radio" name="soukromi" value="formular" accesskey="k" tabindex="1"{if $soukromi=="formular"} checked="jo"{/if} /> Vz<span class="u">k</span>azy přes formulář</label> <a class="info" href="#">?<span class="tooltip">Ostatní návštěvníci žonglérova slabikáře ti budou moci poslat vzkaz přes formulář. Neuvidí tvůj e-mail.</span></a></li>
<li><label><input type="radio" name="soukromi" value="mail" accesskey="b" tabindex="2"{if $soukromi!="formular"} checked="jo"{/if} /> Zo<span class="u">b</span>razit e-mail</label> <a class="info" href="#">?<span class="tooltip">Tvůj e-mail bude zobrazen na webu. Přečtou si ho ale jenom lidé. NE roboti kteří posílají spam.</span></a></li>
</ul>
</fieldset>
</p>

<p>
<fieldset>
<legend>Vzkaz</legend>
<ul>
<li>Vzkaz <span class="u">p</span>ro ostatní návštěvníky žonglérova slabikáře <a class="info" href="#">?<span class="tooltip">Vzkaz pro ostatní návštěvníky žonglérova slabikáře. Nepovinné pole.</span></a></li>
</ul>
<textarea name="vzkaz" accesskey="p" tabindex="3">{$vzkaz|escape}</textarea>
</fieldset>
</p>

<p>
<fieldset>
<legend>Kon<span class="u">t</span>rola spamu</legend>
<ul>
<li><label for="antispam" class="kratkypopis">{$antispam_otazka}:</label><input type="text" name="antispam" id="antispam" accesskey="t" tabindex="4" class="textbox" /><a class="info" href="#">?<span class="tooltip">Odpověď na jednoduchou otázku slouží k odlišení lidí od robotů kteří posílají spam. Odpověď napiš číslicí.</span></a></li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Odeslat" class="knoflik" tabindex="5" />
</p>
</form>
