{if isset($dalsi)}

<div class="kamdal">
<a name="kam-dal"></a><h5>Kam dál</h5>
<ul>
{foreach from=$dalsi item=odkaz}
<li><a href="{$odkaz.url|escape}"{if isset($odkaz.title)} title="{$odkaz.title|escape}"{/if} class="{if preg_match('/^(http:\/\/|https:\/\/|\/g\/)/',$odkaz.url)}external {/if}wrap">{$odkaz.text|escape}</a></li>
{/foreach}
</ul>
</div>
{/if}
<!-- obsah konec -->
</div>

<div id="menu">

{vypismenu}

</div>

<!-- ramecek konec -->
</div>

{include file='paticka-common.tpl'}
