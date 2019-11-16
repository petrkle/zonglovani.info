<?php

require '../init.php';
require '../func.php';

$titulek = 'Ohnivé kužely';

$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', make_keywords($titulek).', fireshow');
$smarty->assign('description', 'Žonglování s ohnivými kužely.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/k/kuzely-firea.png');

$trail = new Trail();
$trail->addStep('Kužely', '/kuzely/');
$trail->addStep($titulek);

$dalsi = array(
    array('url' => '/kuzely/passing/', 'text' => 'Passing s kužely', 'title' => 'S ohněm jde i passovat'),
    );

$smarty->assign('dalsi', $dalsi);
$smarty->assign('trail', $trail->path);
$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-ohen.tpl');
$smarty->display('paticka.tpl');
