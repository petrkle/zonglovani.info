<?php
require('../init.php');
require('../func.php');
include_once($lib.'/SMTP.php');
include_once($lib.'/Mail.php');
include_once($lib.'/Mail/mime.php');

$titulek='Zapomenuté heslo';

$smarty->assign('titulek',$titulek);
$smarty->assign('description','Obnova zapomenutého hesla.');

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


if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/',$email)){
	array_push($chyby,'Neplatný e-mail.');
}else{
	if(!is_zs_email($email)){
		array_push($chyby,'Účet s tímto e-mailem nebyl nalezen.');
	}else{
		$uzivatel=get_user_props(email2login($email));
		if($uzivatel['status']=='revoked'){
			array_push($chyby,'Heslo pro účet s tímto e-mailem nelze obnovit.');
		}
	}
}


	if(isset($_SESSION['antispam_odpoved']) and $odpoved!=$_SESSION['antispam_odpoved']){
		array_push($chyby,'Špatná odpověď na kontrolní otázku.');
		$antispam=get_antispam();
		$_SESSION['antispam_otazka']=$antispam[0];
		$_SESSION['antispam_odpoved']=$antispam[1];
		$smarty->assign('antispam_otazka',$_SESSION['antispam_otazka']);
		$smarty->assign('antispam_odpoved',$_SESSION['antispam_odpoved']);
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

		$subject='Obnovení hesla';
		$splmail=preg_split('/@/',$uzivatel['email']);

		$smarty->assign_by_ref('subject', $subject);
		$smarty->assign_by_ref('splmail', $splmail);
		$smarty->assign_by_ref('key', $key);

		$vysledek = sendmail(array(
			'from'=>'robot@zonglovani.info',
			'to'=>$uzivatel['email'],
			'subject'=>$subject,
			'text'=>$smarty->fetch('mail/lide-zapomenute-heslo.txt.tpl'),
			'html'=>$smarty->fetch('mail/lide-zapomenute-heslo.html.tpl'),
			'img'=>array('../img/z/zs-vizitka.png'),
		));

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
		$smarty->assign('antispam_odpoved',$_SESSION['antispam_odpoved']);
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
	$smarty->assign('antispam_odpoved',$_SESSION['antispam_odpoved']);
	$smarty->display('hlavicka.tpl');
	$smarty->display('zapomenute-heslo.tpl');
	$smarty->display('paticka.tpl');
}
