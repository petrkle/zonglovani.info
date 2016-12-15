<p>
Tapety na plochu počítače s žonglérskou tématikou.
</p>
{if is_array($wallpapers)}
{foreach from=$wallpapers item=obrazek}
{if $obrazek.titulek}<h3><a href="{$obrazek.basename}.html" title="{$obrazek.titulek}">{$obrazek.titulek}</a></h3>{/if}
{include file='obrazek-na-plochu-odkazy.tpl'}
{/foreach}
{/if}

{include file='sponzor.tpl'}
