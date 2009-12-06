{if $obrazek}
<a name="nahore"></a>
{if $predchozi}<span class="navigace"><a href="{$predchozi|escape}#nahore" title="Zobrazit předchozí obrázek">&laquo; Předchozí obrázek</a> ~ </span>{/if}<a href="." title="Celá galerie">{$nadpis|escape}</a>{if $dalsi}<span class="navigace"> ~ <a href="{$dalsi|escape}#nahore" title="Zobrazit další obrázek">Další obrázek &raquo;</a></span>{/if}

<p class="obrazek">
{if $dalsi}<a href="{$dalsi|escape}#nahore" title="Zobrazit další obrázek">{else}<a href="." title="Zobrazí celou galerii">{/if}<img src="{$obrazek.obrazek|escape}" alt="{$nadpis|escape}" width="{$obrazek.fsirka|escape}" height="{$obrazek.fvyska|escape}"/></a>
</p>

{if $gal_info.autor or $gal_info.mail or $gal_info.url}
<p class="autor">
Autor fotografie: 
{if $gal_info.autor}
 <strong>{$gal_info.autor|escape}</strong>
{/if}
{if $gal_info.mail}
 {$gal_info.mail|escape|mailobfuscate}
{/if}
{if $gal_info.url}
 <a href="{$gal_info.url|escape}" onclick="pageTracker._trackPageview('/goto/{$gal_info.url|replace:'http://':''|regex_replace:"/^www\./":""}');"{if eregi("^http://",$gal_info.url_hr)} class="external" rel="nofollow"{/if}>{$gal_info.url|replace:'http://':''|regex_replace:"/^www\./":""|regex_replace:"/\/$/":""|truncate:40:"...":false|escape}</a>
{/if}
{/if}
</p>
{/if}

{if $nahled and $description}
<p class="sdileni">
Přidat na: <a href="http://www.facebook.com/share.php?u=http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}" class="external" onclick="pageTracker._trackPageview('/goto/facebook.com/share{$smarty.server.REQUEST_URI}');" title="Poslat {$nadpis|escape} na facebook.">facebook</a>, <a href="http://www.google.com/bookmarks/mark?op=edit&bkmk=http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}&title={$titulek|escape:'url'}&hl=cs" title="Přidat {$nadpis|escape} do záložek na google." class="external" onclick="pageTracker._trackPageview('/goto/google.com/bookmarks{$smarty.server.REQUEST_URI}');">google</a>
</p>
{/if}
