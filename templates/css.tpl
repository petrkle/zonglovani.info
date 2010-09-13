<p>Kaskádové styly použité v žonglérově slabikáři.</p>
{if is_array($vypis)}
<ul>
{foreach from=$vypis item=styl}
<li><a href="/{$styl|escape}" title="Kaskádový styl {$styl|escape}">{$styl|escape}</a></li>
{/foreach}
</ul>
{/if}
