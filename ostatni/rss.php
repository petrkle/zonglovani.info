<?php

require '../init.php';
require '../func.php';

$titulek = 'RSS kanály';
$smarty->assign('feedback', true);

$smarty->assign('keywords', 'rss, kanály, žonglování, aktuality, nastavení');
$smarty->assign('description', 'Seznam RSS kanálů žonglérova slabikáře. Informace o novinkách na žonglérské scéně.');

$smarty->assign('titulek', $titulek);

$trail = new Trail();
$trail->addStep($titulek);

$dalsi = array(
    array('url' => CALENDAR_URL.'rss-a-icalendar.html#rss', 'text' => 'Návod, jak nastavit RSS', 'title' => 'Návod na nastavení speciálniho programu pro čtení RSS'),
    );
$smarty->assign('dalsi', $dalsi);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-rss.tpl');
$smarty->display('paticka.tpl');
