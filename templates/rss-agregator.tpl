<p>
Přehled novinek na stránkách o žonglování.
</p>
<!-- start -->
{include file='tip.plain.tpl'}
<!-- stop -->
{if $novinky}
{foreach from=$novinky item=novinka}
<h5>{$novinka.titulek}</a></h5>
<p class="wrap">{$novinka.description|strip_tags|escape}</p>
<ul>
<li>Datum: {$novinka.time_hr|escape}</li>
</ul>
{/foreach}
{/if}
