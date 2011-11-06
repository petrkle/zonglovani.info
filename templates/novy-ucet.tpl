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
<li><label for="jmeno" accesskey="m" class="kratkypopis">J<span class="u">m</span>éno:</label><input type="text" name="jmeno" id="jmeno" value="{$jmeno|escape}" class="textbox" tabindex="1" /><a class="info" href="#">?<span class="tooltip">Tvoje jméno. Minimální délka 3 znaky.</span></a></li>
<li><label for="email" accesskey="e" class="kratkypopis" ><span class="u">E</span>-mail:</label><input type="text" name="email" id="email" value="{$email|escape}" class="textbox" tabindex="2" /><a class="info" href="#">?<span class="tooltip">Tvoje adresa elektronické pošty. Např.: kdosi@kdesi.cz</span></a></li>
</ul>
</fieldset>
</p>

<p>
<fieldset id="robotprotection">
<legend>Kon<span class="u">t</span>rola spamu</legend>
<ul>
<li><label for="antispam" class="kratkypopis">{$antispam_otazka}:</label><input type="text" name="antispam" id="antispam" accesskey="t" tabindex="6" class="textbox" /><a class="info" href="#">?<span class="tooltip">Odpověď na jednoduchou otázku slouží k odlišení lidí od robotů kteří posílají spam. Odpověď napiš číslicí.</span></a></li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Založit účet" class="knoflik" tabindex="7" />
</p>
</form>
<script type="text/javascript">
	document.getElementById('robotprotection').style.display='none';
	{*document.getElementById('antispam').value={$antispam_odpoved|escape};*}
	var _0xa8ff=["\x76\x61\x6C\x75\x65","\x61\x6E\x74\x69\x73\x70\x61\x6D","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64"];document[_0xa8ff[2]](_0xa8ff[1])[_0xa8ff[0]]={$antispam_odpoved|escape};
</script>

<p>Kliknutím na tlačítko "Založit účet" souhlasíš s následujícími pravidly:</p>

{include file='pravidla-ucet.tpl'}
