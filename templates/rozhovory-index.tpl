{foreach from=$rozhovory item=rozhovor key=id}
<h3><a href="{$id}.html" title="{$rozhovor.titulek}">{$rozhovor.titulek}</a></h3>
<p><a href="{$id}.html" title="{$rozhovor.titulek}">{obrazek soubor=$rozhovor.img popisek=$rozhovor.titulek}</a>
{$rozhovor.perex}
</p>
{/foreach}
