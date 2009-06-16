<?xml version="1.0" encoding="iso-8859-2"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
	<title>{$titulek|escape}</title>
	<meta name="description" content="�ongl�r�v slabik�� - obr�zkov� u�ebnice �onglov�n�." />
	<meta name="keywords" content="�ongov�n�, m��ky, kruhy, ku�ely, n�vod, kask�da, mills mess" />
	<style media="screen,projection" type="text/css">@import url(/zonglovani.css);</style>
	<style media="print" type="text/css">@import url(/zonglovani-tisk.css);</style>
	<meta name="robots" content="index,follow" />
	<link rel="shortcut icon" href="/favicon.ico">
</head>
<body>

<div id="hlavicka">
<a name="nahore" id="nahore"></a>
<div style="background: url('/img/k/kalendar.png') no-repeat 95% 0;">
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
