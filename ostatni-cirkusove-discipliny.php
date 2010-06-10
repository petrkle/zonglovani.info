<?php
require('init.php');
require('func.php');

$titulek='Cirkusové disciplíny';
$smarty->assign('feedback',true);

$smarty->assign('titulek',$titulek);

$smarty->assign('keywords','cirkus, cirgus,  žonglování, disciplíny');
$smarty->assign('description','Seznam cirkusových disciplín. Chůze po laně, jednokolka, chůdy i visutá hrazda jsou klasické cirkusové disciplíny.');

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep($titulek);

$dalsi=array(
	array('url'=>'/druhy-zonglovani.html','text'=>'Druhy žonglování','title'=>'Přehled způsobů žonglování'),
	array('url'=>'/nacini.html','text'=>'Žonglérské náčiní','title'=>'S čím vším se dá žonglovat'),
	array('url'=>'/micky/jak-zacit.html','text'=>'Jak začít žonglovat s míčky','title'=>'Jak začít žonglovat s míčky'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-cirkusove-discipliny.tpl');
$smarty->display('paticka.tpl');

?>
