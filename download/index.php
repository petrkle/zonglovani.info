<?php
require('../init.php');
require('../func.php');

$titulek='Soubory ke stažení';
$smarty->assign('titulek',$titulek);
$smarty->assign('robots','noindex,nofollow');
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/d/download.png');
$smarty->assign('description','Soubory ke stažení - žonglování.');

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('download.tpl');
$smarty->display('paticka.tpl');
?>
