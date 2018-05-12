{if isset($predpoved)}
<h3>{$zverokruh.$znameni.od_den}. {$zverokruh.$znameni.od_mesic}. - {$zverokruh.$znameni.do_den}. {$zverokruh.$znameni.do_mesic}.</h3>
<p>
<img src="/img/h/horoskop-{$znameni}.png" alt="{$znameni}" class="photo" />
{$predpoved}
</p>
<p>
{if isset($zitra) and $zitra=="jo"}
Zajímá tě co se stane dnes? Přečti si <a href="/horoskop/{$znameni}.html" title="Horoskop na dnešní den.">horoskop na dnešní den</a>.
{else}
Nevíš co se stane zítra? Přečti si <a href="/horoskop/zitra/{$znameni}.html" title="Horoskop na zítra.">horoskop na zítra</a>.
{/if}
</p>
{/if}

<p>Předpověď pro <a href="/horoskop/{if isset($zitra) and $zitra=="jo"}zitra/{/if}" title="Všechna zanemní zvěrokruhu.">všechna znamení zvěrokruhu</a>.</p>
