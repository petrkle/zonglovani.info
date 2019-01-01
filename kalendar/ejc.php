<?php

require '../init.php';
require '../func.php';

$titulek = 'EJC';
$smarty->assign('titulek', $titulek);
$smarty->assign('nadpis', 'EJC - evropské setkání žonglérů');

$smarty->assign('keywords', 'EJC, European juggling convention, evropské setkání žonglérů.');
$smarty->assign('description', 'Informace o evropském setkání žonglérů.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/e/ejc-2019-poster.png');

$trail = new Trail();
$trail->addStep('Kalendář', CALENDAR_URL);
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);
$smarty->assign('stylwidth', IMG_CSS_WIDTH);

$smarty->display('hlavicka.tpl');
$smarty->display('kalendar-ejc.tpl');
$smarty->display('paticka.tpl');
