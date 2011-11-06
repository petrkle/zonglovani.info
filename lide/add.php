<?php
require('../init.php');
require('../func.php');

$smarty->assign('titulek','Nastavení účtu');

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep('Nový uživatelský účet');

if(!isset($_SESSION['reg_jmeno']) or !isset($_SESSION['reg_email'])){
	session_destroy();
	header('Location: '.LIDE_URL.'novy-ucet.php');
	exit();
}

if(isset($_SESSION['logged']) and $_SESSION['logged']==true){
	header('Location: '.LIDE_URL.'nastaveni/');
	exit();
}

$heslo=create_heslo();
$login=create_login($_SESSION['reg_email']);

$tmp=LIDE_TMP.'/'.$_SESSION['reg_email'];

if(!is_dir($tmp)){
	mkdir($tmp);
}

$foo=fopen($tmp.'/passwd.sha1','w');
fwrite($foo,sha1($heslo.$login));
fclose($foo);

$foo=fopen($tmp.'/jmeno.txt','w');
fwrite($foo,$_SESSION['reg_jmeno']);
fclose($foo);

$foo=fopen($tmp.'/login.txt','w');
fwrite($foo,$login);
fclose($foo);

$foo=fopen($tmp.'/soukromi.txt','w');
fwrite($foo,'formular');
fclose($foo);

$foo=fopen($tmp.'/created.time','w');
fwrite($foo,time());
fclose($foo);

$to = $_SESSION['reg_email'];

$subject_plain='Vítej v žonglérově slabikáři';
$subject = quoted_printable_header($subject_plain);

$splmail=preg_split('/@/',$_SESSION['reg_email']);
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

tvůj účet v žonglérově slabikáři je vytvořen. Na adrese:

http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'nastaveni

můžeš doladit nastavení účtu.

Tvoje přihlašovací údaje jsou:

Přihlašovací jméno: '.$to.'
Heslo: '.$heslo.'


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

můžeš doladit nastavení účtu.<br /><br />

Tvoje přihlašovací údaje jsou:<br /><br />

Přihlašovací jméno: '.$to.'<br />
Heslo: '.$heslo.'<br /><br />

-- <br/>
Petr Kletečka<br/>

<a href="mailto:admin@zonglovani.info">admin@zonglovani.info</a><br/>
<a href="http://zonglovani.info/kontakt.html">http://zonglovani.info/kontakt.html</a>
';

$message .= "</body>\n";
$message .= "</html>\n";

# -=-=-=- FINAL BOUNDARY

$message .= "--$mime_boundary--\n\n";

unset($_SESSION['reg_jmeno']);

$vysledek=mail($to, $subject, $message, $headers);

if($vysledek){
	header('Location: '.LIDE_URL.'prihlaseni.php?first');	
}else{
	header('Location: '.LIDE_URL.'prihlaseni.php?mail=false');	
}
