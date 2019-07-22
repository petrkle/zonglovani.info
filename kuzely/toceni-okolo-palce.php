<?php

require '../init.php';
require '../func.php';
$titulek = 'Otáčení kuželky okolo palce';
$trail = new Trail();
$trail->addStep('Kužely', '/kuzely/');
$trail->addStep('Točení okolo palce');

$smarty->assign('keywords', make_keywords($titulek));
$smarty->assign('description', 'Otáčení s kužekou okolo palce.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/t/tocenib.png');

$smarty->assign('trail', $trail->path);

$smarty->assign('titulek', $titulek);

$trik = nacti_trik('kuzely-toceni-okolo-palce');
if ($trik['img_maxwidth'] > IMG_RESPONSIVE_WIDTH) {
    $smarty->assign('stylwidth', $trik['img_maxwidth']);
}
$smarty->assign('trik', $trik);

$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
