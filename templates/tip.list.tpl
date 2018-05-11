{if is_array($tipy)}
<p>
Každý týden informace ze světa žonglování.
</p>
{foreach from=$tipy item=foo key=datum}
<a name="{$foo.cas|escape}"></a><h3 class="nadpistipu"><a href="{$foo.link}" title="{$foo.nadpis|escape}">{$foo.nadpis|escape}</a></h3>
<ul class="datum"><li>{$foo.cas_hr|escape}</li></ul>
<p><a href="{$foo.link}" title="{$foo.nadpis|escape}">{obrazek soubor=$foo.obrazek}</a>
</p>
<p>
{$foo.text}
</p>
{/foreach}
{if $page_numbers.total > 1}
<p class="strankovani">
Stránkování: {$pager_links}
</p>
<script async src="/strankovani-{$smarty.const.JS_CHKSUM}.js" type="text/javascript"></script>
{/if}
{/if}
