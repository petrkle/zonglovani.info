<p>
<a href="{if $obrazek.titulek and !$DIRECT_LINK_TO_IMAGE}{$obrazek.basename}.html" title="{$obrazek.titulek}"{else}1024x768/{$obrazek.soubor}" title="{$obrazek.basename}" onclick="_gaq.push(['_trackPageview','{$smarty.const.WALLPAPERS_URL}1024x768/{$obrazek.soubor}']);"{/if}><img src="{$obrazek.nahled_url}" width="{$obrazek.nahled_sirka}" height="{$obrazek.nahled_vyska}" alt="{$obrazek.basename}"/></a>
</p>
<ul class="szn">
<li><a href="1024x768/{$obrazek.soubor}" title="{$obrazek.basename} rozlišení 1024x768" onclick="_gaq.push(['_trackPageview','{$smarty.const.WALLPAPERS_URL}1024x768/{$obrazek.soubor}']);">1024x768</a></li>
<li><a href="1280x800/{$obrazek.soubor}" title="{$obrazek.basename} rozlišení 1280x800" onclick="_gaq.push(['_trackPageview','{$smarty.const.WALLPAPERS_URL}1280x800/{$obrazek.soubor}']);">1280x800</a></li>
<li><a href="1280x1024/{$obrazek.soubor}" title="{$obrazek.basename} rozlišení 1280x1024" onclick="_gaq.push(['_trackPageview','{$smarty.const.WALLPAPERS_URL}1280x1024/{$obrazek.soubor}']);">1280x1024</a></li>
<li><a href="1680x1050/{$obrazek.soubor}" title="{$obrazek.basename} rozlišení 1680x1050" onclick="_gaq.push(['_trackPageview','{$smarty.const.WALLPAPERS_URL}1680x1050/{$obrazek.soubor}']);">1680x1050</a></li>
</ul>
