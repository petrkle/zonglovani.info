{include "vyhledavani.tpl"}

<div id="results">
{foreach from=$vysledky key=cislo item=vysledek}
<h3><a href="{$vysledek.url|escape}" class="title">{$vysledek.title|escape}</a></h3>
<p><a href="{$vysledek.url|escape}"><img src="{$vysledek.img|escape}" class="photo" /></a></p><p>{$vysledek.snip}</p>
{/foreach}
</div>

{if $page_numbers.total > 1}
<p class="strankovani">
Stránkování: {$pager_links}
</p>
<script async src="/strankovani-{$smarty.const.JS_CHKSUM}.js" type="text/javascript"></script>
{/if}
