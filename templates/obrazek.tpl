{if $obrazek}
<a name="nahore"></a>
{if $obrazek.predchozi_cislo}

<span class="navigace"><a href="{if $obrazek.predchozi_stranka}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.predchozi_stranka}/{$obrazek.predchozi_cislo}{else}{$smarty.const.OBRAZKY_URL}{$gal_id}/{$obrazek.predchozi_cislo|escape}{/if}.html" title="Zobrazit předchozí obrázek">&laquo; Předchozí obrázek</a>{else}<a href="." title="Zobrazí celou galerii">{$description|escape}</a>{/if}</span> ~ <span class="navigace">{if $obrazek.dalsi_cislo}<a href="{if $obrazek.dalsi_stranka!=1}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.dalsi_stranka}/{$obrazek.dalsi_cislo}{else}{$obrazek.dalsi_cislo|escape}{/if}.html" title="Zobrazit další obrázek">Další obrázek &raquo;</a>{else}<a href="." title="Zobrazí celou galerii">{$description|escape}</a>{/if}</span>
<p class="obrazek">
{if $obrazek.dalsi_cislo}<a href="{if $obrazek.dalsi_stranka!=1}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.dalsi_stranka}/{$obrazek.dalsi_cislo}{else}{$obrazek.dalsi_cislo|escape}{/if}.html" title="Zobrazit další obrázek">{else}<a href="." title="Zobrazí celou galerii">{/if}<img src="{$obrazek.obrazek|escape}" alt="{$nadpis|escape}" width="{$obrazek.fsirka|escape}" height="{$obrazek.fvyska|escape}"/></a>
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
