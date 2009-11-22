{if $chyby}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<form action="{$smarty.server.REQUEST_URI}" method="post" enctype="multipart/form-data">
<p>
<fieldset>
<legend>Fotografie</legend>
<ul>
<li><label for="jmeno" accesskey="f" class="kratkypopis"><u>F</u>otografie:</label><input type="file" name="foto" id="foto" class="textbox" tabindex="1" /><a class="info" href="#">?<span class="tooltip">Tvoje fotografie. Formát JPG, maximální velikost 200KiB. Maximální rozměr 300x300px.</span></a></li>
</fieldset>
</ul>
</p>

<p class="vpravo">
{if $smarty.session.uzivatel.foto}
<input type="submit" name="smazat" value="Smazat" class="knoflik" tabindex="4" />
{/if}
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
