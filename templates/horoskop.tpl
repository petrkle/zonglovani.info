{if $predpoved}
<h3>{$zverokruh.$znameni.od_den}. {$zverokruh.$znameni.od_mesic}. - {$zverokruh.$znameni.do_den}. {$zverokruh.$znameni.do_mesic}.</h3>
<p>{$predpoved}</p>
<p>
{if $zitra=="jo"}
Zajímá tě co se stane dnes? Přečti si <a href="/horoskop/{$znameni}.html" title="Horoskop na dnešní den.">horoskop na dnešní den</a>.
{else}
Nevíš co se stane zítra? Přečti si <a href="/horoskop/zitra/{$znameni}.html" title="Horoskop na zítra.">horoskop na zítra</a>.
{/if}
</p>

<p>Další znamení: 
{foreach from=$zverokruh item=znam key=klic name=horomenu}
{if !$smarty.foreach.horomenu.first} ~ {/if}
{if $klic==$znameni}
<strong>{$znam.popis}</strong>
{else}
<a href="{$klic}.html" title="">{$znam.popis}</a>
{/if}
{/foreach}
</p>
{/if}
<p>
Jak <a href="/horoskop/popis.html">vzniká horoskop</a>?
</p>
