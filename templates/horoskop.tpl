{if $predpoved}
<h3>{$zverokruh.$znameni.od_den}. {$zverokruh.$znameni.od_mesic}. - {$zverokruh.$znameni.do_den}. {$zverokruh.$znameni.do_mesic}.</h3>
<p>{$predpoved}</p>
<p>
{if $zitra=="jo"}
Co se stane dnes? Ètìte <a href="/horoskop/{$znameni}.html" title="Horoskop na dne¹ní den.">horoskop na dne¹ní den</a>.
{else}
Co se stane zítra? Ètìte <a href="/horoskop/zitra/{$znameni}.html" title="Horoskop na zítra.">horoskop na zítra</a>.
{/if}
</p>

<p>Dal¹í znamení: 
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
