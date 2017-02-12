{if $page_numbers.total > 1}
<p class="strankovani">
Stránkování: {$pager_links}
</p>
{/if}
{if is_array($items)}
<p>
{foreach from=$items item=foo}
<a href="{$smarty.const.OBRAZKY_URL}{$gal_id}/{if $stranka!=1}stranka{$stranka}/{/if}{$foo.url_file|escape}" class="nahled" title="Zobrazit obrázek v plné velikosti."><img src="{$foo.nahled|escape}"></a>
{/foreach}
</p>

{if $page_numbers.total > 1}
<p class="strankovani">
Stránkování: {$pager_links}
</p>
<script async src="/strankovani-{$smarty.const.JS_CHKSUM}.js" type="text/javascript"></script>
{/if}

{if isset($gal_info.mail) and $gal_info.mail != 'admin@zonglovani.info'}
{if isset($gal_info.autor) or isset($gal_info.mail) or isset($gal_info.url)}
<div class="spacer">&nbsp;</div>
{if isset($gal_info.autor) or isset($gal_info.mail)}
<h3>Autor fotografií</h3>
{/if}
{if isset($gal_info.autor)}
<p>{$gal_info.autor|escape}</p>
{/if}
{if isset($gal_info.mail)}
<p>{$gal_info.mail|escape|mailobfuscate}</p>
{/if}
{if isset($gal_info.url)}
<p><a href="{$gal_info.url|escape}"{if preg_match('/^http:\/\//',$gal_info.url_hr)} class="external" rel="nofollow"{/if}>{$gal_info.url|replace:'http://':''|regex_replace:"/^www\./":""|regex_replace:"/\/$/":""|truncate:40:"...":false|escape}</a></p>
{/if}
{/if}
{/if}
{/if}
