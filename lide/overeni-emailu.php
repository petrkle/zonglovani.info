<?php
require('../init.php');

$smarty->assign("titulek","Aktivace účtu");
if(isset($_GET["m"]) and isset($_GET["k"])){
	$mail=$_GET["m"];
	$key=$_GET["k"];
	if(is_file(LIDE_TMP."/$mail/activation.key") and trim(array_pop(file(LIDE_TMP."/$mail/activation.key")))==$key and trim(array_pop(file(LIDE_TMP."/$mail/created.time")))>(time()-TIMEOUT_REGISTRATION)){
		$login=trim(array_pop(file(LIDE_TMP."/$mail/login.txt")));

		$tmp=LIDE_TMP."/$mail";
		$user=LIDE_DATA."/$login";

		if(!is_dir($user)){
			mkdir($user);
			$foo=fopen("$user/$mail.mail","w");
			fclose($foo);

			$foo=fopen("$user/registrace.txt","w");
			fwrite($foo,time());
			fclose($foo);

			rename("$tmp/jmeno.txt","$user/jmeno.txt");
			rename("$tmp/passwd.sha1","$user/passwd.sha1");
			rename("$tmp/soukromi.txt","$user/soukromi.txt");
			rename("$tmp/vzkaz.txt","$user/vzkaz.txt");
			unlink("$tmp/activation.key");
			unlink("$tmp/login.txt");
			unlink("$tmp/created.time");
			rmdir($tmp);

			$smarty->assign("chyby",array("Účet byl úspěšně aktivován.","Můžeš se <a href=\"".LIDE_URL."prihlaseni.php\" title=\"Přihlášení.\">přihlásit</a>."));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
		
		}else{
			$smarty->assign("chyby",array("Účet už existuje."));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
		}
	}else{
		$smarty->assign("chyby",array("Neplatný odkaz pro aktivaci účtu."));
		$smarty->display('hlavicka.tpl');
		$smarty->display('alert.tpl');
		$smarty->display('paticka.tpl');
	}

}else{
	$smarty->assign("chyby",array("Odkaz pro aktivaci účtu není úplný.","Účet NEBYL vytvořen."));
	$smarty->display('hlavicka.tpl');
	$smarty->display('alert.tpl');
	$smarty->display('paticka.tpl');
}




?>
