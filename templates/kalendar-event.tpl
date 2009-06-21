{if isset($udalost)}
<p>Zaèátek: {$udalost.zacatek|escape}</p>
<p>Konec: {$udalost.konec|escape}</p>
<p>
Popis: {$udalost.desc|escape}
</p>
<p>
Odkaz: <a href="{$udalost.url|escape}">{$udalost.url|escape}</a>
</p>
<p>
Vlo¾il: {$udalost.vlozil|escape}
</p>
{/if}
