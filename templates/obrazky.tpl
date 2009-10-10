{if is_array($obrazky)}
<p>
{foreach from=$obrazky item=foo}
<a href="{$foo.obrazek|escape}" class="nahled" title="Zobrazit obrázek v plné velikosti." onclick="pageTracker._trackPageview('{$foo.obrazek|escape}');"><img src="{$foo.nahled|escape}" style="width: {$foo.sirka|escape}px; height: {$foo.vyska|escape}px; margin: {$foo.margin_v|escape}px {$foo.margin_h|escape}px;" alt=""/></a>
{/foreach}
</p>

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
