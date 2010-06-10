<?php
require('init.php');
require('func.php');

$titulek='Passing s míčky - mills\' mess';
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Žonglování mills\' mess pro dva lidi.');

$dalsi=array(
	array('url'=>'/kuzely/passing/','text'=>'Passing s kužely','title'=>'Královská disciplína žonglování'),
	array('url'=>'/kuzely/passing/australsky-trik.html','text'=>'Australský trik','title'=>'Trik při passování s kužely'),
	array('url'=>'/kuzely/passing/runarounds.html','text'=>'Obíhačka','title'=>'Přebírání kuželů'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('micky-passing-mm.tpl');
$smarty->display('paticka.tpl');

?>
