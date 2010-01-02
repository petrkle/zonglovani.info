<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>{$titulek|escape}</title>
	<meta name="description" content="{if isset($description)}{$description|escape}{elseif isset($nadpis)}{$nadpis|escape} - žonglérův slabikář{else}Žonglérův slabikář - obrázková učebnice žonglování.{/if}" />
	<meta name="keywords" content="{if isset($keywords)}{$keywords|escape}{else}žongování, míčky, kruhy, kužely, návod, kaskáda, mills mess{/if}" />
	<style media="screen,projection" type="text/css">@import url(http://f.{$smarty.server.SERVER_NAME}/zonglovani-w.css);</style>
	<style media="print" type="text/css">@import url(http://f.{$smarty.server.SERVER_NAME}/zt.css);</style>
	<meta name="robots" content="{if isset($robots)}{$robots|escape}{else}index,follow{/if}" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="alternate" title="Žonglérův slabikář" href="http://{$smarty.server.SERVER_NAME}/zonglovani.rss" type="application/rss+xml" />
	<link rel="alternate" title="Obrázky žonglování" href="http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}/obrazky.rss" type="application/rss+xml" />
	<link rel="alternate" title="Kalendář žonglérských akcí" href="http://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}/kalendar.rss" type="application/rss+xml" />
	<link rel="alternate" title="Diskuse o žonglování" href="http://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}/zpravy.rss" type="application/rss+xml" />
	<link rel="alternate" title="Aktualizace žonglérova slabikáře" href="http://{$smarty.server.SERVER_NAME}/ostatni/changelog.rss" type="application/rss+xml" />
{*{if isset($rsslink)}<link rel="alternate" title="" href="{$rsslink|escape}" type="application/rss+xml" />{/if}*}
{if isset($nahled)}
	<link rel="image_src" href="{$nahled|escape}" />
{/if}
{if isset($icbm)}
	<link rel="ICBM" content="{$icbm|escape}" />
{/if}
</head>
<body>

<div id="hlavicka">
<div id="hlavickabg">
<a href="/" title="Žonglérův slabikář - úvodní stránka."><img src="/img/l/logo.gif" width="442" height="71" title="Žonglérův slabikář - úvodní stránka." alt="Žonglérův slabikář - úvodní stránka." />
</a>
</div>
</div>
<div id="stranka">
<div class="spacer">&nbsp;</div>
