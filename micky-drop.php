<?php
require('init.php');
require('func.php');

$titulek='Míčky na zemi';
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Zvedání spadlých žonglérských míčků bez namáhavého shýbání.');

$smarty->assign('titulek',$titulek);

$dalsi=array(
	array('url'=>'/micky/sbirani.html','text'=>'Sbírání spadlých míčků','title'=>'Když ti spadne míček, nepřestávej žonglovat'),
	array('url'=>'/kuzely/kickup.html','text'=>'Zvednutí kuželu nohou','title'=>'Neustálé shýbání pro spadlé kužely se stane minulostí'),
	array('url'=>'/micky/3/neviditelny.html','text'=>'Neviditelný míček','title'=>'Neviditelný míček nahrazuje obyčejný míček'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-drop.tpl');
$smarty->display('paticka.tpl');

?>
