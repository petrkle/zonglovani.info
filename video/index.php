<?php
require('../init.php');
require('../func.php');

$titulek='Žonglérská videa';
$smarty->assign('titulek',$titulek);
$trail = new Trail();
$trail->addStep($titulek,'/video/');

$smarty->assign('keywords','žonglování, video, fireshow, žonglshow, představení');
$smarty->assign('description','Výběr povedených žonglérských videí.');

$dalsi=array(
	array('url'=>'/animace/','text'=>'Animace žonglování','title'=>'Animace triků s míčky'),
	array('url'=>'/obrazky/','text'=>'Obrázky žonglování','title'=>'Fotografie žonglování'),
	);

$smarty->assign_by_ref('dalsi',$dalsi);
$smarty->assign('feedback',true);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->assign('videa',get_videa('./video.inc'));
$smarty->display('hlavicka.tpl');
$smarty->display('video-index.tpl');
$smarty->display('paticka.tpl');

?>
