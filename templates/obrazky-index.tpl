{if is_array($galerie)}
<ul>
{foreach from=$galerie item=foo}
<li><a href="{$foo.name|escape}/" title="{$foo.title|escape}">{$foo.title|escape}</a></li>
{/foreach}
</ul>
{/if}
