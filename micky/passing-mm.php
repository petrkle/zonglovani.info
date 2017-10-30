<?php

require '../init.php';
require '../func.php';

$titulek = 'Passing s míčky - mills\' mess';
$smarty->assign('feedback', true);

$smarty->assign('keywords', make_keywords($titulek));
$smarty->assign('description', 'Žonglování mills\' mess pro dva lidi.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/m/micky-passingmmb.png');

$smarty->assign('titulek', $titulek);

$trail = new Trail();
$trail->addStep('Míčky', '/micky/');
$trail->addStep($titulek);

$smarty->assign('trail', $trail->path);

$trik = nacti_trik('micky-passing-mm');

if ($trik['img_maxwidth'] > IMG_RESPONSIVE_WIDTH) {
    $smarty->assign('stylwidth', $trik['img_maxwidth']);
}

$smarty->assign('trik', $trik);

$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
