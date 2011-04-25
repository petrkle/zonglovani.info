<?php
require('../init.php');
require('../func.php');
require('../rss/rss.php');

$titulek='Obnova hesla';

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

if(isset($_GET['status']) and $_GET['status']=='ok' and isset($_SESSION['load_user'])){
		load_user($_SESSION['load_user']);
		$smarty->assign('chyby',array('Nové heslo je nastavené.','Můžeš si <a href="'.LIDE_URL.'nastaveni/" title="Upravit nastavení účtu">upravit nastavení</a>.'));
		$smarty->display('hlavicka.tpl');
		$smarty->display('alert.tpl');
		$smarty->display('paticka.tpl');
		unset($_SESSION['load_user']);
		exit();
}

if(isset($_GET['m']) and isset($_GET['k'])){
	$email=$_GET['m'];
	$key=$_GET['k'];
	
	if(!is_zs_email($email)){
		$smarty->assign('chyby',array('Účet s tímto e-mailem nebyl nalezen.'));
		$smarty->display('hlavicka.tpl');
		$smarty->display('alert.tpl');
		$smarty->display('paticka.tpl');
		exit();
	}else{
		$uzivatel=get_user_props(email2login($email));
		if($uzivatel['status']!='ok'){
			array_push($chyby,'Heslo pro účet s tímto e-mailem nelze obnovit.');
		}
	}

	$rtf=LIDE_DATA.'/'.$uzivatel['login'].'/password.reset.time';
	$rtk=LIDE_DATA.'/'.$uzivatel['login'].'/password.reset.key';

	if(is_file($rtf) and is_file($rtk)){
		$reset_time=trim(array_pop(file($rtf)));
		$reset_key=trim(array_pop(file($rtk)));

		if($reset_key!=$key){
			$smarty->assign('chyby',array('Neplatný odkaz pro obnovení hesla.'));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
			exit();
		}

		if($reset_time<(time()-TIMEOUT_RESET_PASSWD)){
			$smarty->assign('chyby',array('Odkaz pro obnovu hesla už není platný.'));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
			exit();
		}
		if(isset($_GET['action'])){
			$chyby=array();

		if(isset($_POST['heslo'])){
			$heslo=trim($_POST['heslo']);
		}else{
			$heslo='';
		}

		if(isset($_POST['heslo2'])){
			$heslo2=trim($_POST['heslo2']);
		}else{
			$heslo2='';
		}

			if(strlen($heslo)<5){
				array_push($chyby,'Heslo není zadané, nebo je příliš krátké.');
			}

			if($heslo!=$heslo2){
				array_push($chyby,'Zadaná hesla se neshodují.');
			}
			if(count($chyby)==0){
				$foo=fopen(LIDE_DATA.'/'.$uzivatel['login'].'/passwd.sha1','w');
				fwrite($foo,sha1($heslo.$uzivatel['login']));
				fclose($foo);
				unlink($rtf);
				unlink($rtk);
				$_SESSION['load_user']=$uzivatel['login'];
				header('Location: '.LIDE_URL.basename(__FILE__).'?status=ok');
				exit();
			}else{
				$smarty->assign('email',$email);
				$smarty->assign('key',$key);
				$smarty->assign('uzivatel',$uzivatel);
				$smarty->assign('chyby',$chyby);
				$smarty->display('hlavicka.tpl');
				$smarty->display('obnova-hesla.tpl');
				$smarty->display('paticka.tpl');
			}
		
		}else{
			$smarty->assign("email",$email);
			$smarty->assign("key",$key);
			$smarty->assign("uzivatel",$uzivatel);
			$smarty->display('hlavicka.tpl');
			$smarty->display('obnova-hesla.tpl');
			$smarty->display('paticka.tpl');
		}

	}else{
		$smarty->assign('chyby',array('Tento odkaz pro obnovení už byl použitý.'));
		$smarty->display('hlavicka.tpl');
		$smarty->display('alert.tpl');
		$smarty->display('paticka.tpl');
	}

}else{
	$smarty->assign('chyby',array('Odkaz pro obnovení hesla není úplný.','Heslo NEBYLO změněno.'));
	$smarty->display('hlavicka.tpl');
	$smarty->display('alert.tpl');
	$smarty->display('paticka.tpl');
}
?>
