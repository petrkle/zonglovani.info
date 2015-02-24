<?php
require('../init.php');
require('../func.php');
require($_SERVER['DOCUMENT_ROOT'].'/rss/rss.php');

$smarty->assign('titulek','Přihlášení');
$smarty->assign('robots','noindex,follow');

if(isset($_GET['next']) and preg_match('/^\//',$_GET['next'])){
	$next=$_GET['next'];
}elseif(isset($_POST['next']) and preg_match('/^\//',$_POST['next'])){
	$next=$_POST['next'];
}else{
	$next='/';
}

if(isset($_GET['mail'])){
	$smarty->assign('chyba','jo');
	$chyby=array();
	array_push($chyby,'Jejda. Vytváření účtu selhalo. <a href="novy-ucet.php">Zkusit znovu</a>.');
	$smarty->assign('chyby',$chyby);
}

if(isset($_GET['first'])){
	$smarty->assign('first','jo');

	$freemails = array(
		'seznam.cz' => 'https://email.seznam.cz',
		'email.cz' => 'https://email.seznam.cz',
		'post.cz' => 'https://email.seznam.cz',
		'gmail.com' => 'https://mail.google.com',
		'centrum.cz' => 'https://mail.centrum.cz',
		'volny.cz' => 'https://mail.volny.cz',
		'azet.sk' => 'https://emailnew.azet.sk',
		'centrum.sk' => 'http://mail.centrum.sk',
		'atlas.cz' => 'https://auser.centrum.cz'
	);

	$maildomain = preg_replace('/.*@/','',$_SESSION['reg_email']);

	$chyby=array();
	$zprava = 'Na tvůj e-mail ('.$_SESSION['reg_email'].') byla odeslána zpráva s údaji pro přihlášení do žonglérova slabikáře.';

	if(isset($freemails[$maildomain])){
		$zprava .= ' <a href="'.$freemails[$maildomain].'" title="Přihlášení k emailu">Přečíst&nbsp;&raquo;</a>';
	}

	array_push($chyby,$zprava);
	$smarty->assign('chyby',$chyby);
}

if(preg_match('/odhlaseni/',$next)){
	$next='/';
}

if(is_logged()){
	header('Location: '.LIDE_URL.'nastaveni');
	exit();
}

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep('Přihlášení uživatele');

$smarty->assign('next',$next);

if(isset($_POST['login']) and isset($_POST['heslo']) and isset($_GET['action'])){
	$chyby=array();
	$input_login=strtolower(trim($_POST['login']));
	$input_heslo=trim($_POST['heslo']);

	if(is_new_account($input_login)){
		# aktivace nového účtu
		
		$login=trim(file_get_contents(LIDE_TMP.'/'.$input_login.'/login.txt'));

		$passwd_hash=trim(file_get_contents(LIDE_TMP.'/'.$input_login.'/passwd.sha1'));

		if(sha1($input_heslo.$login)!=$passwd_hash){
			spatne_jmeno_nebo_heslo();
		}

		$tmp=LIDE_TMP.'/'.$input_login;
		$user=LIDE_DATA.'/'.$login;

			mkdir($user);
			$foo=fopen($user.'/'.$input_login.'.mail','w');
			fclose($foo);

			$foo=fopen($user.'/registrace.txt','w');
			fwrite($foo,time());
			fclose($foo);

			rename($tmp.'/jmeno.txt',$user.'/jmeno.txt');
			rename($tmp.'/passwd.sha1',$user.'/passwd.sha1');
			rename($tmp.'/soukromi.txt',$user.'/soukromi.txt');

			unlink($tmp.'/login.txt');
			unlink($tmp.'/created.time');
			rmdir($tmp);

	$fl=preg_replace('/^(.).*/','\1',$input_login);
	$parts=preg_split('/@/',$input_login);
	$name=$parts[0];
	$domain=$parts[1];

	if(!is_dir(LIDE_BY_MAIL."/$domain")){
		mkdir(LIDE_BY_MAIL."/$domain");
	}

	if(!is_dir(LIDE_BY_MAIL."/$domain/$fl")){
		mkdir(LIDE_BY_MAIL."/$domain/$fl");
	}

	if(!is_dir(LIDE_BY_MAIL."/$domain/$fl/$name")){
		mkdir(LIDE_BY_MAIL."/$domain/$fl/$name");
	}

	$foo=fopen(LIDE_BY_MAIL."/$domain/$fl/$name/login",'w');
	fwrite($foo,$login);
	fclose($foo);

			session_name('ZS');
			session_start();
			load_user($login);
			header('Location: '.LIDE_URL.'nastaveni');
			exit();

	}


	if(is_zs_account($input_login)){
		# starý zpusob přihlášení
		array_push($chyby,'Zůsob přihlašování do žonglérova slabikáře se změnil.','Pro přihlášení použij <strong>email</strong> zadaný při registraci.','Omlouvám se za způsobené potíže.');
		$smarty->assign('chyby',$chyby);
		$smarty->assign_by_ref('trail', $trail->path);
		$smarty->display('hlavicka.tpl');
		$smarty->display('prihlaseni.tpl');
		$smarty->display('paticka.tpl');
		exit();
	}

	if(is_zs_email($input_login)){
		# ověření hesla, pokus o přihlášení
		$login=email2login($input_login);
		$uzivatel=get_user_props($login);

		if($uzivatel['status']=='locked'){
			array_push($chyby,'Účet je zrušen kvůli dlouhodobé neaktivitě.','<a href="zapomenute-heslo.php">Poslat nové heslo</a>.');
		}

		if($uzivatel['status']=='revoked'){
			array_push($chyby,'Účet je zablokován.');
		}

		if(count($chyby)!=0){
			$smarty->assign('chyby',$chyby);
			$smarty->assign('login',$input_login);
			$smarty->assign_by_ref('trail', $trail->path);
			$smarty->display('hlavicka.tpl');
			$smarty->display('prihlaseni.tpl');
			$smarty->display('paticka.tpl');
			exit();
		}

		$passwd_hash=trim(array_pop(file(LIDE_DATA.'/'.$uzivatel['login'].'/passwd.sha1')));
		if(sha1($input_heslo.$login)==$passwd_hash){
			# úspěšné přihlášení
			session_name('ZS');
			session_start();
			load_user($uzivatel['login']);
			header('Location: '.$next);
			exit();
	}else{
		spatne_jmeno_nebo_heslo();
	}
	}else{
		spatne_jmeno_nebo_heslo();
	}

}else{


	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->display('hlavicka.tpl');
	$smarty->display('prihlaseni.tpl');
	$smarty->display('paticka.tpl');
}

function spatne_jmeno_nebo_heslo(){
	global $chyby,$smarty,$input_login;
		array_push($chyby,'Špatné jméno nebo heslo.','Obnovit <a href="zapomenute-heslo.php" title="Zapomenuté heslo.">zapomenuté heslo</a>.');
		$smarty->assign('chyby',$chyby);
		$smarty->assign('login',$input_login);
		$smarty->assign_by_ref('trail', $trail->path);
		$smarty->display('hlavicka.tpl');
		$smarty->display('prihlaseni.tpl');
		$smarty->display('paticka.tpl');
		exit();
}

function is_new_account($input_login){
	$navrat=false;
	if(is_dir(LIDE_TMP.'/'.$input_login) and !is_file(LIDE_TMP.'/'.$input_login.'/oldmail.txt')){
		$navrat=true;
	}
	return $navrat;
}

function get_simple_changelog($cas){
	if(is_readable($_SERVER['DOCUMENT_ROOT'].'/ChangeLog')){

$zmeny=array();
$rn=1;
$changelog = array_reverse(file($_SERVER['DOCUMENT_ROOT'].'/ChangeLog'));
	foreach ($changelog as $change){
		$change=preg_split('/\*/',trim($change));
		if($change[1]>$cas){
			$zmeny[$rn]['cislo']=$rn;
			$zmeny[$rn]['hash']=$change[0];
			$zmeny[$rn]['datum_hr'] = date('j. n. Y G.i',$change[1]); 
			$zmeny[$rn]['cas']=$change[1];
			$zmeny[$rn]['popis']=$change[2];
			$zmeny[$rn]['typ']='change';
		}
		$rn++;
	}
}
return array_reverse($zmeny);
}

