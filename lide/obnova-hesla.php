<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Obnova hesla");

if(isset($_GET["status"]) and $_GET["status"]=="ok"){
		$smarty->assign("chyby",array("Nov� heslo bylo nastaveno. M��e� se s n�m <a href=\"".LIDE_URL."prihlaseni.php\" title=\"P�ihl�en� do �ongl�rova slabik��e.\">p�ihl�sit</a>."));
		$smarty->display('hlavicka.tpl');
		$smarty->display('alert.tpl');
		$smarty->display('paticka.tpl');
		exit();
}

if(isset($_GET["m"]) and isset($_GET["k"])){
	$email=$_GET["m"];
	$key=$_GET["k"];
	
	if(!is_zs_email($email)){
		$smarty->assign("chyby",array("��et s t�mto e-mailem nebyl nalezen."));
		$smarty->display('hlavicka.tpl');
		$smarty->display('alert.tpl');
		$smarty->display('paticka.tpl');
		exit();
	}else{
		$uzivatel=get_user_props(email2login($email));
		if($uzivatel["status"]!="ok"){
			array_push($chyby,"Heslo pro ��et s t�mto e-mailem nelze obnovit.");
		}
	}

	$rtf=LIDE_DATA."/".$uzivatel["login"]."/password.reset.time";
	$rtk=LIDE_DATA."/".$uzivatel["login"]."/password.reset.key";

	if(is_file($rtf) and is_file($rtk)){
		$reset_time=trim(array_pop(file($rtf)));
		$reset_key=trim(array_pop(file($rtk)));

		if($reset_key!=$key){
			$smarty->assign("chyby",array("Neplatn� odkaz pro obnoven� hesla."));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
			exit();
		}

		if($reset_time<(time()-TIMEOUT_RESET_PASSWD)){
			$smarty->assign("chyby",array("Odkaz pro obnovu hesla u� nen� platn�."));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
			exit();
		}
		if(isset($_GET["action"])){
			$chyby=array();

		if(isset($_POST["heslo"])){
			$heslo=trim($_POST["heslo"]);
		}else{
			$heslo="";
		}

		if(isset($_POST["heslo2"])){
			$heslo2=trim($_POST["heslo2"]);
		}else{
			$heslo2="";
		}

			if(strlen($heslo)<5){
				array_push($chyby,"Heslo nen� zadan�, nebo je p��li� kr�tk�.");
			}

			if($heslo!=$heslo2){
				array_push($chyby,"Zadan� hesla se neshoduj�.");
			}
			if(count($chyby)==0){
				$foo=fopen("$tmp/passwd.sha1","w");
				fwrite($foo,sha1($hesla.$uzivatel["login"]));
				fclose($foo);
				unlink($rtf);
				unlink($rtk);
				header("Location: ".LIDE_URL.basename(__FILE__)."?status=ok");
				exit();
			}else{
				$smarty->assign("email",$email);
				$smarty->assign("key",$key);
				$smarty->assign("uzivatel",$uzivatel);
				$smarty->assign("chyby",$chyby);
				$smarty->display('hlavicka.tpl');
				$smarty->display('obnova-hesla.tpl');
				$smarty->display('paticka.tpl');
			}
		
		}else{
			$smarty->assign("email",$email);
			$smarty->assign("key",$key);
			$smarty->assign("uzivatel",$uzivatel);
			$smarty->display('hlavicka.tpl');
			$smarty->display('obnova-hesla.tpl');
			$smarty->display('paticka.tpl');
		}

	}else{
		$smarty->assign("chyby",array("Tento odkaz pro obnoven� u� byl pou�it�."));
		$smarty->display('hlavicka.tpl');
		$smarty->display('alert.tpl');
		$smarty->display('paticka.tpl');
	}

}else{
	$smarty->assign("chyby",array("Odkaz pro obnoven� hesla nen� �pln�.","Heslo NEBYLO zm�n�no."));
	$smarty->display('hlavicka.tpl');
	$smarty->display('alert.tpl');
	$smarty->display('paticka.tpl');
}


?>