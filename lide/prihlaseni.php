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
	$uzivatel=get_user_props($input_login);
	if($uzivatel){
		if($uzivatel['status']=='locked'){
			array_push($chyby,'Účet byl zrušen.');
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
		if(sha1($input_heslo.$input_login)==$passwd_hash){
			# úspěšné přihlášení
			$_SESSION['logged']=true;
			$_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
			$_SESSION['uzivatel']=get_user_complete($uzivatel['login']);
			if(is_readable(LIDE_DATA.'/'.$uzivatel['login'].'/prihlaseni.txt')){
				$prihlaseni=file(LIDE_DATA.'/'.$uzivatel['login'].'/prihlaseni.txt');
				$lastlogin=preg_split('/\*/',array_pop($prihlaseni));
				$zmeny=get_simple_changelog($lastlogin[0]);
				$zpravy=array_reverse(get_diskuse_zpravy());
				$baz=get_tipy();
				$tipy=array();
				for($foo=0;$foo<ZPRAV_NA_STRANKU;$foo++){
					if($baz[$foo]['cas']>$lastlogin[0]){
						$tipy[$foo]=$baz[$foo];
						$tipy[$foo]['typ']='tip';
					}
				}
				foreach($zpravy as $key=>$zprava){
					if($zprava['cas']<$lastlogin[0]){
						unset($zpravy[$key]);
					}else{
						$zpravy[$key]['typ']='diskuse';
					}
				}
				$rss=get_news(40,'/.*-slabikar.*\.txt/');
				foreach($rss as $key=>$clanek){
					if($clanek['cas']<$lastlogin[0]){
						unset($rss[$key]);
					}else{
						$rss[$key]['typ']='rss';
					}
				}
				$news=array_merge($zmeny,$zpravy,$tipy,$rss);
				usort($news, 'sort_by_time');
				if(count($news)>0){
					$_SESSION['changes']=array_reverse($news);
					$_SESSION['changes_pocet']=count($news);
				}
			}

			$foo=fopen(LIDE_DATA.'/'.$uzivatel['login'].'/prihlaseni.txt','a+');
			fwrite($foo,time().'*'.$_SERVER['REMOTE_ADDR'].'*'.$_SERVER['HTTP_USER_AGENT']."\n");
			fclose($foo);

			header('Location: '.$next);
			exit();
		}else{
		array_push($chyby,'Špatné jméno nebo heslo.','Pro přihlášení je potřeba povolit cookies. <a class="info" href="#">?<span class="tooltip">Cookies (sušenky) jsou malé soubory, které slouží k rozpoznání spojení mezi tvým počítačem a počítačem na kterém běží žonglérův slabikář. V případě problémů kontaktuj místního počítačového odborníka.</span></a>');
			$smarty->assign('chyby',$chyby);
			$smarty->assign('login',$input_login);
			$smarty->assign_by_ref('trail', $trail->path);
			$smarty->display('hlavicka.tpl');
			$smarty->display('prihlaseni.tpl');
			$smarty->display('paticka.tpl');
			exit();
		}
	
	}else{
		array_push($chyby,'Špatné jméno nebo heslo.','Pro přihlášení je potřeba povolit cookies. <a class="info" href="#">?<span class="tooltip">Cookies (sušenky) jsou malé soubory, které slouží k rozpoznání spojení mezi tvým počítačem a počítačem na kterém běží žonglérův slabikář. V případě problémů kontaktuj místního počítačového odborníka.</span></a>');
		$smarty->assign('chyby',$chyby);
		$smarty->assign('login',$input_login);
		$smarty->assign_by_ref('trail', $trail->path);
		$smarty->display('hlavicka.tpl');
		$smarty->display('prihlaseni.tpl');
		$smarty->display('paticka.tpl');
		exit();
	}

}else{
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->display('hlavicka.tpl');
	$smarty->display('prihlaseni.tpl');
	$smarty->display('paticka.tpl');
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

?>
