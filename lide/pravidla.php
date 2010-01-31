<?php
require('../init.php');
require('../func.php');

$titulek='Pravidla pro vytvoření účtu';
$smarty->assign('titulek',$titulek);
$smarty->assign('nadpis','none');
$smarty->assign('notitle',true);

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep($titulek);

if(isset($_POST['ne'])){
	session_destroy();
	header('Location: '.LIDE_URL);
	exit();
}

if(isset($_POST['jo'])){
	$_SESSION['souhlas']='jo';
	header('Location: novy-ucet.php');
	exit();
}

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('pravidla.tpl');
$smarty->display('paticka.tpl');


?>
