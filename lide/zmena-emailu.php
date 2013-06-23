<?php
require('../init.php');
require('../func.php');

$titulek='Změna emailu';

$smarty->assign('titulek',$titulek);
$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

if(isset($_GET['m']) and isset($_GET['k'])){
	$mail=$_GET['m'];
	$key=$_GET['k'];
	if(is_file(LIDE_TMP.'/'.$mail.'/change.key') and trim(array_pop(file(LIDE_TMP.'/'.$mail.'/change.key')))==$key and trim(array_pop(file(LIDE_TMP.'/'.$mail.'/change.time')))>(time()-TIMEOUT_REGISTRATION)){

		$tmp=LIDE_TMP.'/'.$mail;
		$login=trim(array_pop(file(LIDE_TMP.'/'.$mail.'/login.txt')));
		$oldmail=trim(array_pop(file(LIDE_TMP.'/'.$mail.'/oldmail.txt')));
		$usr=LIDE_DATA.'/'.$login;

		if(is_dir($usr)){
			rename($usr.'/'.$oldmail.'.mail',$usr.'/'.$mail.'.mail');
			unlink($tmp.'/change.key');
			unlink($tmp.'/change.time');
			unlink($tmp.'/login.txt');
			unlink($tmp.'/oldmail.txt');
			rmdir($tmp);

			$old_email_parts=preg_split('/@/',$oldmail);
			$old_fl=preg_replace('/^(.).*/','\1',$oldmail);
			$old_name=$old_email_parts[0];
			$old_domain=$old_email_parts[1];



	$fl=preg_replace('/^(.).*/','\1',$mail);
	$parts=preg_split('/@/',$mail);
	$name=$parts[0];
	$domain=$parts[1];

			if(!is_dir(LIDE_BY_MAIL."/$domain")){
				mkdir(LIDE_BY_MAIL."/$domain");
			}

			if(!is_dir(LIDE_BY_MAIL."/$domain/$fl")){
				mkdir(LIDE_BY_MAIL."/$domain/$fl");
			}

			if(!is_dir(LIDE_BY_MAIL."/$domain/$fl/$name")){
				mkdir(LIDE_BY_MAIL."/$domain/$fl/$name");
			}

			rename(LIDE_BY_MAIL."/$old_domain/$old_fl/$old_name/login",LIDE_BY_MAIL."/$domain/$fl/$name/login");

			rmdir(LIDE_BY_MAIL."/$old_domain/$old_fl/$old_name");
			rmdir(LIDE_BY_MAIL."/$old_domain/$old_fl");
			rmdir(LIDE_BY_MAIL."/$old_domain");
			

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

