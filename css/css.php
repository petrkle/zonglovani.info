<?php
if(isset($_GET['style']) and is_readable('./'.$_GET['style'].'.css')){
header ('content-type: text/css; charset: UTF-8');
require('../cache.php');
http_cache_headers(1209600,true);

if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')){
	ob_start('ob_gzhandler');
}
print trim(file_get_contents('./'.$_GET['style'].'.css'));
}else{
	require('../404.php');
	exit();
}
