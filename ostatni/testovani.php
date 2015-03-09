<?php
require('../init.php');
require('../func.php');

$titulek='Automatizované testy';
$smarty->assign('titulek',$titulek);
$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Automatické testy webu pomocí perlu');


$dalsi=array(
	array('url'=>'/toolbox.html','text'=>'Použitý software','title'=>'Seznam použitého software'),

	);
$smarty->assign('dalsi',$dalsi);
$trail = new Trail();

$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);

$pm='../scripts/tests/pm.txt';

if(is_file($pm)){
	$pm=file($pm,FILE_IGNORE_NEW_LINES);
	$smarty->assign('pm',$pm);
}

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-testovani.tpl');
$smarty->display('paticka.tpl');
