<?php
require('../init.php');
require('../func.php');

$loginy=get_loginy();
$now=time();

define('SENDMAIL_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/sendmails'); 

print '<pre>';

foreach($loginy as $login){
	if(is_file(LIDE_DATA.'/'.$login.'/prihlaseni.txt')){
		$lastlogin=filemtime(LIDE_DATA.'/'.$login.'/prihlaseni.txt');
	}else{
		$lastlogin=filemtime(LIDE_DATA.'/'.$login);
	}

	$info = get_user_props($login);

	if(($now-$lastlogin)>(365*24*3600)){
		# zablokovat ucet
		print "lock - $login\n";
		unlink(SENDMAIL_DATA.'/'.$info['email'].'.spici','w');
		$foo=fopen(LIDE_DATA.'/'.$login.'/LOCKED','w');
		fwrite($foo,time());
		fclose($foo);
		if(is_file(LIDE_DATA.'/'.$login.'/pusobiste.txt')){
			$handle = fopen('http://'.$_SERVER['SERVER_NAME'].'/mapa/update-zongleri.php', 'r');
			fclose($handle);
		}
	
	}elseif(($now-$lastlogin)>(335*24*3600)){
		# poslat varovny mail
		if(!is_file(SENDMAIL_DATA.'/'.$info['email'].'.spici')){
			print "warn - $login\n";

		$to = $info['email'];
		
		$subject_plain='Účet v žonglérově slabikáři';
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

tvůj účet v žonglérově slabikáři nebyl použit už skoro rok.

Přihlašovací jméno: '.$login.'
Zadaný email: '.$info['email'].'
Adresa pro obnovení hesla:
http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'zapomenute-heslo.php

Na adrese:

http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'nastaveni

můžeš aktualizovat údaje v profilu a tím prodloužit platnost účtu
o další rok. Nebo počkat dalších 30 dní a účet bude zrušen úplně.

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

tvůj účet v žonglérově slabikáři nebyl použit už skoro rok.<br /><br />

Přihlašovací jméno: '.$login.'<br />
Zadaný email: '.$info['email'].'<br />
Adresa pro obnovení hesla:<br />
<a href="http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'zapomenute-heslo.php" title="Obnovení hesla">http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'zapomenute-heslo.php</a><br /><br />

Na adrese:<br />

<a href="http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'nastaveni" title="Nastavení účtu">http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'nastaveni</a><br />

můžeš aktualizovat údaje v profilu a tím prodloužit platnost účtu<br />
o další rok. Nebo počkat dalších 30 dní a účet bude zrušen úplně.<br /><br />

-- <br/>
Petr Kletečka<br/>

<a href="mailto:admin@zonglovani.info">admin@zonglovani.info</a><br/>
<a href="http://zonglovani.info/kontakt.html">http://zonglovani.info/kontakt.html</a>
';

$message .= "</body>\n";
$message .= "</html>\n";

# -=-=-=- FINAL BOUNDARY

$message .= "--$mime_boundary--\n\n";

			$vysledek=mail($to, $subject, $message, $headers);
			if($vysledek){
				# zapsat soubor
				$foo=fopen(SENDMAIL_DATA.'/'.$info['email'].'.spici','w');
				fwrite($foo,time());
				fclose($foo);
			}

		}	

	}else{
		# obnoveny ucet
		if(is_file(SENDMAIL_DATA.'/'.$info['email'].'.spici')){
			unlink(SENDMAIL_DATA.'/'.$info['email'].'.spici');
			var_dump($info['email']);
		}	
	}

}


?>
