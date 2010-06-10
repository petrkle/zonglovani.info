{if is_array($items)}
{if $page_numbers.total > 1 and count($items)>10}
<p>
Stránkování: {$pager_links}
</p>
{/if}
<ul>
{foreach from=$items item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel|escape}.html" title="Profil uživatele {$uzivatel|escape}">{$uzivatel|escape}</a></li>
{/foreach}
</ul>
{if $page_numbers.total > 1}
<p>
Stránkování: {$pager_links}
</p>
{/if}
{/if}
{if $smarty.session.logged!=true}
<p>
<a href="{$smarty.const.LIDE_URL}pravidla.php" title="Vytvořit uživatelský účet." class="add">Vytvořit nový účet</a>.
</p>
<h3>Výhody pro registrované uživatele</h3>
{include file='vyhody-uctu.tpl'}
{/if}

<h3><a name="filtry">Filtry</a></h3>
<p>
Ze seznamu žonglérů můžeš vybírat podle:
</p>
<ul>
<li><a href="{$smarty.const.LIDE_URL}dovednost/">Dovedností</a></li>
<li><a href="{$smarty.const.LIDE_URL}misto/">Místa působení</a></li>
</ul>
