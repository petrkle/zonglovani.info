<?php
require('../init.php');
require('../func.php');

$titulek='Balancování kuželu';
$smarty->assign('feedback',true);

$smarty->assign('titulek',$titulek);

$smarty->assign('keywords','balancování, kužel, brada, nos');
$smarty->assign('description','Balancování žonglérského kuželu na nose');
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/k/kuzely-balanca.png');

$dalsi=array(
	array('url'=>'/micky/balancovani.html','text'=>'Balancování míčku','title'=>'Balancování mičků'),
	array('url'=>'/obrazky/ulita-zbynkuv-vyber-20100312/0011.html','text'=>'Balancování kuželu na kuželu','title'=>'Obázek'),
	array('url'=>'/obrazky/prazsky-zonglersky-marathon-20091128/0010.html','text'=>'Dva kužely na nose','title'=>'Obrázek z pražského žonglérského marathonu 2010'),
	);
$smarty->assign('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep('Balancování');

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-balanc.tpl');
$smarty->display('paticka.tpl');
