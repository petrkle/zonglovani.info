{if is_array($pusobiste)}
<p>Ze <a href="{$smarty.const.LIDE_URL}">seznamu žonglérů</a> vyber ty kteří žonglují v:</p>
<p>
<ul>
{foreach from=$pusobiste item=misto key=nazev}
<li><a href="{$smarty.const.LIDE_URL}misto/{$nazev|escape}.html" title="Žongléři {$misto.odkud|escape}.">{$misto.nazev|escape}</a></li>
{/foreach}
</ul>
</p>
{/if}
