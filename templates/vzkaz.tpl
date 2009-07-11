{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba|escape}</li>
{/foreach}
</ul>
{/if}

<form action="{$SCRIPT_NAME}" method="post">
<input type="hidden" name="komu" value="{$komu|escape}" />
{if !isset($smarty.session.logged)}
<p>
<fieldset>
<legend>Odesílatel</legend>
<ul>
<li><label for="email" accesskey="e" class="kratkypopis" ><u>E</u>-mail:</label><input type="text" name="email" id="email" value="{$email|escape}" class="textbox" tabindex="2" /><a class="info" href="#">?<span class="tooltip">Tvoje adresa elektronické po¹ty. Napø.: kdosi@kdesi.cz</span></a></li>
</ul>
</fieldset>
</p>
{/if}

<p>
<fieldset>
<legend>Vzkaz</legend>
<ul>
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
