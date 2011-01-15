<?php
require('../init.php');
require('../func.php');

$titulek='Jak odkazovat na žonglérův slabikář';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Připravené kusy html kódu pro vytváření odkazů na žonglérův slabikář.');

$dalsi=array(
	array('url'=>'/podporte-zongleruv-slabikar.html','text'=>'Podpoř žonglérův slabikář','title'=>'Jak dál podpoři žonglérův slabikář'),
	array('url'=>CALENDAR_URL.'widget.html','text'=>'Výpis akcí z kalendáře - widget','title'=>'Widget na twůj web'),
	array('url'=>'/obrazky-na-plochu/','text'=>'Obrázky na plochu','title'=>'Tapety s žonglérskou tématikou.'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-jak-odkazovat.tpl');
$smarty->display('paticka.tpl');

?>
