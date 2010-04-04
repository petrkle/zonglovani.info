<?php
require('init.php');
require('func.php');

$titulek='Náhled do žonglérova slabikáře';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$dalsi=array(
	array('url'=>LIDE_URL.'pravidla.php','text'=>'Založení účtu','title'=>'Vytvoření nového účtu'),
	array('url'=>LIDE_URL,'text'=>'Seznam žongléřů','title'=>'Seznam uživatelů žonglérova slabikáře'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('exkurze.tpl');
$smarty->display('paticka.tpl');

?>
