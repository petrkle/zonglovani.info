<?php
require('init.php');
require('func.php');

$titulek='Zvednutí míčku nohou';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$smarty->assign('keywords','žonglování, míčky, kick-up, zvedání, zvednutí');
$smarty->assign('description','Jak nohou zvednout míček spadlý při žonglování.');

$dalsi=array(
	array('url'=>'/kuzely/kickup.html','text'=>'Zvednutí kuželu nohou','title'=>'Neustálé shýbání pro spadlé kužely se stane minulostí'),
	array('url'=>'/micky/sbirani.html','text'=>'Sbírání spadlých míčků','title'=>'Když ti spadne míček, nepřestávej žonglovat'),
	array('url'=>'/micky/3/neviditelny.html','text'=>'Neviditelný míček','title'=>'Neviditelný míček nahrazuje obyčejný míček'),
	array('url'=>'/micky/nohy.html','text'=>'Další popis sbírání míčků','title'=>'Když ti spadne míček, použij nohy'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-kick-up.tpl');
$smarty->display('paticka.tpl');

?>
