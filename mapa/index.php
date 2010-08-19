<?php
require('../init.php');
require('../func.php');

$titulek='Žonglérská mapa';
$trail = new Trail();
$trail->addStep($titulek,'/mapa/');

$dalsi=array(
	array('url'=>'/animace/siteswap/','text'=>'Animace siteswapů','title'=>'Animace žonglérských siteswapů'),
	);

$smarty->assign_by_ref('dalsi',$dalsi);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->assign('styly',array('/m.css'));
$smarty->assign('keywords','animace, žonglování, siteswap, juggleanim');
$smarty->assign('description','Animace žonglování s míčky.');
$smarty->assign('titulek',$titulek);
$smarty->display('hlavicka-w.tpl');
$smarty->display('mapa.tpl');
$smarty->display('paticka-w.tpl');

?>
