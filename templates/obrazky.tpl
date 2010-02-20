{if is_array($items)}
<p>
{foreach from=$items item=foo}
<a href="{$smarty.const.OBRAZKY_URL}{$gal_id}/{if $stranka!=1}stranka{$stranka}/{/if}{$foo.url_file|escape}" class="nahled" title="Zobrazit obrázek v plné velikosti."><img src="{$foo.nahled|escape}" style="width: {$foo.sirka|escape}px; height: {$foo.vyska|escape}px; margin: {$foo.margin_v|escape}px {$foo.margin_h|escape}px;" alt=""/></a>
{/foreach}
</p>

{if $page_numbers.total > 1}
<p>
Stránkování: {$pager_links}
</p>
{/if}

{if $gal_info.autor or $gal_info.mail or $gal_info.url}
<div class="spacer">&nbsp;</div>
<h3>Autor fotografií</h3>
{if $gal_info.autor}
<p>{$gal_info.autor|escape}</p>
{/if}
{if $gal_info.mail}
<p>{$gal_info.mail|escape|mailobfuscate}</p>
{/if}
{if $gal_info.url}
<p><a href="{$gal_info.url|escape}" onclick="pageTracker._trackPageview('/goto/{$gal_info.url|replace:'http://':''|regex_replace:"/^www\./":""}');"{if eregi("^http://",$gal_info.url_hr)} class="external" rel="nofollow"{/if}>{$gal_info.url|replace:'http://':''|regex_replace:"/^www\./":""|regex_replace:"/\/$/":""|truncate:40:"...":false|escape}</a></p>
{/if}
{/if}
{/if}
<p>
Další <a href="{$smarty.const.OBRAZKY_URL}" title="Další obrázky žonglování.">obrázky žonglování</a>.
</p>

<p>
<a href="{$smarty.const.OBRAZKY_URL}#vyzva" title="Přidat vlastní obrázky žonglovaní." class="add">Přidat obrázky</a>
</p>
