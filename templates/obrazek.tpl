{if $obrazek}
{if $predchozi}<a href={$predchozi|escape} title="Zobrazí pøedchozí obrázek">&laquo; Pøedchozí obrázek</a> ~ {/if}<a href="." title="Celá galerie">{$nadpis|escape}</a>{if $dalsi} ~ <a href={$dalsi|escape} title="Zobrazí dal¹í obrázek">Dal¹í obrázek &raquo;</a>{/if}

<p>
{if $dalsi}<a href={$dalsi|escape} title="Zobrazí dal¹í obrázek">{else}<a href="." title="Zobrazí celou galerii">{/if}<img src="{$obrazek.obrazek|escape}" alt="{$nadpis|escape}" width="{$obrazek.fsirka|escape}" height="{$obrazek.fvyska|escape}"/></a>
</p>

{if $gal_info.autor or $gal_info.mail or $gal_info.url}
<div class="spacer">&nbsp;</div>
<h3>Autor fotografie</h3>
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
