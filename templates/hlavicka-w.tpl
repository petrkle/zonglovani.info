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
{include file='hlavicka-meta.tpl'}
	<link rel="stylesheet" media="screen" type="text/css" href="/plain-{$smarty.const.CSS_CHKSUM}.css" />
	<link rel="stylesheet" media="screen and (min-width: 610px)" type="text/css" href="/zw-{$smarty.const.CSS_CHKSUM}.css" />
	<link rel="stylesheet" media="only screen and (-webkit-min-device-pixel-ratio: 2)" href="/plain-{$smarty.const.CSS_CHKSUM}.css" />
	<link rel="stylesheet" media="print" type="text/css" href="/zt-{$smarty.const.CSS_CHKSUM}.css" />
{if $mobilemapa}
	<link rel="stylesheet" media="screen" type="text/css" href="/m.mobile-{$smarty.const.CSS_CHKSUM}.css" />
{/if}
<!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="/zw-{$smarty.const.CSS_CHKSUM}.css">
<![endif]-->
{if $styly}
{foreach from=$styly item=styl}
	<link rel="stylesheet" media="screen and (min-width: 610px)" type="text/css" href="/{$styl}-{$smarty.const.CSS_CHKSUM}.css" />
<!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="/{$styl}-{$smarty.const.CSS_CHKSUM}.css">
<![endif]-->
{/foreach}
{/if}
{if $custom_headers}
{foreach from=$custom_headers item=hlavicka}
	{$hlavicka}
{/foreach}
{/if}
{if isset($nahled)}
	<link rel="image_src" href="{$nahled|escape}" />
	<link rel="previewimage" href="{$nahled|escape}" />
{/if}

</head>
<body>

<div class="ucet">
{if $smarty.session.logged==true}{if isset($smarty.session.changes)}<a href="/changes.html" title="Novinky v žonglérově slabikáři">Novinky{if $smarty.session.changes_pocet} ({$smarty.session.changes_pocet}){/if}</a> ~ {/if}<a href="{$smarty.const.LIDE_URL}{$smarty.session.uzivatel.login|escape}.html" title="Tvůj účet.">{$smarty.session.uzivatel.jmeno|escape}</a> ~ <a href="{$smarty.const.LIDE_URL}nastaveni/" title="Nastavení tvého účtu.">Nastavení</a> ~ <a href="{$smarty.const.LIDE_URL}odhlaseni.php" title="Odhlásit se">Odhlásit</a>{else}
{if basename($smarty.server.SCRIPT_NAME)!="prihlaseni.php"}<a href="{$smarty.const.LIDE_URL}prihlaseni.php{if $smarty.server.REQUEST_URI!="/"}?next={$smarty.server.REQUEST_URI|escape}{/if}" title="Přihlášení do žonglérova slabikáře" rel="nofollow">Přihlášení</a> ~ {/if}<a href="{$smarty.const.LIDE_URL}novy-ucet.php" title="Vytvořit nový účet v žonglérově slabikáři.">Založit účet</a>{/if}
</div>
<div id="hlavicka">
<div id="hlavickabg">
<a href="/" title="Žonglérův slabikář - úvodní stránka." accesskey="2" id="zslogo"><h2>Žonglérův slabikář</h2></a>
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
{/if}
</div>
{if $smarty.session.logged==true and preg_match('/\.html/',$smarty.server.REQUEST_URI)}
<div class="hvezdicka">
{if isset($smarty.session.uzivatel.oblibene[$smarty.server.REQUEST_URI])}<a href="http://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}oblibene.php?remove&amp;url={$smarty.server.REQUEST_URI|escape}&amp;title={$titulek|escape}">{obrazek soubor='star.png' popisek='Odebrat z oblíbených stránek.'}</a>{else}<a href="http://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}oblibene.php?add&amp;url={$smarty.server.REQUEST_URI|escape}&amp;title={$titulek|escape}">{obrazek soubor='star-white.png' popisek='Přidat mezi oblíbené stránky.'}</a>{/if}
</div>
{/if}
