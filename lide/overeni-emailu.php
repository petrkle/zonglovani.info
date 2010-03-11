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


		$subject = '=?utf-8?Q?'.imap_8bit('Vítej v žonglérově slabikáři').'?=';

		$headers = 'Return-Path: robot@zonglovani.info' . "\r\n" .
    'From: robot@zonglovani.info' . "\r\n" .
    'Reply-To: robot@zonglovani.info' . "\r\n" .
    'Content-Type: text/plain; charset=utf-8' . "\r\n" .
    'Content-Transfer-Encoding: quoted-printable' . "\r\n" .
    'Precedence: bulk';
$message = 'Ahoj,

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

		$vysledek=mail($mail, $subject, imap_8bit($message), $headers);

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
