<?php
require('../init.php');
require('../func.php');
include_once($lib.'/SMTP.php');
include_once($lib.'/Mail.php');
include_once($lib.'/Mail/mime.php');

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
		if(is_file(SENDMAIL_DATA.'/'.$info['email'].'.spici')){
			unlink(SENDMAIL_DATA.'/'.$info['email'].'.spici');
		}
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

		$smarty->assign('user', $info);
		$vysledek = sendmail(array(
			'from'=>'robot@zonglovani.info',
			'to'=>$info['email'],
			'subject'=>'Účet v žonglérově slabikáři',
			'text'=>$smarty->fetch('mail/cron-old-accounts.txt.tpl'),
			'html'=>$smarty->fetch('mail/cron-old-accounts.html.tpl'),
		));
		
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
