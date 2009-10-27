{if $triky}
<ul>
{foreach from=$triky item=polozka key=filename}
<li><a href="{$filename}.html" title="Zobrazit {$polozka.about.nazev}">{$polozka.about.nazev}</a></li>
{/foreach}
</ul>
{/if}
