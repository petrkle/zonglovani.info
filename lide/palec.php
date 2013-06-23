<?php
require('../init.php');
require('../func.php');

if(isset($_GET['url']) and preg_match('/^\//',$_GET['url']) and !preg_match('/\.\./',$_GET['url'])){
	$next='http://'.$_SERVER['SERVER_NAME'].$_GET['url'];
	$url=$_GET['url'];
}else{
	$next='';
	$url=false;
}

if(isset($_GET['nahoru'])){
	$action='nahoru';
}elseif(isset($_GET['dolu'])){
	$action='dolu';
}elseif(isset($_GET['zrusit'])){
	$action='zrusit';
}else{
	$action=false;
}

if(isset($_GET['title'])){
	$title=$_GET['title'];
}else{
	$title=false;
}

if(is_logged()){
	if($url and $action and $title and preg_match('/^\//',$url)){
		if(isset($_SESSION['uzivatel']['hodnoceni']) and is_array($_SESSION['uzivatel']['hodnoceni'])){
			if($action=='nahoru'){
				$_SESSION['uzivatel']['hodnoceni'][$url]['palec']=1;
				$palec=1;
			}elseif($action=='dolu'){
				$_SESSION['uzivatel']['hodnoceni'][$url]['palec']=-1;
				$palec=-1;
			}else{
				if(isset($_SESSION['uzivatel']['hodnoceni'][$url])){
					unset($_SESSION['uzivatel']['hodnoceni'][$url]);
				}
				$palec=0;
			}
		}else{
			# prvni hodnocena stranka
			$_SESSION['uzivatel']['hodnoceni'][$url]=array();
			$_SESSION['uzivatel']['hodnoceni'][$url]['titulek']=$title;
			if($action=='nahoru'){
				$palec=1;
				$_SESSION['uzivatel']['hodnoceni'][$url]['palec']=1;
			}else{
				$_SESSION['uzivatel']['hodnoceni'][$url]['palec']=-1;
				$palec=-1;
			}
		}
		$_SESSION['uzivatel']['hodnoceni'][$url]['titulek']=$title;
		if($palec==0){
			unset($_SESSION['uzivatel']['hodnoceni'][$url]);
		}
		set_hodnoceni_uzivatel($_SESSION['uzivatel']['login'],$_SESSION['uzivatel']['hodnoceni']);
		set_hodnoceni_stranka($url,$_SESSION['uzivatel']['login'],$palec);
		header('Location: '.$next);
		exit();
	}else{
		header('Location: http://'.$_SERVER['SERVER_NAME']);
		exit();
	}
}else{
	header('Location: '.LIDE_URL.'prihlaseni.php?next='.$next);
	exit();
}

function set_hodnoceni_stranka($url,$login,$palec){
	$url=preg_replace('/(.+)\/$/','\1/index.html',$url);
	$hodnoceni=array();
	if(is_file(HODNOCENI_DATA.$url)){
		$hod=file(HODNOCENI_DATA.$url);
		if(count($hod)>0){
			foreach($hod as $line){
				$line=trim($line);
				$line=preg_split('/\*/',$line);
				$hodnoceni[$line[0]]=$line[1];
			}
	}
	}

	if($palec!=0){
		$hodnoceni[$login]=$palec;
	}else{
		if(isset($hodnoceni[$login])){
			unset($hodnoceni[$login]);
		}
	}
	if(!is_dir(dirname(HODNOCENI_DATA.$url))){
		mkdir(dirname(HODNOCENI_DATA.$url),0755,true);
	}
	if(count($hodnoceni)>0){
		$foo=fopen(HODNOCENI_DATA.$url,'w');
		foreach($hodnoceni as $jmeno=>$znamka){
				fwrite($foo,$jmeno.'*'.$znamka."\n");
		}
		fclose($foo);
	}else{
		if(is_file(HODNOCENI_DATA.$url)){
			unlink(HODNOCENI_DATA.$url);
		}
	}
}

function set_hodnoceni_uzivatel($login,$hodnoceni){
	if(is_array($hodnoceni) and count($hodnoceni)>0){
		$foo=fopen(LIDE_DATA.'/'.$login.'/hodnoceni.txt','w');
		foreach($hodnoceni as $url=>$bar){
			fwrite($foo,$url.'*'.$bar['palec'].'*'.$bar['titulek']."\n");
		}
		fclose($foo);
	}else{
		if(is_file(LIDE_DATA.'/'.$login.'/hodnoceni.txt')){
			unlink(LIDE_DATA.'/'.$login.'/hodnoceni.txt');
		}
	}

}

