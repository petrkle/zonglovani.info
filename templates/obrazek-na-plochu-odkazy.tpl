<p>
<a href="{if isset($obrazek.titulek) and !isset($DIRECT_LINK_TO_IMAGE)}{$obrazek.basename}.html" title="{$obrazek.titulek}"{else}1024x768/{$obrazek.soubor}" title="{$obrazek.basename}"{/if}><img src="{$obrazek.nahled_url}" class="photo" alt="{$obrazek.basename}"/></a>
</p>
<ul class="szn">
<li><a href="1024x768/{$obrazek.soubor}" title="{$obrazek.basename} rozlišení 1024x768">1024x768</a></li>
<li><a href="1280x800/{$obrazek.soubor}" title="{$obrazek.basename} rozlišení 1280x800">1280x800</a></li>
<li><a href="1280x1024/{$obrazek.soubor}" title="{$obrazek.basename} rozlišení 1280x1024">1280x1024</a></li>
<li><a href="1680x1050/{$obrazek.soubor}" title="{$obrazek.basename} rozlišení 1680x1050">1680x1050</a></li>
</ul>
