<p>
Tapety na plochu počítače s žonglérskou tématikou.
</p>
{if is_array($wallpapers)}
{foreach from=$wallpapers item=obrazek}
<p>
<a href="1024x768/{$obrazek.soubor}" title="Rozlišení 1024x768"><img src="{$obrazek.nahled_url}" width="{$obrazek.nahled_sirka}" height="{$obrazek.nahled_vyska}" alt="{$obrazek.basename}"/></a>
</p>
<ul class="szn">
<li><a href="1024x768/{$obrazek.soubor}" title="Rozlišení 1024x768">1024x768</a></li>
<li><a href="1280x800/{$obrazek.soubor}" title="Rozlišení 1280x800">1280x800</a></li>
<li><a href="1280x1024/{$obrazek.soubor}" title="Rozlišení 1280x1024">1280x1024</a></li>
<li><a href="1600x1280/{$obrazek.soubor}" title="Rozlišení 1600x1280">1600x1280</a></li>
</ul>
{/foreach}
{/if}
