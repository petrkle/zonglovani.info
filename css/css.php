<?php
if(isset($_GET['style']) and is_readable('./'.$_GET['style'].'.css')){
header ('content-type: text/css; charset: UTF-8');
$offset = 7 * 24 * 3600;
$expire = 'expires: ' . gmdate ('D, d M Y H:i:s', time() + $offset) . ' GMT';
header ($expire);
header("Last-Modified: ".gmdate("D, d M Y H:i:s", filemtime('./'.$_GET['style'].'.css'))." GMT");
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')){
	ob_start('ob_gzhandler');
}
print trim(file_get_contents('./'.$_GET['style'].'.css'));
}else{
	require('../404.php');
	exit();
}
