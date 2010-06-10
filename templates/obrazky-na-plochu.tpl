<p>
Tapety na plochu počítače s žonglérskou tématikou.
</p>
{if is_array($wallpapers)}
{foreach from=$wallpapers item=obrazek}
<p>
<a href="1024x768/{$obrazek.soubor}" title="{$obrazek.basename} rozlišení 1024x768" onclick="pageTracker._trackPageview('{$smarty.const.WALLPAPERS_URL}1021x768/{$obrazek.soubor}');"><img src="{$obrazek.nahled_url}" width="{$obrazek.nahled_sirka}" height="{$obrazek.nahled_vyska}" alt="{$obrazek.basename}"/></a>
</p>
<ul class="szn">
<li><a href="1024x768/{$obrazek.soubor}" title="{$obrazek.basename} rozlišení 1024x768" onclick="pageTracker._trackPageview('{$smarty.const.WALLPAPERS_URL}1021x768/{$obrazek.soubor}');">1024x768</a></li>
<li><a href="1280x800/{$obrazek.soubor}" title="{$obrazek.basename} rozlišení 1280x800" onclick="pageTracker._trackPageview('{$smarty.const.WALLPAPERS_URL}1280x800/{$obrazek.soubor}');">1280x800</a></li>
<li><a href="1280x1024/{$obrazek.soubor}" title="{$obrazek.basename} rozlišení 1280x1024" onclick="pageTracker._trackPageview('{$smarty.const.WALLPAPERS_URL}1280x1024/{$obrazek.soubor}');">1280x1024</a></li>
<li><a href="1680x1050/{$obrazek.soubor}" title="{$obrazek.basename} rozlišení 1680x1050" onclick="pageTracker._trackPageview('{$smarty.const.WALLPAPERS_URL}1680x1050/{$obrazek.soubor}');">1680x1050</a></li>
</ul>
{/foreach}
{/if}
