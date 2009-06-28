<?php
require('../init.php');

$smarty->assign("titulek","Nastavení úètu");

if(!isset($_SESSION["souhlas"])){
	session_destroy();
	header("Location: pravidla.php");
	exit();
}

if(isset($_POST["odeslat"])){
	$chyby=array();

	if(isset($_POST["soukromi"])){
		$soukromi=strtolower(trim($_POST["soukromi"]));
		$smarty->assign("soukromi",$soukromi);
		$_SESSION["reg_soukromi"]=$soukromi;
	}elseif(isset($_SESSION["reg_soukromi"])){
		$soukromi=$_SESSION["reg_soukromi"];
		$smarty->assign("soukromi",$soukromi);
	}else{
		$soukromi="";
	}

	if(isset($_POST["vzkaz"])){
		$vzkaz=strtolower(trim($_POST["vzkaz"]));
		$smarty->assign("vzkaz",$vzkaz);
		$_SESSION["reg_vzkaz"]=$vzkaz;
	}elseif(isset($_SESSION["reg_vzkaz"])){
		$vzkaz=$_SESSION["reg_vzkaz"];
		$smarty->assign("vzkaz",$vzkaz);
	}else{
		$vzkaz="";
	}

	if(isset($_POST["antispam"])){
		$odpoved=strtolower(trim($_POST["antispam"]));
	}else{
		$odpoved="";
	}

	if($odpoved!=$_SESSION["antispam_odpoved"]){
		array_push($chyby,"©patná odpovìï na kontrolní otázku.");
		$antispam=get_antispam();
		$_SESSION["antispam_otazka"]=$antispam[0];
		$_SESSION["antispam_odpoved"]=$antispam[1];
		$smarty->assign("antispam_otazka",$_SESSION["antispam_otazka"]);
	}

	if(count($chyby)==0){
		header("Location: /lide/dokonceno.php");	
	}else{
		$smarty->assign("chyby",$chyby);
		$smarty->display('hlavicka.tpl');
		$smarty->display('nastaveni-uctu.tpl');
		$smarty->display('paticka.tpl');
	}
}else{
	$antispam=get_antispam();
	$_SESSION["antispam_otazka"]=$antispam[0];
	$_SESSION["antispam_odpoved"]=$antispam[1];
	$smarty->assign("antispam_otazka",$_SESSION["antispam_otazka"]);
	$smarty->display('hlavicka.tpl');
	$smarty->display('nastaveni-uctu.tpl');
	$smarty->display('paticka.tpl');
}



function get_antispam(){
	$cislice=array("1"=>"jedna","2"=>"dva","3"=>"tøi","5"=>"pìt","7"=>"sedm","8"=>"osm","9"=>"devìt");
	$znamenka=array("+"=>"plus","-"=>"mínus","*"=>"krát");

	$prvni=array_rand($cislice);
	$druha=array_rand($cislice);
	$znamenko=array_rand($znamenka);

	$otazka=ucfirst($cislice[$prvni]." ".$znamenka[$znamenko]." ".$cislice[$druha]);
	eval("\$odpoved = $prvni $znamenko $druha;");

	return array($otazka,$odpoved);
}

?>
