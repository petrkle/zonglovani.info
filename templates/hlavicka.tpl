<?xml version="1.0" encoding="iso-8859-2"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
	<title>{$titulek|escape}</title>
	<meta name="description" content="{if isset($description)}{$description|escape}{elseif isset($nadpis)}{$nadpis|escape} - �ongl�r�v slabik��{else}�ongl�r�v slabik�� - obr�zkov� u�ebnice �onglov�n�.{/if}" />
	<meta name="keywords" content="{if isset($keywords)}{$keywords|escape}{else}�ongov�n�, m��ky, kruhy, ku�ely, n�vod, kask�da, mills mess{/if}" />
	<style media="screen,projection" type="text/css">@import url(/zonglovani.css);</style>
	<style media="print" type="text/css">@import url(/zonglovani-tisk.css);</style>
	<meta name="robots" content="{if isset($robots)}{$robots|escape}{else}index,follow{/if}" />
  <link rel="shortcut icon" href="/favicon.ico" />
	{if isset($rsslink)}<link rel="alternate" title="" href="{$rsslink|escape}" type="application/rss+xml" />{/if}
	{if isset($nahled)}<link rel="image_src" href="{$nahled|escape}" />{/if}
</head>
<body>

<div id="hlavicka">
<div id="ucet">
{if $smarty.session.logged==true}<a href="{$smarty.const.LIDE_URL}{$smarty.session.uzivatel.login|escape}.html" title="Tv�j ��et.">{$smarty.session.uzivatel.jmeno|escape}</a> ~ <a href="{$smarty.const.LIDE_URL}nastaveni.php" title="Nastaven� tv�ho ��tu.">Nastaven�</a> ~ <a href="{$smarty.const.LIDE_URL}odhlaseni.php" title="Odhl�sit se">Odhl�sit</a>{else}
{if basename($smarty.server.SCRIPT_NAME)!="prihlaseni.php"}<a href="{$smarty.const.LIDE_URL}prihlaseni.php{if $smarty.server.REQUEST_URI!="/"}?next={$smarty.server.REQUEST_URI}{/if}" title="P�ihl�en� do �ongl�rova slabik��e" rel="nofollow">P�ihl�en�</a> | {/if}<a href="{$smarty.const.LIDE_URL}pravidla.php" title="Vytvo�it nov� ��et v �ongl�rov� slabik��i.">Nov� ��et</a>{/if}
</div>
<a name="nahore" id="nahore"></a>
<div id="hlavickabg" style="background: {if eregi("/micky.*",$smarty.server.REQUEST_URI)}url('/img/m/micky-logo.gif') no-repeat 95% 100%{elseif eregi("/kruhy.*",$smarty.server.REQUEST_URI)}url('/img/k/kruhy-logo.gif') no-repeat 99% 100%{elseif eregi("/kuzely.*",$smarty.server.REQUEST_URI)}url('/img/k/kuzely-logo.gif') no-repeat 92% 100%{else}transparent{/if};">
<a href="/" title="�ongl�r�v slabik�� - �vodn� str�nka."><img src="/img/l/logo.gif" width="442" height="71" title="�ongl�r�v slabik�� - �vodn� str�nka." alt="�ongl�r�v slabik�� - �vodn� str�nka." />
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
