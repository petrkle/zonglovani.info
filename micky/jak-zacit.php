<?php

require '../init.php';
require '../func.php';

$titulek = 'Jak začít žonglovat s míčky';
$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', make_keywords($titulek));
$smarty->assign('description', 'Obrázkový návod na žonglování s míčky.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/z/zonglovania.png');

$trail = new Trail();
$trail->addStep('Míčky', '/micky/');
$trail->addStep($titulek);

$trik = nacti_trik('micky-jak-zacit');
if ($trik['img_maxwidth'] > IMG_RESPONSIVE_WIDTH) {
    $smarty->assign('stylwidth', $trik['img_maxwidth']);
}
$smarty->assign('trik', $trik);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
