{if isset($udalost)}
{if $stare}
<ul class="alert"><li><strong>Pozor:</strong> tato událost u¾ skonèila.</li></ul>
{/if}
<p>Zaèátek: {$udalost.start_hr|escape}</p>
<p>Konec: {$udalost.end_hr|escape}</p>
<p>
Popis: {$udalost.desc|escape}
</p>
{if $udalost.url}
<p>
Odkaz: <a href="{$udalost.url|escape}" onclick="pageTracker._trackPageview('/goto/{$udalost.url|replace:'http://':''|regex_replace:"/^www\./":""}');"{if eregi("^http://",$udalost.url)} class="external"{/if}>{$udalost.url|replace:'http://':''|regex_replace:"/^www\./":""|truncate:40:"...":false|escape}</a>
</p>
{/if}
{if $udalost.mapa}
<p>
<a href="{$udalost.mapa|escape}" onclick="pageTracker._trackPageview('/goto/{$udalost.mapa|replace:'http://':''|regex_replace:"/^www\./":""}');" title="Místo konání na mapì."{if eregi("^http://",$udalost.mapa)} class="external"{/if}>Mapa</a>
</p>
{/if}
<p>
Vlo¾il: {$udalost.vlozil|escape}
</p>
{/if}

<p>
<a href="{$udalost.month_url}" title="Návrat do kalendáøe.">&laquo; zpìt do kalendáøe</a>
</p>
