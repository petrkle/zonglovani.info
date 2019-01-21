<!DOCTYPE html>
<html lang="cs">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>{$titulek|escape}</title>
	<meta name="description" content="{if isset($description)}{$description|escape}{elseif isset($nadpis)}{$nadpis|escape} - žonglérův slabikář{else}Žonglérův slabikář - obrázková učebnice žonglování.{/if}" />
	<meta name="keywords" content="{if isset($keywords)}{$keywords|escape}{else}žongování, míčky, kruhy, kužely, návod, kaskáda, mills mess{/if}" />
{if isset($icbm)}
	<meta name="ICBM" content="{$icbm|escape}" />
{/if}
{include file='hlavicka-meta.tpl'}
	<link rel="stylesheet" media="screen" type="text/css" href="/plain-{$smarty.const.CSS_CHKSUM}.css" />
	<link rel="stylesheet" media="only screen and (-webkit-min-device-pixel-ratio: 2)" href="/plain-{$smarty.const.CSS_CHKSUM}.css" />
	<link rel="stylesheet" media="screen and (min-width: {$smarty.const.MAX_MOBILE_WIDTH}px)" type="text/css" href="/z-{$smarty.const.CSS_CHKSUM}.css" />
	<link rel="stylesheet" media="print" type="text/css" href="/zt-{$smarty.const.CSS_CHKSUM}.css" />
{if isset($stylwidth)}
	<link rel="stylesheet" media="screen" type="text/css" href="/css/width-{$stylwidth}-{$smarty.const.CSS_CHKSUM}.css" />
{/if}
{if isset($styly)}
{foreach from=$styly item=styl}
	<link rel="stylesheet" media="screen and (min-width: {$smarty.const.MAX_MOBILE_WIDTH}px)" type="text/css" href="/{$styl}-{$smarty.const.CSS_CHKSUM}.css" />
{/foreach}
{/if}
{if isset($custom_headers)}
{foreach from=$custom_headers item=hlavicka}
	{$hlavicka}
{/foreach}
{/if}
{if isset($hcard)}
	<link rel="profile" href="http://microformats.org/profile/hcard" />
{/if}
{if isset($hcalendar)}
	<link rel="profile" href="http://microformats.org/profile/hcalendar" />
{/if}
{if isset($nahled)}
	<link rel="image_src" href="{$nahled|escape}" />
	<link rel="previewimage" href="{$nahled|escape}" />
	<meta property="og:image" content="{$nahled|escape}" />
{else}
	<link rel="image_src" href="https://{$smarty.server.HTTP_HOST|escape}/img/l/logo.png" />
	<link rel="previewimage" href="https://{$smarty.server.HTTP_HOST|escape}/img/l/logo.png" />
	<meta property="og:image" content="https://{$smarty.server.HTTP_HOST|escape}/img/l/logo.png" />
{/if}

<meta property="og:title" content="{$titulek|escape}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://{$smarty.server.HTTP_HOST|escape}{$currenturl.path|escape}" />
<meta property="og:description" content="{if isset($description)}{$description|escape}{elseif isset($nadpis)}{$nadpis|escape} - žonglérův slabikář{else}Žonglérův slabikář - obrázková učebnice žonglování.{/if}" />

</head>
<body>
<div id="hlavicka">
<!-- start -->
<div id="ucet">{if isset($smarty.session.logged)}<a href="{$smarty.const.LIDE_URL}{$smarty.session.uzivatel.login|escape}.html" title="Tvůj účet.">{$smarty.session.uzivatel.jmeno|escape}</a> ~ <a href="{$smarty.const.LIDE_URL}nastaveni/" title="Nastavení tvého účtu.">Nastavení</a> ~ <a href="{$smarty.const.LIDE_URL}odhlaseni.php" title="Odhlásit se">Odhlásit</a>{else}
 {if basename($smarty.server.SCRIPT_NAME)!="prihlaseni.php"}<a href="{$smarty.const.LIDE_URL}prihlaseni.php{if $smarty.server.REQUEST_URI!="/"}?next={$currenturl.path|escape}{/if}" title="Přihlášení do žonglérova slabikáře" rel="nofollow">Přihlášení</a> ~ {/if}<a href="{$smarty.const.LIDE_URL}novy-ucet.php" title="Vytvořit nový účet v žonglérově slabikáři.">Založit účet</a>{/if}
</div>
<!-- stop -->
<a name="nahore" id="nahore"></a>
<div class="hlavickabg{if preg_match('/\/micky.*/',$smarty.server.REQUEST_URI)} hlm{elseif preg_match('/\/kruhy.*/',$smarty.server.REQUEST_URI)} hlkr{elseif preg_match('/\/kuzely.*/',$smarty.server.REQUEST_URI)} hlkz{elseif preg_match('/\/diabolo.*/',$smarty.server.REQUEST_URI)} hld{/if}">
<a href="/" title="Žonglérův slabikář - úvodní stránka." accesskey="2" id="zslogo"><h2>Žonglérův slabikář</h2></a>
</div>
</div>

<div id="stranka">
<div id="ramecek">
<div id="obsah">
{if isset($trail)}
<p class="drobky">
Jste zde: {drobecky trail=$trail}
</p>
{/if}
{if isset($titulek) and isset($nadpis)}
{if !isset($notitle)}
<h1>{$nadpis|escape}</h1>
{/if}
{else}
<h1>{$titulek|escape}</h1>
{/if}
