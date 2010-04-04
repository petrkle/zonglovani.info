<?php
require('init.php');
require('func.php');

$titulek='Balancování kuželu';
$smarty->assign('feedback',true);

$smarty->assign('titulek',$titulek);

$dalsi=array(
	array('url'=>'/micky/balancovani.html','text'=>'Balancování míčku','title'=>'Balancování mičků'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep('Balancování');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-balanc.tpl');
$smarty->display('paticka.tpl');

?>
