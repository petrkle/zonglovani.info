{if $predpoved}
<h3>{$zverokruh.$znameni.od_den}. {$zverokruh.$znameni.od_mesic}. - {$zverokruh.$znameni.do_den}. {$zverokruh.$znameni.do_mesic}.</h3>
<p>{$predpoved}</p>
<p>
{if $zitra=="jo"}
Co se stane dnes? �t�te <a href="/horoskop/{$znameni}.html" title="Horoskop na dne�n� den.">horoskop na dne�n� den</a>.
{else}
Co se stane z�tra? �t�te <a href="/horoskop/zitra/{$znameni}.html" title="Horoskop na z�tra.">horoskop na z�tra</a>.
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
