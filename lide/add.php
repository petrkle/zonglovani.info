<?php
require('../init.php');
require('../func.php');
include_once($lib.'/SMTP.php');
include_once($lib.'/Mail.php');
include_once($lib.'/Mail/mime.php');

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

$subject = 'Vítej v žonglérově slabikáři';
$uzivatel = array('email'=>$_SESSION['reg_email'],'heslo'=>$heslo);

$smarty->assign('uzivatel',$uzivatel);
$smarty->assign('subject',$subject);

$vysledek = sendmail(array(
	'from'=>'robot@zonglovani.info',
	'to'=>$uzivatel['email'],
	'subject'=>$subject,
	'text'=>$smarty->fetch('mail/lide-add.txt.tpl'),
	'html'=>$smarty->fetch('mail/lide-add.html.tpl'),
	'img'=>array('../img/5/5micku.png'),
));

unset($_SESSION['reg_jmeno']);

if($vysledek){
	header('Location: '.LIDE_URL.'prihlaseni.php?first');	
}else{
	header('Location: '.LIDE_URL.'prihlaseni.php?mail=false');	
}
