{if $trik}
{foreach from=$trik.kroky item=krok name=postup}
{if isset($krok.nadpis)}
{if isset($krok.kotva)}<a name="{$krok.kotva}"></a>{assign var='zakotveno' value='jo'}{/if}<h2>{$krok.nadpis}</h2>
{/if}
<p>
{if isset($krok.obrazek)}
{if isset($krok.kotva) and !isset($zakotveno)}<a name="{$krok.kotva}"></a>{/if}
{obrazek soubor=$krok.obrazek popisek=$trik.info[1]}
{/if}
{if isset($krok.popisek)}
{$krok.popisek}
{/if}
</p>
{if isset($krok.pre)}
<pre>{$krok.pre}</pre>
{/if}

{if isset($krok.animace) and isset($krok.video)}
<!-- start -->
<p class="animace">
<a href="/animace/{$krok.animace|escape}.html" title="Animace">{obrazek soubor='animace.png' popisek=''} Přehrát animaci</a> nebo <a href="/video/navod/{$krok.video|escape}.html" title="Video">video</a>.
</p>
<!-- stop -->
{/if}
{if isset($krok.animace) and !isset($krok.video)}
<!-- start -->
<p class="animace">
<a href="/animace/{$krok.animace|escape}.html" title="Animace">{obrazek soubor='animace.png' popisek=''} Přehrát animaci</a>
</p>
<!-- stop -->
{/if}
{if !isset($krok.animace) and isset($krok.video)}
<!-- start -->
<p class="animace">
<a href="/video/navod/{$krok.video|escape}.html" title="Video" onclick="this.parentNode.innerHTML='{jsvideo v=$krok.video}';return false;">{obrazek soubor='animace.png' popisek=''} Přehrát video</a>
</p>
<!-- stop -->
{/if}

{/foreach}
{if $trik.dalsi}


<div class="kamdal">
<a name="kam-dal"></a><h5>Kam dál</h5>
<ul>
{foreach from=$trik.dalsi item=odkaz key=url}
<li><a href="{$url|escape}"{if $odkaz.title} title="{$odkaz.title|escape}"{/if}>{$odkaz.text|escape}</a></li>
{/foreach}
</ul>
</div>
{/if}
{/if}
