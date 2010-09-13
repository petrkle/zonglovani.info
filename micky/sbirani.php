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

$dalsi=array(
	array('url'=>'/micky/3/neviditelny.html','text'=>'Neviditelný míček','title'=>'Nejlevnější a nejdostupnější míček'),
	array('url'=>'/micky/drop.html','text'=>'Míčky na zemi','title'=>'Výmluvy'),
	array('url'=>'/micky/kick-up.html','text'=>'Zvednutí míčku nohou','title'=>'Elegantní způsob jak zvednout míček ze země'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('micky-sbirani.tpl');
$smarty->display('paticka.tpl');

?>
