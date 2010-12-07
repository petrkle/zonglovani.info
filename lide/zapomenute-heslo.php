<?php
require('../init.php');
require('../func.php');

$titulek='Zapomenuté heslo';

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);

if(is_logged()){
	header('Location: '.LIDE_URL.'nastaveni');
	exit();
}

if(isset($_GET['send'])){
	if($_GET['send']=='ok'){
		$smarty->assign('status','ok');
	}else{
		$smarty->assign('status','err');
	}

	$smarty->display('hlavicka.tpl');
	$smarty->display('zapomenute-heslo-vysledek.tpl');
	$smarty->display('paticka.tpl');
	session_destroy();
	exit();
}

if(isset($_POST['odeslat'])){
	$chyby=array();

	if(isset($_POST['email'])){
		$email=strtolower(trim($_POST['email']));
		$smarty->assign('email',$email);
		$_SESSION['email']=$email;
	}elseif(isset($_SESSION['email'])){
		$email=$_SESSION['email'];
		$smarty->assign('email',$email);
	}else{
		$email='';
	}

	if(isset($_POST['antispam'])){
		$odpoved=strtolower(trim($_POST['antispam']));
	}else{
		$odpoved='';
	}


if(!eregi('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$',$email)){
	array_push($chyby,'Neplatný e-mail.');
}else{
	if(!is_zs_email($email)){
		array_push($chyby,'Účet s tímto e-mailem nebyl nalezen.');
	}else{
		$uzivatel=get_user_props(email2login($email));
		if($uzivatel['status']!='ok'){
			array_push($chyby,'Heslo pro účet s tímto e-mailem nelze obnovit.');
		}
	}
}


	if($odpoved!=$_SESSION['antispam_odpoved']){
		array_push($chyby,'Špatná odpověď na kontrolní otázku.');
		$antispam=get_antispam();
		$_SESSION['antispam_otazka']=$antispam[0];
		$_SESSION['antispam_odpoved']=$antispam[1];
		$smarty->assign('antispam_otazka',$_SESSION['antispam_otazka']);
	}

	if(count($chyby)==0){
		$key=abs(crc32($uzivatel['email'].time().$uzivatel['login']));
		$tmp=LIDE_DATA.'/'.$uzivatel['login'];

		$foo=fopen($tmp.'/password.reset.key','w');
		fwrite($foo,$key);
		fclose($foo);

		$foo=fopen($tmp.'/password.reset.time','w');
		fwrite($foo,time());
		fclose($foo);

		$to = $uzivatel['email'];

		$subject_plain='Obnovení hesla';
		$subject = quoted_printable_header($subject_plain);

		$splmail=preg_split('/@/',$uzivatel['email']);

		$mime_boundary = '--zs--'.abs(crc32(time()));

$headers = "Return-Path: robot@zonglovani.info\n";
$headers .= "From: robot@zonglovani.info\n";
$headers .= "Reply-To: robot@zonglovani.info\n";
$headers .= "Precedence: bulk\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";

# -=-=-=- TEXT EMAIL PART

$message = "--$mime_boundary\n";
$message .= "Content-Type: text/plain; charset=UTF-8\n";
$message .= "Content-Transfer-Encoding: 8bit\n\n";

$message .= 'Ahoj,

pro obnovení hesla v žonglérově slabikáři klikni na tento odkaz:

http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'z/'.$splmail[1].'/'.$splmail[0].'/'.$key.'.html

Odkaz platí do: '.date('j. n. Y G.i',(time()+TIMEOUT_REGISTRATION)).'

-- 
Petr Kletečka

admin@zonglovani.info
http://zonglovani.info/kontakt.html
';

# -=-=-=- HTML EMAIL PART
 
$message .= "--$mime_boundary\n";
$message .= "Content-Type: text/html; charset=UTF-8\n";
$message .= "Content-Transfer-Encoding: 8bit\n\n";

$message .= "<html>\n";
$message .= "<head><meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />\n";
$message .= "<title>$subject_plain</title></head>\n";
$message .= "<body style=\"font-family: sans-serif; font-size:1em; color:#000;\">\n";

$message .= 'Ahoj,<br /><br/>

pro aktivaci účtu v žonglérově slabikáři klikni na tento odkaz:<br /><br/>

<a href="http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'z/'.$splmail[1].'/'.$splmail[0].'/'.$key.'.html">http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'z/'.$splmail[1].'/'.$splmail[0].'/'.$key.'.html</a><br/>

Odkaz platí do: '.date('j. n. Y G.i',(time()+TIMEOUT_REGISTRATION)).'<br/>

-- <br/>
Petr Kletečka<br/>

<a href="mailto:admin@zonglovani.info">admin@zonglovani.info</a><br/>
<a href="http://zonglovani.info/kontakt.html">http://zonglovani.info/kontakt.html</a>
';

$message .= "</body>\n";
$message .= "</html>\n";

# -=-=-=- FINAL BOUNDARY

$message .= "--$mime_boundary--\n\n";

		$vysledek=mail($to, $subject, $message, $headers);
		if($vysledek){
			session_destroy();
			header('Location: '.LIDE_URL.basename(__FILE__).'?send=ok');	
			exit();
		}else{
			session_destroy();
			header('Location: '.LIDE_URL.basename(__FILE__).'?send=err');	
			exit();
		}

	}else{
		$antispam=get_antispam();
		$_SESSION['antispam_otazka']=$antispam[0];
		$_SESSION['antispam_odpoved']=$antispam[1];
		$smarty->assign('antispam_otazka',$_SESSION['antispam_otazka']);
		$smarty->assign('chyby',$chyby);
		$smarty->display('hlavicka.tpl');
		$smarty->display('zapomenute-heslo.tpl');
		$smarty->display('paticka.tpl');
	}
}else{
	$antispam=get_antispam();
	$_SESSION['antispam_otazka']=$antispam[0];
	$_SESSION['antispam_odpoved']=$antispam[1];
	$smarty->assign('antispam_otazka',$_SESSION['antispam_otazka']);
	$smarty->display('hlavicka.tpl');
	$smarty->display('zapomenute-heslo.tpl');
	$smarty->display('paticka.tpl');
}


?>
