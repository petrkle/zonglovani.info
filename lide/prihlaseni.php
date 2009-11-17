<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Přihlášení");
$smarty->assign("robots",'noindex,follow');

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
		if(sha1($input_heslo.$input_login)==$passwd_hash){
			# úspěšné přihlášení
			$_SESSION['uzivatel']=$uzivatel;
			$_SESSION['logged']=true;
			$_SESSION['ip']=$_SERVER['REMOTE_ADDR'];

			$foo=fopen(LIDE_DATA.'/'.$uzivatel['login'].'/prihlaseni.txt','a+');
			fwrite($foo,time().'*'.$_SERVER['REMOTE_ADDR'].'*'.$_SERVER['HTTP_USER_AGENT']."\n");
			fclose($foo);

			header("Location: $next");
			exit();
		}else{
		array_push($chyby,'Špatné jméno nebo heslo.','Pro přihlášení je potřeba povolit cookies. <a class="info" href="#">?<span class="tooltip">Cookies (sušenky) jsou malé soubory, které slouží k rozpoznání spojení mezi tvým počítačem a počítačem na kterém běží žonglérův slabikář. V případě problémů kontaktuj místního počítačového odborníka.</span></a>');
			$smarty->assign("chyby",$chyby);
			$smarty->assign("login",$input_login);
			$smarty->display('hlavicka.tpl');
			$smarty->display('prihlaseni.tpl');
			$smarty->display('paticka.tpl');
			exit();
		}
	
	}else{
		array_push($chyby,'Špatné jméno nebo heslo.','Pro přihlášení je potřeba povolit cookies. <a class="info" href="#">?<span class="tooltip">Cookies (sušenky) jsou malé soubory, které slouží k rozpoznání spojení mezi tvým počítačem a počítačem na kterém běží žonglérův slabikář. V případě problémů kontaktuj místního počítačového odborníka.</span></a>');
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
