<?php
require('../init.php');
require('../func.php');

$smarty->assign('titulek','Zrušení účtu');
if(isset($_GET['m']) and isset($_GET['k'])){
	$mail=$_GET['m'];
	$key=$_GET['k'];
	if(is_file(LIDE_TMP."/$mail/locked.key") and trim(array_pop(file(LIDE_TMP."/$mail/locked.key")))==$key and trim(array_pop(file(LIDE_TMP."/$mail/locked.time")))>(time()-TIMEOUT_REGISTRATION)){
		$login=trim(array_pop(file(LIDE_TMP."/$mail/locked.login")));

		$user=LIDE_DATA."/$login";
		$tmp=LIDE_TMP."/$mail";

		if(is_dir($user)){
			$foo=fopen($user.'/LOCKED','w');
			fclose($foo);

			$foo=fopen($user.'/zruseni.txt','w');
			fwrite($foo,time());
			fclose($foo);

			unlink($tmp.'/locked.key');
			rename($tmp.'/locked.time',$user.'/locked.time');
			unlink($tmp.'/locked.login');
			rmdir($tmp);

			$handle = fopen('http://'.$_SERVER['SERVER_NAME'].'/mapa/update-zongleri.php', 'r');
			fclose($handle);

			session_destroy();
			unset($_SESSION['logged']);
			unset($_SESSION['ip']);
			unset($_SESSION['uzivatel']);
			setcookie('ZS', '', time()-(60*60*24), '/');
			$smarty->assign('chyby',array('Účet byl zrušen.'));
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
		$smarty->assign('chyby',array('Neplatný odkaz pro zrušení účtu.'));
		$smarty->display('hlavicka.tpl');
		$smarty->display('alert.tpl');
		$smarty->display('paticka.tpl');
	}

}else{
	$smarty->assign('chyby',array('Odkaz pro zrušení účtu není úplný.','Účet NEBYL zrušen.'));
	$smarty->display('hlavicka.tpl');
	$smarty->display('alert.tpl');
	$smarty->display('paticka.tpl');
}

