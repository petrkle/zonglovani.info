{if $trik}

{foreach from=$trik.kroky item=krok name=postup}
{if isset($krok.nadpis)}
{if isset($krok.kotva)}<a name="{$krok.kotva}"></a>{assign var='zakotveno' value='jo'}{/if}<h2>{$krok.nadpis}</h2>
{/if}
<p>
{if isset($krok.obrazek)}
{if isset($krok.kotva) and !isset($zakotveno)}<a name="{$krok.kotva}"></a>{/if}
{obrazek soubor=$krok.obrazek popisek=$trik.info[1]}
{/if}

{if isset($krok.popisek)}
{$krok.popisek}
{/if}
</p>
{/foreach}

{if count($trik.kroky) > 4}
<a href="#nahore" title="Přesun na začátek stránky." class="nahoru">nahoru&nbsp;^^</a>
{/if}
{if $nahled and $description}
<p class="sdileni">
Přidat na: <a href="http://www.facebook.com/share.php?u=http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}" class="external" onclick="pageTracker._trackPageview('/goto/facebook.com/share{$smarty.server.REQUEST_URI}');" title="Poslat {$nadpis|escape} na facebook.">facebook</a>, <a href="http://www.google.com/bookmarks/mark?op=edit&bkmk=http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}&title={$trik.about.nazev|escape:'url'}&hl=cs" title="Přidat {$nadpis|escape} do záložek na google." class="external" onclick="pageTracker._trackPageview('/goto/google.com/bookmarks{$smarty.server.REQUEST_URI}');">google</a>
</p>
{/if}
{/if}
