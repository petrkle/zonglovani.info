<?php

require '../init.php';
require '../func.php';
$titulek = 'PF 2016';
$smarty->assign('keywords', make_keywords($titulek).', žonglování');
$smarty->assign('description', 'Přání všeho nejlepšího v roce 2016');
$smarty->assign('titulek', $titulek);
$smarty->assign('feedback', true);
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/c/champagne.png');
$trail = new Trail();
$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$trail->addStep('Tip týdne', '/tip');
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-pf-2016.tpl');
$smarty->display('paticka.tpl');
