<?php

require '../init.php';
require '../func.php';

$titulek = 'Žonglování poslepu';

$smarty->assign('keywords', make_keywords($titulek));
$smarty->assign('description', 'Popis jak se naučit žonglovat poslepu. Bez koukání.');

$smarty->assign('titulek', $titulek);

$trail = new Trail();
$trail->addStep('Míčky', '/micky/');
$trail->addStep($titulek);

$smarty->assign('trail', $trail->path);

$trik = nacti_trik('micky-poslepu');
if ($trik['img_maxwidth'] > IMG_RESPONSIVE_WIDTH) {
    $smarty->assign('stylwidth', $trik['img_maxwidth']);
}
$smarty->assign('trik', $trik);

$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
