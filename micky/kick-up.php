<?php

require '../init.php';
require '../func.php';

$titulek = 'Zvednutí míčku nohou';
$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', 'žonglování, míčky, kick-up, zvedání, zvednutí');
$smarty->assign('description', 'Jak nohou zvednout míček spadlý při žonglování.');

$trail = new Trail();
$trail->addStep('Míčky', '/micky/');
$trail->addStep($titulek);

$trik = nacti_trik('micky-kick-up');
if ($trik['img_maxwidth'] > IMG_RESPONSIVE_WIDTH) {
    $smarty->assign('stylwidth', $trik['img_maxwidth']);
}
$smarty->assign('trik', $trik);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
