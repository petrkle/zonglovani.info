<p>Ze <a href="{$smarty.const.LIDE_URL}">seznamu žonglérů</a> vyber ty, kteří žonglují v:</p>
{if is_array($pusobiste)}
<a name="oblasti"></a><h3>Velké oblasti</h3>
<div class="hvezdicka"><a href="/mapa/" title="Žonglérská mapa">{obrazek soubor='mapa-crsk.png' popisek='Československo' path='/mapa/static/'}</a></div>
<ul>
{foreach from=$pusobiste item=misto key=nazev}
<li><a href="{$smarty.const.LIDE_URL}misto/{$nazev|escape}.html" title="Žongléři {$misto.odkud|escape}.">{$misto.nazev|escape}</a></li>
{/foreach}
</ul>
{/if}

{if is_array($pusobiste_cz)}
<a name="cz"></a><h3>Česká republika</h3>
<div class="hvezdicka"><a href="/mapa/cr.html" title="Žonglérská mapa Čech, Moravy a Slezska.">{obrazek soubor='mapa-cr.png' popisek='Česká republika' path='/mapa/static/'}</a></div>
<ul>
{foreach from=$pusobiste_cz item=misto key=nazev}
<li><a href="{$smarty.const.LIDE_URL}misto/{$nazev|escape}.html" title="Žongléři {$misto.odkud|escape}.">{$misto.nazev|escape}</a></li>
{/foreach}
</ul>
{/if}

{if is_array($pusobiste_sk)}
<a name="sk"></a><h3>Slovenská republika</h3>
<div class="hvezdicka"><a href="/mapa/sk.html" title="Žonglérská mapa Slovenska.">{obrazek soubor='mapa-sk.png' popisek='Slovensko' path='/mapa/static/'}</a></div>
<ul>
{foreach from=$pusobiste_sk item=misto key=nazev}
<li><a href="{$smarty.const.LIDE_URL}misto/{$nazev|escape}.html" title="Žongléři {$misto.odkud|escape}.">{$misto.nazev|escape}</a></li>
{/foreach}
</ul>
{/if}
