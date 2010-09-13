<?php

require('../init.php');
require('../func.php');
$titulek='Žonglování s kruhy';

$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);
$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Návod na žonglování s kruhy.');

$trail = new Trail();
$trail->addStep('Kruhy','/kruhy/');

$dalsi=array(
	array('url'=>'/kuzely/','text'=>'Žonglování s kužely','title'=>'Jak žonglovat s kužely'),
	array('url'=>'/kuzely/passing/','text'=>'Passing','title'=>'Žonglování ve více lidech'),
	);

$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kruhy.tpl');
$smarty->display('paticka.tpl');

?>
