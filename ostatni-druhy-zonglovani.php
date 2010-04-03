<?php
require('init.php');
require('func.php');

$titulek='Druhy žonglování';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

$dalsi=array(
	array('url'=>'/cirkusove-discipliny.html','text'=>'Cirkusové disciplíny','title'=>'Dovednosti které nemají s žonglováním mnoho společného'),
	array('url'=>'/micky/jak-zacit.html','text'=>'Jak začít žonglovat s míčky','title'=>'Jak začít žonglovat s míčky'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-druhy-zonglovani.tpl');
$smarty->display('paticka.tpl');

?>
