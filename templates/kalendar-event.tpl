{if isset($udalost)}
{if $stare}
<ul class="alert"><li><strong>Pozor:</strong> tato ud�lost u� skon�ila.</li></ul>
{/if}
<p>Za��tek: {$udalost.start_hr|escape}</p>
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
<a href="{$udalost.mapa|escape}" onclick="pageTracker._trackPageview('/goto/{$udalost.mapa|replace:'http://':''|regex_replace:"/^www\./":""}');" title="M�sto kon�n� na map�."{if eregi("^http://",$udalost.mapa)} class="external"{/if}>Mapa</a>
</p>
{/if}
<p>
Vlo�il: {$udalost.vlozil|escape}
</p>
{/if}

<p>
<a href="{$udalost.month_url}" title="N�vrat do kalend��e.">&laquo; zp�t do kalend��e</a>
</p>
