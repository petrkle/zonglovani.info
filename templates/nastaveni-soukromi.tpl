{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<form action="{$smarty.server.REQUEST_URI}" method="post">
<p>
<fieldset>
<legend>Soukromí</legend>
<ul>
<li><label><input type="radio" name="soukromi" value="formular" accesskey="k" tabindex="1"{if $smarty.session.uzivatel.soukromi=="formular"} checked="jo"{/if} /> Vz<u>k</u>azy přes formulář</label> <a class="info" href="#">?<span class="tooltip">Ostatní návštěvníci žonglérova slabikáře ti budou moci poslat vzkaz přes formulář. Neuvidí tvůj e-mail.</span></a></li>
<li><label><input type="radio" name="soukromi" value="mail" accesskey="b" tabindex="2"{if $smarty.session.uzivatel.soukromi!="formular"} checked="jo"{/if} /> Zo<u>b</u>razit e-mail</label> <a class="info" href="#">?<span class="tooltip">Tvůj e-mail bude zobrazen na webu. Přečtou si ho ale jenom lidé. NE roboti kteří posílají spam.</span></a></li>
</ul>
</fieldset>
</p>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
