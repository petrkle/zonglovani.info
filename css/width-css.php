<?php

if(isset($_GET['width'])){
	$width = preg_replace('/[^0-9]+/', '', $_GET['width']); 
}else{
	require('../404.php');
	exit();
}

require('../cache.php');
http_cache_headers(1209600,true);

if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) and substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')){
	ob_start('ob_gzhandler');
}

header ('content-type: text/css; charset: UTF-8');
print '.photo{width:98%;max-width:'.$width.'px;}';
