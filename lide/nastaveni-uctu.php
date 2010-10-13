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
		$tmp=LIDE_TMP.'/'.$_SESSION['reg_email'];
		$key=abs(crc32($_SESSION['reg_email'].time().$_SESSION['reg_login']));
		if(!is_dir($tmp)){
			mkdir($tmp);
		}

		$foo=fopen($tmp.'/activation.key','w');
		fwrite($foo,$key);
		fclose($foo);

		$foo=fopen($tmp.'/passwd.sha1','w');
		fwrite($foo,sha1($_SESSION['reg_heslo'].$_SESSION['reg_login']));
		fclose($foo);

		$foo=fopen($tmp.'/jmeno.txt','w');
		fwrite($foo,$_SESSION['reg_jmeno']);
		fclose($foo);

		$foo=fopen($tmp.'/login.txt','w');
		fwrite($foo,$_SESSION['reg_login']);
		fclose($foo);

		$foo=fopen($tmp.'/soukromi.txt','w');
		fwrite($foo,$_SESSION['reg_soukromi']);
		fclose($foo);

		$foo=fopen($tmp.'/vzkaz.txt','w');
		fwrite($foo,$_SESSION['reg_vzkaz']);
		fclose($foo);

		$foo=fopen($tmp.'/created.time','w');
		fwrite($foo,time());
		fclose($foo);

		$to = $_SESSION['reg_email'];
		
		$subject_plain='Aktivace účtu';
		$subject = quoted_printable_header($subject_plain);

		$splmail=preg_split('/@/',$_SESSION['reg_email']);
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

pro aktivaci účtu v žonglérově slabikáři klikni na tento odkaz:

http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'o/'.$splmail[1].'/'.$splmail[0].'/'.$key.'.html

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

<a href="http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'o/'.$splmail[1].'/'.$splmail[0].'/'.$key.'.html">http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'o/'.$splmail[1].'/'.$splmail[0].'/'.$key.'.html</a><br/>

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
