{if isset($udalost)}
<p>Zaèátek: {$udalost.start_hr|escape}</p>
<p>Konec: {$udalost.end_hr|escape}</p>
<p>
Popis: {$udalost.desc|escape}
</p>
{if $udalost.url}
<p>
Odkaz: <a href="{$udalost.url|escape}" onclick="pageTracker._trackPageview('/goto/{$udalost.url}');">{$udalost.url|truncate:30:"...":false|escape}</a>
</p>
{/if}
{if $udalost.mapa}
<p>
<a href="{$udalost.mapa|escape}" onclick="pageTracker._trackPageview('/goto/{$udalost.mapa}');" title="Místo konání na mapì.">Mapa</a>
</p>
{/if}
<p>
Vlo¾il: {$udalost.vlozil|escape}
</p>

<p>
<a href="{$udalost.month_url}" title="Návrat do kalendáøe.">&laquo; zpìt do kalendáøe</a>
</p>
{/if}
