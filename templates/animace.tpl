{if $animace}
<p>
<img src="/animace/img/{$animace.obalka|escape}" style="width:98%;max-width:{$animace.sirka}px;" alt="{$animace.popis}" onClick="this.src='/animace/img/{$animace.img|escape}'" />
</p>
<p class="poznamka">Tuto animaci žonglování vytvořil program <a href="/software.html#juggleanim" title="Program JuggleAnim">JuggleAnim</a>.</p>
{/if}
{include file='animace-kamdal.tpl'}
