<?php
require('../init.php');
require('../func.php');

$titulek='Pro novináře';
$trail = new Trail();
$trail->addStep($titulek,'pro-novinare');

$smarty->assign_by_ref('trail', $trail->path);

$smarty->assign('keywords','obrázky, žonglování, noviny, tisk');
$smarty->assign('description','Materiály o žonglování pro novináře');

$dalsi=array(
	array('url'=>CALENDAR_URL,'text'=>'Kalendář žonglérských akcí','title'=>'Kam jít žonglovat'),
	array('url'=>OBRAZKY_URL,'text'=>'Obrázky žonglování','title'=>'Obrázky žonglérů a žonglérek'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->assign('titulek',$titulek);
$smarty->display('hlavicka.tpl');
$smarty->display('pro-novinare.tpl');
$smarty->display('paticka.tpl');

?>
