<?php
require('../init.php');
require('../func.php');

$titulek='Balancování míčku';
$smarty->assign('feedback',true);

$smarty->assign('titulek',$titulek);
$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Odkládání míčku na hlavu, ruku i jinde. Trénink rovnováhy.');
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/b/balanca.png');

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);

$trik=nacti_trik('micky-balancovani');
$smarty->assign('trik',$trik);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
