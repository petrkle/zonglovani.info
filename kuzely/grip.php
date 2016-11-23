<?php

require '../init.php';
require '../func.php';

$titulek = 'Dva kužely v jedné ruce';
$trail = new Trail();
$trail->addStep('Kužely', '/kuzely/');
$trail->addStep('Úchop');

$smarty->assign('trail', $trail->path);
$smarty->assign('keywords', 'dva, kužely, jedna, ruka');
$smarty->assign('description', 'Jak držet v jedné ruce dva kužely.');

$smarty->assign('titulek', $titulek);
$smarty->assign('feedback', true);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-grip.tpl');
$smarty->display('paticka.tpl');
