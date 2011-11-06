{if is_array($dovednost_link)}
<div class="dv">{if $dovednost_link.url}<a href="{$dovednost_link.url}" title="{$dovednost_link.text|escape}">{/if}{obrazek soubor=$dovednost_link.img}{if $dovednost_link.url}</a><a href="{$dovednost_link.url}" title="{$dovednost_link.text|escape}">{$dovednost_link.text|escape}</a>{else}<div>{if strlen($dovednost_link.text)>0}{$dovednost_link.text|escape}{else}{$nadpis|escape}{/if}</div>{/if}</div>
{/if}
{if is_array($uzivatele)}
<div class="popis"><a href="{$smarty.const.LIDE_URL}" title="Seznam žonglérů a žonglérek v České s Slovenské republice">Seznam žonglérů</a> a žonglérek kteří umí {$umi|escape}.</div>
<ul>
{foreach from=$uzivatele item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel.login|escape}.html" title="Profil uživatele {$uzivatel.login|escape}">{$uzivatel.jmeno|escape}</a>{if is_array($uzivatel.pusobiste)} ({foreach from=$uzivatel.pusobiste item=misto name=places}{$pusobiste[$misto].nazev|escape}{if !$smarty.foreach.places.last}, {/if}{/foreach}){/if}</li>
{/foreach}
</ul>
{else}
<p>
V žonglérově slabikáři ještě není žádný uživatel, který umí {$umi|escape}. Můžeš být první. <a href="{$smarty.const.LIDE_URL}novy-ucet.php" title="Vytvořit uživatelský účet." class="add">Vytvořit nový účet</a>.
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
