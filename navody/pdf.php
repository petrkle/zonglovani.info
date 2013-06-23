<?php
require('../init.php');
require('../func.php');

if(isset($_GET['file'])){
	$jmeno=preg_replace('/[\.\/]/','',$_GET['file']);
}else{
	require('../404.php');
	exit();
}

if(isset($_GET['fb'])){
	require_once $_SERVER['DOCUMENT_ROOT'].'/navody/fb/config.php';
}

if(is_readable('doc/'.$jmeno.'.pdf')){
	if(is_logged() or (isset($_GET['fb']) and !is_null($facebook->getUser()))){
		header('Content-Disposition: attachment; filename='.$jmeno.'.pdf');
		header('Content-Type: application/octet-stream');
		header('Content-Length: '.filesize('doc/'.$jmeno.'.pdf'));
		@readfile('doc/'.$jmeno.'.pdf');
	}else{
		header('Location: http://'.$_SERVER['SERVER_NAME'].LIDE_URL.'prihlaseni.php?next=/navody/&notice');
		exit();
	}
}else{
	require('../404.php');
	exit();
}
