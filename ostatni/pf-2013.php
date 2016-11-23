<?php

require '../init.php';
require '../func.php';
$titulek = 'PF 2013';
$smarty->assign('keywords', make_keywords($titulek).', žonglování');
$smarty->assign('description', 'Přání všeho nejlepšího v roce 2013.');
$smarty->assign('titulek', $titulek);
$smarty->assign('feedback', true);
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/d/diabolo-ve-snehu.s.jpg');
$trail = new Trail();
$trail->addStep('Tip týdne', '/tip');
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-pf-2013.tpl');
$smarty->display('paticka.tpl');
