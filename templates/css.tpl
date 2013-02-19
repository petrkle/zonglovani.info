<p>Kaskádové styly použité v žonglérově slabikáři.</p>
{if is_array($vypis)}
<ul>
{foreach from=$vypis item=styl}
<li><a href="/{$styl|escape}-{$smarty.const.CSS_CHKSUM}.css" title="Kaskádový styl {$styl|escape}.css">{$styl|escape}.css</a></li>
{/foreach}
</ul>
{/if}
