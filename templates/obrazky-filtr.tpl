{if is_array($galerie) and count($galerie)>0}
{foreach from=$galerie item=foo}
<h3><a href="{$smarty.const.OBRAZKY_URL}{$foo.name|escape}/" title="{$foo.title|escape}">{$foo.title|escape}</a></h3>
<p>
{foreach from=$foo.obrazky item=bar}
<a href="{$bar.url|escape}" class="nahled" title="Zobrazit obrázek v plné velikosti."><img src="{$bar.nahled|escape}" style="width: {$bar.sirka|escape}px; height: {$bar.vyska|escape}px; margin: {$bar.margin_v|escape}px {$bar.margin_h|escape}px;" alt=""/></a>
{/foreach}
</p>
{/foreach}
{else}
<h1>Nic nenalezeno</h1>
{/if}
