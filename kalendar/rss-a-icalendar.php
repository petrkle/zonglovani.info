<?php

require '../init.php';
require '../func.php';

$titulek = 'Nastavení RSS a iCalendar';
$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', 'rss, icalendar, ical, lightning, thunderbird, rss čtečka, žonglování, aktuality, novinky');
$smarty->assign('description', 'Přehledný návod pro nastavení RSS a iCalendar. Žádná žonglérská akce už ti neuteče.');

$trail = new Trail();
$trail->addStep('Kalendář', CALENDAR_URL);
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('kalendar-napoveda.tpl');
$smarty->display('paticka.tpl');
