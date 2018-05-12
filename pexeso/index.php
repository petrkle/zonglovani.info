<?php

require '../init.php';
require '../func.php';

$titulek = 'Žonglérské pexeso';

$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', 'pexeso, žonglování, tisk');
$smarty->assign('description', 'Speciální žonglérské pexeso');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/z/zonglerske-pexeso.jpg');

$dalsi = array(
    array('url' => '/micky/jak-zacit.html', 'text' => 'Jak začít žonglovat s míčky', 'title' => 'Návod na žonglování se třemi míčky'),
    array('url' => 'http://www.pexeso.net/zonglovani/05C7B', 'text' => 'Zahrát si žonglérské pexeso on-line', 'title' => 'pexeso.net'),
    );
$smarty->assign('dalsi', $dalsi);

$trail = new Trail();
$trail->addStep($titulek);

$smarty->assign('stylwidth', IMG_MAX_WIDTH);
$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('pexeso.tpl');
$smarty->display('paticka.tpl');
