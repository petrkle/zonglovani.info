<?php
require('../init.php');
require('../func.php');

$titulek='Podpoř žonglérův slabikář';
$smarty->assign('titulek',$titulek);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Jak můžeš pomoct při tvorbě žonglérova slabikáře.');
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/p/podporaa.png');

$smarty->assign('feedback',true);
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/p/podporab.png');

$dalsi=array(
	array('url'=>'/kontakt.html','text'=>'Kontakt','title'=>'Kontaktní údaje'),
	array('url'=>LIDE_URL.'novy-ucet.php','text'=>'Založit účet','title'=>'Nový účet v žonglérově slabikáři'),
	);
$smarty->assign('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-podporte-zongleruv-slabikar.tpl');
$smarty->display('paticka.tpl');
