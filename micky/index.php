<?php

require '../init.php';
require '../func.php';

$titulek = 'Žonglování s míčky';
$smarty->assign('feedback', true);
$smarty->assign('titulek', $titulek);
$smarty->assign('description', 'Míčky jsou nejjednodušší žonglérské náčiní. Snadno se hážou i chytají. I ty se můžeš naučit žonglovat za pár minut.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/n/nacinia.png');

$trail = new Trail();
$trail->addStep('Míčky');
$smarty->assign('trail', $trail->path);
$smarty->assign('stylwidth', IMG_MAX_WIDTH);

$smarty->display('hlavicka.tpl');
$smarty->display('micky.tpl');
$smarty->display('paticka.tpl');
