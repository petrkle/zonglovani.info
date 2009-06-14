{if $trik}

{foreach from=$trik.kroky item=krok name=postup}
{if isset($krok.nadpis)}
<h2>{$krok.nadpis}</h2>
{/if}
<p>
{if isset($krok.obrazek)}
{obrazek soubor=$krok.obrazek popisek=$trik.info[1]}
{/if}

{if isset($krok.popisek)}
{$krok.popisek}
{/if}
</p>
{/foreach}

{if count($trik.kroky) > 4}
<a href="#nahore" title="Pøesun na zaèátek stránky." class="nahoru">nahoru&nbsp;^^</a>
{/if}

{/if}
