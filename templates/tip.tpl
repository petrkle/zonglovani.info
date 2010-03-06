{if is_array($tip)}
<div class="hslice" id="zonglovani-web-slice">
<div class="entry-content">
<h6 id="ttnadpis"><a href="/tip/" class="entry-title">Žonglérský tip týdne</a> - {$tip.cas_hr|escape}</h6>
<h3>{if $tip.link}<a href="{$tip.link|escape}" title="{$tip.nadpis|escape}">{/if}{$tip.nadpis|escape}{if $tip.link}</a>{/if}</h3>
<p>
{if $tip.link}<a href="{$tip.link|escape}" title="{$tip.nadpis|escape}">{/if}{obrazek soubor=$tip.obrazek popisek=$tip.nadpis|escape}{if $tip.link}</a>{/if}
{$tip.text}
</p>
</div>
</div>
{/if}
