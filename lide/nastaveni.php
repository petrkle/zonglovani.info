<?php
require('../init.php');
require('../func.php');

if(is_logged()){
	$smarty->assign("titulek","Nastavení");
	$chyby=array();

	if(isset($_GET["uprav"])){
		$uprav=$_GET["uprav"];

		if($uprav=="jmeno"){
			if(isset($_POST["jmeno"]) and isset($_POST["odeslat"])){
				$jmeno=trim($_POST["jmeno"]);

				if(strlen($jmeno)<3){
					array_push($chyby,"Jméno není zadané, nebo je pøíli¹ krátké.");
				}elseif(strlen($jmeno)>256){
					array_push($chyby,"Jméno je pøíli¹ dlouhé.");
				}elseif(eregi("[-\*\.\?\!<>;\^\$\{\}\@%\&\(\)'\"_:´·\\|#`~,ß]",$jmeno)){
					array_push($chyby,"Jméno obsahuje nepovolené znaky.");
				}elseif($jmeno==$_SESSION["uzivatel"]["jmeno"]){
					# nic :-)
				}else{
					if(is_zs_jmeno($jmeno)){
						array_push($chyby,"Zadané jméno u¾ pou¾ívá jiný u¾ivatel.");
					}
				}
				if(count($chyby)==0){
					$foo=fopen(LIDE_DATA."/".$_SESSION["uzivatel"]["login"]."/jmeno.txt","w");
					fwrite($foo,$jmeno);
					fclose($foo);
					$_SESSION["uzivatel"]=get_user_props($_SESSION["uzivatel"]["login"]);
					header("Location: ".LIDE_URL.basename(__FILE__)."?result=ok");
					exit();
				}
			}
				$smarty->assign('chyby',$chyby);
				$smarty->display('hlavicka.tpl');
				$smarty->display('nastaveni-jmeno.tpl');
				$smarty->display('paticka.tpl');

		}elseif($uprav=="soukromi"){

			if(isset($_POST["soukromi"]) and isset($_POST["odeslat"])){
				if($_POST["soukromi"]=="formular"){
					$soukromi="formular";
				}else{
					$soukromi="mail";
				}

				if(count($chyby)==0){
					$foo=fopen(LIDE_DATA."/".$_SESSION["uzivatel"]["login"]."/soukromi.txt","w");
					fwrite($foo,$soukromi);
					fclose($foo);
					$_SESSION["uzivatel"]=get_user_props($_SESSION["uzivatel"]["login"]);
					header("Location: ".LIDE_URL.basename(__FILE__)."?result=ok");
					exit();
				}
			}
				$smarty->display('hlavicka.tpl');
				$smarty->display('nastaveni-soukromi.tpl');
				$smarty->display('paticka.tpl');
		
		}elseif($uprav=="vzkaz"){
			if(isset($_POST["vzkaz"]) and isset($_POST["odeslat"])){
					$vzkaz=$_POST["vzkaz"];
					if(strlen($vzkaz)>1024){
						array_push($chyby,"Vzkaz je pøíli¹ dlouhý.");
					}

				if(count($chyby)==0){
					$foo=fopen(LIDE_DATA."/".$_SESSION["uzivatel"]["login"]."/vzkaz.txt","w");
					fwrite($foo,$vzkaz);
					fclose($foo);
					$_SESSION["uzivatel"]=get_user_props($_SESSION["uzivatel"]["login"]);
					header("Location: ".LIDE_URL.basename(__FILE__)."?result=ok");
					exit();
				}
			}
				$smarty->assign('chyby',$chyby);
				$smarty->display('hlavicka.tpl');
				$smarty->display('nastaveni-vzkaz.tpl');
				$smarty->display('paticka.tpl');

		}elseif($uprav=="heslo"){
			if(isset($_POST["stareheslo"]) and isset($_POST["heslo"]) and isset($_POST["heslo2"]) and isset($_POST["odeslat"])){
					$stareheslo=$_POST["stareheslo"];
					$heslo=$_POST["heslo"];
					$heslo2=$_POST["heslo2"];

				if(strlen($heslo)<5){
					array_push($chyby,"Heslo není zadané, nebo je pøíli¹ krátké.");
				}

				if(eregi(".*".$_SESSION["uzivatel"]["login"].".*",$heslo) or eregi(".*".$_SESSION["uzivatel"]["jmeno"].".*",$heslo) or eregi(".*".$_SESSION["uzivatel"]["email"].".*",$heslo)){
					array_push($chyby,"Zadané heslo je pøíli¹ slabé.");
				}

				if($heslo!=$heslo2){
					array_push($chyby,"Novì zadaná hesla se neshodují.");
				}

				if(sha1($stareheslo.$_SESSION["uzivatel"]["login"])!=$_SESSION["uzivatel"]["passwd_sha1"]){
					array_push($chyby,"©patnì zadané aktuální heslo.");
				}

				if(count($chyby)==0){
					$foo=fopen(LIDE_DATA."/".$_SESSION["uzivatel"]["login"]."/passwd.sha1","w");
					fwrite($foo,sha1($heslo.$_SESSION["uzivatel"]["login"]));
					fclose($foo);
					$_SESSION["uzivatel"]=get_user_props($_SESSION["uzivatel"]["login"]);
					header("Location: ".LIDE_URL.basename(__FILE__)."?result=ok");
					exit();
				}
			}
				$smarty->assign('chyby',$chyby);
				$smarty->display('hlavicka.tpl');
				$smarty->display('nastaveni-heslo.tpl');
				$smarty->display('paticka.tpl');
		}else{
			header("Location: ".LIDE_URL.basename(__FILE__));
			exit();
		}
	
	}else{
		if(isset($_GET["result"])){
			array_push($chyby,"Nastavení bylo ulo¾eno.");
			$smarty->assign('chyby',$chyby);
		}
		$smarty->display('hlavicka.tpl');
		$smarty->display('nastaveni.tpl');
		$smarty->display('paticka.tpl');
	}
}else{
	header("Location: ".LIDE_URL."prihlaseni.php?next=".LIDE_URL.basename(__FILE__)."&notice");
	exit();
}

?>
