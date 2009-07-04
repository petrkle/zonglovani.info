<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Nov� u�ivatelsk� ��et");

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
	array_push($chyby,"Jm�no nen� zadan�, nebo je p��li� kr�tk�.");
}elseif(eregi("[-\*\.\?\!<>;\^\$\{\}\@%\&\(\)'\"_:��\\|#`~,�]",$jmeno)){
	array_push($chyby,"Jm�no obsahuje nepovolen� znaky.");
}else{
	if(is_zs_jmeno($jmeno)){
		array_push($chyby,"Zadan� jm�no u� pou��v� jin� u�ivatel.");
	}
}


if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$",$email)){
	array_push($chyby,"Neplatn� e-mail.");
}else{
	if(is_zs_email($email)){
		array_push($chyby,"��et s t�mto e-mailem u� byl vytvo�en. Zapomenut�&nbsp;<a href=\"zapomenute-heslo.php\" title=\"Zaslat zapomenut� heslo emailem.\">heslo</a>?");
	}
}

if(strlen($login)<3){
	array_push($chyby,"Login nen� zadan�, nebo je p��li� kr�tk�.");
}else{
	if(is_zs_account($login)){
		array_push($chyby,"Zadan� login u� pou��v� jin� u�ivatel.");
	}
}


if(eregi("[^-a-z0-9]",$login)){
	array_push($chyby,"Login obsahuje nepovolen� znaky.");
}

if(strlen($heslo)<5){
	array_push($chyby,"Heslo nen� zadan�, nebo je p��li� kr�tk�.");
}

if($heslo!=$heslo2){
	array_push($chyby,"Zadan� hesla se neshoduj�.");
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
