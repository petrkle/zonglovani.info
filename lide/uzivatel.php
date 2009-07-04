<?php
require('../init.php');
require('../func.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id='';
}

$uzivatel=get_user_props($id);

if($uzivatel){

if($uzivatel["login"]=="pek"){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: /kontakt.html");
	exit();
}

$smarty->assign("titulek","U¾ivatel ".$uzivatel["jmeno"]);
$smarty->assign("uzivatel",$uzivatel);

$smarty->display('hlavicka.tpl');
$smarty->display('uzivatel.tpl');
$smarty->display('paticka.tpl');

}else{
	require("../404.php");
	exit();
}


?>
