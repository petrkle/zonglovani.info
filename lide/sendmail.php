<?php
require('../init.php');
require('../func.php');

$titulek='Odeslání vzkazu';
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

if(isset($_GET['m'])){
	$messageid=$_GET['m'];
	$foo=LIDE_VZKAZY.'/'.$messageid;

	if(is_dir($foo) and trim(array_pop(file($foo.'/created.time')))>(time()-TIMEOUT_VZKAZ)){
		$odesilatel=trim(array_pop(file($foo.'/odesilatel.txt')));
		$to=trim(array_pop(file($foo.'/prijemce.txt')));
		$vzkaz=file_get_contents($foo.'/vzkaz.txt');

		$subject_plain='Vzkaz z žonglérova slabikáře';
		$subject = quoted_printable_header($subject_plain);

		$mime_boundary = '--zs--'.abs(crc32(time()));

$headers = "Return-Path: $odesilatel\n";
$headers .= "From: $odesilatel\n";
$headers .= "Reply-To: $odesilatel\n";
$headers .= "Precedence: bulk\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";

# -=-=-=- TEXT EMAIL PART

$message = "--$mime_boundary\n";
$message .= "Content-Type: text/plain; charset=UTF-8\n";
$message .= "Content-Transfer-Encoding: 8bit\n\n";

$message .= $vzkaz.'
-- 
Tento vzkaz byl zaslán pomocí žonglérova slabikáře.
http://zonglovani.info
';

# -=-=-=- HTML EMAIL PART
 
$message .= "--$mime_boundary\n";
$message .= "Content-Type: text/html; charset=UTF-8\n";
$message .= "Content-Transfer-Encoding: 8bit\n\n";

$message .= "<html>\n";
$message .= "<head><meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />\n";
$message .= "<title>$subject_plain</title></head>\n";
$message .= "<body style=\"font-family: sans-serif; font-size:1em; color:#000;\">\n";

$message .= $vzkaz.'<br/>
-- <br/>
Tento vzkaz byl zaslán pomocí žonglérova slabikáře.<br/>
<a href="http://zonglovani.info/">http://zonglovani.info/</a>
';

$message .= "</body>\n";
$message .= "</html>\n";

# -=-=-=- FINAL BOUNDARY

$message .= "--$mime_boundary--\n\n";


			$vysledek=mail($to, $subject, $message, $headers);


		if($vysledek){
			$smarty->assign('chyby',array('Vzkaz byl odeslán.'));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
			unlink($foo.'/odesilatel.txt');
			unlink($foo.'/prijemce.txt');
			unlink($foo.'/vzkaz.txt');
			unlink($foo.'/created.time');
			rmdir($foo);
		}else{
			$smarty->assign('chyby',array('Při odesílání vzkazu nastala chyba.'));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
		}
	}else{
		$smarty->assign('chyby',array('Neplatný odkaz pro zaslání vzkazu.'));
		$smarty->display('hlavicka.tpl');
		$smarty->display('alert.tpl');
		$smarty->display('paticka.tpl');
	}

}else{
	$smarty->assign('chyby',array('Odkaz pro zaslání vzkazu není úplný.'));
	$smarty->display('hlavicka.tpl');
	$smarty->display('alert.tpl');
	$smarty->display('paticka.tpl');
}




?>
