<?php
require('../init.php');
require('../func.php');

$titulek='Další informace o žonglování';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$smarty->assign('keywords','žonglování, informace, jak žonglovat, žongléři');
$smarty->assign('description','Podrobnější informace o žonglování, literatura, odkazy i obrázky na plochu.');

$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/s/software.jpg');

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni.tpl');
$smarty->display('paticka.tpl');
