{if is_array($uzivatele)}
<ul>
{foreach from=$uzivatele item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel.login|escape}.html" title="Profil uživatele {$uzivatel.login|escape}.">{$uzivatel.jmeno|escape}</a></li>
{/foreach}
</ul>
{else}
<p>
V žonglérově slabikáři ještě není žádný uživatel {$misto|escape}. Můžeš být první. <a href="{$smarty.const.LIDE_URL}pravidla.php" title="Vytvořit uživatelský účet." class="add">Vytvořit nový účet</a>.
</p>
{/if}
<h3>Mapa</h3>
<p>{obrazek soubor="$id.png" popisek="Mapa - $jmeno" path='/mapa/static/'}</p>
