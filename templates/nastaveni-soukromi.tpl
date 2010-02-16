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
<li><label><input type="radio" name="soukromi" value="formular" accesskey="k" tabindex="1"{if $smarty.session.uzivatel.soukromi=="formular"} checked="checked"{/if} /> Vz<span class="u">k</span>azy přes formulář</label> <a class="info" href="#">?<span class="tooltip">Ostatní návštěvníci žonglérova slabikáře ti budou moci poslat vzkaz přes formulář. Neuvidí tvůj e-mail.</span></a></li>
<li><label><input type="radio" name="soukromi" value="mail" accesskey="b" tabindex="2"{if $smarty.session.uzivatel.soukromi!="formular"} checked="checked"{/if} /> Zo<span class="u">b</span>razit e-mail</label> <a class="info" href="#">?<span class="tooltip">Tvůj e-mail bude zobrazen na webu. Přečtou si ho ale jenom lidé. NE roboti kteří posílají spam.</span></a></li>
</ul>
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
