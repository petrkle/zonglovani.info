<?php
require('../init.php');
require('../func.php');

$titulek='Vaše příspěvky';
$smarty->assign('titulek',$titulek);
$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Sponzoři žonglérova slabikáře.');

$dalsi=array(
	array('url'=>'/podporte-zongleruv-slabikar.html','text'=>'Podpořte žonglérův slabikář','title'=>'Podpořit žonglérův slabikář'),
	array('url'=>'/jak-odkazovat.html','text'=>'Jak odkazovat na žonglérův slabikář','title'=>'Přidej odkaz na svůj web'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->assign_by_ref('stat', $stat);

$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/p/podporac.png');

$smarty->display('hlavicka.tpl');
$smarty->display('sponzori.tpl');
$smarty->display('paticka.tpl');
