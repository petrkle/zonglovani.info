{if $obrazek}
<div class="celek"><a name="nahore"></a>
{if isset($obrazek.predchozi_cislo)}<a href="{if isset($obrazek.predchozi_stranka)}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.predchozi_stranka}/{$obrazek.predchozi_cislo}{else}{$smarty.const.OBRAZKY_URL}{$gal_id}/{$obrazek.predchozi_cislo|escape}{/if}.html" title="Zobrazit předchozí obrázek (šipka vlevo)">&laquo; Předchozí obrázek</a> ~ {/if} <a href="." title="Zobrazí celou galerii">Náhledy</a> {if isset($obrazek.dalsi_cislo)} ~ <a href="{if isset($obrazek.dalsi_stranka) and $obrazek.dalsi_stranka!=1}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.dalsi_stranka}/{$obrazek.dalsi_cislo}{else}{$obrazek.dalsi_cislo|escape}{/if}.html" title="Zobrazit další obrázek (šipka vpravo)">Další obrázek &raquo;</a>{/if}{if isset($pristiulita) and is_array($pristiulita)} Příští Ulita: <a href="{$smarty.const.CALENDAR_URL}{$pristiulita.url|escape}">{$pristiulita.datum|escape}</a>{/if}
<p class="obrazek">
{if isset($obrazek.dalsi_cislo)}<a href="{if $obrazek.dalsi_stranka!=1}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.dalsi_stranka}/{$obrazek.dalsi_cislo}{else}{$obrazek.dalsi_cislo|escape}{/if}.html" title="Zobrazit další obrázek (šipka vpravo)" onclick="window.location.href='{if $obrazek.dalsi_stranka!=1}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.dalsi_stranka}/{$obrazek.dalsi_cislo}{else}{$obrazek.dalsi_cislo|escape}{/if}.html#nahore';return(false);">{else}<a href="." title="Zobrazí celou galerii">{/if}<img src="{$obrazek.obrazek|escape}" alt="{$nadpis|escape}" style="width:98%;max-width:{$obrazek.fsirka|escape}px;"</a>
</p>

{if isset($gal_info.mail) and $gal_info.mail != 'admin@zonglovani.info'}
{if isset($gal_info.autor) or isset($gal_info.mail) or isset($gal_info.url)}
<p class="vlevo">
{if isset($gal_info.autor) or isset($gal_info.mail)}
Autor fotografie: 
{if isset($gal_info.autor)}
 <strong>{$gal_info.autor|escape}</strong>
{/if}
{if isset($gal_info.mail)}
 {$gal_info.mail|escape|mailobfuscate}
{/if}
{/if}
{if isset($gal_info.url)}
 <a href="{$gal_info.url|escape}"{if preg_match('/^http:\/\//',$gal_info.url_hr)} class="external" rel="nofollow"{/if}>{$gal_info.url|replace:'http://':''|regex_replace:"/^www\./":""|regex_replace:"/\/$/":""|truncate:40:"...":false|escape}</a>
{/if}
</p>
{/if}
{/if}

</div>
{/if}
