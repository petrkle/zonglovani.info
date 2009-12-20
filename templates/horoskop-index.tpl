<p>
Horoskop pro žonglérky a žongléry. Každý den ti poradí co je nejlepší trénovat.
</p>

{if $zitra=="jo"}
<table class="horotable">
{foreach from=$zverokruh item=znam key=klic}
<tr>
<td><a href="/horoskop/zitra/{$klic}.html" title="Horoskop pro {$znam.popis} na zítra.">{obrazek soubor="horoskop-$klic-maly.png" popisek=$znam.popis}</a></td>
<td><h3><a href="/horoskop/zitra/{$klic}.html" title="Horoskop pro {$znam.popis}.">{$znam.popis}</a></h3></td>
<td>{$znam.od_den}. {$znam.od_mesic}. - {$znam.do_den}. {$znam.do_mesic}.</td>
</tr>
{/foreach}
</table>
{else}
<table class="horotable">
{foreach from=$zverokruh item=znam key=klic}
<tr>
<td><a href="{$klic}.html" title="Horoskop pro {$znam.popis}.">{obrazek soubor="horoskop-$klic-maly.png" popisek=$znam.popis}</a></td>
<td><h3><a href="{$klic}.html" title="Horoskop pro {$znam.popis}.">{$znam.popis}</a></h3></td>
<td>{$znam.od_den}. {$znam.od_mesic}. - {$znam.do_den}. {$znam.do_mesic}.</td>
</tr>
{/foreach}
</table>
{/if}

<p>
{if $zitra=="jo"}
Zajímá tě co se stane dnes? Přečti si <a href="/horoskop/" title="Horoskop na dnešní den.">horoskop na dnešní den</a>.
{else}
Nevíš co se stane zítra? Přečti si <a href="/horoskop/zitra/" title="Horoskop na zítra.">horoskop na zítra</a>.
{/if}
</p>

<p>
Předpovědi v horoskopu jsou každý den nové. Vznikají na základě složitých výpočtů a věšteb pomocí <a href="/nacini.html#crystalball" title="Crystal ball - magická žonglérská pomůcka.">crystal ball</a>u. Tím je zaručena přesná předpověď pro každou žonglérku i žongléra.
</p>

{literal}
<style>
.horotable {
 clear: both;
 margin: 2px 10px 7px 20px;
}
</style>
{/literal}
