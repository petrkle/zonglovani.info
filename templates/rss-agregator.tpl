<p>
Přehled novinek na stránkách o žonglování.
</p>
<!-- start -->
{include file='tip.plain.tpl'}
<hr class="d"/>
<!-- stop -->
{if $novinky}
{foreach from=$novinky item=novinka}
<a name="{$novinka.cas|escape}"></a><h5><a href="{$novinka.url|escape}" title="{$novinka.titulek|escape}"{if !preg_match('/^https:\/\/zonglovani.info/',$novinka.url)} class="external" rel="nofollow"{/if}>{$novinka.titulek|escape|default:'Bez titulku'}</a></h5>
<p class="wrap">{$novinka.description|strip_tags|escape}</p>
<ul>
<li>Datum: {$novinka.time_hr|escape}</li>
<li class="rss_{$novinka.rssid|escape}">Zdroj: <a href="{$rss_zdroje[$novinka.rssid].url|escape}" title="{$rss_zdroje[$novinka.rssid].popis|escape}"{if !preg_match('/^https:\/\/zonglovani.info/',$rss_zdroje[$novinka.rssid].url)} class="external" rel="nofollow"{/if}>{$rss_zdroje[$novinka.rssid].popis|escape}</a></li>
</ul>
<hr class="d"/>
{/foreach}
{/if}

{if $rss_zdroje}
<a name="zdroje"></a>
<h3>Seznam zdrojů</h3>
<ul>
{foreach from=$rss_zdroje key=id item=rss}
<li class="rss_{$id}"><a href="{$rss.url|escape}" title="Stránka {$rss.popis|escape}"{if !preg_match('/^https:\/\/zonglovani.info/',$rss.url)} class="external" rel="nofollow"{/if}>{$rss.popis|escape}</a></li>
{/foreach}
</ul>
{/if}
