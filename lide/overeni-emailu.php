<?php
require('../init.php');
require('../func.php');

$titulek='Aktivace účtu';

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);

if(isset($_GET['m']) and isset($_GET['k'])){
	$mail=$_GET['m'];
	$key=$_GET['k'];
	if(is_file(LIDE_TMP.'/'.$mail.'/activation.key') and trim(array_pop(file(LIDE_TMP.'/'.$mail.'/activation.key')))==$key and trim(array_pop(file(LIDE_TMP.'/'.$mail.'/created.time')))>(time()-TIMEOUT_REGISTRATION)){
		$login=trim(array_pop(file(LIDE_TMP.'/'.$mail.'/login.txt')));

		$tmp=LIDE_TMP.'/'.$mail;
		$user=LIDE_DATA.'/'.$login;

		if(!is_dir($user)){
			mkdir($user);
			$foo=fopen($user.'/'.$mail.'.mail','w');
			fclose($foo);

			$foo=fopen($user.'/registrace.txt','w');
			fwrite($foo,time());
			fclose($foo);

			rename($tmp.'/jmeno.txt',$user.'/jmeno.txt');
			rename($tmp.'/passwd.sha1',$user.'/passwd.sha1');
			rename($tmp.'/soukromi.txt',$user.'/soukromi.txt');
			rename($tmp.'/vzkaz.txt',$user.'/vzkaz.txt');
			unlink($tmp.'/activation.key');
			unlink($tmp.'/login.txt');
			unlink($tmp.'/created.time');
			rmdir($tmp);


		$subject_plain='Vítej v žonglérově slabikáři';
		$subject = quoted_printable_header($subject_plain);

		$mime_boundary = '--zs--'.abs(crc32(time()));

$headers = "Return-Path: robot@zonglovani.info\n";
$headers .= "From: robot@zonglovani.info\n";
$headers .= "Reply-To: robot@zonglovani.info\n";
$headers .= "Precedence: bulk\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";

# -=-=-=- TEXT EMAIL PART

$message = "--$mime_boundary\n";
$message .= "Content-Type: text/plain; charset=UTF-8\n";
$message .= "Content-Transfer-Encoding: 8bit\n\n";

$message .= 'Ahoj,

tvůj účet v žonglérově slabikáři je aktivní. Na adrese:

http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'nastaveni

můžeš doladit nastavení účtu.

Tvoje přihlašovací údaje jsou:

Login: '.$login.'
Heslo: zadané při registraci

Zapomenuté heslo jde jednoduše obnovit na adrese:

http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'zapomenute-heslo.php

-- 
Petr Kletečka

admin@zonglovani.info
http://zonglovani.info/kontakt.html
';

# -=-=-=- HTML EMAIL PART
 
$message .= "--$mime_boundary\n";
$message .= "Content-Type: text/html; charset=UTF-8\n";
$message .= "Content-Transfer-Encoding: 8bit\n\n";

$message .= "<html>\n";
$message .= "<head><meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />\n";
$message .= "<title>$subject_plain</title></head>\n";
$message .= "<body style=\"font-family: sans-serif; font-size:1em; color:#000;\">\n";

$message .= 'Ahoj,<br /><br/>

tvůj účet v žonglérově slabikáři je aktivní. Na adrese:<br />

<a href="http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'nastaveni">http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'nastaveni</a><br />

můžeš doladit nastavení účtu.<br />

Tvoje přihlašovací údaje jsou:<br />

Login: '.$login.'<br />
Heslo: zadané při registraci<br />

Zapomenuté heslo jde jednoduše obnovit na adrese:<br />

<a href="http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'zapomenute-heslo.php">http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'zapomenute-heslo.php</a><br />

-- <br/>
Petr Kletečka<br/>

<a href="mailto:admin@zonglovani.info">admin@zonglovani.info</a><br/>
<a href="http://zonglovani.info/kontakt.html">http://zonglovani.info/kontakt.html</a>
';

$message .= "</body>\n";
$message .= "</html>\n";

# -=-=-=- FINAL BOUNDARY

$message .= "--$mime_boundary--\n\n";

		$vysledek=mail($mail, $subject, $message, $headers);

			$smarty->assign('chyby',array('Účet byl úspěšně aktivován.','Můžeš se <a href="'.LIDE_URL.'nastaveni/" title="Přihlášení">přihlásit</a>.'));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
		
		}else{
			$smarty->assign('chyby',array('Účet už existuje.'));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
		}
	}else{
		if(is_zs_email($mail)){
			$chyby=array('Účet už je aktivní. Můžeš se <a href="'.LIDE_URL.'nastaveni/" title="Přihlášení">přihlásit</a>.');
		}else{
			$chyby=array('Neplatný odkaz pro aktivaci účtu.');
		}
		$smarty->assign('chyby',$chyby);
		$smarty->display('hlavicka.tpl');
		$smarty->display('alert.tpl');
		$smarty->display('paticka.tpl');
	}

}else{
	$smarty->assign('chyby',array('Odkaz pro aktivaci účtu není úplný.','Účet NEBYL vytvořen.'));
	$smarty->display('hlavicka.tpl');
	$smarty->display('alert.tpl');
	$smarty->display('paticka.tpl');
}

?>
