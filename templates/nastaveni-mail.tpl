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
<p>
<fieldset>
<legend>Změna emailu</legend>
<ul>
<li><label for="heslo" accesskey="n" class="kratkypopis"><u>N</u>ový&nbsp;email:</label><input type="text" name="email" id="email" value="" class="textbox" tabindex="1"/><a class="info" href="#">?<span class="tooltip">Nová adresa elektronické pošty</span></a></li>
<li><label for="heslo" accesskey="h" class="kratkypopis"><u>H</u>eslo do žonglérova slabikáře:</label><input type="password" name="heslo" id="heslo" value="" class="textbox" tabindex="2"/><a class="info" href="#">?<span class="tooltip">Heslo použité pro přihlášení do žonglérova slabikáře.</span></a></li>
</ul>
</fieldset>
</p>
<p>
<fieldset>
<legend>Kon<u>t</u>rola spamu</legend>
<ul>
<li><label for="antispam" class="kratkypopis">{$antispam_otazka}:</label><input type="text" name="antispam" id="antispam" accesskey="t" tabindex="3" class="textbox" /><a class="info" href="#">?<span class="tooltip">Odpověď na jednoduchou otázku slouží k odlišení lidí od robotů kteří posílají spam. Odpověď napiš číslicí.</span></a></li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>

