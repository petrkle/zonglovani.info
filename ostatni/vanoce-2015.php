<?php

require '../init.php';
require '../func.php';
$titulek = 'Veselé Vánoce';
$smarty->assign('titulek', $titulek.' 2015');
$smarty->assign('nadpis', $titulek);
$smarty->assign('keywords', make_keywords($titulek).', žonglování');
$smarty->assign('description', 'Veselé Vánoce 2015 všem žonglérkám a žonglérům.');
$smarty->assign('feedback', true);
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/s/snowman.png');
$trail = new Trail();
$trail->addStep('Tip týdne', '/tip');
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);
$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-vanoce-2015.tpl');
$smarty->display('paticka.tpl');
