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
{/foreach}
{if $trik.anim}
<!-- start -->
<p class="animace"><a href="/animace/{$trik.anim.id|escape}.html" title="Animace">{obrazek soubor='animace.png' popisek=''} Přehrát animaci</a></p>
<!-- stop -->
{/if}
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
