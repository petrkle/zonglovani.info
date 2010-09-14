<p>Skripty pro správu žonglérova slabikáře.</p>
{if is_array($vypis)}
<ul>
{foreach from=$vypis item=skript key=jmeno}
<li><a href="{$skript|escape}" title="Skript {$skript|escape}">{$jmeno|escape}</a></li>
{/foreach}
</ul>
{/if}
