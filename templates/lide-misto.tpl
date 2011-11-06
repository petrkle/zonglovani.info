{if is_array($uzivatele)}
<ul>
{foreach from=$uzivatele item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel.login|escape}.html" title="Profil uživatele {$uzivatel.login|escape}.">{$uzivatel.jmeno|escape}</a></li>
{/foreach}
</ul>
{else}
<p>
V žonglérově slabikáři ještě není žádný uživatel {$misto|escape}. Můžeš být první. <a href="{$smarty.const.LIDE_URL}novy-ucet.php" title="Vytvořit uživatelský účet." class="add">Vytvořit nový účet</a>.
</p>
{/if}
<h3><a href="/mapa/{if strlen($pusobiste[$id].kraj)>0}kraj/{$pusobiste[$id].kraj}/{/if}" title="Mapa - {$jmeno|escape} a okolí">Mapa</a></h3>
<p><a href="/mapa/{if strlen($pusobiste[$id].kraj)>0}kraj/{$pusobiste[$id].kraj}/{/if}" title="Mapa - {$jmeno|escape} a okolí">{obrazek soubor="$id.png" popisek="Mapa - $jmeno" path='/mapa/static/'}</a></p>

{if $navigace}
<div class="kamdal">
<a name="kam-dal"></a><h5>Působiště žonglérů</h5>
<ul>
{if $navigace.dalsi}
	<li class="link_next">Další místo: <a href="{$navigace.dalsi.url|escape}" title="{$navigace.dalsi.title|escape}">{$navigace.dalsi.text|escape}</a></li>
{/if}
{if $navigace.predchozi}
	<li class="link_prev">Předchozí místo: <a href="{$navigace.predchozi.url|escape}" title="{$navigace.predchozi.title|escape}">{$navigace.predchozi.text|escape}</a></li>
{/if}
</ul>
</div>
{/if}
