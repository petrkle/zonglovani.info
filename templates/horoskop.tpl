{if $predpoved}
<h3>{$zverokruh.$znameni.od_den}. {$zverokruh.$znameni.od_mesic}. - {$zverokruh.$znameni.do_den}. {$zverokruh.$znameni.do_mesic}.</h3>
<p>{$predpoved}</p>
<p>
{if $zitra=="jo"}
Zaj�m� t� co se stane dnes? P�e�ti si <a href="/horoskop/{$znameni}.html" title="Horoskop na dne�n� den.">horoskop na dne�n� den</a>.
{else}
Nev� co se stane z�tra? P�e�ti si <a href="/horoskop/zitra/{$znameni}.html" title="Horoskop na z�tra.">horoskop na z�tra</a>.
{/if}
</p>

<p>Dal�� znamen�: 
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
Jak <a href="/horoskop/popis.html">vznik� horoskop</a>?
</p>
