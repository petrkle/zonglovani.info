<?php
require('init.php');
require('func.php');

$titulek='Jak odkazovat na žonglérův slabikář';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$dalsi=array(
	array('url'=>'/obrazky-na-plochu/','text'=>'Obrázky na plochu','title'=>'Tapety s žonglérskou tématikou.'),
	array('url'=>'/podporte-zongleruv-slabikar.html','text'=>'Podpoř žonglérův slabikář','title'=>'Jak dál podpoři žonglérův slabikář'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-jak-odkazovat.tpl');
$smarty->display('paticka.tpl');

?>
