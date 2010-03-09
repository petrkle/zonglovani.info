<?php
require('../init.php');
require('../func.php');

$titulek='Aktivace účtu';

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep($titulek);

if(!isset($_SESSION['souhlas'])){
	session_destroy();
	header('Location: '.LIDE_URL);
	exit();
}

if(isset($_GET['mail'])){
	$smarty->assign('chyba','jo');
}

$smarty->assign_by_ref('trail', $trail->path);
$smarty->assign('titulek',$titulek);
$smarty->display('hlavicka.tpl');
$smarty->display('aktivace.tpl');
$smarty->display('paticka.tpl');

session_destroy();

?>
