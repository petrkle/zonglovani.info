<?php

require '../init.php';
require '../func.php';

$titulek = 'Balancování kuželu';

$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', 'balancování, kužel, brada, nos');
$smarty->assign('description', 'Balancování žonglérského kuželu na nose');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/k/kuzely-balanca.png');

$dalsi = array(
    array('url' => '/micky/balancovani.html', 'text' => 'Balancování míčku', 'title' => 'Balancování mičků'),
    );
$smarty->assign('dalsi', $dalsi);

$trail = new Trail();
$trail->addStep('Kužely', '/kuzely/');
$trail->addStep('Balancování');

$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-balanc.tpl');
$smarty->display('paticka.tpl');
