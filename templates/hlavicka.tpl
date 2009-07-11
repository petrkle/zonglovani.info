<?xml version="1.0" encoding="iso-8859-2"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
	<title>{$titulek|escape}</title>
	<meta name="description" content="Žonglérův slabikář - obrázková učebnice žonglování." />
	<meta name="keywords" content="žongování, míčky, kruhy, kužely, návod, kaskáda, mills mess" />
	<style media="screen,projection" type="text/css">@import url(/zonglovani.css);</style>
	<style media="print" type="text/css">@import url(/zonglovani-tisk.css);</style>
	<meta name="robots" content="index,follow" />
	<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>

<div id="hlavicka">
<div id="ucet">
{if $smarty.session.logged==true}<a href="{$smarty.const.LIDE_URL}{$smarty.session.uzivatel.login|escape}.html" title="Tvůj účet.">{$smarty.session.uzivatel.jmeno|escape}</a> ~ <a href="{$smarty.const.LIDE_URL}nastaveni.php" title="Nastavení tvého účtu.">Nastavení</a> ~ <a href="{$smarty.const.LIDE_URL}odhlaseni.php" title="Odhlásit se">Odhlásit</a>{else}
{if basename($smarty.server.SCRIPT_NAME)!="prihlaseni.php"}<a href="{$smarty.const.LIDE_URL}prihlaseni.php{if $smarty.server.REQUEST_URI!="/"}?next={$smarty.server.REQUEST_URI}{/if}" title="Přihlášení do žonglérova slabikáře" rel="nofollow">Přihlášení</a> | {/if}<a href="{$smarty.const.LIDE_URL}pravidla.php" title="Vytvořit nový účet v žonglérově slabikáři.">Nový účet</a>{/if}
</div>
<a name="nahore" id="nahore"></a>
<div id="hlavickabg" style="background: {if eregi("/micky.*",$smarty.server.REQUEST_URI)}url('/img/m/micky-logo.gif') no-repeat 95% 100%{elseif eregi("/kruhy.*",$smarty.server.REQUEST_URI)}url('/img/k/kruhy-logo.gif') no-repeat 99% 100%{elseif eregi("/kuzely.*",$smarty.server.REQUEST_URI)}url('/img/k/kuzely-logo.gif') no-repeat 92% 100%{else}transparent{/if};">
<a href="/" title="Žonglérův slabikář - úvodní stránka."><img src="/img/l/logo.gif" width="442" height="71" title="Žonglérův slabikář - úvodní stránka." alt="Žonglérův slabikář - úvodní stránka." />
</a>
</div>
</div>

<div id="stranka">
<div id="ramecek">
<div id="obsah">

{if isset($titulek) and isset($nadpis)}
{if !isset($notitle)}
<h1>{$nadpis|escape}</h1>
{/if}
{else}
<h1>{$titulek|escape}</h1>

{/if}
