{if $animace}
<p>
<img src="/animace/siteswap/{$animace.siteswap|escape}.png" style="width:98%;max-width:{$animace.sirka}px;" alt="{$animace.siteswap}" class="anim_siteswap" onClick="this.src='/animace/siteswap/{$animace.siteswap|escape}.gif'" />
</p>
<p class="poznamka">Tuto animaci žonglování vytvořil program <a href="/software.html#juggleanim" title="Program JuggleAnim">JuggleAnim</a>.</p>
{/if}
{include file='animace-kamdal.tpl'}
