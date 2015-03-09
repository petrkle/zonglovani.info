<?php
require('../init.php');
require('../func.php');

$titulek='Míček z balónků';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep('Výroba míčků','/micky/vyroba.html');
$trail->addStep('Z balónků');

$smarty->assign('description','Návod na výrobu žonglérského míčku z nafukovacích balónků. Pěkný míček na žonglování snadno, rychle a levně.');
$smarty->assign('keywords','žonglování, míčky, výroba, nafukovací balónky');
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/b/balonky-na-vyrobu-micku.s.jpg');

$trik=nacti_trik('micky-vyroba-balonky');
$smarty->assign('trik',$trik);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
