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

		if(isset($_SESSION['uzivatel']['email'])){
			#přihlášení uživatelé mohou hned odeslat vzkaz
			
		$to = $komu['email'];
		$subject = '=?utf-8?Q?'.imap_8bit('Vzkaz z žonglérova slabikáře').'?=';

		$headers = 'Return-Path: '.$email . "\r\n" .
    'From: '.$email . "\r\n" .
    'Reply-To: '.$email . "\r\n" .
    'Content-Type: text/plain; charset=utf-8' . "\r\n" .
    'Content-Transfer-Encoding: quoted-printable' . "\r\n" .
    'Precedence: bulk';
$message = $vzkaz.'

-- 
Tento vzkaz byl zaslán pomocí žonglérova slabikáře.
http://zonglovani.info
';
		}else{
			# jinak se na mail odesilatele posle zprava z odkazem k odeslani vzkazu

		$messageid=abs(crc32($email.$komu.time()));

		$subject = '=?utf-8?Q?'.imap_8bit('Vzkaz z žonglérova slabikáře').'?=';

		$headers = 'Return-Path: robot@zonglovani.info' . "\r\n" .
    'From: robot@zonglovani.info' . "\r\n" .
    'Reply-To: robot@zonglovani.info' . "\r\n" .
    'Content-Type: text/plain; charset=utf-8' . "\r\n" .
    'Content-Transfer-Encoding: quoted-printable' . "\r\n" .
    'Precedence: bulk';
$message = 'Ahoj,

pro odeslání vzkazu pro "'.$komu['login'].'" klikni na tento odkaz:

http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'sendmail/'.$messageid.'.html

Odkaz platí do: '.date("j. n. Y G.i",(time()+TIMEOUT_VZKAZ)).'

-- 
Petr Kletečka

admin@zonglovani.info
http://zonglovani.info/kontakt.html
';
			
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
			
			$vysledek=mail($email, $subject, imap_8bit($message), $headers);

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
