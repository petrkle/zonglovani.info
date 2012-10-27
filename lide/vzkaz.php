<?php
require('../init.php');
require('../func.php');
include_once($lib.'/SMTP.php');
include_once($lib.'/Mail.php');
include_once($lib.'/Mail/mime.php');

$titulek='Vzkaz pro uživatele';
$smarty->assign('titulek',$titulek);
$chyby=array();

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

if(isset($_POST['komu'])){
	$subject='Vzkaz z žonglérova slabikáře';
	$smarty->assign_by_ref('subject',$subject);
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
			$komu_props=get_user_props($komu);
			if($komu_props['soukromi']!='formular'){
				array_push($chyby,'Úživatel nemá povolené zasílání vzkazů.');
			}
		}
		
		if($odpoved!=$_SESSION['antispam_odpoved']){
			array_push($chyby,'Špatná odpověď na kontrolní otázku.');
			$antispam=get_antispam();
			$_SESSION['antispam_otazka']=$antispam[0];
			$_SESSION['antispam_odpoved']=$antispam[1];
			$smarty->assign('antispam_otazka',$_SESSION['antispam_otazka']);
			$smarty->assign('antispam_odpoved',$_SESSION['antispam_odpoved']);
		}else{
			$smarty->assign('antispam_otazka',$_SESSION['antispam_otazka']);
			$smarty->assign('antispam_odpoved',$_SESSION['antispam_odpoved']);
		}

		if(strlen($vzkaz)>1024){
			array_push($chyby,'Vzkaz je příliš dlouhý. Maximální délka je 1024 znaků.');
		}

		if(strlen($vzkaz)<3){
			array_push($chyby,'Vzkaz je příliš krátký. Minimální délka tři znaky.');
		}
		
		if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/',$email)){
			array_push($chyby,'Neplatný e-mail.');
		}

		if(count($chyby)==0){

		if(isset($_SESSION['uzivatel']['email'])){
			#přihlášení uživatelé mohou hned odeslat vzkaz

		$smarty->assign('komu',$komu_props);
		$smarty->assign('vzkaz',$vzkaz);

		$vysledek = sendmail(array(
			'from'=>$email,
			'to'=>$komu_props['email'],
			'subject'=>$subject,
			'text'=>$smarty->fetch('mail/lide-vzkaz.txt.tpl'),
			'html'=>$smarty->fetch('mail/lide-vzkaz.html.tpl'),
		));

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
			# jinak se na mail odesilatele posle zprava z odkazem k odeslani vzkazu

		$messageid=abs(crc32($email.$komu_props['email'].time()));
		$smarty->assign('messageid',$messageid);

		$tmp=LIDE_VZKAZY.'/'.$messageid;

		if(!is_dir($tmp)){
			mkdir($tmp);
		}

		$foo=fopen($tmp.'/odesilatel.txt','w');
		fwrite($foo,$email);
		fclose($foo);

		$foo=fopen($tmp.'/prijemce.txt','w');
		fwrite($foo,$komu_props['email']);
		fclose($foo);


		$foo=fopen($tmp.'/vzkaz.txt','w');
		fwrite($foo,$vzkaz);
		fclose($foo);

		$foo=fopen($tmp.'/created.time','w');
		fwrite($foo,time());
		fclose($foo);

		$smarty->assign('komu',$komu_props);
		$vysledek = sendmail(array(
			'from'=>'robot@zonglovani.info',
			'to'=>$email,
			'subject'=>$subject,
			'text'=>$smarty->fetch('mail/lide-vzkaz-activate.txt.tpl'),
			'html'=>$smarty->fetch('mail/lide-vzkaz-activate.html.tpl'),
		));

			if($vysledek){
				if(isset($_SESSION['uzivatel']['email'])){
					header('Location: '.LIDE_URL.'vzkaz-odeslan.php?status=ok');	
				}else{
					header('Location: '.LIDE_URL.'vzkaz-odeslan.php?status=verify');	
				}
			}else{
				header('Location: '.LIDE_URL.'vzkaz-odeslan.php?status=err');	
			}
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
		$smarty->assign('antispam_odpoved',$_SESSION['antispam_odpoved']);
		$smarty->assign('komu',$komu);
		$smarty->display('hlavicka.tpl');
		$smarty->display('vzkaz.tpl');
		$smarty->display('paticka.tpl');
	}

}else{
	header('Location: '.LIDE_URL);
	exit();
}
