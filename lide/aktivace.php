<?php
require('../init.php');
require('../func.php');

$titulek='Nový uživatelský účet';

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep($titulek);

if(isset($_GET['mail'])){
	$smarty->assign('chyba','jo');
}

$smarty->assign('trail', $trail->path);
$smarty->assign('titulek',$titulek);
$smarty->display('hlavicka.tpl');
$smarty->display('aktivace.tpl');
$smarty->display('paticka.tpl');
