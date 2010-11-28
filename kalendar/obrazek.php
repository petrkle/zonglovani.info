<?php
require('../init.php');
if(isset($_GET['jmeno']) and isset($_GET['pripona'])){
	$jmeno=preg_replace('/[\.\/]/','',$_GET['jmeno']);
	$pripona=$_GET['pripona'];
	if(!preg_match('/(jpg|png)/',$pripona)){
		require('../404.php');
		exit();
	}
}else{
	require('../404.php');
	exit();
}

if(is_readable(CALENDAR_IMG.'/'.$jmeno.'.'.$pripona)){
	header('Content-Length: '.filesize(CALENDAR_IMG.'/'.$jmeno.'.'.$pripona));
	if($pripona=='.png'){
		header('Content-Type: image/png');
	}else{
		header('Content-Type: image/jpeg');
	}
	@readfile(CALENDAR_IMG.'/'.$jmeno.'.'.$pripona);
}else{
	require('../404.php');
	exit();
}
?>
