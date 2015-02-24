<?php
require('../init.php');
require('../func.php');

$titulek='Míček z tenisáku';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep('Výroba míčků','/micky/vyroba.html');
$trail->addStep('Z tenisáku');

$smarty->assign('description','Návod na výrobu žonglérského míčku z tenisáku. Pěkný míček na žonglování snadno, rychle a levně.');
$smarty->assign('keywords','žonglování, míčky, výroba, tenisák');
$smarty->assign('nahled','https://www.'.$_SERVER['SERVER_NAME'].'/img/t/tenisak-v-balonku-3.s.jpg');

$trik=nacti_trik('micky-vyroba-tenisak');
$smarty->assign('trik',$trik);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
