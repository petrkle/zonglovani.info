<?php
require('../init.php');
require('../func.php');

$titulek='Žonglérské náčiní';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Obrázky a popis různých věcí na žonglování.');

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

$dalsi=array(
	array('url'=>'/druhy-zonglovani.html','text'=>'Druhy žonglování','title'=>'Přehled způsobů žonglování'),
	array('url'=>'/cirkusove-discipliny.html','text'=>'Cirkusové disciplíny','title'=>'Dovednosti které nemají s žonglováním mnoho společného'),
	array('url'=>'/micky/jak-zacit.html','text'=>'Jak začít žonglovat s míčky','title'=>'Jak začít žonglovat s míčky'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-nacini.tpl');
$smarty->display('paticka.tpl');

?>