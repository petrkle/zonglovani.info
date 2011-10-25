{if $trik}
{foreach from=$trik.kroky item=krok name=postup}
{if isset($krok.nadpis)}
{if isset($krok.kotva)}<a name="{$krok.kotva}"></a>{assign var='zakotveno' value='jo'}{/if}<h2>{$krok.nadpis}</h2>
{else}
<p>
{/if}
{if isset($krok.obrazek)}
{if isset($krok.kotva) and !isset($zakotveno)}<a name="{$krok.kotva}"></a>{/if}
{if isset($krok.obrazek_src)}<a href="{$krok.obrazek_src|escape}">{/if}
{obrazek soubor=$krok.obrazek popisek=$trik.info[1]}
{if isset($krok.obrazek_src)}</a>{/if}
{/if}
{if isset($krok.popisek)}
{$krok.popisek}
{/if}
{if !isset($krok.nadpis)}
</p>
{/if}
{if isset($krok.pre)}
<pre>{$krok.pre}</pre>
{/if}

{if isset($krok.animace) and isset($krok.video)}
<!-- start -->
<p class="animace">
<a href="/animace/{$krok.animace|escape}.html" title="Animace" onkeydown="{jsanimace a=$krok.animace}" onclick="{jsanimace a=$krok.animace}"><img src="/img/a/animace.s.png" width="20" height="20" title="" alt="" /> Přehrát animaci</a>
</p>
<p class="animace">
<a href="/video/navod/{$krok.video|escape}.html" title="Video" onkeydown="{jsvideo v=$krok.video}" onclick="{jsvideo v=$krok.video}"><img src="/img/v/video.s.png" width="20" height="20" title="" alt="" /> Přehrát video</a>
</p>
<!-- stop -->
{/if}
{if isset($krok.animace) and !isset($krok.video)}
<!-- start -->
<p class="animace">
<a href="/animace/{$krok.animace|escape}.html" title="Animace" onkeydown="{jsanimace a=$krok.animace}" onclick="{jsanimace a=$krok.animace}">{obrazek soubor='animace.s.png' popisek=''} Přehrát animaci</a>
</p>
<!-- stop -->
{/if}
{if !isset($krok.animace) and isset($krok.video)}
<!-- start -->
<p class="animace">
<a href="/video/navod/{$krok.video|escape}.html" title="Video" onkeydown="{jsvideo v=$krok.video}" onclick="{jsvideo v=$krok.video}">{obrazek soubor='video.s.png' popisek=''} Přehrát video</a>
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
