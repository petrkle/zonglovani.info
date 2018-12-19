{if isset($chyby) and count($chyby)>0}
<ul class="alert">
{foreach from=$chyby item=chyba}
<li>{$chyba}</li>
{/foreach}
</ul>
{/if}
<p>Tvoje fotografie ve formátu JPG.</p>
<form action="{$smarty.server.REQUEST_URI}" method="post" enctype="multipart/form-data">
{if isset($smarty.session.uzivatel.foto)}
<p><img src="{$smarty.session.uzivatel.foto|escape}" alt="{$smarty.session.uzivatel.jmeno|escape}" class="photo"/></p>
<p><input type="submit" name="smazat" value="Smazat" class="knoflik" tabindex="4" /></p>
{/if}
<fieldset>
<legend>Fotografie</legend>
<ul>
<li><label for="foto" accesskey="f" class="kratkypopis"><span class="u">F</span>otografie:</label><input type="file" name="foto" id="foto" class="textbox" tabindex="1" /><div class="tooltip">Tvoje fotografie. Formát JPG, maximální velikost {$smarty.const.IMG_MAX_SIZE}MB. Maximální rozměr {$smarty.const.IMG_MAX_WIDTH}x{$smarty.const.IMG_MAX_HEIGHT}px.</div></li>
</ul>
</fieldset>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
