{if is_array($uzivatele)}
<ul>
{foreach from=$uzivatele item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel.login|escape}.html" title="Profil uživatele {$uzivatel.login|escape}">{$uzivatel.jmeno|escape}</a>{if is_array($uzivatel.pusobiste)} ({foreach from=$uzivatel.pusobiste item=misto name=places}{$pusobiste[$misto].nazev|escape}{if !$smarty.foreach.places.last}, {/if}{/foreach}){/if}</li>
{/foreach}
</ul>
{else}
<p>
V žonglérově slabikáři ještě není žádný uživatel který umí {$umi|escape}. Můžeš být první. <a href="{$smarty.const.LIDE_URL}pravidla.php" title="Vytvořit uživatelský účet." class="add">Vytvořit nový účet</a>.
</p>
{/if}

{if $navigace}
<div class="kamdal">
<a name="kam-dal"></a><h5>Žonglérské dovednosti</h5>
<ul>
{if $navigace.dalsi}
	<li class="link_next">Další dovednost: <a href="{$navigace.dalsi.url|escape}" title="{$navigace.dalsi.title|escape}">{$navigace.dalsi.text|escape}</a></li>
{/if}
{if $navigace.predchozi}
	<li class="link_prev">Předchozí dovednost: <a href="{$navigace.predchozi.url|escape}" title="{$navigace.predchozi.title|escape}">{$navigace.predchozi.text|escape}</a></li>
{/if}
</ul>
</div>
{/if}
