<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>{$titulek|escape}</title>
	<meta name="description" content="{if isset($description)}{$description|escape}{elseif isset($nadpis)}{$nadpis|escape} - žonglérův slabikář{else}Žonglérův slabikář - obrázková učebnice žonglování.{/if}" />
	<meta name="keywords" content="{if isset($keywords)}{$keywords|escape}{else}žongování, míčky, kruhy, kužely, návod, kaskáda, mills mess{/if}" />
{if isset($icbm)}
	<meta name="ICBM" content="{$icbm|escape}" />
{/if}
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/zw.css" />
	<link rel="stylesheet" media="print" type="text/css" href="/zt.css" />
{if $styly}
{foreach from=$styly item=styl}
	<link rel="stylesheet" media="screen,projection" type="text/css" href="{$styl}" />
{/foreach}
{/if}
	<meta name="robots" content="{if isset($robots)}{$robots|escape}{else}index,follow{/if}" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="alternate" title="Žonglérův slabikář" href="http://{$smarty.server.SERVER_NAME}/zonglovani.rss" type="application/rss+xml" />
	<link rel="alternate" title="Obrázky žonglování" href="http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}/obrazky.rss" type="application/rss+xml" />
	<link rel="alternate" title="Kalendář žonglování" href="http://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}kalendar.rss" type="application/rss+xml" />
	<link rel="alternate" title="Tip týdne pro žongléry" href="http://{$smarty.server.SERVER_NAME}/tip/tip.rss" type="application/rss+xml" />
	<link rel="alternate" title="Diskuse o žonglování" href="http://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}/zpravy.rss" type="application/rss+xml" />
{if isset($nahled)}
	<link rel="image_src" href="{$nahled|escape}" />
{/if}
	<link rel="search" type="application/opensearchdescription+xml" title="Žonglérův slabikář" href="http://{$smarty.server.SERVER_NAME}/vyhledavani/vyhledavani.xml" />
	<meta http-equiv="imagetoolbar" content="no" />
</head>
<body>
