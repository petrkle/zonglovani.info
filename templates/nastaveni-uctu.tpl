{if $chyby}
<h3>Formuláø nejde odeslat</h3>
<ul>
{foreach from=$chyby item=chyba}
<li>{$chyba|escape}</li>
{/foreach}
</ul>
{/if}

<form action="{$SCRIPT_NAME}" method="post">

<p>
<fieldset>
<legend>Soukromí</legend>
<ul>
<li><label><input type="radio" name="soukromi" value="formular" accesskey="k" tabindex="1"{if $soukromi=="formular"} checked="jo"{/if} /> Vz<u>k</u>azy pøes formuláø</label> [<a href="napoveda.php#vzkazy" title="Nápovìda">?</a>]</li>
<li><label><input type="radio" name="soukromi" value="mail" accesskey="b" tabindex="2"{if $soukromi!="formular"} checked="jo"{/if} /> Zo<u>b</u>razit e-mail</label> [<a href="napoveda.php#showmail" title="Nápovìda">?</a>]</li>
</ul>
</fieldset>
</p>

<p>
<fieldset>
<legend>Vzkaz</legend>
<ul>
<li>Vzkaz <u>p</u>ro ostatní náv¹tìvníky ¾onglérova slabikáøe [<a href="napoveda.php#vzkaz" title="Nápovìda">?</a>]</li>
</ul>
<textarea name="vzkaz" accesskey="p" tabindex="3">{$vzkaz|escape}</textarea>
</fieldset>
</p>

<p>
<fieldset>
<legend>Kon<u>t</u>rola spamu</legend>
<ul>
<li><label for="antispam" class="kratkypopis">{$antispam_otazka}:</label><input type="text" name="antispam" id="antispam" accesskey="t" tabindex="4" class="textbox" />[<a href="napoveda.php#spam" title="Nápovìda">?</a>]</li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Odeslat" class="knoflik" />
</p>
</form>
