<?php

require '../init.php';
require '../func.php';

$titulek = 'Siteswap - popis žonglování pomocí čísel';
$smarty->assign('description', 'Siteswap je popis žonglování pomocí čísel. Jsou to vlastně takové noty pro žonglování.');
$smarty->assign('keywords', make_keywords($titulek));
$smarty->assign('nadpis', 'Siteswap');


$smarty->assign('titulek', $titulek);

$dalsi = array(
    array('url' => '/animace/siteswap/', 'text' => 'Animace siteswapů', 'title' => 'Animace žonglérských siteswapů'),
    array('url' => '/software.html', 'text' => 'Simulátory žonglování', 'title' => 'Počítačové programy které kreslí animace žonglování.'),
    array('url' => '/literatura.html', 'text' => 'Knížky o žonglování', 'title' => 'Seznam knížek o žonglování.'),
    );
$smarty->assign('dalsi', $dalsi);

$trail = new Trail();
$trail->addStep('Informace o žonglování', '/ostatni.html');
$trail->addStep($titulek);

$smarty->assign('trail', $trail->path);
$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-siteswap.tpl');
$smarty->display('paticka.tpl');
