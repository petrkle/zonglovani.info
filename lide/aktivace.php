<?php
require('../init.php');

if(!isset($_SESSION["souhlas"])){
	session_destroy();
	header("Location: ".LIDE_URL);
	exit();
}
$smarty->assign("titulek","Aktivace ��tu");
$smarty->display('hlavicka.tpl');
$smarty->display('aktivace.tpl');
$smarty->display('paticka.tpl');

session_destroy();

?>