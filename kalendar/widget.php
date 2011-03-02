<?php
require('../init.php');
require('../func.php');

$trail = new Trail();
$trail->addStep('Kalendář',CALENDAR_URL);
$trail->addStep('Widget');
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/w/widget-light.png');

$titulek='Výpis z kalendáře';

$dalsi=array(
	array('url'=>'/jak-odkazovat.html','text'=>'Jak odkazovat na žonglérův slabikář','title'=>'Jak odkazovat na žonglérův slabikář - připravené HTML kódy'),
	array('url'=>'/kontakt.html','text'=>'Technická podpora','title'=>'Rady při problémy s vkládáním widgetu'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->assign('titulek',$titulek);
$smarty->assign('description','Kalendář žonglování - widget pro tvůj web');


$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kalendar-widget.tpl');
$smarty->display('paticka.tpl');

?>