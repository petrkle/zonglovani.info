<?php
require('../init.php');
require('../func.php');

$titulek='Překulení kuželky přes hlavu';
$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Ladné překulení kuželu přes hlavu.');
$smarty->assign('nahled','https://www.'.$_SERVER['SERVER_NAME'].'/img/h/headrollc.png');

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep('Headrool');

$smarty->assign_by_ref('trail', $trail->path);

$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);

$trik=nacti_trik('kuzely-headroll');
$smarty->assign('trik',$trik);

$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
