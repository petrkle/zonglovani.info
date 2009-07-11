<?php
require('../init.php');

if(!isset($_SESSION["souhlas"])){
	session_destroy();
	header("Location: ".LIDE_URL);
	exit();
}

if(isset($_GET["mail"])){
	$smarty->assign("chyba","jo");
}

$smarty->assign("titulek","Aktivace úètu");
$smarty->display('hlavicka.tpl');
$smarty->display('aktivace.tpl');
$smarty->display('paticka.tpl');

session_destroy();

?>
