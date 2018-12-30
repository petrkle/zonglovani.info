<?php

require '../init.php';
require '../func.php';
$titulek = 'PF 2014';
$smarty->assign('keywords', make_keywords($titulek).', žonglování');
$smarty->assign('description', 'Přání všeho nejlepšího v roce 2014.');
$smarty->assign('titulek', $titulek);
$smarty->assign('feedback', true);
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/r/rum-kuzel.jpg');
$trail = new Trail();
$trail->addStep('Tip týdne', '/tip');
$trail->addStep($titulek);
$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-pf-2014.tpl');
$smarty->display('paticka.tpl');
