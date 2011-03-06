{if $downloads.$download_id}
<p>{obrazek soubor="package-$download_id.png" popis=""}{$downloads.$download_id.versions[0].description}</p>
{foreach from=$downloads.$download_id.versions item=release}
<h3><a href="{$release.filename|escape}" title="{$release.filename|escape}" onclick="pageTracker._trackPageview('/download/{$release.filename|escape}');" rel="nofollow">{$release.filename|escape}</a></h3>
<ul>
<li>Datum: {$release.date_hr|escape}</li>
<li>Verze: {$release.version|escape}</li>
<li>Velikost: {$release.size|escape}</li>
<li>md5sum: {$release.md5|escape}</li>
</ul>
{/foreach}
{/if}
