{if is_array($uzivatele)}
<p>Seznam u�ivatel� �ongl�rova slabik��e.</p>
<ul>
{foreach from=$uzivatele item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel}.html" title="Profil u�ivatele {$uzivatel}">{$uzivatel}</a></li>
{/foreach}
</ul>
{/if}
