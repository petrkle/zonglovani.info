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
<a href="#nahore" title="P�esun na za��tek str�nky." class="nahoru">nahoru&nbsp;^^</a>
{/if}
{if $nahled and $description}
<p class="sdileni">
Sd�len�: <a href="http://www.facebook.com/share.php?u=http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}" class="external" onclick="pageTracker._trackPageview('/goto/facebook.com/share{$smarty.server.REQUEST_URI}');">facebook</a>
</p>
{/if}
{/if}
