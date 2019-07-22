<?php

require '../init.php';
require '../func.php';

$smarty->assign('titulek', 'Vysvětlivky k obrázkům - míčky');
$smarty->assign('nadpis', 'Vysvětlivky k obrázkům');

$smarty->assign('keywords', 'žonglování, míček, míčky, legenda, obrázky');
$smarty->assign('description', 'Legenda pro obrázkové návody na žonglování s míčky.');

$trail = new Trail();
$trail->addStep('Míčky', '/micky/');
$trail->addStep('Legenda');

$trik = nacti_trik('micky-legenda');
if ($trik['img_maxwidth'] > IMG_RESPONSIVE_WIDTH) {
    $smarty->assign('stylwidth', $trik['img_maxwidth']);
}
$smarty->assign('trik', $trik);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
