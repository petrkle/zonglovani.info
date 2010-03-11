<?php
require('../init.php');
require('../func.php');

$titulek='Vzkaz pro uživatele';
$smarty->assign('titulek',$titulek);
$chyby=array();

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);


if(isset($_POST['komu'])){
	$komu=strtolower(trim($_POST['komu']));
	if(isset($_POST['odeslat'])){

		if(isset($_POST['antispam'])){
			$odpoved=strtolower(trim($_POST['antispam']));
		}else{
			$odpoved='';
		}

		if(isset($_POST['email'])){
			$email=trim($_POST['email']);
		}else{
			$email='';
		}

		if(isset($_SESSION['uzivatel']['email'])){
			$email=$_SESSION['uzivatel']['email'];
		}

		if(isset($_POST['vzkaz'])){
			$vzkaz=trim($_POST['vzkaz']);
		}else{
			$vzkaz='';
		}

		if(!is_zs_account($komu)){
			array_push($chyby,'Účet nebyl nalezen.');
		}else{
			$komu=get_user_props($komu);
		}
		
		if($odpoved!=$_SESSION['antispam_odpoved']){
			array_push($chyby,'Špatná odpověď na kontrolní otázku.');
			$antispam=get_antispam();
			$_SESSION['antispam_otazka']=$antispam[0];
			$_SESSION['antispam_odpoved']=$antispam[1];
			$smarty->assign('antispam_otazka',$_SESSION['antispam_otazka']);
		}

		if(strlen($vzkaz)>1024){
			array_push($chyby,'Vzkaz je příliš dlouhý. Maximální délka je 1024 znaků.');
		}

		if(strlen($vzkaz)<3){
			array_push($chyby,'Vzkaz je příliš krátký. Minimální délka tři znaky.');
		}
		
		if(!eregi('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$',$email)){
			array_push($chyby,'Neplatný e-mail.');
		}

		if(count($chyby)==0){

		$subject_plain='Vzkaz z žonglérova slabikáře';
		$subject = quoted_printable_header($subject_plain);

		if(isset($_SESSION['uzivatel']['email'])){
			#přihlášení uživatelé mohou hned odeslat vzkaz

		$to = $komu['email'];

		$headers = 'Return-Path: '.$email . "\r\n" .
    'From: '.$email . "\r\n" .
    'Reply-To: '.$email . "\r\n" .
    'Content-Type: text/plain; charset=utf-8' . "\r\n" .
    'Content-Transfer-Encoding: 8bit' . "\r\n" .
    'Precedence: bulk';
$message = $vzkaz.'

-- 
Tento vzkaz byl zaslán pomocí žonglérova slabikáře.
http://zonglovani.info
';
		}else{
			# jinak se na mail odesilatele posle zprava z odkazem k odeslani vzkazu

		$messageid=abs(crc32($email.$komu.time()));


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

pro odeslání vzkazu pro "'.$komu['login'].'" klikni na tento odkaz:

http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'sendmail/'.$messageid.'.html

Odkaz platí do: '.date("j. n. Y G.i",(time()+TIMEOUT_VZKAZ)).'

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

$message .= 'Ahoj,<br /><br />

pro odeslání vzkazu pro "'.$komu['login'].'" klikni na tento odkaz:<br />

<a href="http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'sendmail/'.$messageid.'.html">http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'sendmail/'.$messageid.'.html</a><br />

Odkaz platí do: '.date("j. n. Y G.i",(time()+TIMEOUT_VZKAZ)).'<br />

-- <br/>
Petr Kletečka<br/>

<a href="mailto:admin@zonglovani.info">admin@zonglovani.info</a><br/>
<a href="http://zonglovani.info/kontakt.html">http://zonglovani.info/kontakt.html</a>
';

$message .= "</body>\n";
$message .= "</html>\n";

# -=-=-=- FINAL BOUNDARY

$message .= "--$mime_boundary--\n\n";


		$tmp=LIDE_VZKAZY.'/'.$messageid;

		if(!is_dir($tmp)){
			mkdir($tmp);
		}

		$foo=fopen($tmp.'/odesilatel.txt','w');
		fwrite($foo,$email);
		fclose($foo);

		$foo=fopen($tmp.'/prijemce.txt','w');
		fwrite($foo,$komu['email']);
		fclose($foo);


		$foo=fopen($tmp.'/vzkaz.txt','w');
		fwrite($foo,$vzkaz);
		fclose($foo);

		$foo=fopen($tmp.'/created.time','w');
		fwrite($foo,time());
		fclose($foo);

		}
			
			$vysledek=mail($email, $subject, $message, $headers);

			if($vysledek){
				if(isset($_SESSION['uzivatel']['email'])){
					header('Location: '.LIDE_URL.'vzkaz-odeslan.php?status=ok');	
				}else{
					header('Location: '.LIDE_URL.'vzkaz-odeslan.php?status=verify');	
				}
			}else{
				header('Location: '.LIDE_URL.'vzkaz-odeslan.php?status=err');	
			}

		}else{
		$smarty->assign('komu',$komu);
		$smarty->assign('email',$email);
		$smarty->assign('vzkaz',$vzkaz);
		$smarty->assign('chyby',$chyby);
		$smarty->display('hlavicka.tpl');
		$smarty->display('vzkaz.tpl');
		$smarty->display('paticka.tpl');
		}
	
	}else{
		$antispam=get_antispam();
		$_SESSION['antispam_otazka']=$antispam[0];
		$_SESSION['antispam_odpoved']=$antispam[1];
		$smarty->assign('antispam_otazka',$_SESSION['antispam_otazka']);
		$smarty->assign('komu',$komu);
		$smarty->display('hlavicka.tpl');
		$smarty->display('vzkaz.tpl');
		$smarty->display('paticka.tpl');
	}

}else{
	header('Location: '.LIDE_URL);
	exit();
}

?>
