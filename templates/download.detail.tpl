{if $downloads.$download_id}
<p><a href="{$downloads.$download_id.versions[0].filename|escape}" title="{$downloads.$download_id.versions[0].filename|escape}" rel="nofollow">{obrazek soubor="package-$download_id.png" popis=""}</a>{$downloads.$download_id.versions[0].description}</p>
{foreach from=$downloads.$download_id.versions item=release}
<h3><a href="{$release.filename|escape}" title="{$release.filename|escape}" rel="nofollow">{$release.filename|escape}</a></h3>
<p>{if $release.qr}<a href="{$release.filename|escape}" title="{$release.filename|escape}" rel="nofollow" >{obrazek soubor=$release.qr popis=$release.filename|escape}</a>{/if}
<ul{if $release.qr} class="szn"{/if}>
<li>Datum: {$release.date_hr|escape}</li>
<li>Verze: {$release.version|escape}</li>
<li>Velikost: {$release.size|escape}</li>
<li>md5sum: {$release.md5|escape}</li>
</ul>
</p>
{/foreach}
{/if}
{include file='paypal.tpl'}
