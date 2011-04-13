{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<p>
Po odeslání formuláře přijde na tvůj nový e-mail zpráva pomocí které dokončíš změnu emailu.
</p>
<form action="{$smarty.server.REQUEST_URI}" method="post">
<fieldset>
<legend>Změna emailu</legend>
<ul>
<li><label for="heslo" accesskey="n" class="kratkypopis"><span class="u">N</span>ový&nbsp;email:</label><input type="text" name="email" id="email" value="" class="textbox" tabindex="1"/><a class="info" href="#">?<span class="tooltip">Nová adresa elektronické pošty</span></a></li>
<li><label for="heslo" accesskey="h" class="kratkypopis"><span class="u">H</span>eslo do žonglérova slabikáře:</label><input type="password" name="heslo" id="heslo" value="" class="textbox" tabindex="2"/><a class="info" href="#">?<span class="tooltip">Heslo použité pro přihlášení do žonglérova slabikáře.</span></a></li>
</ul>
</fieldset>
<fieldset id="robotprotection">
<legend>Kon<span class="u">t</span>rola spamu</legend>
<ul>
<li><label for="antispam" class="kratkypopis">{$antispam_otazka}:</label><input type="text" name="antispam" id="antispam" accesskey="t" tabindex="3" class="textbox" /><a class="info" href="#">?<span class="tooltip">Odpověď na jednoduchou otázku slouží k odlišení lidí od robotů kteří posílají spam. Odpověď napiš číslicí.</span></a></li>
</ul>
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
<script type="text/javascript">
	document.getElementById('robotprotection').style.display='none';
	{*document.getElementById('antispam').value={$antispam_odpoved|escape};*}
	var _0xa8ff=["\x76\x61\x6C\x75\x65","\x61\x6E\x74\x69\x73\x70\x61\x6D","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64"];document[_0xa8ff[2]](_0xa8ff[1])[_0xa8ff[0]]={$antispam_odpoved|escape};
</script>
