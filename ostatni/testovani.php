<?php
require('../init.php');
require('../func.php');

$titulek='Automatizované testy';
$smarty->assign('titulek',$titulek);
$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Automatické testy webu pomocí perlu');


$dalsi=array(
	array('url'=>'/statistiky.html','text'=>'Statistiky','title'=>'Statistiky žonlérova slabikáře'),
	array('url'=>'/toolbox.html','text'=>'Použitý software','title'=>'Seznam použitého software'),

	);
$smarty->assign_by_ref('dalsi',$dalsi);
$trail = new Trail();

$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

$pm='../scripts/tests/pm.txt';

if(is_file($pm)){
	$pm=file($pm,FILE_IGNORE_NEW_LINES);
	$smarty->assign_by_ref('pm',$pm);
}

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-testovani.tpl');
$smarty->display('paticka.tpl');
?>
