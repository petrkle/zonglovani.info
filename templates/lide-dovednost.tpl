{if is_array($uzivatele)}
<ul>
{foreach from=$uzivatele item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel.login|escape}.html" title="Profil uživatele {$uzivatel.login|escape}">{$uzivatel.jmeno|escape}</a>{if is_array($uzivatel.pusobiste)} ({foreach from=$uzivatel.pusobiste item=misto name=places}{$pusobiste[$misto].nazev|escape}{if !$smarty.foreach.places.last}, {/if}{/foreach}){/if}</li>
{/foreach}
</ul>
{else}
V žonglérově slabikáři ještě není žádný uživatel který umí {$umi|escape}. Můžeš být první. <a href="{$smarty.const.LIDE_URL}pravidla.php" title="Vytvořit uživatelský účet." class="add">Vytvořit nový účet</a>.
{/if}
</p>
