<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Zapomenuté heslo");


if(isset($_GET["send"])){
	if($_GET["send"]=="ok"){
		$smarty->assign("status","ok");
	}else{
		$smarty->assign("status","err");
	}

	$smarty->display('hlavicka.tpl');
	$smarty->display('zapomenute-heslo-vysledek.tpl');
	$smarty->display('paticka.tpl');
	session_destroy();
	exit();
}

if(isset($_POST["odeslat"])){
	$chyby=array();

	if(isset($_POST["email"])){
		$email=strtolower(trim($_POST["email"]));
		$smarty->assign("email",$email);
		$_SESSION["email"]=$email;
	}elseif(isset($_SESSION["email"])){
		$email=$_SESSION["email"];
		$smarty->assign("email",$email);
	}else{
		$email="";
	}

	if(isset($_POST["antispam"])){
		$odpoved=strtolower(trim($_POST["antispam"]));
	}else{
		$odpoved="";
	}


if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$",$email)){
	array_push($chyby,"Neplatný e-mail.");
}else{
	if(!is_zs_email($email)){
		array_push($chyby,"Účet s tímto e-mailem nebyl nalezen.");
	}else{
		$uzivatel=get_user_props(email2login($email));
		if($uzivatel["status"]!="ok"){
			array_push($chyby,"Heslo pro účet s tímto e-mailem nelze obnovit.");
		}
	}
}


	if($odpoved!=$_SESSION["antispam_odpoved"]){
		array_push($chyby,"Špatná odpověď na kontrolní otázku.");
		$antispam=get_antispam();
		$_SESSION["antispam_otazka"]=$antispam[0];
		$_SESSION["antispam_odpoved"]=$antispam[1];
		$smarty->assign("antispam_otazka",$_SESSION["antispam_otazka"]);
	}

	if(count($chyby)==0){
		$key=abs(crc32($uzivatel["email"].time().$uzivatel["login"]));
		$tmp=LIDE_DATA."/".$uzivatel["login"];

		$foo=fopen("$tmp/password.reset.key","w");
		fwrite($foo,$key);
		fclose($foo);

		$foo=fopen("$tmp/password.reset.time","w");
		fwrite($foo,time());
		fclose($foo);

		$to = $uzivatel["email"];
		$subject = "=?utf-8?Q?".preg_replace("/=\r\n/","",quoted_printable_encode("Obnovení hesla"))."?=";

		$headers = 'Return-Path: robot@zonglovani.info' . "\r\n" .
    'From: robot@zonglovani.info' . "\r\n" .
    'Reply-To: robot@zonglovani.info' . "\r\n" .
    'Content-Type: text/plain; charset=utf-8' . "\r\n" .
    'Content-Transfer-Encoding: quoted-printable' . "\r\n" .
    'Precedence: bulk';
$message = 'Ahoj,

pro obnovení hesla v žonglérově slabikáři klikni na tento odkaz:

http://'.$_SERVER["SERVER_NAME"].LIDE_URL.'obnova-hesla.php?m='.$uzivatel["email"].'&k='.$key.'

Odkaz platí do: '.date("j. n. Y G.i",(time()+TIMEOUT_RESET_PASSWD)).'

-- 
Petr Kletečka

admin@zonglovani.info
http://zonglovani.info/kontakt.html
';

		$vysledek=mail($to, $subject, quoted_printable_encode($message), $headers);
		if($vysledek){
			session_destroy();
			header("Location: ".LIDE_URL.basename(__FILE__)."?send=ok");	
			exit();
		}else{
			session_destroy();
			header("Location: ".LIDE_URL.basename(__FILE__)."?send=err");	
			exit();
		}

	}else{
		$antispam=get_antispam();
		$_SESSION["antispam_otazka"]=$antispam[0];
		$_SESSION["antispam_odpoved"]=$antispam[1];
		$smarty->assign("antispam_otazka",$_SESSION["antispam_otazka"]);
		$smarty->assign("chyby",$chyby);
		$smarty->display('hlavicka.tpl');
		$smarty->display('zapomenute-heslo.tpl');
		$smarty->display('paticka.tpl');
	}
}else{
	$antispam=get_antispam();
	$_SESSION["antispam_otazka"]=$antispam[0];
	$_SESSION["antispam_odpoved"]=$antispam[1];
	$smarty->assign("antispam_otazka",$_SESSION["antispam_otazka"]);
	$smarty->display('hlavicka.tpl');
	$smarty->display('zapomenute-heslo.tpl');
	$smarty->display('paticka.tpl');
}


?>
