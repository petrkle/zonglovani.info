<?php
require('../init.php');
require('../func.php');

if(is_logged()){
	$smarty->assign("titulek","Nastaven�");
	$chyby=array();

	if(isset($_GET["uprav"])){
		$uprav=$_GET["uprav"];

		if($uprav=="jmeno"){
			if(isset($_POST["jmeno"]) and isset($_POST["odeslat"])){
				$jmeno=trim($_POST["jmeno"]);

				if(strlen($jmeno)<3){
					array_push($chyby,"Jm�no nen� zadan�, nebo je p��li� kr�tk�.");
				}elseif(strlen($jmeno)>256){
					array_push($chyby,"Jm�no je p��li� dlouh�.");
				}elseif(eregi("[-\*\.\?\!<>;\^\$\{\}\@%\&\(\)'\"_:��\\|#`~,�]",$jmeno)){
					array_push($chyby,"Jm�no obsahuje nepovolen� znaky.");
				}elseif($jmeno==$_SESSION["uzivatel"]["jmeno"]){
					# nic :-)
				}else{
					if(is_zs_jmeno($jmeno)){
						array_push($chyby,"Zadan� jm�no u� pou��v� jin� u�ivatel.");
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
						array_push($chyby,"Vzkaz je p��li� dlouh�.");
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
					array_push($chyby,"Heslo nen� zadan�, nebo je p��li� kr�tk�.");
				}

				if(eregi(".*".$_SESSION["uzivatel"]["login"].".*",$heslo) or eregi(".*".$_SESSION["uzivatel"]["jmeno"].".*",$heslo) or eregi(".*".$_SESSION["uzivatel"]["email"].".*",$heslo)){
					array_push($chyby,"Zadan� heslo je p��li� slab�.");
				}

				if($heslo!=$heslo2){
					array_push($chyby,"Nov� zadan� hesla se neshoduj�.");
				}

				if(sha1($stareheslo.$_SESSION["uzivatel"]["login"])!=$_SESSION["uzivatel"]["passwd_sha1"]){
					array_push($chyby,"�patn� zadan� aktu�ln� heslo.");
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
			array_push($chyby,"Nastaven� bylo ulo�eno.");
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
