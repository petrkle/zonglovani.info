<?php

require('../init.php');
require('../func.php');

$titulek='Žonglování s kužely';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);
$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Jak žonglovat s kužely. Základní návod pro tři kuželky, ale i pokročilé passovací vzory.');

$dalsi=array(
	array('url'=>'/kuzely/passing/','text'=>'Passing','title'=>'Žonglování ve více lidech'),
	);

$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely.tpl');
$smarty->display('paticka.tpl');

?>
