<?php
require('../init.php');
require('../func.php');

if(isset($_GET['url'])){
	$next='http://'.$_SERVER['SERVER_NAME'].$_GET['url'];
	$url=$_GET['url'];
}else{
	$next='';
	$url=false;
}

if(isset($_GET['add'])){
	$action='add';
}elseif(isset($_GET['remove'])){
	$action='remove';
}else{
	$action=false;
}

if(isset($_GET['title'])){
	$title=$_GET['title'];
}else{
	$title=false;
}

if(is_logged()){
	if($url and $action and $title){
		if(isset($_SESSION['uzivatel']['oblibene']) and is_array($_SESSION['uzivatel']['oblibene'])){
			# dalsi oblibena stranka
			if($action=='add'){
				$_SESSION['uzivatel']['oblibene'][$url]=$title;
			}else{
				unset($_SESSION['uzivatel']['oblibene'][$url]);
			}
		}else{
			# prvni oblibena stranka
			$_SESSION['uzivatel']['oblibene'][$url]=array();
			$_SESSION['uzivatel']['oblibene'][$url]=$title;
		}
		set_oblibene($_SESSION['uzivatel']['login'],$_SESSION['uzivatel']['oblibene']);
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
?>
