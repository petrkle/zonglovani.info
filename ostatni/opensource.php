<?php

require '../init.php';
require '../func.php';

$titulek = 'Zdrojový kód žonglérova slabikáře';
$smarty->assign('feedback', true);
$smarty->assign('titulek', $titulek);
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/o/octocat.png');
$smarty->assign('keywords', 'žonglérův slabikář, zdrojový kód, opensource');
$smarty->assign('description', 'Zdrojové soubory žonglérova slabikáře');

$dalsi = array(
    array('url' => 'https://github.com/petrkle/zonglovani.info', 'text' => 'github.com/petrkle/zonglovani.info', 'title' => 'Zdrojový kód žonglérova slabikáře'),
    );
$smarty->assign('dalsi', $dalsi);

$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('opensource.tpl');
$smarty->display('paticka.tpl');
