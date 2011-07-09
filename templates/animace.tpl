{if $animace}
<p>
<img src="/animace/img/{$animace.obalka|escape}" width="{$animace.sirka}" height="{$animace.vyska}" alt="{$animace.popis}" onClick="this.src='/animace/img/{$animace.img|escape}'" />
</p>
<p class="poznamka">Tuto animaci žonglování vytvořil program <a href="/software.html#juggleanim" title="Program JuggleAnim">JuggleAnim</a>.</p>
{/if}
{include file='animace-kamdal.tpl'}
