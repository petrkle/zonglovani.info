<?php
require('../init.php');
require('../func.php');

if(is_logged()){
	$titulek='Pravidla používání účtu';
	$smarty->assign('titulek',$titulek);
	$smarty->assign('nadpis','none');
	$smarty->assign('notitle',true);

	$trail = new Trail();
	$trail->addStep('Seznam žonglérů',LIDE_URL);
	$trail->addStep($titulek);

	$smarty->assign('trail', $trail->path);
	$smarty->display('hlavicka.tpl');
	$smarty->display('pravidla.tpl');
	$smarty->display('paticka.tpl');
}else{
	header('Location: '.LIDE_URL.'novy-ucet.php');
	exit();
}
