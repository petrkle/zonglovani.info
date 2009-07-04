{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba|escape}</li>
{/foreach}
</ul>
{/if}

<form action="{$SCRIPT_NAME}" method="post">

<p>
<fieldset>
<legend>Obnovení hesla</legend>
<ul>
<li><label for="email" accesskey="e" class="kratkypopis" ><u>E</u>-mail:</label><input type="text" name="email" id="email" value="{$email|escape}" class="textbox" tabindex="2" /><a class="info" href="#">?<span class="tooltip">Tvoje adresa elektronické po¹ty zadaná pøi vytváøení úètu.</span></a></li>
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
