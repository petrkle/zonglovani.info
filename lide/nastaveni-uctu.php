<?php
require('../init.php');
require('../func.php');

$smarty->assign('titulek','Nastavení účtu');

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep('Nový uživatelský účet');

if(!isset($_SESSION['souhlas'])){
	session_destroy();
	header('Location: '.LIDE_URL);
	exit();
}

if(isset($_POST['odeslat'])){
	$chyby=array();

	if(isset($_POST['soukromi'])){
		$soukromi=strtolower(trim($_POST['soukromi']));
		$smarty->assign('soukromi',$soukromi);
		$_SESSION['reg_soukromi']=$soukromi;
	}elseif(isset($_SESSION['reg_soukromi'])){
		$soukromi=$_SESSION['reg_soukromi'];
		$smarty->assign('soukromi',$soukromi);
	}else{
		$soukromi='';
	}

	if(isset($_POST['vzkaz'])){
		$vzkaz=trim($_POST['vzkaz']);
		$smarty->assign('vzkaz',$vzkaz);
		$_SESSION['reg_vzkaz']=$vzkaz;
	}elseif(isset($_SESSION['reg_vzkaz'])){
		$vzkaz=$_SESSION['reg_vzkaz'];
		$smarty->assign('vzkaz',$vzkaz);
	}else{
		$vzkaz='';
	}

	if(isset($_POST['antispam'])){
		$odpoved=strtolower(trim($_POST['antispam']));
	}else{
		$odpoved='';
	}

	if($odpoved!=$_SESSION['antispam_odpoved']){
		array_push($chyby,'Špatná odpověď na kontrolní otázku.');
		$antispam=get_antispam();
		$_SESSION['antispam_otazka']=$antispam[0];
		$_SESSION['antispam_odpoved']=$antispam[1];
		$smarty->assign('antispam_otazka',$_SESSION['antispam_otazka']);
	}

	if(count($chyby)==0){
		$tmp=LIDE_TMP."/".$_SESSION["reg_email"];
		$key=abs(crc32($_SESSION["reg_email"].time().$_SESSION["reg_login"]));
		if(!is_dir($tmp)){
			mkdir($tmp);
		}

		$foo=fopen("$tmp/activation.key","w");
		fwrite($foo,$key);
		fclose($foo);

		$foo=fopen("$tmp/passwd.sha1","w");
		fwrite($foo,sha1($_SESSION["reg_heslo"].$_SESSION["reg_login"]));
		fclose($foo);

		$foo=fopen("$tmp/jmeno.txt","w");
		fwrite($foo,$_SESSION["reg_jmeno"]);
		fclose($foo);

		$foo=fopen("$tmp/login.txt","w");
		fwrite($foo,$_SESSION["reg_login"]);
		fclose($foo);

		$foo=fopen("$tmp/soukromi.txt","w");
		fwrite($foo,$_SESSION["reg_soukromi"]);
		fclose($foo);

		$foo=fopen("$tmp/vzkaz.txt","w");
		fwrite($foo,$_SESSION["reg_vzkaz"]);
		fclose($foo);

		$foo=fopen("$tmp/created.time","w");
		fwrite($foo,time());
		fclose($foo);

		$to = $_SESSION["reg_email"];
		$subject = "=?utf-8?Q?".preg_replace("/=\r\n/","",quoted_printable_encode("Aktivace účtu"))."?=";

		$headers = 'Return-Path: robot@zonglovani.info' . "\r\n" .
    'From: robot@zonglovani.info' . "\r\n" .
    'Reply-To: robot@zonglovani.info' . "\r\n" .
    'Content-Type: text/plain; charset=utf-8' . "\r\n" .
    'Content-Transfer-Encoding: quoted-printable' . "\r\n" .
    'Precedence: bulk';
$message = 'Ahoj,

pro aktivaci účtu v žonglérově slabikáři klikni na tento odkaz:

http://'.$_SERVER["SERVER_NAME"].LIDE_URL.'overeni-emailu.php?m='.$_SESSION["reg_email"].'&k='.$key.'

Odkaz platí do: '.date("j. n. Y G.i",(time()+TIMEOUT_REGISTRATION)).'

-- 
Petr Kletečka

admin@zonglovani.info
http://zonglovani.info/kontakt.html
';

		$vysledek=mail($to, $subject, quoted_printable_encode($message), $headers);
		if($vysledek){
			header('Location: '.LIDE_URL.'aktivace.php');	
		}else{
			header('Location: '.LIDE_URL.'aktivace.php?mail=false');	
		}

	}else{
		$smarty->assign('chyby',$chyby);
		$smarty->assign_by_ref('trail', $trail->path);
		$smarty->display('hlavicka.tpl');
		$smarty->display('nastaveni-uctu.tpl');
		$smarty->display('paticka.tpl');
	}
}else{
	$antispam=get_antispam();
	$_SESSION['antispam_otazka']=$antispam[0];
	$_SESSION['antispam_odpoved']=$antispam[1];
	$smarty->assign('antispam_otazka',$_SESSION['antispam_otazka']);
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->display('hlavicka.tpl');
	$smarty->display('nastaveni-uctu.tpl');
	$smarty->display('paticka.tpl');
}


?>
