<?php
require('init.php');
require('func.php');

$titulek='Žonglování s vajíčky';
$smarty->assign('feedback',true);

$smarty->assign('titulek',$titulek);

$dalsi=array(
	array('url'=>'/micky/druhy.html','text'=>'Druhy míčků','title'=>'Seznam žonglérských míčků'),
	array('url'=>'/micky/3/jablko.html','text'=>'Jezení jablka','title'=>'Při žonglování s jablky můžeš průběžně ukusovat'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('micky-vajicka.tpl');
$smarty->display('paticka.tpl');

?>
