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
	<link rel="alternate" title="Aktualizace žonglérova slabikáře" href="http://{$smarty.server.SERVER_NAME}/ostatni/changelog.rss" type="application/rss+xml" />
{*{if isset($rsslink)}<link rel="alternate" title="" href="{$rsslink|escape}" type="application/rss+xml" />{/if}*}
{if isset($nahled)}
	<link rel="image_src" href="{$nahled|escape}" />
{/if}
	<link rel="search" type="application/opensearchdescription+xml" title="Žonglérův slabikář" href="http://{$smarty.server.SERVER_NAME}/vyhledavani/vyhledavani.xml" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="application-name" content="Žonglérův slabikář"/>
	<meta name="application-url" content="http://{$smarty.server.SERVER_NAME}"/>
	<link rel="icon" href="/img/s/slabikar-32.png" sizes="32x32"/>
	<link rel="icon" href="/img/s/slabikar-48.png" sizes="48x48"/>
	<meta name="msapplication-tooltip" content="Žonglérův slabikář"/>
	<meta name="msapplication-starturl" content="http://{$smarty.server.SERVER_NAME}"/>
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
<div class="horninudle">
{if $trail}
<p class="drobky">
Jste zde: {drobecky trail=$trail}
</p>
<div class="ucet">
{if $smarty.session.logged==true}<a href="{$smarty.const.LIDE_URL}{$smarty.session.uzivatel.login|escape}.html" title="Tvůj účet.">{$smarty.session.uzivatel.jmeno|escape}</a> ~ <a href="{$smarty.const.LIDE_URL}nastaveni/" title="Nastavení tvého účtu.">Nastavení</a> ~ <a href="{$smarty.const.LIDE_URL}odhlaseni.php" title="Odhlásit se">Odhlásit</a>{else}
{if basename($smarty.server.SCRIPT_NAME)!="prihlaseni.php"}<a href="{$smarty.const.LIDE_URL}prihlaseni.php{if $smarty.server.REQUEST_URI!="/"}?next={$smarty.server.REQUEST_URI|escape}{/if}" title="Přihlášení do žonglérova slabikáře" rel="nofollow">Přihlášení</a> ~ {/if}<a href="{$smarty.const.LIDE_URL}pravidla.php" title="Vytvořit nový účet v žonglérově slabikáři.">Nový účet</a>{/if}
{/if}
</div>
</div>
{if $smarty.session.logged==true and preg_match('/\.html/',$smarty.server.REQUEST_URI)}
<div class="hvezdicka">
{if isset($smarty.session.uzivatel.oblibene[$smarty.server.REQUEST_URI])}<a href="http://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}oblibene.php?remove&amp;url={$smarty.server.REQUEST_URI|escape}&amp;title={$titulek|escape}">{obrazek soubor='star.png' popisek='Odebrat z oblíbených stránek.'}</a>{else}<a href="http://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}oblibene.php?add&amp;url={$smarty.server.REQUEST_URI|escape}&amp;title={$titulek|escape}">{obrazek soubor='star-white.png' popisek='Přidat mezi oblíbené stránky.'}</a>{/if}
</div>
{/if}
