<p>{$rozhovor.about.datum}</p>
{if $rozhovor.pre}
<p>
{if $rozhovor.pre.obrazek}{obrazek soubor=$rozhovor.pre.obrazek}{/if}
{$rozhovor.pre.text}
</p>
{/if}
{foreach from=$rozhovor.otazky item=otazka}
<h3>{$otazka.otazka}</h3>
<dl>
{foreach from=$otazka.odpovedi item=odpoved}
	<dt>{$odpoved.jmeno}</dt>
	<dd>{$odpoved.text}</dd>
{/foreach}
</dl>
{/foreach}

<p>
Díky za rozhovor.
</p>

{if $rozhovor.dalsi}
<div class="kamdal">
<a name="kam-dal"></a><h5>Kam dál</h5>
<ul>
{foreach from=$rozhovor.dalsi item=odkaz key=url}
<li><a href="{$url|escape}"{if $odkaz.title} title="{$odkaz.title|escape}"{/if}{if preg_match('/^(http:\/\/|\/g\/)/',$url)} class="external"  onclick="_gaq.push(['_trackPageview','/goto/{$url|replace:'http://':''|regex_replace:'/^www\./':''|regex_replace:'/^\//':''|escape}']);"{/if}>{$odkaz.text|escape}</a></li>
{/foreach}
</ul>
</div>
{/if}
