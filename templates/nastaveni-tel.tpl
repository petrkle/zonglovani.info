{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<p>Tvoje telefonní číslo ve tvaru "+420&nbsp;aaa&nbsp;bbb&nbsp;ccc" nebo "+421&nbsp;aaa&nbsp;bbb&nbsp;ccc". Vhodné zejména pro žongléry, kteří nabízejí <a href="{$smarty.const.LIDE_URL}nastaveni/dovednosti" title="Nastavení dovedností">výuku žonglování</a> nebo <a href="{$smarty.const.LIDE_URL}nastaveni/dovednosti" title="Nastavení dovedností">veřejné vystupování</a>.</p>
<form action="{$smarty.server.REQUEST_URI}" method="post">
<fieldset>
<legend>Tvoje telefonní číslo</legend>
<ul>
<li><label for="web" accesskey="t" class="kratkypopis"><span class="u">T</span>elefon:</label><input type="text" name="tel" id="tel" value="{$tel|escape}" class="textbox" tabindex="1" /><div class="tooltip">Tvoje telefonní číslo. Tvar "+420 aaa bbb ccc" nebo "+421 aaa bbb ccc".</div></li>
</ul>
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
