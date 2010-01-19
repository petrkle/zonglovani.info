<p>
<a href="{$smarty.const.LIDE_URL}" title="Všichni uživatelé žonglérova slabikáře.">Seznamu žonglérů</a> {$misto|escape}.
</p>
<p>
{if is_array($uzivatele)}
<ul>
{foreach from=$uzivatele item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel.login|escape}.html" title="Profil uživatele {$uzivatel.login|escape}.">{$uzivatel.jmeno|escape}</a></li>
{/foreach}
</ul>
{else}
V žonglérově slabikáři ještě není žádný uživatel {$misto|escape}. Můžeš být první. <a href="{$smarty.const.LIDE_URL}pravidla.php" title="Vytvořit uživatelský účet." class="add">Vytvořit nový účet</a>.
{/if}
</p>
