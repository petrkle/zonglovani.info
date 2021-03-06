<?php

require '../init.php';
require '../func.php';
$titulek = 'Žonglování s kruhy';

$smarty->assign('titulek', $titulek);
$smarty->assign('keywords', make_keywords($titulek));
$smarty->assign('description', 'Návod na žonglování s kruhy.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/k/kruhy-logo.gif');

$trail = new Trail();
$trail->addStep('Kruhy', '/kruhy/');

$dalsi = array(
    array('url' => '/kuzely/', 'text' => 'Žonglování s kužely', 'title' => 'Jak žonglovat s kužely'),
    array('url' => '/kuzely/passing/', 'text' => 'Passing', 'title' => 'Žonglování ve více lidech'),
    );

$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/k/kruhy-logo.png');
$smarty->assign('dalsi', $dalsi);
$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kruhy.tpl');
$smarty->display('paticka.tpl');
