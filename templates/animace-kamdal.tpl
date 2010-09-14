{if $navigace}
<div class="kamdal">
<a name="kam-dal"></a><h5>Kam dál</h5>
<ul>
{if $navigace.navod}
	<li class="link_navod"><a href="{$navigace.navod.url|escape}" title="Podrobný textový návod jak se naučit {$navigace.navod.popis|escape}.">Podrobný návod</a> jak se naučit {$navigace.navod.popis|escape}.</li>
{/if}
{if $navigace.popis}
	<li class="link_navod"><a href="{$navigace.popis.url|escape}" title="{$navigace.popis.title|escape}.">{$navigace.popis.text|escape}</a></li>
{/if}
{if $navigace.dalsi}
	<li class="link_next">Další trik: <a href="{$navigace.dalsi.url|escape}" title="{$navigace.dalsi.title|escape}">{$navigace.dalsi.text|escape}</a></li>
{/if}
{if $navigace.predchozi}
	<li class="link_prev">Předchozí trik: <a href="{$navigace.predchozi.url|escape}" title="{$navigace.predchozi.title|escape}">{$navigace.predchozi.text|escape}</a></li>
{/if}
</ul>
</div>
{/if}