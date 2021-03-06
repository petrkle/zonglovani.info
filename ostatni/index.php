<?php

require '../init.php';
require '../func.php';

$titulek = 'Další informace o žonglování';
$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', 'žonglování, informace, jak žonglovat, žongléři');
$smarty->assign('description', 'Podrobnější informace o žonglování, literatura, odkazy i obrázky na plochu.');

$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/j/jongl.jpg');

$trail = new Trail();
$trail->addStep('Informace o žonglování', '/ostatni.html');

$smarty->assign('trail', $trail->path);
$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni.tpl');
$smarty->display('paticka.tpl');
