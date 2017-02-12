{if is_array($items)}
{if $page_numbers.total > 1 and count($items)>10}
<p class="strankovani">
Stránkování: {$pager_links}
</p>
{/if}
<ul>
{foreach from=$items key=login item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$login|escape}.html" title="Profil uživatele {$uzivatel|escape}">{$uzivatel|escape}</a></li>
{/foreach}
</ul>
{if $page_numbers.total > 1}
<p class="strankovani">
Stránkování: {$pager_links}
</p>
<script async src="/strankovani-{$smarty.const.JS_CHKSUM}.js" type="text/javascript"></script>
{/if}
{/if}
{if !isset($smarty.session.logged)}
<h3>Výhody pro registrované uživatele</h3>
{include file='vyhody-uctu.tpl'}
<p>
<a href="{$smarty.const.LIDE_URL}novy-ucet.php" title="Vytvořit uživatelský účet." class="add">Založit nový účet</a>.
</p>
{/if}
<h3><a name="filtry">Filtry</a></h3>
<p>
Ze seznamu žonglérů můžeš vybírat podle:
</p>
<ul>
<li><a href="{$smarty.const.LIDE_URL}dovednost/">Dovedností</a></li>
<li><a href="{$smarty.const.LIDE_URL}misto/">Místa působení</a></li>
</ul>
