<?php

require '../init.php';
require '../func.php';

$titulek = 'Žonglování s vajíčky';

$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', make_keywords($titulek).' ,vajíčka, vajíčko');
$smarty->assign('description', 'Jsou šišatá, křehká a nadělají spoustu nepořádku. Avšak, kdo by odolal?');

$trail = new Trail();
$trail->addStep('Míčky', '/micky/');
$trail->addStep($titulek);

$smarty->assign('trail', $trail->path);

$trik = nacti_trik('micky-vajicka');
if ($trik['img_maxwidth'] > IMG_RESPONSIVE_WIDTH) {
    $smarty->assign('stylwidth', $trik['img_maxwidth']);
}
$smarty->assign('trik', $trik);

$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
