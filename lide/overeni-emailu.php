<?php
require('../init.php');

$smarty->assign("titulek","Aktivace ��tu");
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
			rename("$tmp/passwd","$user/passwd");
			rename("$tmp/soukromi.txt","$user/soukromi.txt");
			rename("$tmp/vzkaz.txt","$user/vzkaz.txt");
			unlink("$tmp/activation.key");
			unlink("$tmp/login.txt");
			unlink("$tmp/created.time");
			rmdir($tmp);

			$smarty->assign("chyby",array("��et byl �sp�n� aktivov�n.","M��e� se <a href=\"".LIDE_URL."prihlaseni.php\" title=\"P�ihl�en�.\">p�ihl�sit</a>."));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
		
		}else{
			$smarty->assign("chyby",array("��et u� existuje."));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
		}
	}else{
		$smarty->assign("chyby",array("Neplatn� odkaz pro aktivaci ��tu."));
		$smarty->display('hlavicka.tpl');
		$smarty->display('alert.tpl');
		$smarty->display('paticka.tpl');
	}

}else{
	$smarty->assign("chyby",array("Odkaz pro aktivaci ��tu nen� �pln�.","��et NEBYL vytvo�en."));
	$smarty->display('hlavicka.tpl');
	$smarty->display('alert.tpl');
	$smarty->display('paticka.tpl');
}




?>
