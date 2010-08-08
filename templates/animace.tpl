{if $animace}
<p>
<img src="img/{$animace.img|escape}" width="{$animace.sirka}" height="{$animace.vyska}" alt="{$animace.popis}" />
</p>
{if $navod}
<p>
<a href="{$navod.url|escape}">Podrobný návod</a> jak se naučit {$navod.popis|escape}.
</p>
{/if}
<p class="feedback">Tuto animaci žonglování vytvořil program <a href="/software.html#juggleanim" title="Program JuggleAnim">JuggleAnim</a>.</p>
{/if}
