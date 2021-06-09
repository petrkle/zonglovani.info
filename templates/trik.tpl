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

{if isset($krok.animace)}
<!-- startebook -->
<p class="animace">
<a href="/animace/{$krok.animace|escape}.html" title="Animace">Přehrát animaci</a>
</p>
<!-- stopebook -->
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
