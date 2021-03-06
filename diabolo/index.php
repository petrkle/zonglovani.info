<?php

require '../init.php';
require '../func.php';

$titulek = 'Diabolo';

$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', 'diablolo, žonglování');
$smarty->assign('description', 'Návody na žonglování s diabolem.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/n/nacinif.png');

$trail = new Trail();
$trail->addStep($titulek);

$smarty->assign('trail', $trail->path);
$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->display('hlavicka.tpl');
$smarty->display('diabolo.tpl');
$smarty->display('paticka.tpl');
