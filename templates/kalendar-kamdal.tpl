{if $navigace}
<div class="kamdal">
<a name="kam-dal"></a><h5>Kam dál</h5>
<ul>
{if $navigace.mesic}
	<li class="link_navod"><a href="{$navigace.mesic|escape}" title="Přehled žonglování na celý měsíc">Kalendář žonglování</a></li>
{/if}
{if $navigace.popis}
	<li class="link_navod"><a href="{$navigace.popis.url|escape}" title="{$navigace.popis.title|escape}.">{$navigace.popis.text|escape}</a></li>
{/if}
{if $navigace.dalsi}
	<li class="link_next">Další událost: <a href="{$navigace.dalsi.url|escape}" title="{$navigace.dalsi.title|escape}">{$navigace.dalsi.text|escape}</a></li>
{/if}
{if $navigace.predchozi}
	<li class="link_prev">Předchozí událost: <a href="{$navigace.predchozi.url|escape}" title="{$navigace.predchozi.title|escape}">{$navigace.predchozi.text|escape}</a></li>
{/if}
</ul>
</div>
{/if}
