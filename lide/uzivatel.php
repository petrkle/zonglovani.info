<?php
require('../init.php');
require('../func.php');
require('dovednosti.php');
require('pusobiste.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id='';
}

$uzivatel_props=get_user_props($id);

if($uzivatel_props){

if($uzivatel_props["login"]=="pek" and $_SESSION["uzivatel"]["login"]!="pek"){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: /kontakt.html");
	exit();
}

$dov=get_user_dovednosti($id);
if($dov){
	$bar=array();
	foreach($dov as $name=>$hodnota){
		$bar[$name]['hodnota']=$hodnota;
		if(isset($dovednosti[$name])){
			$bar[$name]['nazev']=$dovednosti[$name]['nazev'];
		}
	}
	$uzivatel_props['dovednosti']=$bar;
}

$pus=get_user_pusobiste($id);
if($pus){
	$bar=array();
	foreach($pus as $name){
		if(isset($pusobiste[$name])){
			array_push($bar,$pusobiste[$name]['nazev']);
		}
	}
	$uzivatel_props['pusobiste']=$bar;
}

if($uzivatel_props['status']=='ok'){
	$smarty->assign("titulek",$uzivatel_props["jmeno"]);
	$smarty->assign("nadpis","none");
	$smarty->assign("notitle",true);
	$smarty->assign("uzivatel_props",$uzivatel_props);

	$smarty->display('hlavicka.tpl');
	$smarty->display('uzivatel.tpl');
	$smarty->display('paticka.tpl');
}else{
	require("../404.php");
	exit();
}

}else{
	require("../404.php");
	exit();
}


?>
