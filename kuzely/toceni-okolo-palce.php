<?php
require('../init.php');
require('../func.php');
$titulek='Otáčení kuželky okolo palce';
$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep('Točení okolo palce');

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Otáčení s kužekou okolo palce.');
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/t/tocenib.png');

$smarty->assign_by_ref('trail', $trail->path);

$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);

$trik=nacti_trik('kuzely-toceni-okolo-palce');
$smarty->assign('trik',$trik);

$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
