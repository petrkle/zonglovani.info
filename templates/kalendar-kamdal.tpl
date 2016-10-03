{if isset($navigace)}
<div class="kamdal">
<a name="kam-dal"></a><h5>Kam dál</h5>
<ul>
{if isset($navigace.mesic)}
	<li class="link_navod"><a href="{$navigace.mesic|escape}" title="Přehled žonglování na celý měsíc">Kalendář žonglování</a></li>
{/if}
{if isset($navigace.popis)}
	<li class="link_navod"><a href="{$navigace.popis.url|escape}" title="{$navigace.popis.title|escape}.">{$navigace.popis.text|escape}</a></li>
{/if}
{if isset($navigace.dalsi)}
	<li class="link_next">Další událost: <a href="{$navigace.dalsi.url|escape}" title="{$navigace.dalsi.title|escape}" id="dalsi">{$navigace.dalsi.text|escape}</a></li>
{/if}
{if isset($navigace.predchozi)}
	<li class="link_prev">Předchozí událost: <a href="{$navigace.predchozi.url|escape}" title="{$navigace.predchozi.title|escape}" id="predchozi">{$navigace.predchozi.text|escape}</a></li>
{/if}
</ul>
</div>
<script src="/hop-{$smarty.const.JS_CHKSUM}.js" type="text/javascript"></script>
{/if}
