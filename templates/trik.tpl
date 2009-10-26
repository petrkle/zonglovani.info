{if $trik}

{foreach from=$trik.kroky item=krok name=postup}
{if isset($krok.nadpis)}
{if isset($krok.kotva)}<a name="{$krok.kotva}"></a>{/if}<h2>{$krok.nadpis}</h2>
{/if}
<p>
{if isset($krok.obrazek)}
{if isset($krok.kotva)}<a name="{$krok.kotva}"></a>{/if}
{obrazek soubor=$krok.obrazek popisek=$trik.info[1]}
{/if}

{if isset($krok.popisek)}
{$krok.popisek}
{/if}
</p>
{/foreach}

{if count($trik.kroky) > 4}
<a href="#nahore" title="Pøesun na zaèátek stránky." class="nahoru">nahoru&nbsp;^^</a>
{/if}
{if $nahled and $description}
<p class="sdileni">
Sdílení: <a href="http://www.facebook.com/share.php?u=http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}" class="external" onclick="pageTracker._trackPageview('/goto/facebook.com/share{$smarty.server.REQUEST_URI}');" title="Poslat {$nadpis|escape} na facebook.">facebook</a>, <a href="http://www.google.com/bookmarks/mark?op=edit&bkmk=http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}&title={$trik.info[6]|escape:'url'}&hl=cs" title="Pøidat {$nadpis|escape} do zálo¾ek na google." class="external" onclick="pageTracker._trackPageview('/goto/google.com/bookmarks{$smarty.server.REQUEST_URI}');">google</a>
</p>
{/if}
{/if}
