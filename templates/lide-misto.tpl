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
<p><img src="http://maps.google.com/maps/api/staticmap?center=49.94,15.46&zoom=7&size=700x400&sensor=false&markers=icon:http://zonglovani.info/mapa/sipka.png|color:red|label:a|{$misto|escape},CZ" width="500" heigth="400" alt=""/></p>
