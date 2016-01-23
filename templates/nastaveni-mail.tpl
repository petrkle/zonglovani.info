{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<p>
Po odeslání formuláře přijde na tvůj nový e-mail zpráva, pomocí které dokončíš změnu emailu.
</p>
<form action="{$smarty.server.REQUEST_URI}" method="post">
<fieldset>
<legend>Změna emailu</legend>
<ul>
<li><label for="heslo" accesskey="n" class="kratkypopis"><span class="u">N</span>ový&nbsp;email:</label><input type="email" name="email" id="email" autocomplete="email" required value="" class="textbox" tabindex="1"/><div class="tooltip">Nová adresa elektronické pošty</div></li>
<li><label for="heslo" accesskey="h" class="kratkypopis"><span class="u">H</span>eslo do žonglérova slabikáře:</label><input type="password" name="heslo" required id="heslo" value="" class="textbox" tabindex="2"/><div class="tooltip">Heslo použité pro přihlášení do žonglérova slabikáře.</div></li>
</ul>
</fieldset>
<fieldset id="robotprotection">
<legend>Kon<span class="u">t</span>rola spamu</legend>
<ul>
<li><label for="antispam" class="kratkypopis">{$antispam_otazka}:</label><input type="text" name="antispam" id="antispam" accesskey="t" tabindex="3" class="textbox" /><div class="tooltip">Odpověď na jednoduchou otázku slouží k odlišení lidí od robotů kteří posílají spam. Odpověď napiš číslicí.</div></li>
</ul>
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
<script src="/lide/antispam{$jscachebuster}.js" type="text/javascript"></script>
