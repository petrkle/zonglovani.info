<?php

require '../init.php';
require '../func.php';
$titulek = 'Veselé Vánoce';
$smarty->assign('titulek', $titulek.' 2011');
$smarty->assign('nadpis', $titulek);
$smarty->assign('keywords', make_keywords($titulek).', žonglování');
$smarty->assign('description', 'Veselé Vánoce 2011 všem žonglérkám a žonglérům.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/d/diabolo-sipek.jpg');
$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$trail = new Trail();
$trail->addStep('Tip týdne', '/tip');
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-vanoce-2011.tpl');
$smarty->display('paticka.tpl');
