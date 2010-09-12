{if $animace}
<p>
<img src="/animace/siteswap/{$animace.siteswap|escape}.gif" width="{$animace.sirka}" height="{$animace.vyska}" alt="{$animace.siteswap}" class="anim_siteswap" />
</p>
<p class="poznamka">Tuto animaci žonglování vytvořil program <a href="/software.html#juggleanim" title="Program JuggleAnim">JuggleAnim</a>.</p>
{/if}
{include file='animace-kamdal.tpl'}
