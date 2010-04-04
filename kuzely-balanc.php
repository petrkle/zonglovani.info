<?php
require('init.php');
require('func.php');

$titulek='Balancování kuželu';
$smarty->assign('feedback',true);

$smarty->assign('titulek',$titulek);

$dalsi=array(
	array('url'=>'/micky/balancovani.html','text'=>'Balancování míčku','title'=>'Balancování mičků'),
	array('url'=>'/obrazky/ulita-zbynkuv-vyber-20100312/0011.html','text'=>'Balancování kuželu na kuželu','title'=>'Obázek'),
	array('url'=>'/obrazky/prazsky-zonglersky-marathon-20091128/0010.html','text'=>'Dva kužely na nose','title'=>'Obrázek z pražského žonglérského marathonu 2010'),
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
