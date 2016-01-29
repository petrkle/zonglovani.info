{if $animace}
<p>
<img src="/animace/img/{$animace.img|escape}" class="photo" alt="{$animace.popis}"/>
</p>
<p class="poznamka">Tuto animaci žonglování vytvořil program <a href="/software.html#juggleanim" title="Program JuggleAnim">JuggleAnim</a>.</p>
{/if}
{include file='animace-kamdal.tpl'}
