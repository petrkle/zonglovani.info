<?php
require('../init.php');
require('../func.php');

$titulek='Nový uživatelský účet';
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep($titulek);

if(!isset($_SESSION['souhlas'])){
	session_destroy();
	header('Location: '.LIDE_URL);
	exit();
}

if(isset($_SESSION['logged']) and $_SESSION['logged']==true){
	header('Location: '.LIDE_URL.'nastaveni/');
	exit();
}

if(isset($_GET['action'])){
	$chyby=array();
	
	if(isset($_POST['jmeno'])){
		$jmeno=trim($_POST['jmeno']);
		$smarty->assign('jmeno',$jmeno);
		$_SESSION['reg_jmeno']=$jmeno;
	}elseif(isset($_SESSION['reg_jmeno'])){
		$jmeno=$_SESSION['reg_jmeno'];
		$smarty->assign('jmeno',$jmeno);
	}else{
		$jmeno='';
	}

	if(isset($_POST['email'])){
		$email=strtolower(trim($_POST['email']));
		$smarty->assign('email',$email);
		$_SESSION['reg_email']=$email;
	}elseif(isset($_SESSION['reg_email'])){
		$email=$_SESSION['reg_email'];
		$smarty->assign('email',$email);
	}else{
		$email='';
	}

	if(isset($_POST['login'])){
		$login=strtolower(trim($_POST['login']));
		$smarty->assign('login',$login);
		$_SESSION['reg_login']=$login;
	}elseif(isset($_SESSION['reg_login'])){
		$login=$_SESSION['reg_login'];
		$smarty->assign('login',$login);
	}else{
		$login='';
	}

	if(isset($_POST['heslo'])){
		$heslo=trim($_POST['heslo']);
		$_SESSION['reg_heslo']=$heslo;
	}else{
		$heslo='';
	}

	if(isset($_POST['heslo2'])){
		$heslo2=trim($_POST['heslo2']);
	}else{
		$heslo2='';
	}

if(strlen($jmeno)<3){
	array_push($chyby,"Jméno není zadané, nebo je příliš krátké.");
}elseif(strlen($jmeno)>256){
	array_push($chyby,"Jméno je příliš dlouhé.");
}elseif(preg_match('/[-\*\.\?\!<>;\^\$\{\}\@%\&\(\)\'\"_:´ˇ\\|#`~,]/i',$jmeno)){
	array_push($chyby,"Jméno obsahuje nepovolené znaky.");
}else{
	if(is_zs_jmeno($jmeno)){
		array_push($chyby,"Zadané jméno už používá jiný uživatel.");
	}
}


if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i",$email)){
	array_push($chyby,'Neplatný e-mail.');
}else{
	if(is_zs_email($email)){
		array_push($chyby,"Účet s tímto e-mailem už byl vytvořen. Zapomenuté&nbsp;<a href=\"zapomenute-heslo.php\" title=\"Zaslat zapomenuté heslo emailem.\">heslo</a>?");
	}
}

if(strlen($login)<3){
	array_push($chyby,'Login není zadaný, nebo je příliš krátký.');
}else{
	if(is_zs_account($login)){
		array_push($chyby,'Zadaný login už používá jiný uživatel.');
	}
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

if(preg_match('/[^-a-z0-9]/i',$login)){
	array_push($chyby,'Login obsahuje nepovolené znaky.');
}

if(preg_match('/^-/i',$login)){
	array_push($chyby,'Login nesmí začínat pomlčkou.');
}

if(preg_match('/-$/i',$login)){
	array_push($chyby,'Login nesmí koncit pomlčkou.');
}

if(preg_match('/-{2,}/i',$login)){
	array_push($chyby,'Login nesmí obsahovat víc pomlček za sebou.');
}

$reserved_accounts=array('sendmail','pek','admin','webmaster','root','robot','petr','kletecka','petr-kletecka','petrkletecka','administrator','system','test','tmp');
if(in_array($login,$reserved_accounts)){
	array_push($chyby,'Tento login nelze vytvořit.');
}

if(strlen($heslo)<5){
	array_push($chyby,'Heslo není zadané, nebo je příliš krátké.');
}

if(preg_match("/.*$login.*/i",$heslo) or preg_match("/.*$jmeno.*/i",$heslo) or preg_match("/.*$email.*/i",$heslo)){
	array_push($chyby,'Zadané heslo je příliš slabé.');
}

if($heslo!=$heslo2){
	array_push($chyby,'Zadaná hesla se neshodují.');
}


if(count($chyby)==0){
	$_SESSION['reg_soukromi']='formular';
	$_SESSION['reg_vzkaz']='';
	header('Location: '.LIDE_URL.'nastaveni-uctu.php');	
}else{
	$antispam=get_antispam();
	$_SESSION['antispam_otazka']=$antispam[0];
	$_SESSION['antispam_odpoved']=$antispam[1];
	$smarty->assign('antispam_otazka',$_SESSION['antispam_otazka']);
	$smarty->assign('antispam_odpoved',$_SESSION['antispam_odpoved']);
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign('chyby',$chyby);
	$smarty->display('hlavicka.tpl');
	$smarty->display('novy-ucet.tpl');
	$smarty->display('paticka.tpl');
	}

}else{
	$antispam=get_antispam();
	$_SESSION['antispam_otazka']=$antispam[0];
	$_SESSION['antispam_odpoved']=$antispam[1];
	$smarty->assign('antispam_otazka',$_SESSION['antispam_otazka']);
	$smarty->assign('antispam_odpoved',$_SESSION['antispam_odpoved']);
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->display('hlavicka.tpl');
	$smarty->display('novy-ucet.tpl');
	$smarty->display('paticka.tpl');
}


?>
