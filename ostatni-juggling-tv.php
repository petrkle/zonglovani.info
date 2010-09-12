<?php
require('init.php');
require('func.php');

$titulek='juggling.tv';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$smarty->assign('keywords','video, juggling.tv');
$smarty->assign('description','Podrobný popis stránek juggling.tv.');

$dalsi=array(
	array('url'=>'/video/','text'=>'Žonglérská videa','title'=>'Výběr žonglérských videí'),
	array('url'=>'/animace/','text'=>'Animace žonglování','title'=>'Animace triků s míčky')
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('juggling.tv.tpl');
$smarty->display('paticka.tpl');

?>
