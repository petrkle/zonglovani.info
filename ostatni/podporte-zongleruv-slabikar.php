<?php
require('../init.php');
require('../func.php');

$titulek='Podpořte žonglérův slabikář';
$smarty->assign('titulek',$titulek);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Jak můžeš pomoct při tvorbě žonglérova slabikáře.');
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/p/podporaa.png');

$smarty->assign('feedback',true);
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/p/podporab.png');

$dalsi=array(
	array('url'=>'/kontakt.html','text'=>'Kontakt','title'=>'Kontaktní údaje'),
	array('url'=>LIDE_URL.'novy-ucet.php','text'=>'Založit účet','title'=>'Nový účet v žonglérově slabikáři'),
	array('url'=>'/statistiky.html','text'=>'Statistiky','title'=>'Statistiky žonlérova slabikáře'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-podporte-zongleruv-slabikar.tpl');
$smarty->display('paticka.tpl');
