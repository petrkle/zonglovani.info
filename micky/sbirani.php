<?php
require('../init.php');
require('../func.php');

$titulek='Sbírání spadlých míčků';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);
$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Sbírání spadlých žonglovacích míčků ze země.');
$smarty->assign('nahled','https://www.'.$_SERVER['SERVER_NAME'].'/img/m/micky-sbirania.png');

$smarty->assign_by_ref('trail', $trail->path);

$trik=nacti_trik('micky-sbirani');
$smarty->assign('trik',$trik);

$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
