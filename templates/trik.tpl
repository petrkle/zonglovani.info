{if $trik}
{foreach from=$trik.kroky item=krok name=postup}
{if isset($krok.nadpis)}
{if isset($krok.kotva)}<a name="{$krok.kotva}"></a>{assign var='zakotveno' value='jo'}{/if}<h2>{$krok.nadpis}</h2>
{/if}
{if isset($krok.popisek)}
{/if}
{if isset($krok.obrazek)}
<p>
{if isset($krok.kotva) and !isset($zakotveno)}<a name="{$krok.kotva}"></a>{/if}
{if isset($krok.obrazek_src)}<a href="{$krok.obrazek_src|escape}">{/if}{obrazek soubor=$krok.obrazek}{if isset($krok.obrazek_src)}</a>{/if}
</p>
{/if}
{if isset($krok.popisek)}
<p>
{$krok.popisek}
</p>
{/if}
{if isset($krok.popisek)}
{/if}
{if isset($krok.pre)}
<pre>{$krok.pre}</pre>
{/if}

{if isset($krok.animace) and isset($krok.video)}
<!-- startebook -->
<p class="animace">
<a href="/animace/{$krok.animace|escape}.html" title="Animace"><img src="/img/a/animace.s.png" width="20" height="20" title="" alt="" /> Přehrát animaci</a>
</p>
<!-- stopebook -->
<!-- start -->
<p class="animace">
<a href="/video/navod/{$krok.video|escape}.html" title="Video"><img src="/img/v/video.s.png" width="20" height="20" title="" alt="" /> Přehrát video</a>
</p>
<!-- stop -->
{/if}
{if isset($krok.animace) and !isset($krok.video)}
<!-- startebook -->
<p class="animace">
<a href="/animace/{$krok.animace|escape}.html" title="Animace">{obrazek soubor='animace.s.png' popisek=''} Přehrát animaci</a>
</p>
<!-- stopebook -->
{/if}
{if !isset($krok.animace) and isset($krok.video)}
<!-- start -->
<p class="animace">
<a href="/video/navod/{$krok.video|escape}.html" title="Video">{obrazek soubor='video.s.png' popisek=''} Přehrát video</a>
</p>
<!-- stop -->
{/if}

{/foreach}
{if isset($trik.dalsi)}

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
