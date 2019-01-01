<?php

require '../init.php';
require '../func.php';
$titulek = 'PF 2019';
$smarty->assign('keywords', make_keywords($titulek).', žonglování');
$smarty->assign('description', 'Přání všeho nejlepšího v roce 2019');
$smarty->assign('titulek', $titulek);
$smarty->assign('feedback', true);
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/c/crystal-ball.jpg');
$trail = new Trail();
$trail->addStep('Tip týdne', '/tip');
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);
$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-pf-2019.tpl');
$smarty->display('paticka.tpl');