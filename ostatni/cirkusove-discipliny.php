<?php

require '../init.php';
require '../func.php';

$titulek = 'Cirkusové disciplíny';

$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', 'cirkus, cirgus,  žonglování, disciplíny');
$smarty->assign('description', 'Seznam cirkusových disciplín. Chůze po laně, jednokolka, chůdy i visutá hrazda jsou klasické cirkusové disciplíny.');

$trail = new Trail();
$trail->addStep('Informace o žonglování', '/ostatni.html');
$trail->addStep($titulek);

$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/c/cirkusg.png');

$dalsi = array(
    array('url' => '/druhy-zonglovani.html', 'text' => 'Druhy žonglování', 'title' => 'Přehled způsobů žonglování'),
    array('url' => '/nacini.html', 'text' => 'Žonglérské náčiní', 'title' => 'S čím vším se dá žonglovat'),
    array('url' => '/micky/jak-zacit.html', 'text' => 'Jak začít žonglovat s míčky', 'title' => 'Jak začít žonglovat s míčky'),
    );
$smarty->assign('dalsi', $dalsi);

$smarty->assign('trail', $trail->path);
$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-cirkusove-discipliny.tpl');
$smarty->display('paticka.tpl');
