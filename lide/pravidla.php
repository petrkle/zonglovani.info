<?php
require('../init.php');

$smarty->assign("titulek","Pravidla pro vytvoøení úètu");
$smarty->assign("nadpis","none");
$smarty->assign("notitle",true);

if(isset($_POST["ne"])){
	session_destroy();
	header("Location: /lide/");
	exit();
}

if(isset($_POST["jo"])){
	$_SESSION["souhlas"]="jo";
	header("Location: novy-ucet.php");
	exit();
}

$smarty->display('hlavicka.tpl');
$smarty->display('pravidla.tpl');
$smarty->display('paticka.tpl');


?>
