<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Nový u¾ivatelský úèet");

if(!isset($_SESSION["souhlas"])){
	session_destroy();
	header("Location: ".LIDE_URL);
	exit();
}

if(isset($_GET["action"])){
	$chyby=array();
	
	if(isset($_POST["jmeno"])){
		$jmeno=trim($_POST["jmeno"]);
		$smarty->assign("jmeno",$jmeno);
		$_SESSION["reg_jmeno"]=$jmeno;
	}elseif(isset($_SESSION["reg_jmeno"])){
		$jmeno=$_SESSION["reg_jmeno"];
		$smarty->assign("jmeno",$jmeno);
	}else{
		$jmeno="";
	}

	if(isset($_POST["email"])){
		$email=strtolower(trim($_POST["email"]));
		$smarty->assign("email",$email);
		$_SESSION["reg_email"]=$email;
	}elseif(isset($_SESSION["reg_email"])){
		$email=$_SESSION["reg_email"];
		$smarty->assign("email",$email);
	}else{
		$email="";
	}

	if(isset($_POST["login"])){
		$login=strtolower(trim($_POST["login"]));
		$smarty->assign("login",$login);
		$_SESSION["reg_login"]=$login;
	}elseif(isset($_SESSION["reg_login"])){
		$login=$_SESSION["reg_login"];
		$smarty->assign("login",$login);
	}else{
		$login="";
	}

	if(isset($_POST["heslo"])){
		$heslo=trim($_POST["heslo"]);
		$_SESSION["reg_heslo"]=$login;
	}else{
		$heslo="";
	}

	if(isset($_POST["heslo2"])){
		$heslo2=trim($_POST["heslo2"]);
	}else{
		$heslo2="";
	}

if(strlen($jmeno)<3){
	array_push($chyby,"Jméno není zadané, nebo je pøíli¹ krátké.");
}elseif(eregi("[-\*\.\?\!<>;\^\$\{\}\@%\&\(\)'\"_:´·\\|#`~,ß]",$jmeno)){
	array_push($chyby,"Jméno obsahuje nepovolené znaky.");
}else{
	if(is_zs_jmeno($jmeno)){
		array_push($chyby,"Zadané jméno u¾ pou¾ívá jiný u¾ivatel.");
	}
}


if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$",$email)){
	array_push($chyby,"Neplatný e-mail.");
}else{
	if(is_zs_email($email)){
		array_push($chyby,"Úèet s tímto e-mailem u¾ byl vytvoøen. Zapomenuté&nbsp;<a href=\"zapomenute-heslo.php\" title=\"Zaslat zapomenuté heslo emailem.\">heslo</a>?");
	}
}

if(strlen($login)<3){
	array_push($chyby,"Login není zadaný, nebo je pøíli¹ krátký.");
}else{
	if(is_zs_account($login)){
		array_push($chyby,"Zadaný login u¾ pou¾ívá jiný u¾ivatel.");
	}
}


if(eregi("[^-a-z0-9]",$login)){
	array_push($chyby,"Login obsahuje nepovolené znaky.");
}

if(strlen($heslo)<5){
	array_push($chyby,"Heslo není zadané, nebo je pøíli¹ krátké.");
}

if($heslo!=$heslo2){
	array_push($chyby,"Zadaná hesla se neshodují.");
}


if(count($chyby)==0){
	header("Location: /lide/nastaveni-uctu.php");	
}else{
	$smarty->assign("chyby",$chyby);
	$smarty->display('hlavicka.tpl');
	$smarty->display('novy-ucet.tpl');
		$smarty->display('paticka.tpl');
	}

}else{
	$smarty->display('hlavicka.tpl');
	$smarty->display('novy-ucet.tpl');
	$smarty->display('paticka.tpl');
}


?>
