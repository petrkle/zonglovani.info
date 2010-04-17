<?php
require('init.php');
require('func.php');

$titulek='Míček z balónků';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep('Výroba míčků','/micky/vyroba.html');
$trail->addStep('Z balónků');

$smarty->assign('description','Návod na výrobu žonglérského míčku z nafukovacích balónků. Pěkný míček na žonglování snadno, rychle a levně.');
$smarty->assign('keywords','žonglování, míčky, výroba, nafukovací balónky');
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/b/balonky-na-vyrobu-micku.s.jpg');

$dalsi=array(
	array('url'=>'/micky/vyroba-tenisak.html','text'=>'Míček na žonglování z tenisáku','title'=>'Jak vyrobit pěkný míček na žonglování z tenisáku'),
	array('url'=>'/micky/jak-zacit.html','text'=>'Jak začít žonglovat s míčky','title'=>'Jak začít žonglovat s míčky'),
	array('url'=>'/micky/druhy.html','text'=>'Druhy míčků','title'=>'Druhy míčků na žonglování'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-vyroba-balonky.tpl');
$smarty->display('paticka.tpl');
?>
