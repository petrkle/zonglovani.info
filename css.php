<?php
if(isset($_GET['style']) and is_readable('css/'.$_GET['style'].'.css')){
	if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')){
		ob_start('ob_gzhandler');
	}
header ('content-type: text/css; charset: UTF-8');
header ('cache-control: must-revalidate');
$offset = 60 * 60;
$expire = 'expires: ' . gmdate ('D, d M Y H:i:s', time() + $offset) . ' GMT';
header ($expire);
print file_get_contents('css/'.$_GET['style'].'.css');
}else{
	require('404.php');
	exit();
}
?>
