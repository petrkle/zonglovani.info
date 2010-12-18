{if is_array($zmeny)}
{foreach from=$zmeny item=zmena}
<h3><a name="{$zmena.cislo}"></a>Revize č. {$zmena.cislo}</h3>
<ul>
<li>Datum: {$zmena.datum_hr}</li>
<li>Popis: {$zmena.popis|escape}</li>
</ul>
{/foreach}
{/if}
