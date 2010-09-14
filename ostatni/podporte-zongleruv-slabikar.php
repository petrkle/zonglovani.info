<?php
require('../init.php');
require('../func.php');

$titulek='Podpořte žonglérův slabikář';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Jak můžeš pomoct při tvorbě žonglérova slabikáře.');

$dalsi=array(
	array('url'=>'/kontakt.html','text'=>'Kontakt','title'=>'Kontaktní údaje'),
	array('url'=>LIDE_URL.'pravidla.php','text'=>'Založit účet','title'=>'Nový účet v žonglérově slabikáři'),
	array('url'=>'/pro-novinare/','text'=>'Materiály pro novináře','title'=>'Informace o žonglování pro použití v médiích'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-podporte-zongleruv-slabikar.tpl');
$smarty->display('paticka.tpl');

?>