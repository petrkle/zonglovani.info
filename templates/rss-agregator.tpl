<p>
RSS agregátor novinek ze světa žonglování.
</p>
{if $novinky}
{foreach from=$novinky item=novinka}
<h5><a href="{$novinka.url|escape}" title="{$novinka.titulek|escape}"{if !eregi("^http://zonglovani.info",$novinka.url)} class="external" rel="nofollow" onclick="pageTracker._trackPageview('/goto/{$novinka.url|replace:'http://':''|regex_replace:"/^www\./":""|escape}');"{/if}>{$novinka.titulek|escape}</a></h5>
<p>{$novinka.description|strip_tags|escape}</p>
<ul>
<li>Datum: {$novinka.time_hr|escape}</li>
<li class="rss_{$novinka.rssid|escape}">Zdroj: <a href="{$rss_zdroje[$novinka.rssid].url|escape}" title="{$rss_zdroje[$novinka.rssid].popis|escape}"{if !eregi("^http://zonglovani.info",$rss_zdroje[$novinka.rssid].url)} class="external" rel="nofollow" onclick="pageTracker._trackPageview('/goto/{$rss_zdroje[$novinka.rssid].url|replace:'http://':''|regex_replace:"/^www\./":""|escape}');"{/if}>{$rss_zdroje[$novinka.rssid].popis|escape}</a></li>
</ul>
{/foreach}
{/if}

{if $rss_zdroje}
<h3>Seznam zdrojů</h3>
<ul>
{foreach from=$rss_zdroje key=id item=rss}
<li class="rss_{$id}"><a href="{$rss.url|escape}" title="Stránka {$rss.popis|escape}"{if !eregi("^http://zonglovani.info",$rss.url)} class="external" rel="nofollow" onclick="pageTracker._trackPageview('/goto/{$rss.url|replace:'http://':''|regex_replace:"/^www\./":""|escape}');"{/if}>{$rss.popis|escape}</a></li>
{/foreach}
</ul>
{/if}
