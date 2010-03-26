{if $obrazek}
<div class="celek">
{if preg_match('/ulita/',$smarty.server.REQUEST_URI)}
<div class="upozorneni">
<h3>Příští <a href="/ulita" title="Žonglování v Ulitě">Ulita</a></h3>
<ul>
<li><a href="/kalendar/udalost-20100411-20100411-pek-1253740811.html" title="Poslední jarní Ulita.">11.&nbsp;4.</a></li>
</ul>
</div>
{/if}
{if $obrazek.predchozi_cislo}<a href="{if $obrazek.predchozi_stranka}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.predchozi_stranka}/{$obrazek.predchozi_cislo}{else}{$smarty.const.OBRAZKY_URL}{$gal_id}/{$obrazek.predchozi_cislo|escape}{/if}.html" title="Zobrazit předchozí obrázek">&laquo; Předchozí obrázek</a> ~ {/if} <a href="." title="Zobrazí celou galerii">Náhledy</a> {if $obrazek.dalsi_cislo} ~ <a href="{if $obrazek.dalsi_stranka!=1}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.dalsi_stranka}/{$obrazek.dalsi_cislo}{else}{$obrazek.dalsi_cislo|escape}{/if}.html" title="Zobrazit další obrázek">Další obrázek &raquo;</a>{/if}
<a name="nahore"></a>
<p class="obrazek">
{if $obrazek.dalsi_cislo}<a href="{if $obrazek.dalsi_stranka!=1}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.dalsi_stranka}/{$obrazek.dalsi_cislo}{else}{$obrazek.dalsi_cislo|escape}{/if}.html" title="Zobrazit další obrázek" onclick="window.location.href='{if $obrazek.dalsi_stranka!=1}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.dalsi_stranka}/{$obrazek.dalsi_cislo}{else}{$obrazek.dalsi_cislo|escape}{/if}.html#nahore';return(false);">{else}<a href="." title="Zobrazí celou galerii">{/if}<img src="{$obrazek.obrazek|escape}" alt="{$nadpis|escape}" width="{$obrazek.fsirka|escape}" height="{$obrazek.fvyska|escape}"/></a>
</p>

{if $gal_info.autor or $gal_info.mail or $gal_info.url}
<p class="vlevo">
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
</div>
{/if}
<p class="vpravo">
<a href="{$smarty.const.OBRAZKY_URL}#vyzva" title="Přidat vlastní obrázky žonglovaní." class="add">Přidat obrázky</a>
</p>
