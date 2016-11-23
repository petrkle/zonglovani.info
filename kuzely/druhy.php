<?php

require '../init.php';
require '../func.php';

$titulek = 'Druhy kuželů';

$smarty->assign('titulek', $titulek);

$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/k/kuzelka-albatros-s.jpg');
$smarty->assign('keywords', make_keywords($titulek));
$smarty->assign('description', 'Druhy žonglérských kuželů.');

$dalsi = array(
    array('url' => '/micky/druhy.html', 'text' => 'Žonglovací míčky', 'title' => 'Druhy míčků na žonglování.'),
    );
$smarty->assign('dalsi', $dalsi);

$trail = new Trail();
$trail->addStep('Kužely', '/kuzely/');
$trail->addStep($titulek);

$smarty->assign('trail', $trail->path);

$smarty->assign('feedback', true);

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-druhy.tpl');
$smarty->display('paticka.tpl');
