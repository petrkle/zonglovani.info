<?php

require '../init.php';
require '../func.php';

$titulek = 'Žonglování s míčky';
$smarty->assign('titulek', $titulek);
$smarty->assign('description', 'Míčky jsou nejjednodušší žonglérské náčiní. Snadno se hážou i chytají. I ty se můžeš naučit žonglovat za pár minut.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/m/micky-logo.png');

$trail = new Trail();
$trail->addStep('Míčky');
$smarty->assign('trail', $trail->path);
$smarty->assign('stylwidth', IMG_CSS_WIDTH);

$smarty->display('hlavicka.tpl');
$smarty->display('micky.tpl');
$smarty->display('paticka.tpl');
