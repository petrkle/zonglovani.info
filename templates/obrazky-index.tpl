{if is_array($galerie)}
{if $page_numbers.total > 1}
<p>
Stránkování: {$pager_links}
</p>
{/if}
{foreach from=$galerie item=foo}
<h3><a href="{$smarty.const.OBRAZKY_URL}{$foo.name|escape}/" title="{$foo.title|escape}">{$foo.title|escape}</a></h3>
<p class="wrap">
{foreach from=$foo.obrazky item=bar}
<a href="{$bar.url|escape}" class="nahled" title="Zobrazit obrázek v plné velikosti"><img src="{$bar.nahled|escape}"/></a>
{/foreach}
</p>
{/foreach}
{/if}
{if $page_numbers.total > 1}
<p>
Stránkování: {$pager_links}
</p>
{/if}
<h3>Filtry obrázků</h3>
{include file='obrazky-filtry.tpl'}
{if $page_numbers.current==1}
<a name="vyzva"></a><h3>Výzva pro fotografy</h3>
<p>
{obrazek soubor="fotaka.png" popisek="Fotoaparát"}
Rád uveřejním i tvoje fotografie žonglování. Stačí vědět, kde a kdy byly pořízené a <a href="/kontakt.html" title="Stránka s emailem.">napsat</a>. Tvoje fotky pak uvidí hodně lidí, které zajímá žonglování.
</p>
<p>
Nenabízím neomezenou kapacitu ani okamžité zveřejnění fotografií. Jen to, že se tvoje fotky neztratí v moři ostatních.
</p>
<p>
U každé fotografie bude tvoje jméno, email a případně odkaz na webovou stránku.
</p>
{/if}
