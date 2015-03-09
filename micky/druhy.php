<?php
require('../init.php');
require('../func.php');

$titulek='Žonglérské míčky';
$smarty->assign('keywords',make_keywords($titulek).', druhy');
$smarty->assign('description','Obrázky a popis různých druhů míčků na žonglování.');
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/s/sity-nahled.jpg');

$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);

$trik=nacti_trik('micky-druhy');
$smarty->assign('trik',$trik);

$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');


