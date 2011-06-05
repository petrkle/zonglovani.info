{if is_array($dovednosti)}
<p>Ze <a href="{$smarty.const.LIDE_URL}">seznamu žonglérů</a> vyber ty, kteří umí:</p>
<ul>
{foreach from=$dovednosti item=dovednost key=nazev}
<li><a href="{$smarty.const.LIDE_URL}dovednost/{$nazev|escape}.html" title="Žongléři kteří umí {$dovednost.umi|escape}.">{$dovednost.nazev|escape}</a></li>
{/foreach}
</ul>
{/if}
