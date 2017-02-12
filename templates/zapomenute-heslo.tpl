{if isset($chyby)}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba|escape}</li>
{/foreach}
</ul>
{/if}

<form action="{$SCRIPT_NAME}" method="post">

<fieldset>
<legend>Obnovení hesla</legend>
<ul>
<li><label for="email" accesskey="e" class="kratkypopis" ><span class="u">E</span>-mail:</label><input type="email" autocomplete="email" required name="email" id="email" value="{if isset($email)}{$email|escape}{/if}" class="textbox" tabindex="2" /><div class="tooltip">Tvoje adresa elektronické pošty zadaná při vytváření účtu.</div></li>
</ul>
</fieldset>
<fieldset id="robotprotection">

<legend>Kon<span class="u">t</span>rola spamu</legend>
<ul>
<li><label for="antispam" class="kratkypopis">{$antispam_otazka}:</label><input type="text" name="antispam" id="antispam" accesskey="t" tabindex="4" class="textbox" /><div class="tooltip">Odpověď na jednoduchou otázku slouží k odlišení lidí od robotů kteří posílají spam. Odpověď napiš číslicí.</div></li>
</ul>
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Obnovit heslo" class="knoflik" tabindex="5" />
</p>
</form>
<script async src="/lide/antispam{$jscachebuster}.js" type="text/javascript"></script>
