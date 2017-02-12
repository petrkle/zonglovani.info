{if $obrazek}
<div class="celek"><a name="nahore"></a>
{if isset($obrazek.predchozi_cislo)}
<a href="{if isset($obrazek.predchozi_stranka)}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.predchozi_stranka}/{$obrazek.predchozi_cislo}{else}{$smarty.const.OBRAZKY_URL}{$gal_id}/{$obrazek.predchozi_cislo|escape}{/if}.html" title="Zobrazit předchozí obrázek (šipka vlevo)" id="predchozi">&laquo;&nbsp;Předchozí obrázek</a> ~ {/if} 

<a href="." title="Zobrazí celou galerii">Náhledy</a>

 {if isset($obrazek.dalsi_cislo)} ~ <a href="{if isset($obrazek.dalsi_stranka) and $obrazek.dalsi_stranka!=1}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.dalsi_stranka}/{$obrazek.dalsi_cislo}{else}{$obrazek.dalsi_cislo|escape}{/if}.html" title="Zobrazit další obrázek (šipka vpravo)" id="dalsi" data-preload="{$obrazek.dalsi_cislo}{if isset($obrazek.dalsi_cislo2)};{$obrazek.dalsi_cislo2}{/if}{if isset($obrazek.dalsi_cislo3)};{$obrazek.dalsi_cislo3}{/if}" data-imgdir="{$imgdir}">Další obrázek&nbsp;&raquo;</a>{/if}

<p class="obrazek">
{if isset($obrazek.dalsi_cislo)}<a href="{if $obrazek.dalsi_stranka!=1}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.dalsi_stranka}/{$obrazek.dalsi_cislo}{else}{$obrazek.dalsi_cislo|escape}{/if}.html" title="Zobrazit další obrázek (šipka vpravo)">{else}<a href="." title="Zobrazí celou galerii">{/if}
<img src="{$obrazek.obrazek|escape}" alt="{$nadpis|escape}" class="photo"></a>
</p>

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
</div>
{/if}

<script async src="/obrazky-{$smarty.const.JS_CHKSUM}.js" type="text/javascript"></script>
