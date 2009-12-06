<p>
<a href="{$smarty.const.LIDE_URL}dovednost/" title="Další možnosti filtrování.">Výběr</a> ze <a href="{$smarty.const.LIDE_URL}" title="Všichni uživatelé žonglérova slabikáře.">seznamu žonglérů</a>.
</p>
<p>
{if is_array($uzivatele)}
<ul>
{foreach from=$uzivatele item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel.login|escape}.html" title="Profil uživatele {$uzivatel.login|escape}">{$uzivatel.login|escape}</a></li>
{/foreach}
</ul>
{else}
Nic nenalezeno.
{/if}
</p>
