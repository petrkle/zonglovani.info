{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<form action="{$smarty.server.REQUEST_URI}" method="post">
<fieldset>
<legend>Soukromí</legend>
<ul>
<li><label><input type="radio" name="soukromi" value="formular" accesskey="n" tabindex="1"{if $smarty.session.uzivatel.soukromi=="formular"} checked="checked"{/if} /> <span class="u">N</span>ezobrazovat mail <div class="tooltip">Ostatní návštěvníci žonglérova slabikáře neuvidí tvůj e-mail.</div></li>
<li><label><input type="radio" name="soukromi" value="mail" accesskey="b" tabindex="2"{if $smarty.session.uzivatel.soukromi!="formular"} checked="checked"{/if} /> Zo<span class="u">b</span>razit e-mail</label> <div class="tooltip">Tvůj e-mail bude zobrazen na webu.</div></li>
</ul>
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
