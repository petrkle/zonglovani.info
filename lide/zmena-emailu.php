<?php
require('../init.php');
require('../func.php');

$smarty->assign('titulek','Změna emailu');
if(isset($_GET['m']) and isset($_GET['k'])){
	$mail=$_GET['m'];
	$key=$_GET['k'];
	if(is_file(LIDE_TMP.'/'.$mail.'/change.key') and trim(array_pop(file(LIDE_TMP.'/'.$mail.'/change.key')))==$key and trim(array_pop(file(LIDE_TMP.'/'.$mail.'/change.time')))>(time()-TIMEOUT_REGISTRATION)){

		$tmp=LIDE_TMP."/$mail";
		$login=trim(array_pop(file(LIDE_TMP."/$mail/login.txt")));
		$oldmail=trim(array_pop(file(LIDE_TMP."/$mail/oldmail.txt")));
		$usr=LIDE_DATA.'/'.$login;

		if(is_dir($usr)){
			rename($usr.'/'.$oldmail.'.mail',$usr.'/'.$mail.'.mail');
			unlink($tmp.'/change.key');
			unlink($tmp.'/change.time');
			unlink($tmp.'/login.txt');
			unlink($tmp.'/oldmail.txt');
			rmdir($tmp);

			$smarty->assign('chyby',array('Email byl úspěšně změněn.'));
			if(is_logged()){
				$_SESSION['uzivatel']=get_user_props($_SESSION['uzivatel']['login']);
			}
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
		
		}else{
			$smarty->assign('chyby',array('Účet neexistuje.'));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
		}
	}else{
		$smarty->assign('chyby',array('Neplatný odkaz pro změnu emailu.'));
		$smarty->display('hlavicka.tpl');
		$smarty->display('alert.tpl');
		$smarty->display('paticka.tpl');
	}

}else{
	$smarty->assign('chyby',array('Odkaz pro změnu emailu není úplný.','Email NEBYL změněn.'));
	$smarty->display('hlavicka.tpl');
	$smarty->display('alert.tpl');
	$smarty->display('paticka.tpl');
}




?>
