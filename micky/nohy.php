<?php
require('../init.php');
require('../func.php');

$titulek='Použij nohy';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$smarty->assign('keywords','žonglování, míčky, kick-up, zvedání, zvednutí');
$smarty->assign('description','Použij nohy ke sbírání míčků spadlých při žonglování');

$dalsi=array(
	array('url'=>'/micky/3/neviditelny.html','text'=>'Neviditelný míček','title'=>'Nejlevnější a nejdostupnější míček'),
	array('url'=>'/micky/drop.html','text'=>'Míčky na zemi','title'=>'Výmluvy'),
	array('url'=>'/micky/kick-up.html','text'=>'Zvednutí míčku nohou','title'=>'Elegantní způsob jak zvednout míček ze země'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-nohy.tpl');
$smarty->display('paticka.tpl');

?>
