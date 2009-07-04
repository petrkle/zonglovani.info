{if is_array($uzivatele)}
<p>Seznam u¾ivatelù ¾onglérova slabikáøe.</p>
<ul>
{foreach from=$uzivatele item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel}.html" title="Profil u¾ivatele {$uzivatel}">{$uzivatel}</a></li>
{/foreach}
</ul>
{/if}
