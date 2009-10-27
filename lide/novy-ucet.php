<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Nový uživatelský účet");

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
		$_SESSION["reg_heslo"]=$heslo;
	}else{
		$heslo="";
	}

	if(isset($_POST["heslo2"])){
		$heslo2=trim($_POST["heslo2"]);
	}else{
		$heslo2="";
	}

if(strlen($jmeno)<3){
	array_push($chyby,"Jméno není zadané, nebo je příliš krátké.");
}elseif(strlen($jmeno)>256){
	array_push($chyby,"Jméno je příliš dlouhé.");
}elseif(eregi("[-\*\.\?\!<>;\^\$\{\}\@%\&\(\)'\"_:´ˇ\\|#`~,ß]",$jmeno)){
	array_push($chyby,"Jméno obsahuje nepovolené znaky.");
}else{
	if(is_zs_jmeno($jmeno)){
		array_push($chyby,"Zadané jméno už používá jiný uživatel.");
	}
}


if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$",$email)){
	array_push($chyby,"Neplatný e-mail.");
}else{
	if(is_zs_email($email)){
		array_push($chyby,"Účet s tímto e-mailem už byl vytvořen. Zapomenuté&nbsp;<a href=\"zapomenute-heslo.php\" title=\"Zaslat zapomenuté heslo emailem.\">heslo</a>?");
	}
}

if(strlen($login)<3){
	array_push($chyby,"Login není zadaný, nebo je příliš krátký.");
}else{
	if(is_zs_account($login)){
		array_push($chyby,"Zadaný login už používá jiný uživatel.");
	}
}


if(eregi("[^-a-z0-9]",$login)){
	array_push($chyby,"Login obsahuje nepovolené znaky.");
}

$reserved_accounts=array("pek","admin","webmaster","root","robot","petr","kletecka","petr-kletecka","petrkletecka","administrator","system","test","tmp");
if(in_array($login,$reserved_accounts)){
	array_push($chyby,"Tento login nelze vytvořit.");
}

if(strlen($heslo)<5){
	array_push($chyby,"Heslo není zadané, nebo je příliš krátké.");
}

if(eregi(".*$login.*",$heslo) or eregi(".*$jmeno.*",$heslo) or eregi(".*$email.*",$heslo)){
	array_push($chyby,"Zadané heslo je příliš slabé.");
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
