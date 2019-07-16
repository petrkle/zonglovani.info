<?php

require '../init.php';
require '../func.php';

$titulek = 'Žonglování na síti';
$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', make_keywords($titulek).', odkazy');
$smarty->assign('description', 'Odkazy na další dobré stránky o žonglování.');

$dalsi = array(
    array('url' => '/literatura.html', 'text' => 'Literatura o žonglování', 'title' => 'Čtení o žonglování'),
    );
$smarty->assign('dalsi', $dalsi);

$trail = new Trail();
$trail->addStep('Informace o žonglování', '/ostatni.html');
$trail->addStep('Odkazy');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/w/www.png');
$smarty->assign('stylwidth', IMG_CSS_WIDTH);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-odkazy.tpl');
$smarty->display('paticka.tpl');
