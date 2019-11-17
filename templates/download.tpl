{if isset($downloads)}
{foreach from=$poradi item=typ}
{if isset($downloads.$typ) and !isset($hidden.$typ)}
<a name="{$typ}"></a>
<h3><a href="{$downloads.$typ.versions[0].filename|escape}" title="{$downloads.$typ.versions[0].filename|escape}" rel="nofollow">{$downloads.$typ.versions[0].filename|escape}</a></h3>
<p><a href="{$downloads.$typ.versions[0].filename|escape}" title="{$downloads.$typ.versions[0].filename|escape}" rel="nofollow">{obrazek soubor=$downloads.$typ.versions[0].img popisek=$downloads.$typ.versions[0].filename}</a>{$downloads.$typ.versions[0].description}</p>
{if $typ == 'mobi'}
{include file='android.tpl'}
{include file='pexeso-download.tpl'}
{/if}
{/if}

{/foreach}
{/if}
