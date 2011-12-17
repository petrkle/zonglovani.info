{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<p>Tvoje fotografie ve formátu JPG. Velké fotografie budou automaticky zmenšeny.</p>
<form action="{$smarty.server.REQUEST_URI}" method="post" enctype="multipart/form-data">
{if $smarty.session.uzivatel.foto}
<p><img src="{$smarty.session.uzivatel.foto|escape}" alt="{$smarty.session.uzivatel.jmeno|escape}" width="{$smarty.session.uzivatel.foto_sirka}" height="{$smarty.session.uzivatel.foto_vyska}"/> <input type="submit" name="smazat" value="Smazat" class="knoflik" tabindex="4" />
</p>
{/if}
<fieldset>
<legend>Fotografie</legend>
<ul>
<li><label for="foto" accesskey="f" class="kratkypopis"><span class="u">F</span>otografie:</label><input type="file" name="foto" id="foto" class="textbox" tabindex="1" /><div class="tooltip">Tvoje fotografie. Formát JPG, maximální velikost 500KiB. Maximální rozměr 1280x1280px.</div></li>
</ul>
</fieldset>

<p class="vpravo">
{if $smarty.session.uzivatel.foto}
{/if}
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
