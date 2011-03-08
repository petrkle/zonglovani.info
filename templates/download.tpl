{if $downloads}
{foreach from=$poradi item=typ}

{if $downloads.$typ}
<a name="{$typ}"></a>
<h3><a href="{$downloads.$typ.versions[0].filename|escape}" title="{$downloads.$typ.versions[0].filename|escape}" onclick="pageTracker._trackPageview('/download/{$downloads.$typ.versions[0].filename|escape}');" rel="nofollow">{$downloads.$typ.versions[0].filename|escape}</a></h3>
<p><a href="{$downloads.$typ.versions[0].filename|escape}" title="{$downloads.$typ.versions[0].filename|escape}" onclick="pageTracker._trackPageview('/download/{$downloads.$typ.versions[0].filename|escape}');" rel="nofollow">{obrazek soubor=$downloads.$typ.versions[0].img popisek=$downloads.$typ.versions[0].filename}</a>{$downloads.$typ.versions[0].description}<br /><a href="{$typ}.html" title="Podrobnosti o ostažení {$typ}">Podrobnosti &raquo;</a></p>
{/if}

{/foreach}
{/if}
