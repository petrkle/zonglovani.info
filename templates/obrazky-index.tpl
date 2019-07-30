{if is_array($galerie)}
{if $page_numbers.total > 1}
<p class="strankovani">
Stránkování: {$pager_links}
</p>
{/if}
{foreach from=$galerie item=foo}
<h3><a href="{$smarty.const.OBRAZKY_URL}{$foo.name|escape}/" title="{$foo.title|escape}">{$foo.title|escape}</a></h3>
<p>
{foreach from=$foo.obrazky item=bar}
<a href="{$bar.url|escape}" class="nahled" title="Zobrazit obrázek v plné velikosti"><img src="{$bar.nahled|escape}"/></a>
{/foreach}
</p>
{/foreach}
{/if}
{if $page_numbers.total > 1}
<p class="strankovani">
Stránkování: {$pager_links}
</p>
{/if}
<h3>Filtry obrázků</h3>
{include file='obrazky-filtry.tpl'}
<script async src="/strankovani-{$smarty.const.JS_CHKSUM}.js" type="text/javascript"></script>
