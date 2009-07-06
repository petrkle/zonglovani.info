<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Pøihlá¹ení");
if(isset($_GET["next"]) and ereg("^/",$_GET["next"])){
	$next=$_GET["next"];
}elseif(isset($_POST["next"]) and ereg("^/",$_POST["next"])){
	$next=$_POST["next"];
}else{
	$next="/";
}

$smarty->assign("next",$next);

if(isset($_POST["login"]) and isset($_POST["heslo"]) and isset($_GET["action"])){
	$chyby=array();
	$input_login=trim($_POST["login"]);
	$input_heslo=trim($_POST["heslo"]);
	$uzivatel=get_user_props($input_login);
	if($uzivatel){
		$passwd_hash=trim(array_pop(file(LIDE_DATA."/".$uzivatel["login"]."/passwd.sha1")));
		#var_dump(trim(array_pop(file(LIDE_DATA."/".$uzivatel["login"]."/passwd.sha1"))));
		#var_dump(sha1($input_heslo.$input_login));
		if(sha1($input_heslo.$input_login)==$passwd_hash){
			$_SESSION["uzivatel"]=$uzivatel;
			$_SESSION["logged"]=true;
			$_SESSION["ip"]=$_SERVER['REMOTE_ADDR'];
			header("Location: $next");
			exit();
		}else{
		array_push($chyby,'©patné jméno nebo heslo.','Pro pøihlá¹ení je potøeba povolit cookies. <a class="info" href="#">?<span class="tooltip">Cookies (su¹enky) jsou malé soubory, které slou¾í k rozpoznání spojení mezi tvým poèítaèem a poèítaèem na kterém bì¾í ¾onglérùv slabikáø. V pøípadì problémù kontaktuj místního poèítaèového odborníka.</span></a>');
			$smarty->assign("chyby",$chyby);
			$smarty->assign("login",$input_login);
			$smarty->display('hlavicka.tpl');
			$smarty->display('prihlaseni.tpl');
			$smarty->display('paticka.tpl');
			exit();
		}
	
	}else{
		array_push($chyby,'©patné jméno nebo heslo.','Pro pøihlá¹ení je potøeba povolit cookies. <a class="info" href="#">?<span class="tooltip">Cookies (su¹enky) jsou malé soubory, které slou¾í k rozpoznání spojení mezi tvým poèítaèem a poèítaèem na kterém bì¾í ¾onglérùv slabikáø. V pøípadì problémù kontaktuj místního poèítaèového odborníka.</span></a>');
		$smarty->assign("chyby",$chyby);
		$smarty->assign("login",$input_login);
		$smarty->display('hlavicka.tpl');
		$smarty->display('prihlaseni.tpl');
		$smarty->display('paticka.tpl');
		exit();
	}

}else{
	$smarty->display('hlavicka.tpl');
	$smarty->display('prihlaseni.tpl');
	$smarty->display('paticka.tpl');
}

?>
