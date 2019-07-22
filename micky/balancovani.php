<?php

require '../init.php';
require '../func.php';

$titulek = 'Balancování míčku';

$smarty->assign('titulek', $titulek);
$smarty->assign('keywords', make_keywords($titulek));
$smarty->assign('description', 'Odkládání míčku na hlavu, ruku i jinde. Trénink rovnováhy.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/b/balanca.png');

$trail = new Trail();
$trail->addStep('Míčky', '/micky/');
$trail->addStep($titulek);

$trik = nacti_trik('micky-balancovani');
if ($trik['img_maxwidth'] > IMG_RESPONSIVE_WIDTH) {
    $smarty->assign('stylwidth', $trik['img_maxwidth']);
}
$smarty->assign('trik', $trik);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
