{if is_array($tip)}
<h3>{if $tip.link}<a href="{$tip.link|escape}" title="{$tip.nadpis|escape}">{/if}{$tip.nadpis|escape}{if $tip.link}</a>{/if}</h3>
<p>
{if $tip.link}<a href="{$tip.link|escape}" title="{$tip.nadpis|escape}">{/if}{obrazek soubor=$tip.obrazek popisek=$tip.nadpis|escape}{if $tip.link}</a>{/if}
{$tip.text}
</p>
{/if}
