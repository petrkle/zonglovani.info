{if is_array($uzivatele)}
<p>Seznam uživatelů žonglérova slabikáře.</p>
<ul>
{foreach from=$uzivatele item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel}.html" title="Profil uživatele {$uzivatel}">{$uzivatel}</a></li>
{/foreach}
</ul>
{/if}
