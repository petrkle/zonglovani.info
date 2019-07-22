<?php

require '../init.php';
require '../func.php';

$trail = new Trail();
$trail->addStep('Kužely', '/kuzely/');
$trail->addStep('Legenda');

$smarty->assign('keywords', 'žonglování, kužel, kužely, legenda, obrázky');
$smarty->assign('description', 'Legenda pro obrázkové návody na žonglování s kužely.');

$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->assign('trail', $trail->path);
$smarty->assign('titulek', 'Vysvětlivky k obrázkům - kužely');
$smarty->assign('nadpis', 'Vysvětlivky k obrázkům');
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-legenda.tpl');
$smarty->display('paticka.tpl');
