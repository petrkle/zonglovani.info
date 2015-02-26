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
		header('Content-Disposition: attachment; filename='.$jmeno.'.pdf');
		header('Content-Type: application/octet-stream');
		header('Content-Length: '.filesize('doc/'.$jmeno.'.pdf'));
		@readfile('doc/'.$jmeno.'.pdf');
}else{
	require('../404.php');
	exit();
}
