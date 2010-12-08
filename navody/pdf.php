<?php
require('../init.php');
require('../func.php');
if(isset($_GET['file'])){
	$jmeno=preg_replace('/[\.\/]/','',$_GET['file']);
}else{
	require('../404.php');
	exit();
}

if(is_readable('doc/'.$jmeno.'.pdf')){
	if(!is_logged()){
		header('Location: '.LIDE_URL.'prihlaseni.php?next=/navody/&notice');
		exit();
	}
	header('Content-Disposition: attachment; filename='.$jmeno.'.pdf');
	header('Content-Type: application/pdf');
	header('Content-Length: '.filesize('doc/'.$jmeno.'.pdf'));
	@readfile('doc/'.$jmeno.'.pdf');
}else{
	require('../404.php');
	exit();
}
?>
