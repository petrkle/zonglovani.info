<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Odeslání vzkazu");
if(isset($_GET["m"])){
	$messageid=$_GET["m"];
	$foo=LIDE_VZKAZY."/$messageid";

	if(is_dir($foo) and trim(array_pop(file("$foo/created.time")))>(time()-TIMEOUT_VZKAZ)){
		$odesilatel=trim(array_pop(file("$foo/odesilatel.txt")));
		$prijemce=trim(array_pop(file("$foo/prijemce.txt")));
		$vzkaz=file_get_contents("$foo/vzkaz.txt");

		$subject = "=?utf-8?Q?".preg_replace("/=\r\n/","",quoted_printable_encode("Vzkaz z žonglérova slabikáře"))."?=";

		$headers = 'Return-Path: '.$odesilatel . "\r\n" .
    'From: '.$odesilatel . "\r\n" .
    'Reply-To: '.$odesilatel . "\r\n" .
    'Content-Type: text/plain; charset=utf-8' . "\r\n" .
    'Content-Transfer-Encoding: quoted-printable' . "\r\n" .
    'Precedence: bulk';
$message = $vzkaz.'

-- 
Tento vzkaz byl zaslán pomocí žonglérova slabikáře.
http://zonglovani.info
';

			$vysledek=mail($prijemce, $subject, quoted_printable_encode($message), $headers);


		if($vysledek){
			$smarty->assign("chyby",array("Vzkaz byl odeslán."));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
			unlink("$foo/odesilatel.txt");
			unlink("$foo/prijemce.txt");
			unlink("$foo/vzkaz.txt");
			unlink("$foo/created.time");
			rmdir($foo);
		}else{
			$smarty->assign("chyby",array("Při odesílání vzkazu nastala chyba."));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
		}
	}else{
		$smarty->assign("chyby",array("Neplatný odkaz pro zaslání vzkazu."));
		$smarty->display('hlavicka.tpl');
		$smarty->display('alert.tpl');
		$smarty->display('paticka.tpl');
	}

}else{
	$smarty->assign("chyby",array("Odkaz pro zaslání vzkazu není úplný."));
	$smarty->display('hlavicka.tpl');
	$smarty->display('alert.tpl');
	$smarty->display('paticka.tpl');
}




?>