{if isset($chyby)}
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
<li><label for="jmeno" accesskey="m" class="kratkypopis">J<span class="u">m</span>éno:</label><input type="text" name="jmeno" id="jmeno" value="{if isset($jmeno)}{$jmeno|escape}{/if}" required autocomplete="name" class="textbox" tabindex="1" /><div class="tooltip">Tvoje jméno. Minimální délka 3 znaky.</div></li>
<li><label for="email" accesskey="e" class="kratkypopis" ><span class="u">E</span>-mail:</label><input type="email" autocomplete="email" required name="email" id="email" value="{if isset($email)}{$email|escape}{/if}" class="textbox" tabindex="2" /><div class="tooltip">Tvoje adresa elektronické pošty. Např.: kdosi@kdesi.cz</div></li>
</ul>
</fieldset>
</p>

<p>
<fieldset id="robotprotection">
<legend>Kon<span class="u">t</span>rola spamu</legend>
<ul>
<li><label for="antispam" class="kratkypopis">{$antispam_otazka}:</label><input type="text" name="antispam" id="antispam" accesskey="t" tabindex="6" class="textbox" /><div class="tooltip">Odpověď na jednoduchou otázku slouží k odlišení lidí od robotů kteří posílají spam. Odpověď napiš číslicí.</div></li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Založit účet" class="knoflik" tabindex="7" />
</p>
</form>
<script async src="/lide/antispam{$jscachebuster}.js" type="text/javascript"></script>

<p>Kliknutím na tlačítko "Založit účet" souhlasíš s následujícími pravidly:</p>

{include file='pravidla-ucet.tpl'}
