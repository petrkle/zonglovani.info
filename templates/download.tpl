{include file='paypal.tpl'}
{if $downloads}
{foreach from=$poradi item=typ}
{if $downloads.$typ and !$hidden.$typ}
<a name="{$typ}"></a>
<h3><a href="{$downloads.$typ.versions[0].filename|escape}" title="{$downloads.$typ.versions[0].filename|escape}" onclick="_gaq.push(['_trackPageview','/download/{$downloads.$typ.versions[0].filename|escape}']);" rel="nofollow">{$downloads.$typ.versions[0].filename|escape}</a></h3>
<p><a href="{$downloads.$typ.versions[0].filename|escape}" title="{$downloads.$typ.versions[0].filename|escape}" onclick="_gaq.push(['_trackPageview','/download/{$downloads.$typ.versions[0].filename|escape}']);" rel="nofollow">{obrazek soubor=$downloads.$typ.versions[0].img popisek=$downloads.$typ.versions[0].filename}</a>{$downloads.$typ.versions[0].description}</p>
<ul class="szn">
<li>Velikost: {$downloads.$typ.versions[0].size|escape}</li>
<li>Licence: <a href="licence.html" title="CC BY-ND 3.0 - soubor smíte šířit.">CC BY-ND</a></li>
<li><a href="{$typ}.html" title="Podrobnosti o ostažení {$typ}">Podrobnosti &raquo;</a></li>
</ul>
{if $typ == 'mobi'}
{include file='android.tpl'}
{/if}
{/if}

{/foreach}
{/if}
<a name="wallpaper"></a>
<h3><a href="{$smarty.const.WALLPAPERS_URL}" title="Žonglérské obrázky na plochu.">Obrázky na plochu</a></h3>
<p><a href="{$smarty.const.WALLPAPERS_URL}" title="Žonglérské obrázky na plochu."><img src="/obrazky-na-plochu/nahledy/pes-a-micek.jpg" /></a>Tapety na plochu počítače s žonglérskou tématikou.</p>
