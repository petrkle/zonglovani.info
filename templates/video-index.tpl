{if $videa}
{if $page_numbers.total > 1}
<p class="strankovani">
Stránkování: {$pager_links}
</p>
{/if}
<dl>
{foreach from=$videa item=video key=id}
<dt><a href="{$video.id|escape}.html" title="Žonglérské video {$video.nazev|escape}">{$video.nazev|escape}</a></dt>
<dd>{if $video.nahled}<a href="{$video.id|escape}.html" title="{$video.nazev|escape}">{obrazek soubor=$video.nahled popisek=$video.nazev}</a>{/if}{$video.popis}</dd>
{/foreach}
</dl>
{if $page_numbers.total > 1}
<p class="strankovani">
Stránkování: {$pager_links}
</p>
<script async src="/strankovani-{$smarty.const.JS_CHKSUM}.js" type="text/javascript"></script>
{/if}
{/if}
